<?php

use App\Http\Controllers\TeamController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('teams', 'TeamController@index');
Route::post('teams/store', 'TeamController@store');

Route::get('players', 'PlayerController@index');
Route::post('players/store', 'PlayerController@store');
