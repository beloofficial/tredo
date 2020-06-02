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


#--------------------------- Table

Route::get('/','TableController@show')->name('table');

#--------------------------- Department Route

Route::get('departments','DepartmentController@index')->name('indexDep');

Route::get('departments/create','DepartmentController@create')->name('createDep');

Route::get('departments/{department}/edit','DepartmentController@edit')->name('editDep');

Route::put('departments/{department}','DepartmentController@update')->name('updateDep');

Route::post('departments','DepartmentController@store')->name('storeDep');

Route::delete('departments/{department}','DepartmentController@destroy')->name('destroyDep');


#--------------------------- Employee Route

Route::get('employees','EmployeeController@index')->name('indexEmp');

Route::get('employees/create','EmployeeController@create')->name('createEmp');

Route::get('employees/{employee}/edit','EmployeeController@edit')->name('editEmp');

Route::put('employees/{employee}','EmployeeController@update')->name('updateEmp');

Route::post('employees','EmployeeController@store')->name('storeEmp');

Route::delete('employees/{employee}','EmployeeController@destroy')->name('destroyEmp');