<?php

use Illuminate\Database\Seeder;

use App\Article;
use App\Category;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Article::class, 50) ->make() -> each(function($article) {


            $category = Category::inRandomOrder() -> limit(1) -> first();

            $article -> Category() ->associate($category);

            $article -> save();

        });
    }
}
