<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Article;
use App\Category;
use App\Tag;



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
        $tags = Tag::all();

        return view('pages.create', compact('categories', 'tags'));
    }
    public function store(Request $request) {

      $data = $request -> validate([
          'title' => 'required|string|max:60',
          'price' => 'required|numeric|min:2|max:150',
          'description' => 'required|string|max:255',
        ]);

      $user = Auth::user();
      $data['author'] = $user -> name;

      $article = Article::make($data);
      $category = Category::findOrFail($request -> get('category'));

      $article -> category() -> associate($category);
      $article -> save();

      $tags = Tag::findOrFail($request -> get('tags'));
      $article -> tags() -> attach($tags);

      $article -> save();
    
      return redirect() -> route('article', $article -> id); 
    }

    public function delete($id) {
        $article = Article::findOrFail($id);
        $article -> tags() -> sync([]);
        $article -> save();

        $article -> delete();

        return redirect() -> route('posts');
    }

    public function edit($id) {
        
        $article = Article::findOrFail($id); 
        $categories = Category::all();
        $tags = Tag::all();

        return view('pages.edit', compact('article', 'categories', 'tags'));
    }
    public function update(Request $request, $id) {

        $data = $request -> validate([
            'title' => 'required|string|max:60',
            'price' => 'required|numeric|min:2|max:150',
            'description' => 'required|string|max:255',
        ]);

        $article = Article::findOrFail($id);

        $article -> update($data);

        $category = Category::findOrFail($request -> get('category'));
        $article -> category() -> associate($category);
        $article -> save();

        $tags = Tag::findOrFail($request -> get('tags'));
        $article -> tags() -> sync($tags);

        $article -> save();

        return redirect() -> route('article', $article -> id);
    }

}
