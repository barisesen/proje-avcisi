<?php

// Auth
Auth::routes();
Route::post('/register/check/username', 'Auth\RegisterController@checkUsername');
Route::post('/register/check/email', 'Auth\RegisterController@checkEmail');
// Ana Sayfa
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

// Proje Ekle/Düzenle/Sil
Route::get('/paylas', 'Project\ProjectController@create')->name('share-project');

// Kategori Single Sayfası
Route::get('/kategori/{slug}', 'CategoryController@show')->name('category');

/*
 * Projects routing
 */
Route::resource('/projects', 'Project\ProjectController');
Route::post('/projects/{id}/like/store', 'Project\LikeController@store');
Route::post('/projects/{id}/like/destroy', 'Project\LikeController@destroy');


Route::post('/follow/store/', 'Follow\FollowController@store');
Route::post('/follow/destroy', 'Follow\FollowController@destroy');


/*
 * Admin Routing init
 */
Route::get('/admin/login', 'Admin\AuthController@loginForm');
Route::post('/admin/login', 'Admin\AuthController@login')->name('admin-login');
Route::get('/admin/register', 'Admin\AuthController@register');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin', 'namespace' => 'Admin'], function () {
    include __DIR__.'/admin.php';
});
