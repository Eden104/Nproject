@extends('layouts.lay23accueil')

@section('content')
<div class="container text-center py-5">
    <div class="alert alert-success" role="alert">
        <h1 class="alert-heading">Commande confirmée !</h1>
        <p>Merci pour votre achat. Votre commande a bien été enregistrée.</p>
        <hr>
        <p class="mb-0">Nous vous contacterons bientôt pour la livraison.</p>
    </div>
    
    <a href="{{ route('shop.index') }}" class="btn btn-primary mt-3">Retour à la boutique</a>
</div>
@endsection