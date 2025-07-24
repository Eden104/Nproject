<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ArticleCategory;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ArticleCategoryController extends Controller
{
    public function index()
    {
        $categories = ArticleCategory::latest()->get();
        return view('admin.articlecategories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.articlecategories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:article_categories,name',
        ]);

        ArticleCategory::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.article-categories.index')->with('success', 'Catégorie créée.');
    }

    public function edit(ArticleCategory $articleCategory)
    {
        return view('admin.articlecategories.edit', ['articlecategory' => $articleCategory]);
    }

    public function update(Request $request, ArticleCategory $articleCategory)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:article_categories,name,' . $articleCategory->id,
        ]);

        $articleCategory->name = $request->name;

        // Régénérer le slug à partir du nouveau nom
        $articleCategory->slug = SlugService::createSlug(ArticleCategory::class, 'slug', $request->name);

        $articleCategory->save();

        return redirect()->route('admin.article-categories.index')->with('success', 'Catégorie mise à jour.');
    }

    public function destroy(ArticleCategory $articleCategory)
    {
        $articleCategory->delete();
        return back()->with('success', 'Catégorie supprimée.');
    }
}
