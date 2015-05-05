<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/** Guest route **/
Route::any('/', array('as' => 'login', 'uses' => 'UserController@login'));

/** Member route **/
Route::group(array('prefix' => '/member', 'before' => 'auth'), function()
{
    Route::get('/product', array('as' => 'member.product', 'uses' => 'ProductController@listProduct'));
    Route::get('/logout', array('as' => 'member.logout', 'uses' => 'UserController@logout'));
    Route::post('/addtocart', array('as' => 'member.addtocart', 'uses' => 'ProductController@addToCart'));
    Route::get('/checkout', array('as' => 'member.checkout', 'uses' => 'CartController@checkout'));
});

/** Thrown error route **/
Route::get('guest', array('as' => 'guest', 'uses' => 'ErrorController@login_require'));
Route::get('page-not-found', array('as' => 'page404', 'uses' => 'ErrorController@page404'));
Route::get('/do-not-have-permission', array('as' => 'permission', 'uses' => 'ErrorController@permission'));