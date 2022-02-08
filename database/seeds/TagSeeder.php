<?php

use Illuminate\Database\Seeder;

use App\Tag;
use App\Article;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tag::class, 50) -> create() -> each(function($tag) {

            $articles = Article::inRandomOrder() -> limit(rand(0, 5)) ->get();

            $tag -> articles() -> attach($articles);

            $tag -> save();

        });
    }
}
