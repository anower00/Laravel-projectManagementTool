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

Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@verify');

Route::get('/login/logout', 'LoginController@logout')->name('logout');

Route::get('/pages/user', 'UserController@index')->name('user');
Route::get('/pages/user/list', 'UserController@list')->name('user.list');
Route::get('/pages/user/create', 'UserController@create')->name('user.create');
Route::post('/pages/user/create', 'UserController@store');
Route::get('/pages/user/profile', 'UserController@profile')->name('user.profile');
Route::get('/pages/user/edit/{id}', 'UserController@edit')->name('user.edit');
Route::post('/pages/user/edit/{id}', 'UserController@update');
Route::get('/pages/user/destroy/{id}', 'UserController@destroy')->name('user.delete');
Route::get('/pages/user/show/{id}', 'UserController@show')->name('user.details');

Route::get('/pages/project', 'ProjectController@index')->name('project');
Route::get('/pages/project/list', 'ProjectController@list')->name('project.list');
Route::get('/pages/project/create', 'ProjectController@create')->name('project.create');
Route::post('/pages/project/create', 'ProjectController@store');
Route::get('/pages/project/show/{id}', 'ProjectController@show')->name('project.details');

Route::get('/pages/project/assignUser', 'ProjectController@assignUser')->name('project.assign');
Route::post('/pages/project/assignUser', 'ProjectController@assignUserStore');

Route::get('/pages/project/addTask', 'ProjectController@addTask')->name('project.addTask');
Route::post('pages.project/addTask' , 'ProjectController@taskAssign');
Route::get('pages.project/taskList' , 'ProjectController@taskList')->name('taskList');

Route::get('pages.project/addComment' , 'ProjectController@addComment')->name('addComment');
Route::get('pages.project/commentList' , 'ProjectController@commentList')->name('commentList');

Route::get('pages.project/projectReport' , 'ProjectController@projectReport')->name('projectReport');

Route::get('/', function () {
    return redirect()->route('login');
});
