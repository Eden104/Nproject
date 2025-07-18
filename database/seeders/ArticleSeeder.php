<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ArticleCategory;
use App\Models\Article;

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Crée des catégories
        $newsCat = ArticleCategory::create([
            'name' => 'Actualités',
            'slug' => 'actualites',
        ]);
        $tipsCat = ArticleCategory::create([
            'name' => 'Conseils',
            'slug' => 'conseils',
        ]);

        // Crée des articles avec image (chemin relatif dans public/)
        Article::create([
            'title' => 'Bienvenue sur notre blog',
            'slug' => 'bienvenue-sur-notre-blog',
            'image' => 'public/images/articles/blogwelcome.png',  // mets cette image dans public/images/articles/
            'description' => 'Voici le premier article de notre blog...',
            'article_category_id' => $newsCat->id,
        ]);

        Article::create([
            'title' => '5 conseils pour réussir votre projet',
            'slug' => '5-conseils-pour-reussir',
            'image' => 'public/images/articles/conseils_projet.png',
            'description' => 'Dans cet article, nous partageons 5 conseils essentiels...',
            'article_category_id' => $tipsCat->id,
        ]);
    }
}
