@extends('layouts.layout23')
@section('title', 'Boutique')

@section('header')
    @include('front.header23')
@endsection 

@section('footer')
    @include('front.footer23')
@endsection

@section('content')
<div class="shop-container">
    <div class="products-list">
        @foreach($products as $product)
            <div class="product-card">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                <div class="product-content">
                    <span class="category">{{ $product->category->name }}</span>
                    <h2>{{ $product->name }}</h2>
                    <p>{{ Str::limit($product->description, 100) }}</p>
                    <p class="price">{{ number_format($product->price, 2, ',', ' ') }} €</p>
                    <a href="{{ route('shop.show', $product) }}" class="details-link">Voir le produit</a>
                </div>
            </div>
        @endforeach
    </div>

    <aside class="sidebar">
        <div class="categories">
            <h3>Catégories</h3>
            <ul>
                @foreach($categories as $category)
                    <li><a href="#">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </aside>
</div>

{{ $products->links() }}
@endsection
