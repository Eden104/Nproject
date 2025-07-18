<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ArticleCategory;

class BlogController extends Controller
{
    public function index()
    {
        return view('blog.index', [
            'articles' => Article::with('category')
                               ->latest()
                               ->paginate(6),
            'categories' => ArticleCategory::all()
        ]);
    }

    public function show(Article $article)
    {
        return view('blog.show', [
            'article' => $article,
            'recentArticles' => Article::where('id', '!=', $article->id)
                                      ->latest()
                                      ->limit(3)
                                      ->get()
        ]);
    }
}
