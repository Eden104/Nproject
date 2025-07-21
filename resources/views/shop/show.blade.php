@extends('layouts.layout23')
@section('title', $product->name)

@section('header')
    @include('front.header23')
@endsection 

@section('footer')
    @include('front.footer23')
@endsection

@section('content')
<div class="product-detail-container">
    <div class="product-main">
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">

        <h1>{{ $product->name }}</h1>
        <p class="category">{{ $product->category->name }}</p>
        <p class="price">{{ number_format($product->price, 2, ',', ' ') }} €</p>
        <p>{{ $product->description }}</p>

        <h3>Avis (Note moyenne : {{ $product->average_rating }}/5)</h3>
        <ul class="reviews-list">
            @forelse($product->reviews ?? [] as $review)
                <li>
                    <strong>Note :</strong> {{ $review['rating'] }}/5 <br>
                    <em>{{ $review['comment'] }}</em> <br>
                    <small>Posté le {{ \Carbon\Carbon::parse($review['created_at'])->format('d/m/Y') }}</small>
                </li>
            @empty
                <li>Aucun avis pour le moment.</li>
            @endforelse
        </ul>

        <h3>Laisser un avis</h3>

        {{-- Affichage message d'erreur/succès --}}
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @auth
        <form action="{{ route('shop.reviews.store', $product) }}" method="POST" class="review-form">
            @csrf
            <div class="form-group">
                <label for="rating">Note (1 à 5)</label>
                <select name="rating" id="rating" class="form-control" required>
                    <option value="">Choisir...</option>
                    @for($i=1; $i<=5; $i++)
                        <option value="{{ $i }}" @selected(old('rating') == $i)>{{ $i }}</option>
                    @endfor
                </select>
                @error('rating')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="comment">Commentaire</label>
                <textarea name="comment" id="comment" rows="3" class="form-control" required>{{ old('comment') }}</textarea>
                @error('comment')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Envoyer mon avis</button>
        </form>
        @else
        <p>Vous devez être connecté pour laisser un avis.</p>
        @endauth
    </div>

    <aside class="sidebar">
        <h3>Produits liés</h3>
        <ul>
            @foreach($relatedProducts as $related)
                <li><a href="{{ route('shop.show', $related) }}">{{ $related->name }}</a></li>
            @endforeach
        </ul>
    </aside>
</div>
@endsection
