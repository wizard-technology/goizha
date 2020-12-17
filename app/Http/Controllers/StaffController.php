<?php

namespace App\Http\Controllers;

use App\Staff;
use App\StaffExam;
use App\Years;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Staff::all();
        $year = Years::all();

        return view('admin.pages.staff.index')->with(['data' => $data, 'year' => $year]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.staff.create');
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
            'phone' => 'required|string|max:11|min:11',
            'email' => 'required|string|max:255|email',
        ]);
        $staff = new Staff;
        $staff->stf_name = $request->name;
        $staff->stf_phone = $request->phone;
        $staff->stf_email = $request->email;
        $staff->stf_admin = auth()->user()->id;
        $staff->save();
        return redirect()->back()->withSuccess(' بە سەرکەوتووی زیادکرا ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $staff = Staff::with('exam.year')->findOrFail($id);

        return view('admin.pages.staff.show')->with(['data' => $staff]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:11|min:11',
            'email' => 'required|string|max:255|email',
        ]);
        $staff->stf_name = $request->name;
        $staff->stf_phone = $request->phone;
        $staff->stf_email = $request->email;
        $staff->stf_admin = auth()->user()->id;
        $staff->save();
        return redirect()->back()->withSuccess(' بە سەرکەوتووی گۆڕانکاری ئەنجام درا ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        try {
            $staff->delete();
            return redirect()->back()->withSuccess(' ستافەکەت بەسەرکەوتووی سڕایەوە ');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withErrors('ناتوانی ئەم کردارە ئەنجام بدەیت !');
        }
      
    }
    public function setExam(Request $request)
    {

        $request->validate([
            'semester' => 'required|in:1,2',
            'round' => 'required|in:1,2',
            'year' => 'required|exists:years,id',
            'staff' => 'required|exists:staff,id',
        ]);
        $test = StaffExam::where('se_semester', $request->semester)
            ->where('se_round', $request->round)
            ->where('se_academic_year', $request->year)
            ->where('se_staff', $request->staff)
            ->get();
            if($test->count() > 0){
                return redirect()->back()->withErrors(' تکایە پێشتر ئەم کەسە هەڵبژێردراوە بۆ ئەم ستافە ');
            }
        $staff_exam = new StaffExam;
        $staff_exam->se_semester = $request->semester;
        $staff_exam->se_round = $request->round;
        $staff_exam->se_staff  = $request->staff;
        $staff_exam->se_academic_year   = $request->year;
        $staff_exam->se_admin  = auth()->user()->id;
        $staff_exam->save();
        return redirect()->back()->withSuccess(' بە سەرکەوتووی زیادکردنەکە ئەنجام درا ');
    }
    
    public function deleteExam(Request $request,$id)
    {   
        $staff_exam = StaffExam::findOrFail($id);
        $staff_exam->delete();
        return redirect()->back()->withSuccess(' بەسەرکەوتووی سڕایەوە ');
    }
    
}
