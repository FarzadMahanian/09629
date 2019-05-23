<?php

use Illuminate\Http\Request;
use GuzzleHttp\Client;

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

Route::get('09629/category', 'The09629Controller@category');

Route::get('09629/province', 'The09629Controller@province');

Route::get('09629/city', 'The09629Controller@city');

Route::get('09629/search', 'The09629Controller@search');

