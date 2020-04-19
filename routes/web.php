<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('tasks', 'TaskController@index')
    ->name('tasks.index');

Route::post('tasks', 'TaskController@store')
    ->name('tasks.create');

Route::put('tasks/{task?}', 'TaskController@update')
    ->name('tasks.update');

Route::delete('tasks/{task}', 'TaskController@destroy')
    ->name('tasks.destroy');


// Route::post('tasks/{task}/markCompleted', 'TaskController@markCompleted')
//     ->name('tasks.markCompleted');

// Route::post('tasks/{task}/markIncomplete', 'TaskController@markIncomplete')
//     ->name('tasks.markIncomplete');

// Route::post('tasks/{task}/addChild', 'TaskController@addChild')
//     ->name('tasks.addChild');
