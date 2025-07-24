<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Article extends Model
{
    use Sluggable;
    protected $fillable=['title', 'image', 'description', 'article_category_id'];
    public function category(){
        return $this->belongsTo(ArticleCategory::class, 'article_category_id');
    }

    //configuration du slug automatique 
    public function sluggable():array{
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true,
            ]
         ];
    }

    //Pour trouver l'article par son slug au lieu de son ID dans leds routes
    public function getRouteKeyName(){
        return 'slug';
    }
}


