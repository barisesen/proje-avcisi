<?php
Route::get('/', 'DashBoardController@index');
Route::get('charts/project', 'ChartsController@project');
Route::get('charts/user', 'ChartsController@user');
Route::get('charts/tool', 'ChartsController@tool');
Route::get('/', 'DashBoardController@index');
Route::resource('/projects', 'ProjectController', ["as"=>"admin"]);
Route::resource('/users', 'UserController', ["as"=>"admin"]);
Route::resource('/tools', 'ToolController', ["as"=>"admin"]);
Route::resource('/categories', 'CategoryController', ["as"=>"admin"]);

