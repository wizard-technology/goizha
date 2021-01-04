<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Degree;
use App\degree2;
use App\Departments;
use App\Report;
use App\Years;
use Illuminate\Http\Request;

class DegreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Degree::all();
        $department = Departments::all();
        $year = Years::orderBy("id", "DESC")->get();
        $report = Report::all();

        return view('admin.pages.degree.index')->with(['data' => [], 'year' => $year, 'department' => $department, 'report' => $report]);
    }
    public function search(Request $request)
    {
        switch ($request->submitbtn) {
            case 'report':
                $request->validate([
                    'bash_old' => 'required|string|exists:departments,id',
                    'sall_old' => 'required|string|exists:years,id',
                    'qonagh_old' => 'required|in:1,2,3,4,5',
                    'warz_old' => 'required|in:1,2',
                    'xwl_old' => 'required|in:1,2',
                    'wana_old' => 'required|string|exists:courses,id',
                ]);
                $data = Degree::with(['student', 'course.department', 'degreex2.report', 'report',])
                    ->where('dg_course', $request->wana_old)
                    ->where('dg_year', $request->sall_old)
                    ->where('dg_semester', $request->warz_old)
                    ->where('dg_stage', $request->qonagh_old)
                    ->get();
                $year = Years::findOrFail($request->sall_old);
                $course = Courses::with(['department'])->findOrFail($request->wana_old);

                return view('admin.pages.print.report')->with(['data' => $data, 'course'=>$course ,'year'=>$year, 'round' => $request->xwl_old, 'semester' => $request->warz_old, 'stage' => $request->qonagh_old]);
                break;
            default:
                $data = Degree::with(['student', 'degreex2.report', 'report'])
                    ->where('dg_course', $request->wana_old)
                    ->where('dg_year', $request->sall_old)
                    ->where('dg_semester', $request->warz_old)
                    ->where('dg_stage', $request->qonagh_old)
                    ->get();
                // dd($data);
                $department = Departments::all();
                $year = Years::orderBy("id", "DESC")->get();
                $report = Report::all();

                return view('admin.pages.degree.index')->with(['data' => $data, 'year' => $year, 'department' => $department, 'report' => $report, 'old' => $request->input()]);
                break;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department = Departments::all();
        $year = Years::orderBy("id", "DESC")->get();
        $report = Report::all();
        return view('admin.pages.degree.create')->with(['department' => $department, 'year' => $year, 'report' => $report]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Degree  $degree
     * @return \Illuminate\Http\Response
     */
    public function show(Degree $degree)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Degree  $degree
     * @return \Illuminate\Http\Response
     */
    public function edit(Degree $degree)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Degree  $degree
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Degree $degree)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Degree  $degree
     * @return \Illuminate\Http\Response
     */
    public function destroy(Degree $degree)
    {
        //
    }
}
