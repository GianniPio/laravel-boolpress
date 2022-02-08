<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Category;

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
}
