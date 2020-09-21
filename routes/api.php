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

Route::post('/register', 'App\Http\Controllers\Api\ApiController@register');
Route::post('/userlogin', 'App\Http\Controllers\Api\ApiController@login');


Route::middleware('auth:api')->group(function(){
    Route::get('/info', 'App\Http\Controllers\Api\ApiController@info');
    Route::post('/addTodo', 'App\Http\Controllers\Api\ApiController@addTodo');
    Route::get('/todoDetails/{id}', 'App\Http\Controllers\Api\ApiController@todoDetails');
});