<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{

    public function home() {

        return view('pages.home');
    }

    public function homeLogin() {

        return view('pages.login');
    }

    public function homeRegister() {

        return view('pages.register');
    }

    public function posts() {
         return view('pages.posts');
    }
}
