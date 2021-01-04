<?php

namespace App\Http\Controllers;

use App\Bryar;
use App\Degree;
use App\degree2;
use App\Departments;
use App\Nums;
use App\Students;
use App\Years;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Students::with(['year', 'department'])->get();
        $dep = Departments::all();
        $year = Years::all();
        return view('admin.pages.student.index')->with(['data' => $data, 'years' => $year, 'department' => $dep]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dep = Departments::all();
        $year = Years::all();

        return view('admin.pages.student.create')->with(['years' => $year, 'department' => $dep]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'department' => 'required|exists:departments,id',
            'year' => 'required|exists:years,id',
            'stage' => 'required|in:1,2,3,4,5',
            'gender' => 'required|string|max:255|in:نێر,مێ',
            'start_date' => 'required|date|before:tomorrow',
        ]);
        $student = new Students;
        $student->s_fullname = $request->name;
        $student->s_gender = $request->gender;
        $student->s_stage = $request->stage;
        $student->s_department = $request->department;
        $student->s_academic_year = $request->year;
        $student->s_start_at = $request->start_date;
        $student->s_admin = auth()->user()->id;
        $student->save();
        return redirect()->back()->withSuccess(' بە سەرکەوتووی زیادکرا ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function show(Students $students)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function edit(Students $students)
    {
        //
    }
    public function kart()
    {
        $request->validate([
            'department' => 'required|string|exists:departments,id',
            'year' => 'required|string|exists:years,id',
            'stage' => 'required|in:1,2,3,4,5',
            'semester' => 'required|in:1,2',
            'round' => 'required|in:1,2',
        ]);
        $student = null;
        if ($request->round == 1) {
            $student = Students::with(['degreex1' => function ($qq) use ($request) {
                return $qq
                    ->where('dg_stage', $request->stage)
                    ->where('dg_semester', $request->semester)
                    ->where('dg_year', $request->year)
                    ->get();
            }])->where('s_department', $request->department)->where('s_stage', $request->stage)->get();
        } else {
            $student = Students::with(['degreex1' => function ($qq) use ($request) {
                return $qq->with(['degreex2' => function ($dd) use ($request) {
                    return $dd;
                }])
                    ->where('dg_stage', $request->stage)
                    ->where('dg_semester', $request->semester)
                    ->where('dg_year', $request->year)
                    ->whereRaw('(dg_all_x1 + dg_49_x1 + dg_bryar_x1) < 50')
                    ->get();
            }])
            ->where('s_department', $request->department)
            ->where('s_stage', $request->stage)
            ->get();
        }
        return response()->json($student, 200);
        return view('admin.pages.print.kart');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Students::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'department' => 'required|string|exists:departments,id',
            'year' => 'required|string|exists:years,id',
            'stage' => 'required|in:1,2,3,4,5',
            'gender' => 'required|string|max:255|in:نێر,مێ',
            'start_date' => 'required|date|before:tomorrow',
        ]);
        // dd($request->input());
        $student->s_fullname = $request->name;
        $student->s_gender = $request->gender;
        $student->s_stage = $request->stage;
        $student->s_department = $request->department;
        $student->s_academic_year = $request->year;
        $student->s_start_at = $request->start_date;
        $student->s_admin = auth()->user()->id;
        $student->save();
        return redirect()->back()->withSuccess(' بە سەرکەوتووی گۆڕانکاری ئەنجام درا ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $students = Students::findOrFail($id);
            $students->delete();
            return redirect()->back()->withSuccess(' خوێندکارەکەت بەسەرکەوتووی سڕایەوە ');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withErrors('ناتوانی ئەم کردارە ئەنجام بدەیت !');
        }
    }
    public function get(Request $request)
    {
        $request->validate([
            'department' => 'required|string|exists:departments,id',
            'year' => 'required|string|exists:years,id',
            'stage' => 'required|in:1,2,3,4,5',
            'semester' => 'required|in:1,2',
            'round' => 'required|in:1,2',
            'course' => 'required|string|exists:courses,id',
        ]);
        $student = null;
        if ($request->round == 1) {
            $student = Students::with(['degreex1' => function ($qq) use ($request) {
                return $qq->where('dg_course', $request->course)
                    ->where('dg_stage', $request->stage)
                    ->where('dg_semester', $request->semester)
                    ->where('dg_year', $request->year)
                    ->get();
            }])->where('s_department', $request->department)->where('s_stage', $request->stage)->get();
        } else {
            $student = Students::with(['degreex1' => function ($qq) use ($request) {
                return $qq->with(['degreex2' => function ($dd) use ($request) {
                    return $dd;
                }])->where('dg_course', $request->course)
                    ->where('dg_stage', $request->stage)
                    ->where('dg_semester', $request->semester)
                    ->where('dg_year', $request->year)
                    ->whereRaw('(dg_all_x1 + dg_49_x1 + dg_bryar_x1) < 50')
                    ->get();
            }])
            ->where('s_department', $request->department)
            ->where('s_stage', $request->stage)
            ->get();
        }
        return response()->json($student, 200);
    }
    public function save(Request $request)
    {
        $request->validate([
            'department' => 'required|string|exists:departments,id',
            'year' => 'required|string|exists:years,id',
            'stage' => 'required|in:1,2,3,4,5',
            'semester' => 'required|in:1,2',
            'round' => 'required|in:1,2',
            'course' => 'required|string|exists:courses,id',
            'student' => 'required|exists:students,id',
            'x40' => 'required|numeric',
        ]);
        $degree = Degree::where('dg_course', $request->course)
            ->where('dg_stage', $request->stage)
            ->where('dg_semester', $request->semester)
            ->where('dg_year', $request->year)
            ->where('dg_student', $request->student)
            ->first();

        if (is_null($degree)) {
            $degree = new Degree;
            $degree->dg_student = $request->student;
            $degree->dg_course = $request->course;
            $degree->dg_year = $request->year;
            $degree->dg_semester = $request->semester;
            $degree->dg_department = $request->department;
            $degree->dg_stage = $request->stage;
            $degree->dg_degree_tekra = $request->x40;
            $degree->dg_degree_tekra_text = Nums::find($request->x40)->numbers;
            if (!is_null($request->x60)) {
                $degree->dg_degree_final_x1 = $request->x60;
                $degree->dg_degree_final_text_x1 = Nums::find($request->x60)->numbers;
            }
            if (!is_null($request->report)) {
                $degree->dg_report_x1 = $request->report;
            }
            if (!is_null($request->note)) {
                $degree->dg_note_x1 = $request->note;
            }
            if (!is_null($request->x60) && !is_null($request->x40)) {
                $degree->dg_all_x1 =  $request->x60 + $request->x40;
                $degree->dg_all_text_x1 = Nums::find($request->x60 + $request->x40)->numbers;
            }
            $degree->dg_admin = auth()->user()->id;

            $degree->save();
        } else {

            $degree->dg_student = $request->student;
            $degree->dg_department = $request->department;
            $degree->dg_course = $request->course;
            $degree->dg_year = $request->year;
            $degree->dg_semester = $request->semester;
            $degree->dg_stage = $request->stage;
            $degree->dg_degree_tekra = $request->x40;
            $degree->dg_degree_tekra_text = Nums::find($request->x40)->numbers;

            if (!is_null($request->x60) && $request->x60 > 0) {
                $degree->dg_degree_final_x1 = $request->x60;
                $degree->dg_degree_final_text_x1 = Nums::find($request->x60)->numbers;
            }

            if (!is_null($request->report)) {
                $degree->dg_report_x1 = $request->report;
            }
            if (!is_null($request->note)) {
                $degree->dg_note_x1 = $request->note;
            }
            if (!is_null($request->x60) && !is_null($request->x40)) {
                $degree->dg_all_x1 =  $request->x60 + $request->x40;
                $degree->dg_all_text_x1 = Nums::find($request->x60 + $request->x40)->numbers;
            }

            $degree->dg_admin = auth()->user()->id;
            $degree->save();
        }
        return response()->json($degree, 200);
    }
    public function save_round_2(Request $request)
    {
        $request->validate([
            'x40' => 'required|numeric',
            'x60' => 'required|numeric',
            'degree' => 'required|exists:degrees,id',
        ]);

        $degree1 = Degree::findOrFail($request->degree);
        $degree1->dg_degree_tekra = $request->x40;
        $degree1->dg_degree_tekra_text = Nums::find($request->x40)->numbers;
        $degree1->save();
        $degree = degree2::where('dg_x1', $request->degree)->first();
        if (is_null($degree)) {
            $degree = new degree2;
            $degree->dg_x1  = $request->degree;
            $degree->dg_degree_final_x2 = $request->x60;
            $degree->dg_degree_final_text_x2 = Nums::find($request->x60)->numbers;
            $degree->dg_all_x2 = $request->x60 + $request->x40;
            $degree->dg_all_text_x2 = Nums::find($request->x60 + $request->x40)->numbers;
            $degree->dg_report_x2 = $request->report;
            if (!is_null($request->note)) {
                $degree->dg_note_x2 = $request->note;
            }
            $degree->dg_admin_x2 = auth()->user()->id;
            $degree->save();
        } else {
            $degree->dg_degree_final_x2 = $request->x60;
            $degree->dg_degree_final_text_x2 = Nums::find($request->x60)->numbers;
            $degree->dg_all_x2 = $request->x60 + $request->x40;
            $degree->dg_all_text_x2 = Nums::find($request->x60 + $request->x40)->numbers;
            $degree->dg_report_x2 = $request->report;
            if (!is_null($request->note)) {
                $degree->dg_note_x2 = $request->note;
            }
            $degree->dg_admin_x2 = auth()->user()->id;
            $degree->save();
        }
        return response()->json('DONE', 200);
    }
    public function to50(Request $request)
    {
        $request->validate([
            'department' => 'required|string|exists:departments,id',
            'year' => 'required|string|exists:years,id',
            'stage' => 'required|in:1,2,3,4,5',
            'semester' => 'required|in:1,2',
            'round' => 'required|in:1,2',
            'course' => 'required|string|exists:courses,id',
        ]);

        if ($request->round == 1) {
            $data = Degree::where('dg_course', $request->course)
                ->where('dg_year', $request->year)
                ->where('dg_semester', $request->semester)
                ->where('dg_stage', $request->stage)
                ->whereRaw('dg_all_x1 = 49 AND dg_49_x1 = 0')
                ->update([
                    'dg_49_x1' => 1
                ]);
        } else {
            $data = DB::table('degree2s')
                ->join('degrees', 'degree2s.dg_x1', '=', 'degrees.id')
                ->select('degree2s.*')
                ->where('degrees.dg_course', $request->course)
                ->where('degrees.dg_year', $request->year)
                ->where('degrees.dg_semester', $request->semester)
                ->where('degrees.dg_stage', $request->stage)
                ->whereRaw('dg_all_x2 = 49 AND dg_49_x2 = 0')
                ->update([
                    'dg_49_x2' => 1
                ]);
        }
        return response()->json("DONE", 200);
    }
    public function qarar(Request $request)
    {
        $request->validate([
            'department' => 'required|string|exists:departments,id',
            'year' => 'required|string|exists:years,id',
            'stage' => 'required|in:1,2,3,4,5',
            'semester' => 'required|in:1,2',
            'round' => 'required|in:1,2',
            'course' => 'required|string|exists:courses,id',
            'qarar' => 'required|numeric|gte:0',
        ]);

        $q = Bryar::where('br_department', $request->department)
            ->where('br_year', $request->year)
            ->where('br_semester', $request->semester)
            ->where('br_stage', $request->stage)
            ->where('br_round', $request->round)
            ->first();
        if (is_null($q)) {
            $q = new Bryar;
        }
        $q->br_department = $request->department;
        $q->br_year = $request->year;
        $q->br_semester = $request->semester;
        $q->br_stage = $request->stage;
        $q->br_round = $request->round;
        $q->br_limit = $request->qarar;
        $q->save();

        if ($request->round == 1) {
            $data = Degree::where('dg_department', $request->department)
                ->where('dg_year', $request->year)
                ->where('dg_semester', $request->semester)
                ->where('dg_stage', $request->stage)
                ->whereRaw("dg_all_x1 >= " . (50 - $request->qarar) . " AND dg_all_x1 < 50  AND dg_49_x1 = 0 AND dg_bryar_x1 = 0")
                ->get();
            foreach ($data as $key => $value) {
                $xx = Degree::groupBy('dg_student')
                    ->selectRaw('sum(dg_bryar_x1) as dg_br_x1, dg_student')
                    ->where('dg_department', $request->department)
                    ->where('dg_year', $request->year)
                    ->where('dg_semester', $request->semester)
                    ->where('dg_stage', $request->stage)
                    ->where('dg_student', $value->dg_student)
                    ->first();
                if ($xx->dg_br_x1 < $q->br_limit) {
                    $up = Degree::findOrFail($value->id);
                    $up->dg_bryar_x1 = 50 - $up->dg_all_x1;
                    $up->save();
                } else {
                }
            }
        return response()->json('DONE', 200);

        }
        else{
            
        }
    }
}
