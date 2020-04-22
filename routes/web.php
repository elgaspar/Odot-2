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
    if (Auth::check()) {
        return view('home');
    }
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');





Route::get('projects', 'ProjectController@index')
    ->name('projects.index');

Route::get('projects/{project}', 'ProjectController@view')
    ->name('projects.view');

Route::post('projects', 'ProjectController@store')
    ->name('projects.create');

Route::put('projects/{project?}', 'ProjectController@update')
    ->name('projects.update');

Route::delete('projects/{project}', 'ProjectController@destroy')
    ->name('projects.destroy');



Route::post('categories', 'CategoryController@store')
    ->name('categories.create');

Route::put('categories/{category?}', 'CategoryController@update')
    ->name('categories.update');

Route::delete('categories/{category}', 'CategoryController@destroy')
    ->name('categories.destroy');




Route::post('tasks', 'TaskController@store')
    ->name('tasks.create');

Route::put('tasks/{task?}', 'TaskController@update')
    ->name('tasks.update');

Route::delete('tasks/{task}', 'TaskController@destroy')
    ->name('tasks.destroy');
