<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

use App\Category;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function posts() {

        $articles = Article::orderBy('created_at', 'desc') -> get();
        
        
        return view('pages.posts', compact('articles'));
    }

    public function article($id) {

        $article = Article::findOrFail($id);

        return view('pages.show', compact('article'));
    }

    public function create() {

        $categories = Category::all();

        return view('pages.create', compact('categories'));
    }
    public function store(Request $request) {

      $data = $request -> validate([
          'title' => 'required|string|max:60',
          'price' => 'required|numeric|min:2|max:150',
          'description' => 'required|string|max:255',
        //   'category_id' => 'required|integer',
        ]); 

      $article = Article::make($data);
      $category = Category::findOrFail($request -> get('category'));

      $article -> category() -> associate($category);
      $article -> save();
    
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
