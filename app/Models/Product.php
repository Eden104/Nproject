<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use sluggable;
    protected $casts =['reviews' => 'array'];
    protected $fillable = ['name', 'description', 'image', 'price', 'sales_count', 'reviews', 'average_rating', 'product_category_id'];
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
    public function category(){
        return $this->belongsTo(ProductCategory::class,'product_category_id');
    }

    public function addReview($userId, $rating, $comment)
{
    // Récupère les avis existants ou initialise un tableau vide
    $reviews = $this->reviews ?? [];

    // Vérifie que l'utilisateur n'a pas déjà laissé un avis
    foreach ($reviews as $review) {
        if ($review['user_id'] === $userId) {
            throw new \Exception('Vous avez déjà laissé un avis pour ce produit.');
        }
    }

    // Crée le nouvel avis
    $newReview = [
        'id' => uniqid(),
        'user_id' => $userId,
        'rating' => $rating,
        'comment' => $comment,
        'created_at' => now()->toDateTimeString(),
        'updated_at' => now()->toDateTimeString(),
    ];

    // Ajoute le nouvel avis
    $reviews[] = $newReview;

    // Calcule la nouvelle moyenne
    $averageRating = collect($reviews)->avg('rating');

    // Met à jour le produit
    $this->update([
        'reviews' => $reviews,
        'average_rating' => round($averageRating, 2),
    ]);

    return $this;
}
 
}
