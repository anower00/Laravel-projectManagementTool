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
    Route::group(['middleware' => 'sess'], function(){
Route::get('/pages/user', 'UserController@index')->name('user');
Route::get('/pages/user/list', 'UserController@list')->name('user.list');
Route::get('/pages/user/create', 'UserController@create')->name('user.create');
Route::post('/pages/user/create', 'UserController@store');
Route::get('/pages/user/profile', 'UserController@profile')->name('user.profile');
Route::get('/pages/user/edit/{id}', 'UserController@edit')->name('user.edit');
Route::post('/pages/user/edit/{id}', 'UserController@update');
Route::get('/pages/user/destroy/{id}', 'UserController@destroy')->name('user.delete');
Route::get('/pages/user/show/{id}', 'UserController@show')->name('user.details');
Route::get('/reset-password', 'UserController@resetPassword')->name('user.resetPassword');
Route::post('/update-password', 'UserController@updatePassword')->name('user.updatePassword');
Route::post('/changeProfilePicture', 'UserController@changeProfilePicture')->name('user.changeProfilePicture');
Route::post('/searchUser', 'UserController@searchUser');
Route::get('/profile', 'UserController@profile')->name('user.profile');

Route::get('/pages/project', 'ProjectController@index')->name('project');
Route::get('/pages/project/list', 'ProjectController@list')->name('project.list');
Route::get('/pages/project/create', 'ProjectController@create')->name('project.create');
Route::post('/pages/project/create', 'ProjectController@store');
Route::get('/pages/project/show/{id}', 'ProjectController@show')->name('project.details');
Route::get('/pages/project/edit/{id}', 'ProjectController@edit')->name('project.edit');
Route::post('/pages/project/edit/{id}', 'ProjectController@update')->name('project.update');
Route::get('/pages/project/delete/{id}', 'ProjectController@delete')->name('project.delete');
Route::post('/pages/project/delete/{id}', 'ProjectController@destroy')->name('project.destroy');

Route::get('/pages/project/assignUser', 'ProjectController@assignUser')->name('project.assign');
Route::post('/pages/project/assignUser', 'ProjectController@assignUserStore');

//Route::post('/pages/project/addTask' , 'ProjectController@taskAssign');
//Route::get('/pages/project/addTask', 'ProjectController@addTask')->name('project.addTask');
//Route::get('/pages/project/taskList' , 'ProjectController@taskList')->name('taskList');
//Route::resource('/task', 'TaskController');

Route::get('/pages/task/create' , 'TaskController@create')->name('task.create');
Route::post('/pages/task/create' , 'TaskController@store');
Route::get('/pages/task/list' , 'TaskController@index')->name('task.list');
Route::get('/pages/task/show/{id}' , 'TaskController@show')->name('task.details');
Route::get('/pages/task/edit/{id}' , 'TaskController@edit')->name('task.edit');
Route::post('/pages/task/edit/{id}' , 'TaskController@update');
Route::get('/pages/task/delete/{id}' , 'TaskController@delete')->name('task.delete');
Route::post('/pages/task/delete/{id}' , 'TaskController@destroy')->name('task.destroy');
Route::get('/pages/task/myTask' , 'TaskController@myTask')->name('task.myTask');
Route::post('/projectWiseUsers' , 'TaskController@projectWiseUsers');

Route::get('/pages/task/changeStatus/{id}' , 'TaskController@changeStatus')->name('task.changeStatus');
Route::post('/pages/task/changeStatus' , 'TaskController@changeStatusUpdate');


Route::get('/pages/comment/create' , 'CommentController@create')->name('comment.create');
Route::post('/pages/comment/create' , 'CommentController@store')->name('comment.store');
Route::get('/pages/comment/list' , 'CommentController@index')->name('comment.list');
Route::get('/pages/comment/show/{id}' , 'CommentController@show')->name('comment.show');
Route::get('/pages/comment/edit/{id}' , 'CommentController@edit')->name('comment.edit');
Route::post('/pages/comment/edit/{id}' , 'CommentController@update')->name('comment.update');
Route::get('/pages/comment/delete/{id}' , 'CommentController@delete')->name('comment.delete');
Route::post('/pages/comment/delete/{id}' , 'CommentController@destroy')->name('comment.destroy');

Route::post('/pages/comment' , 'CommentController@comment');

Route::get('/pages/report/projectReport' , 'ReportController@allProject')->name('projectReport');
Route::get('/pages/report/details/{id}' , 'ReportController@details')->name('report.details');
    });
Route::get('/ourTeam' , 'OurTeamController@index')->name('ourTeam');

Route::get('/', function () {
    return redirect()->route('login');
});
