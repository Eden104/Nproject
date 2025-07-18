<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;

class ShopController extends Controller
{
      public function index()
    {
        return view('shop.index', [
            'products' => Product::with('category')
                               ->orderBy('created_at', 'desc')
                               ->paginate(12),
            'categories' => ProductCategory::all()
        ]);
    }

    public function show(Product $product)
    {
        return view('shop.show', [
            'product' => $product,
            'relatedProducts' => Product::where('product_category_id', $product->product_category_id)
                                      ->where('id', '!=', $product->id)
                                      ->limit(4)
                                      ->get()
        ]);
    }

    public function storeReview(Request $request, Product $product)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'required|string|max:500'
        ]);

         
        $clientId = auth('client')->check() ? auth('client')->id() : null;
        if(!$clientId) {
        return back()->with('error', 'Vous devez être connecté pour poster un avis');
    }


        $product->addReview(
            $clientId, 
            $request->rating,
            $request->comment
        );

        return back()->with('success', 'Votre avis a été ajouté!');
    }
}
