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
    return view('dashboard');
})->middleware('auth');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
// Route::get('/system-management/{option}', 'SystemMgmtController@index');
Route::get('/profile', 'ProfileController@index');

Route::post('user-management/search', 'UserManagementController@search')->name('user-management.search');
Route::resource('user-management', 'UserManagementController');

Route::resource('employee-management', 'EmployeeManagementController');
Route::post('employee-management/search', 'EmployeeManagementController@search')->name('employee-management.search');

Route::resource('system-management/designation', 'DesignationController');
Route::post('system-management/designation/search', 'DesignationController@search')->name('designation.search');

Route::get('employee-education/{employee_id}', 'EmployeeEducationController@index');
Route::post('employee-education-store', 'EmployeeEducationController@store');
Route::get('employee-education-delete/{edu_id}', 'EmployeeEducationController@delete');
Route::get('employee-education-edit/{edu_id}', 'EmployeeEducationController@edit');

Route::resource('system-management/division', 'DivisionController');
Route::post('system-management/division/search', 'DivisionController@search')->name('division.search');

Route::resource('system-management/subject', 'SubjectController');
Route::post('system-management/subject/search', 'SubjectController@search')->name('subject.search');

// Route::resource('system-management/country', 'CountryController');
// Route::post('system-management/country/search', 'CountryController@search')->name('country.search');


//state route == work place 
Route::resource('system-management/work_place', 'Work_placeController');
Route::post('system-management/work_place/search', 'Work_placeController@search')->name('work_place.search');

Route::resource('system-management/city', 'CityController');
Route::post('system-management/city/search', 'CityController@search')->name('city.search');

Route::get('system-management/report', 'ReportController@index');
Route::post('system-management/report/bydesignation', 'ReportController@reportBbydesignation');
Route::post('system-management/report/search', 'ReportController@search')->name('report.search');
Route::post('system-management/report/excel', 'ReportController@exportExcel')->name('report.excel');
Route::post('system-management/report/pdf', 'ReportController@exportPDF')->name('report.pdf');

Route::get('avatars/{name}', 'EmployeeManagementController@load');