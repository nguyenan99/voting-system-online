<?php

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



Route::group(['prefix'=>'admin','middleware'=>['checkLogin','checkAdmin']],function(){
    Route::group(['prefix'=>'candidate'],function(){
        Route::get('list','CandidateController@getlist');
        Route::get('add','CandidateController@getadd');
        Route::get('delete/{id}','CandidateController@getxoa');
        Route::get('repair/{id}','CandidateController@getrepair');
        Route::post('repair/{id}','CandidateController@postrepair');
        Route::post('add','CandidateController@postadd');
        Route::get('listByPosition/{id}','CandidateController@voteOfPosition');
    });
    Route::group(['prefix'=>'users'],function(){
        Route::get('list','UserController@getlist');
        // Thêm tài khoản admin
        Route::get('add','UserController@getadd');
        Route::post('add','UserController@postadd');
        Route::get('delete/{id}','UserController@getxoa');

        // sua thong tin khach hang va tai khoan admin khac
        Route::get('repair/{id}','UserController@getrepair');
        Route::post('repair/{id}','UserController@postrepair');


        // sua tai khoan admin dang dang nhap
        Route::get('repair_account','UserController@get_repairAccount');
        Route::post('repair_account','UserController@post_repairAccount');
    });
    Route::group(['prefix'=>'position'],function(){
        Route::get('list','PositionController@getlist');
        Route::get('add','PositionController@getadd');
        Route::get('delete/{id}','PositionController@getxoa');
        Route::get('repair/{id}','PositionController@getrepair');
        Route::post('repair/{id}','PositionController@postrepair');
        Route::post('add','PositionController@postadd');
    });
    Route::get('home', function () {
        return view('admin/layout/home');
    });
    Route::get('result', function () {
        return view('admin/pollResult');
    });
    Route::get('result2', 'CandidateController@Winner');
    Route::get('result3','CandidateController@voteOfPosition');
    Route::resource('column-searching', 'ColumnSearchingController');
});


//
Route::group(['prefix'=>'customer','middleware'=>'checkLogin'],function(){
   Route::get('history_vote/{userId}','VoteController@history_vote');
    Route::get('start-vote/{id}','VoteController@getStartVote');
    Route::post('start-vote','VoteController@postStartVote');
    // sua tai khoan customer
    Route::get('profile','UserController@getProfile');
    Route::post('profile','UserController@postProfile');
});
route::get('/login', 'UserController@getLogin');
route::post('/login', 'UserController@postLogin');
route::get('/register','UserController@getRegister');
route::post('/register','UserController@postRegister');\
route::get('/logout','UserController@logout');



//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
