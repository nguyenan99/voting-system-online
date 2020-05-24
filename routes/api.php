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

Route::middleware('auth:api')->get('/customer', function (Request $request) {
    return $request->user();
});
Route::apiResource('/candidates','CandidateController');
Route::apiResource('/positions','PositionController');
Route::apiResource('/votes','VoteController');
Route::group(['prefix'=>'candidates'],function(){
    Route::apiResource('/{candidate}/position','PositionController');
});
