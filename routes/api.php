<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// RESTful API Routes - resource creates necessary actions. 
Route::post('/company/create', 'CompanyController@create');
Route::post('/company/csv', 'CompanyController@csv');
Route::get('/companies', 'CompanyController@index');
Route::post('/files/upload', 'FileController@create');
Route::get('/files', 'FileController@index');


