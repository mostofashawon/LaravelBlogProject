<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('data','App\Http\Controllers\MainController@getDataDB');

//Route::post('post','App\Http\Controllers\MainController@postData');

Route::get('get','App\Http\Controllers\MainController@getQueryBuilder');

Route::post('post','App\Http\Controllers\MainController@uploadImage');
