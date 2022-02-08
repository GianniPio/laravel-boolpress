<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Category;

use App\Tag;

class Article extends Model
{
    protected $fillable = [

        'title',
        'price',
        'description',
        'category_id',
    ];

    public function category() {

        return $this -> belongsTo(Category::class);
    }

    public function tags() {

        return $this -> belongsToMany(Tag::class);
    }
}
