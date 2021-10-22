<?php

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

Route::get('/', function () {
    $data = App\custormer_detail::all();

    return view('custormerdetails')->with('details',$data);
});

Route::post('/savedetails','custormerdetails@SaveCustormerDetails');

Route::get('/updatedetail/{id}','custormerdetails@UpdateCustormerDetails');

Route::post('/updatedetails','custormerdetails@UpdateSelectedDetails');

Route::get('/deletedetail/{id}','custormerdetails@DeleteCustormerDetails');

Route::post('/filterdata','custormerdetails@FilterSelectedDetails');
