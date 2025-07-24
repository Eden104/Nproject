<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use App\Models\ArticleCategory;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with('category')->latest()->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          $categories = ArticleCategory::all();
        return view('admin.articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'article_category_id' => 'required|exists:article_categories,id',
            'image' => 'required|image|max:2048',
        ]);

        $imagePath = $request->file('image')->store('articles', 'public');

        Article::create([
            'title' => $request->title,
            
            'description' => $request->description,
            'article_category_id' => $request->article_category_id,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.articles.index')->with('success', 'Article créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article  $article)
    {
         $categories = ArticleCategory::all();
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
       $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'article_category_id' => 'required|exists:article_categories,id',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['title', 'description', 'article_category_id']);
        

        if ($request->hasFile('image')) {
            // supprimer l'ancienne image si elle existe
            if ($article->image && Storage::disk('public')->exists($article->image)) {
                Storage::disk('public')->delete($article->image);
            }

            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        $article->update($data);

        return redirect()->route('admin.articles.index')->with('success', 'Article mis à jour avec succès.'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        
        if ($article->image && Storage::disk('public')->exists($article->image)) {
            Storage::disk('public')->delete($article->image);
        }

        $article->delete();

        return back()->with('success', 'Article supprimé.');
    }
}
