<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Log;

class ArticleCategory extends Model
{
    use Sluggable;

    // Champs modifiables en masse
    protected $fillable = ['name'];

    /**
     * Configuration du slug automatique
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true,
            ],
        ];
    }

    /**
     * Utiliser le slug dans les routes au lieu de l'ID
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Relation : une catégorie a plusieurs articles
     */
    public function articles()
    {
        return $this->hasMany(Article::class, 'article_category_id');
    }

    /**
     * Hook pour supprimer les articles liés quand on supprime une catégorie
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($category) {
            Log::info('Suppression de la catégorie : ' . $category->name);
            $category->articles()->delete();
        });
    }
}
