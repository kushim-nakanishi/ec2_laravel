<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/scraping','App\Http\Controllers\ScrapingController@scraping')->middleware('auth');
Route::get('/todo',function () {return view('todo');})->middleware('auth');
Route::get('/folders/{id}/tasks', 'App\Http\Controllers\TaskController@index')->name('tasks.index')->middleware('auth');

Route::get('/folders/create', 'App\Http\Controllers\FolderController@showCreateForm')->name('folders.create')->middleware('auth');
Route::post('/folders/create', 'App\Http\Controllers\FolderController@create')->middleware('auth');

Route::get('/folders/{id}/tasks/create', 'App\Http\Controllers\TaskController@showCreateForm')->name('tasks.create');
Route::post('/folders/{id}/tasks/create', 'App\Http\Controllers\TaskController@create');
