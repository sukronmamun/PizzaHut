<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    // echo date('l',mktime(0,0,0,date('m'),date('d')+2,date('Y')));
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/Admin/Home','admin\AdminHomeController@index');
Route::post('/Admin/password','admin\AdminHomeController@password');
// Route::get('/Admin/Karyawan','admin\AdminHomeController@karyawan');
Route::get('/Admin/Karyawan','admin\AdminHomeController@karyawan');

Route::post('/Admin/Karyawan','admin\AdminHomeController@karyawan');
Route::post('/Admin/TambahKaryawan','admin\AdminHomeController@tambahkaryawan');
Route::get('/Admin/getData/{nik}','admin\AdminHomeController@getKaryawan');
Route::get('/Admin/nik/{nik}','admin\AdminHomeController@hapusKaryawan');
Route::get('/Admin/editDataKaryawan/{nik}','admin\AdminHomeController@DataKaryawan');
Route::post('/Admin/editDataKaryawan','admin\AdminHomeController@editDataKaryawan');





Route::get('/Admin/tambahkaryawan','admin\AdminHomeController@tambahkaryawan');
Route::get('/Admin/Cuti','admin\AdminHomeController@cuti');
Route::post('/Admin/Cuti','admin\AdminHomeController@cuti');
Route::get('/admin/login','Auth\LoginController@showLoginForm');
Route::post('/admin/logout','Auth\LoginController@logout');

  Route::get('/karyawan/cuti','karyawan\KaryawanController@Cuti');
  Route::post('/karyawan/cuti','karyawan\KaryawanController@Cuti');
  Route::post('/karyawan/ajukanCuti','karyawan\KaryawanController@ajukanCuti');
  Route::get('/karyawan/home','karyawan\KaryawanController@index');
  Route::get('/karyawan/login','karyawanAuth\LoginController@showLoginForm');
  Route::post('/karyawan/logout','karyawanAuth\LoginController@logout');
  Route::post('/karyawan/password','karyawan\KaryawanController@password');

  Route::post('/karyawan/login','karyawanAuth\LoginController@login');
  Route::get('/manager/login','managerAuth\LoginController@showLoginForm');
  Route::post('/manager/login','managerAuth\LoginController@login');


  Route::get('/Manager/hapus/cuti/nik/{nik}','manager\ManagerController@hapusPengajuanCuti');
  Route::get('/Manager/approval/nik/{nik}','manager\ManagerController@approval');
  Route::post('/manager/password','manager\ManagerController@password');
  Route::get('/manager/home','manager\ManagerController@index');
  Route::post('/manager/karyawan','manager\ManagerController@karyawan');
  Route::get('/manager/karyawan','manager\ManagerController@karyawan');
  Route::get('/manager/cuti','manager\ManagerController@cuti');
  Route::post('/manager/cuti','manager\ManagerController@cuti');
  Route::post('/manager/logout','managerAuth\LoginController@logout');
