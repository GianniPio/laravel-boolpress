<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('pages.home');
// });

Auth::routes();

Route::get('/', 'GuestController@home') -> name ('home');

Route::get('/article/{id}', 'HomeController@article') -> name('article');

Route::get('home/login', 'GuestController@homeLogin') -> name('homeLogin');

Route::get('home/register', 'GuestController@homeRegister') -> name('homeRegister');

Route::get('/posts', 'HomeController@posts') -> name('posts');

Route::get('create', 'HomeController@create') ->name('create');
Route::post('article/store', 'HomeController@store') ->name('store');

Route::get('article/edit/{id}', 'HomeController@edit') -> name('edit');
Route::post('article/update/{id}', 'HomeController@update') -> name('update');

Route::get('/article/delete/{id}', 'HomeController@delete') -> name('delete');

Route::get('/logout', 'Auth\LoginController@logout') -> name('logout');
Route::post('/register', 'Auth\RegisterController@register') -> name('register');
Route::post('/login', 'Auth\LoginController@login') -> name('login');
