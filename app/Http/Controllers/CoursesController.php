<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Departments;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Courses::all();
        return view('admin.pages.course.index')->with(['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dep = Departments::all();
        return view('admin.pages.course.create')->with(['department'=>$dep]);

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
            'unit' => 'required|numeric',
            'weight' => 'required|numeric',
            'name' => 'required|string|max:255',
            'stage' => 'required|in:1,2,3,4,5',
            'semester' => 'required|in:1,2',
            'department' => 'required|exists:departments,id',
        ]);
        $course = new Courses;
        $course->c_name = $request->name;
        $course->c_unit = $request->unit;
        $course->c_stage = $request->stage;
        $course->c_semester = $request->semester;
        $course->c_weight = $request->weight;
        $course->c_department = $request->department;
        $course->c_admin = auth()->user()->id;
        $course->save();
        return redirect()->back()->withSuccess(' بە سەرکەوتووی زیادکرا ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function show(Courses $courses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function edit(Courses $courses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course = Courses::findOrFail($id);
        $request->validate([
            'unit' => 'required|numeric',
            'weight' => 'required|numeric',
            'name' => 'required|string|max:255',
            'stage' => 'required|in:1,2,3,4,5',
            'semester' => 'required|in:1,2',
        ]);
        $course->c_name = $request->name;
        $course->c_stage = $request->stage;
        $course->c_weight = $request->weight;
        $course->c_unit = $request->unit;
        $course->c_semester = $request->semester;
        $course->c_admin = auth()->user()->id;
        $course->save();
        return redirect()->back()->withSuccess(' بە سەرکەوتووی گۆڕانکاری ئەنجام درا ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $courses = Courses::findOrFail($id);
            $courses->delete();
            return redirect()->back()->withSuccess(' بەسەرکەوتووی سڕایەوە ');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withErrors('ناتوانی ئەم کردارە ئەنجام بدەیت !');
        }
    }

    public function get(Request $request)
    {
        $request->validate([
            'stage' => 'required|in:1,2,3,4,5',
            'semester' => 'required|in:1,2',
            'department' => 'required|exists:departments,id',
        ]);
        $courses = Courses::where('c_stage',$request->stage)->where('c_semester',$request->semester)->where('c_department',$request->department)->get();
        return response()->json($courses,200);
    }
}
