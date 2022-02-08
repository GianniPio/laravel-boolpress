<?php

namespace App\Http\Controllers;

use App\Article;

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

}
