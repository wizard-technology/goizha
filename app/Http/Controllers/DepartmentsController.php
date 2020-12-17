<?php

namespace App\Http\Controllers;

use App\Departments;
use App\Students;
use App\Years;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Departments::all();
        return view('admin.pages.department.index')->with(['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.department.create');

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
            'prefix' => 'required|string|max:255',
        ]);
        $department = new Departments;
        $department->d_name = $request->name;
        $department->d_prefix = $request->prefix;
        $department->d_admin = auth()->user()->id;
        $department->save();
        return redirect()->back()->withSuccess(' بە سەرکەوتووی زیادکرا ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Departments  $departments
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Departments::with(['courses','students.year'])->findOrFail($id);
        $year = Years::all();
        $student =  DB::table('students')->where('s_department',$id)->selectRaw('s_gender,count(*) as gn')->groupBy('s_gender')->get();
        $course =  DB::table('courses')->where('c_department',$id)->selectRaw('c_stage,count(*) as co,SUM(c_unit)')->groupBy('c_stage')->get();
        return view('admin.pages.department.show')->with(['data' => $data,'student' => $student,'course' => $course,'year' => $year]);

    }
    public function search_st_dp(Request $request)
    {
        $data = Departments::with(['courses'=>function ($sql)use ($request)
        {
            return $sql->where('c_stage',$request->stage);
        },'students'=>function ($sql) use ($request)
        {
            return $sql->with('year')->where('s_academic_year',$request->year)->where('s_stage',$request->stage)->orderBy('s_fullname', 'ASC')->orderBy('s_stage', 'ASC');
        }])->findOrFail($request->dep);
        $year = Years::all();
        $student =  DB::table('students')->where('s_department',$request->dep)->where('s_academic_year',$request->year)->where('s_stage',$request->stage)->selectRaw('s_gender,count(*) as gn')->groupBy('s_gender')->get();
        $course =  DB::table('courses')->where('c_department',$request->dep)->where('c_stage',$request->stage)->selectRaw('c_stage,count(*) as co,SUM(c_unit)')->groupBy('c_stage')->get();
        return view('admin.pages.department.search')->with([
            'data' => $data,
            'student' => $student,
            'course' => $course,
            'year' => $year,
            'old' => $request->input(),

        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Departments  $departments
     * @return \Illuminate\Http\Response
     */
    public function edit(Departments $departments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Departments  $departments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $departments = Departments::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'prefix' => 'required|string|max:255',
        ]);
        $departments->d_name = $request->name;
        $departments->d_prefix = $request->prefix;
        $departments->d_admin = auth()->user()->id;
        $departments->save();
        return redirect()->back()->withSuccess(' بە سەرکەوتووی گۆڕانکاری ئەنجام درا ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Departments  $departments
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        try {
            $dep = Departments::findOrFail($id);
            $dep->delete();
            return redirect()->back()->withSuccess(' بەسەرکەوتووی سڕایەوە ');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withErrors('ناتوانی ئەم کردارە ئەنجام بدەیت !');
        }
    }
    public function print(Request $request)
    {
        $data = Departments::with(['courses'=>function ($sql)use ($request)
        {
            return $sql->where('c_stage',$request->stage);
        },'students'=>function ($sql) use ($request)
        {
            return $sql->with('year')->where('s_academic_year',$request->year)->where('s_stage',$request->stage)->orderBy('s_fullname', 'ASC')->orderBy('s_stage', 'ASC');
        }])->findOrFail($request->dep);
     
        return view('admin.pages.department.print')->with(['data'=>$data ]);
    }
}
