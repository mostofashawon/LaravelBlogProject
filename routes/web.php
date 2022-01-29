<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;




Route::get('/', function () {
    return view('welcome');
});

 Route::get('/data/{id}/{id1}','App\Http\Controllers\MainController@index');

 Route::get('/setting/{id}/{id1}','App\Http\Controllers\MainController@index');

 Route::get('/data','App\Http\Controllers\MainController@getDataDB');
 Route::get('/setting','App\Http\Controllers\MainController@getDataDB');




// Route::group(['argument'=>'/'],function(){

//     Route::get('/setting',function () {
//             return 'setting';
//     });
//     Route::get('/data',function () {
//         return 'data';
//     });
//     Route::get('/about',function () {
//         return 'about';
//     });

// });