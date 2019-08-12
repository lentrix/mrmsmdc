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

Route::get('/', 'SiteController@index')->name('home');
Route::get('/login', 'SiteController@loginForm')->name('login');
Route::post('/login', 'SiteController@login');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin', 'AdminController@index');
    Route::get('/summary', 'TabulatorController@summary');
    Route::get('logout', 'SiteController@logout');
});

Route::group(['middleware' => ['auth', 'judge']], function () {
    Route::get('/judge', 'JudgeController@index');
    Route::post('/round1', 'JudgeController@storeRound1');
    Route::post('/round2', 'JudgeController@storeRound2');
});

Route::group(['middleware' => ['auth', 'tabulator']], function () {
    Route::get('/tabulator', 'TabulatorController@index');
    Route::post('/other-scores', 'TabulatorController@storeOtherScores');
});

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/init-round2', 'AdminController@initRound2');
    Route::post('/users/{user}', 'AdminController@updateUser');
    Route::get('/users', 'AdminController@users');
    Route::get('/users/create', 'AdminController@createUser');
    Route::post('/users', 'AdminController@storeUser');
    Route::get('/users/{user}', 'AdminController@editUser');
    Route::get('/users/{user}/delete', 'AdminController@deleteUser');
    Route::post('/users/{user}/confirm', 'AdminController@confirmDeleteUser');
});
