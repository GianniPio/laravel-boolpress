<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('pages.home');
// });

Auth::routes();

Route::get('/', 'GuestController@home') -> name ('home');

Route::get('home/login', 'GuestController@homeLogin') -> name('homeLogin');

Route::get('home/register', 'GuestController@homeRegister') -> name('homeRegister');

Route::get('/posts', 'GuestController@posts') -> name('posts');

Route::get('/logout', 'Auth\LoginController@logout') -> name('logout');
Route::post('/register', 'Auth\RegisterController@register') -> name('register');
Route::post('/login', 'Auth\LoginController@login') -> name('login');
