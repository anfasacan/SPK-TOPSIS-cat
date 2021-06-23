<?php

use App\Http\Controllers\PagesController;
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

//Mains Page
Route::get('/','App\Http\Controllers\PagesController@home');
Route::get('/ranking','App\Http\Controllers\PagesController@rank');
Route::get('/tentang','App\Http\Controllers\PagesController@tentang');
Route::get('/data','App\Http\Controllers\PagesController@data');
Route::get('/compare','App\Http\Controllers\PagesController@compare');

//compare_pages
Route::get('/compare_2','App\Http\Controllers\CompareController@compare_2data');
Route::get('/compare_3','App\Http\Controllers\CompareController@compare_3data');
Route::get('/compare_4','App\Http\Controllers\CompareController@compare_4data');
Route::get('/compare_5','App\Http\Controllers\CompareController@compare_5data');

//compare_compute
Route::post('/compare_c_2','App\Http\Controllers\CompareController@compare_2');
Route::post('/compare_c_3','App\Http\Controllers\CompareController@compare_3');
Route::post('/compare_c_4','App\Http\Controllers\CompareController@compare_4');
Route::post('/compare_c_5','App\Http\Controllers\CompareController@compare_5');

//cari
Route::get('/home/cari','App\Http\Controllers\PagesController@cari_home');

//Log
Route::get('/login_admin','App\Http\Controllers\PagesController@Login');
Route::post('/postlogin','App\Http\Controllers\LogController@postlogin'); 
Route::get('/login_adm','App\Http\Controllers\LogController@login')->name('login')->middleware('auth');
Route::get('/logout', 'App\Http\Controllers\LogController@logout');

//Admin
Route::get('/admin_dashboard','App\Http\Controllers\AdminController@dashboard')->middleware('auth');
Route::get('/admin_data','App\Http\Controllers\AdminController@data')->middleware('auth');

//tambah data
//data
Route::get('/admin_data/tambah_data','App\Http\Controllers\AdminController@tambah_data')->middleware('auth');
Route::post('/admin_data/tambahkan','App\Http\Controllers\AdminController@tambahkan_data')->middleware('auth');

//edit data
//data
Route::get('/admin_data/{data}/edit','App\Http\Controllers\AdminController@edit_data')->middleware('auth');
Route::patch('/admin_data/{data}/update','App\Http\Controllers\AdminController@update_data')->middleware('auth');

//delete data
//data
Route::delete('/admin_data/{data}/hapus','App\Http\Controllers\AdminController@hapus_data')->middleware('auth');
