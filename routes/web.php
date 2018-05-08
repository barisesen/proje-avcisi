<?php

// Auth
Auth::routes();
Route::post('/register/check/username', 'Auth\RegisterController@checkUsername');
Route::post('/register/check/email', 'Auth\RegisterController@checkEmail');
// Ana Sayfa
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search', 'SearchController@index');

// Proje Ekle/Düzenle/Sil
Route::get('/paylas', 'Project\ProjectController@create')->name('share-project');

// Kategori Single Sayfası
Route::get('/kategori/{slug}', 'CategoryController@show')->name('category');
Route::get('/tag/{slug}', 'TagController@show')->name('tag');
Route::get('/tool/{slug}', 'ToolController@show')->name('tool');

// Profil Sayfası
Route::get('/uye/{username}', 'UserController@show')->name('user');

// Proje Single Sayfası
Route::get('/proje/{id}', 'Project\ProjectController@show')->name('project');
Route::get('/proje/{id}/atesleyenler', 'Project\ProjectController@liked_users')->name('liked_users');

/*
 * Projects routing
 */
Route::resource('/projects', 'Project\ProjectController');
Route::post('/proje/{id}/like/store', 'Project\LikeController@store');
Route::post('/proje/{id}/like/destroy', 'Project\LikeController@destroy');
/*
 * Project comments
 */
Route::post('/projects/{id}/comment', 'Project\CommentController@store');
Route::delete('/comments/{id}', 'Project\CommentController@destroy');


Route::post('/follow/store/', 'Follow\FollowController@store')->name('store_follow');
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


Route::get('/dev', 'DevController@index');