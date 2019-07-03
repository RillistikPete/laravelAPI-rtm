<?php

use Illuminate\Http\Request;

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

//List repos
Route::get('repos', 'RepoController@index');
//Get repo
Route::get('repo/{id}', 'RepoController@show');
//Create repo
Route::post('repo', 'RepoController@store');
//Update repo
Route::put('repo', 'RepoController@store');
//Delete repo
Route::delete('repo/{id}', 'RepoController@destroy');