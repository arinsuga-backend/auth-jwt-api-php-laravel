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

//Authentication
Route::group([ 'prefix' => 'auth'], function (){ 
    Route::group(['middleware' => ['guest:api']], function () {
        Route::post('login', 'API\AuthController@login');
        Route::post('register', 'API\AuthController@register');
    });
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'API\AuthController@logout');
        Route::get('getuser', 'API\AuthController@getUser');
    });
});

Route::group(['middleware' => ['auth:api']], function () {

    //Post
    Route::resource('posts', 'API\PostController');
    Route::group([ 'prefix' => 'postlikes'], function (){ 
            Route::post('like', 'API\PostlikeController@like');
            Route::post('dislike', 'API\PostlikeController@dislike');
            Route::put('clear', 'API\PostlikeController@clear');
    });

});

//Comment
Route::resource('comments', 'API\CommentController');
