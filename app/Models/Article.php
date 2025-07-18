<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable=['title', 'slug', 'image', 'description', 'article_category_id'];
    public function category(){
        return $this->belongsTo(ArticleCategory::class, 'article_category_id');
    }
}
