<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Article;

class Category extends Model
{
    protected $fillable = [

        'name',
        'desciption',
    ];

    public function articles() {

        return $this -> hasMany(Article::class);
    }
}
