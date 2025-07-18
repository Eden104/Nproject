<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $casts =['reviews' => 'array'];
    protected $fillable = ['name', 'slug', 'description', 'image', 'price', 'sales_count', 'reviews', 'average_rating', 'product_category_id'];
    public function category(){
        return $this->belongsTo(ProductCategory::class,'product_category_id');
    }

    public function addReview($clientId, $rating, $comment){
        // Récupère les avis existants ou initialise un tableau vide
    $reviews = $this->reviews ?? [];
    
    // Crée le nouvel avis
    $newReview = [
        'id' => uniqid(), // Identifiant unique
        'client_id' => $clientId,
        'rating' => $rating,
        'comment' => $comment,
        'created_at' => now()->toDateTimeString(),
        'updated_at' => now()->toDateTimeString()
    ];
    
    // Ajoute le nouvel avis
    $reviews[] = $newReview;
    
    // Calcule la nouvelle moyenne
    $averageRating = collect($reviews)->avg('rating');
    
    // Met à jour le produit
    $this->update([
        'reviews' => $reviews,
        'average_rating' => round($averageRating, 2)
    ]);
    
    return $this;

    }

 
}
