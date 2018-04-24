<?php

// Auth
Auth::routes();

// Ana Sayfa
Route::get('/', 'HomeController@index')->name('home');

// Proje Ekle/Düzenle/Sil
Route::get('/paylas', 'ProjectController@create')->name('share-project');
