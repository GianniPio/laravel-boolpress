<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {

            $table-> foreign('category_id', 'article_category')
                -> references('id')
                -> on('categories');

        });

        Schema::table('article_tag', function (Blueprint $table) {
            $table-> foreign('article_id', 'article_tag')
                -> references('id')
                -> on('articles');
            $table-> foreign('tag_id', 'tag_article')
                -> references('id')
                -> on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {

            $table-> dropForeign('article_category');

        });

        Schema::table('article_tag', function (Blueprint $table) {
            $table-> dropForeign('article_tag');

            $table-> dropForeign('tag_article');
        });
    }
}
