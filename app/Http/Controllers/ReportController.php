<?php

namespace App\Http\Controllers;

use App\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Report::all();
        return view('admin.pages.report.index')->with(['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.report.create');
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
            'report' => 'required|string|max:255',
        ]);
        $report = new Report;
        $report->r_report = $request->report;
        $report->r_admin = auth()->user()->id;
        $report->save();
        return redirect()->back()->withSuccess(' بە سەرکەوتووی زیادکرا ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $report = report::findOrFail($id);
        $request->validate([
            'report' => 'required|string|max:255',
        ]);
        $report->r_report = $request->report;
        $report->r_admin = auth()->user()->id;
        $report->save();
        return redirect()->back()->withSuccess(' بە سەرکەوتووی گۆڕانکاری ئەنجام درا ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        try {
            $report = Report::findOrFail($id);
            $report->delete();
            return redirect()->back()->withSuccess(' تێبینی  بەسەرکەوتووی سڕایەوە ');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withErrors('ناتوانی ئەم کردارە ئەنجام بدەیت !');
        }
    }
}
