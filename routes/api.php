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

//user login register api

Route::post('v1/user/register','API\Auth\UserRegisterController@user_register');
Route::post('v1/user/login','API\Auth\UserRegisterController@user_login');


Route::group(['middleware' => ['auth:api']], function() {
    Route::prefix('v1/user')->group(function() {

        Route::get('/logout','API\User\UserController@user_logout');

        //user multivendor store
        Route::get('/multivendor/store','API\User\UserController@multivendor_store_get');
        Route::get('/multivendor/store/category/{id}','API\User\UserController@multivendor_store_category');
        Route::get('/multivendor/store/product/{id}','API\User\UserController@multivendor_store_product');

    });
});

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
