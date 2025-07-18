@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gestion des Produits</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Nouveau Produit</a>

    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('storage/'.$product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->category->name }}</p>
                    <p class="h4">{{ number_format($product->price, 2) }} €</p>
                    <a href="{{ route('products.show', $product) }}" class="btn btn-primary">Détails</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection