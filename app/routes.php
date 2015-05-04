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

Route::any('/', array('as' => 'index.home', 'uses' => 'HomeController@index'));
Route::any('/login', array('as' => 'login', 'uses' => 'HomeController@login'));
Route::group(array('prefix' => 'member', 'before' => 'auth'), function()
{
    Route::any('/', array('as' => 'member.index', 'uses' => 'HomeController@member'));
});
Route::get('guest', array('as' => 'guest', 'uses' => 'ErrorController@login_require'));
Route::get('page-not-found', array('as' => 'page404', 'uses' => 'ErrorController@page404'));
Route::get('/do-not-have-permission', array('as' => 'permission', 'uses' => 'ErrorController@permission'));