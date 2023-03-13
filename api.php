<?php

use\App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/student', array('as'=>'student.index','uses'=>'StudentController@index'));
Route::get('/student/add', array('as'=>'student.add','uses'=>'StudentController@add'));
Route::post('/student/insert', array('as'=>'student.insert','uses'=>'StudentController@insert'));
Route::get('/student/show/{id}', array('as'=>'student.show','uses'=>'StudentController@show'));
Route::post('/student/update/{id}', array('as'=>'student.update','uses'=>'StudentController@update'));
Route::get('/student/delete/{id}', array('as'=>'student.delete','uses'=>'StudentController@delete'));




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
