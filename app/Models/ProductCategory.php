<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ProductCategory extends Model
{
    use sluggable;
    protected $fillable=['name'];
    //configuration du slug automatique 
    public function sluggable():array{
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true,
            ]
         ];
    }

    //Pour trouver l'article par son slug au lieu de son ID dans leds routes
    public function getRouteKeyName(){
        return 'slug';
    }
    public function products(){
        return $this->hasMany(Product::class);
    }
}
