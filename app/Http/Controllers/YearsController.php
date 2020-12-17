<?php

namespace App\Http\Controllers;

use App\Staff;
use App\Years;
use Illuminate\Http\Request;

class YearsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Years::all();
        return view('admin.pages.years.index')->with(['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.years.create');
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
            'year' => 'required|string|max:255|unique:years,y_year',
        ]);
        $year = new Years;
        $year->y_year = $request->year;
        $year->y_admin = auth()->user()->id;
        $year->save();
        return redirect()->back()->withSuccess(' بە سەرکەوتووی زیادکرا ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Years  $years
     * @return \Illuminate\Http\Response
     */
    public function show(Years $years)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Years  $years
     * @return \Illuminate\Http\Response
     */
    public function edit(Years $years)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Years  $years
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $years = Years::findOrFail($id);
        $request->validate([
            'year' => 'required|string|max:255|unique:years,y_year,'.$years->y_year,
        ]);
        $years->y_year = $request->year;
        $years->y_admin = auth()->user()->id;
        $years->save();
        return redirect()->back()->withSuccess(' بە سەرکەوتووی گۆڕانکاری ئەنجام درا ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Years  $years
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {
            $years = Years::findOrFail($id);
            $years->delete();
            return redirect()->back()->withSuccess(' ساڵی ئەکادیمی بەسەرکەوتووی سڕایەوە ');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withErrors('ناتوانی ئەم کردارە ئەنجام بدەیت !');
        }
    }
}
