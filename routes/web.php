<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes(['register' => true]);
Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/department/print/student', 'DepartmentsController@print')->name('department.print');
    Route::resource('/department', 'DepartmentsController');
    Route::get('/department/search/student', 'DepartmentsController@search_st_dp')->name('department.searchst');

    Route::resource('/courses', 'CoursesController');
    Route::post('/courses/get', 'CoursesController@get')->name('course.get');
    Route::post('/student/get', 'StudentsController@get')->name('student.get');
    Route::post('/student/to50', 'StudentsController@to50')->name('student.to50');
    Route::post('/student/qarar', 'StudentsController@qarar')->name('student.qarar');
    Route::post('/student/save', 'StudentsController@save')->name('student.save');
    Route::post('/student/save/round/two', 'StudentsController@save_round_2')->name('student.save2');
    Route::resource('/year', 'YearsController');
    Route::resource('/student', 'StudentsController');
    Route::resource('/degree', 'DegreeController');
    Route::get('/degree/search/student', 'DegreeController@search')->name('degree.search');
    Route::get('/student/get/kart', 'StudentsController@kart')->name('student.kart');

    Route::resource('/staff', 'StaffController');
    Route::resource('/report', 'ReportController');
    Route::post('/staff/set/as/staff/exam', 'StaffController@setExam')->name('staff.setAsStaff');
    Route::delete('/staff/set/as/staff/exam/{exam}', 'StaffController@deleteExam')->name('staff.deleteAsStaff');

    Route::get('/print/degree', 'PrinterController@kartsheet')->name('print.kartsheet');
    Route::get('/print', 'PrinterController@index')->name('print.index');
    Route::get('/print/kart', 'PrinterController@kart')->name('print.kart');
    Route::get('/print/kart/raw', 'PrinterController@printcard')->name('print.printcard');
    Route::get('/print/report/daraja', 'PrinterController@printRaport')->name('print.reportdaraja');
});
