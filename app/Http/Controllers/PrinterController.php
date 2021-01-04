<?php

namespace App\Http\Controllers;

use App\Departments;
use App\Report;
use App\Students;
use App\Years;
use Illuminate\Http\Request;

class PrinterController extends Controller
{
    public function index()
    {
        $department = Departments::all();
        $year = Years::orderBy("id", "DESC")->get();
        return view('admin.pages.print.index')->with(['data' => [], 'year' => $year, 'department' => $department]);
    }
    public function kartsheet()
    {
        $department = Departments::all();
        $year = Years::orderBy("id", "DESC")->get();
        $report = Report::all();

        return view('admin.pages.print.kartsheet')->with(['data' => [], 'year' => $year, 'department' => $department, 'report' => $report]);
    }
    public function kart(Request $request)
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
            $student = Students::with(['degreeAll' => function ($qq) use ($request) {
                return $qq->with(['course'])
                    ->where('dg_stage', $request->stage)
                    ->where('dg_semester', $request->semester)
                    ->where('dg_year', $request->year)
                    ->get();
            }, 'department', 'year'])->where('s_department', $request->department)->where('s_stage', $request->stage)->get();
        } else {
            $student = Students::with(['degreeAll' => function ($qq) use ($request) {
                return $qq->with(['degreex2' => function ($dd) use ($request) {
                    return $dd;
                }, 'course'])
                    ->where('dg_stage', $request->stage)
                    ->where('dg_semester', $request->semester)
                    ->where('dg_year', $request->year)
                    ->whereRaw('(dg_all_x1 + dg_49_x1 + dg_bryar_x1) < 50')
                    ->get();
            }, 'department', 'year'])
                ->where('s_department', $request->department)
                ->where('s_stage', $request->stage)
                ->get();
        }
        // dd($student[0]);
        return view('admin.pages.print.kart')->with(["data" => $student, "stage" => $request->stage, "semester" => $request->semester, "round" => $request->round]);
    }
    public function printcard(Request $request)
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
        return view('admin.pages.print.daraja')->with(['data' => $student]);
    }
   
}
