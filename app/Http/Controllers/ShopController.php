<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;

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
    // Récupère des produits liés (dans la même catégorie)
    $relatedProducts = Product::where('product_category_id', $product->product_category_id)
                             ->where('id', '!=', $product->id)
                             ->limit(4)
                             ->get();

    return view('shop.show', [
        'product' => $product,
        'relatedProducts' => $relatedProducts,
    ]);
}


    public function storeReview(Request $request, Product $product)
    {
        // Vérifie si l'utilisateur est connecté
        if (!Auth::check()) {
            return back()->with('error', 'Vous devez être connecté pour poster un avis.');
        }

        // Validation des données
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'required|string|max:500'
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();
        $userId = $user->id;

        // Récupère les anciens avis
        $reviews = $product->reviews ?? [];

        // Vérifie si l'utilisateur a déjà posté un avis pour ce produit
        foreach ($reviews as $existingReview) {
            if ($existingReview['user_id'] == $userId) {
                return back()->with('error', 'Vous avez déjà laissé un avis pour ce produit.');
            }
        }

        // Ajoute le nouvel avis
        $reviews[] = [
            'user_id' => $userId,
            'name' => $user->name,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'created_at' => now()->toDateTimeString(),
        ];

        // Calcule la moyenne des notes
        $average = collect($reviews)->avg('rating');

        // Mise à jour du produit
        $product->reviews = $reviews;
        $product->average_rating = round($average, 2);
        $product->save();

        return back()->with('success', 'Merci pour votre avis !');
    }
}
