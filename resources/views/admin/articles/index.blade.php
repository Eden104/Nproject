@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter une déclinaison pour {{ $product->name }}</h1>
    
    <form action="{{ route('articles.store') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">

        <div class="form-group">
            <label>Taille</label>
            <input type="text" name="size" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Couleur</label>
            <input type="text" name="color" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Stock</label>
            <input type="number" name="stock" class="form-control" min="0" required>
        </div>

        <div class="form-group">
            <label>SKU (Référence unique)</label>
            <input type="text" name="sku" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button>
    </form>
</div>
@endsection