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

    public function posts() {

        $articles = Article::all();
        
        return view('pages.posts', compact('articles'));
    }

    public function article($id) {

        $article = Article::findOrFail($id);

        return view('pages.show', compact('article'));
    }

    public function create() {

        return view('pages.create');
    }
    public function store(Request $request) {

      $data = $request -> validate([
          'title' => 'required|string|max:60',
          'dateOfRelease' => 'required|date',
          'price' => 'required|numeric|min:2|max:150',
          'description' => 'required|string|max:255',
      ]); 

      $article = Article::create($data);

    
      return redirect() -> route('article', $article -> id); 
    }

    public function delete($id) {
        $article = Article::findOrFail($id);

        $article -> delete();

        return redirect() -> route('posts');
    }

    public function edit($id) {
        
        $article = Article::findOrFail($id); 

        return view('pages.edit', compact('article'));
    }
    public function update(Request $request, $id) {

        $data = $request -> validate([
            'price' => 'required|numeric|max:150|min:2'
        ]); 

        $article = Article::findOrFail($id);

        $article -> update($data);

        return redirect() -> route('article', $article -> id);
    }

}
