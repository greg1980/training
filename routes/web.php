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

Route::get('/', function () {
    return view('welcome');
});


Route::resource('player', 'PlayerController');


// Route::get('player', function () {
//     return App\player::paginate(4);
// });

Route::resource('project', 'ProjectController');
Route::Patch('tasks/{task}','ProjectTasksController@update');
Route::POST('projects/{project}/tasks','ProjectTasksController@store');

