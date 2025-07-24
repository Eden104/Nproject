<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ProductCategory::latest()->get();
        return view('admin.productcategories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          return view('admin.productcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required|string|max:100|unique:product_categories,name',
        ]);

        ProductCategory::create([
            'name' => $request->name,
            
        ]);

        return redirect()->route('productcategories.index')->with('success', 'Catégorie créée.');
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
    public function edit(ProductCategory $productcategory)
    {
         return view('admin.productcategories.edit', compact('productcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductCategory $productcategory)
    {
         $request->validate([
            'name' => 'required|string|max:100|unique:product_categories,name,' . $productcategory->id,
        ]);

        $productcategory->update([
            'name' => $request->name,
            
        ]);

        return redirect()->route('productcategories.index')->with('success', 'Catégorie mise à jour.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $productcategory)
    {
         $productcategory->delete();
        return back()->with('success', 'Catégorie supprimée.');
    }
}
