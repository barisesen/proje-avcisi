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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
 * Projects routing
 */
Route::resource('/projects', 'Project\ProjectController');

/*
 * Admin Routing init
 */
Route::get('/admin/login', 'Admin\AuthController@loginForm');
Route::post('/admin/login', 'Admin\AuthController@login')->name('admin-login');
Route::get('/admin/register', 'Admin\AuthController@register');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin', 'namespace' => 'Admin'], function () {
    include __DIR__.'/admin.php';
});