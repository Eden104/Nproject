@extends('layouts.layout23')
@section('title', 'Accueil2')

@section('header')
  <!-- ***************** header ***************** -->
    <header>
        <img src="{{asset('Dsite/image/brand-logo.svg')}}" width="100" alt="myshop logo">
        <nav class="main-nav">
           
           <a href="{{ route('admin.dashboard') }}">Home-D</a>
           <a href="{{ route('admin.products.index') }}">Gestion Produits</a>
           <a href="{{ route('admin.categories.index') }}">Gestion Catégories Produits</a>
           <a href="{{ route('admin.articles.index') }}">Gestion Articles</a>
           <a href="{{ route('admin.article-categories.index') }}">Gestion Catégories Articles</a>

            @auth
            <!-- Bouton de déconnexion (visible seulement quand connecté) -->
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" style="background: none; border: none; color: blue; cursor: pointer; font: inherit;">
                    Déconnexion
                </button>
            </form>
            @endauth

            <svg onclick="darkMode()" viewBox="0 0 512 512" width="25px" id="sun-icon">
                <g id="Sun">
                    <path d="M255.8,120a136,136,0,1,0,136,136.05v0A136.17,136.17,0,0,0,255.8,120Z" style="fill:#1e1e1e"/>
                    <path d="M472,232H440a24,24,0,0,0,0,48h32a24,24,0,0,0,0-48Z" style="fill:#1e1e1e"/>
                    <path d="M255.8,416a24,24,0,0,0-24,24v32a24,24,0,1,0,48,0V440A24,24,0,0,0,255.8,416Z" style="fill:#1e1e1e"/>
                    <path d="M96,256.05a24,24,0,0,0-24-24H40a24,24,0,1,0,0,48H72A24,24,0,0,0,96,256.05Z" style="fill:#1e1e1e"/>
                    <path d="M255.8,96a24,24,0,0,0,24-24V40a24,24,0,0,0-48,0V72a24,24,0,0,0,24,24Z" style="fill:#1e1e1e"/>
                    <path d="M402.89,142.87l22.63-22.63a24,24,0,0,0-33.85-34l-.07.07L369,109a24,24,0,0,0,33.86,34Z" style="fill:#1e1e1e"/>
                    <path d="M402.89,369.22a24,24,0,0,0-34,33.87l.06.05,22.63,22.63a24,24,0,0,0,34-33.86l-.06-.06Z" style="fill:#1e1e1e"/>
                    <path d="M108.7,369.22,86.07,391.85a24,24,0,1,0,33.85,34l.07-.07,22.63-22.63a24,24,0,1,0-33.86-34Z" style="fill:#1e1e1e"/>
                    <path d="M108.7,142.87a24,24,0,1,0,34-33.89l0,0L120,86.32a24,24,0,1,0-34,33.83l.09.09Z" style="fill:#1e1e1e"/>
                </g>
            </svg>
            <svg onclick="lightMode()" viewBox="0 0 312.81 311.51" width="25px" id="moon-icon">
                <path d="M305.2,178.16a11,11,0,0,0-9.2,2A117.36,117.36,0,0,1,260.4,201a111.48,111.48,0,0,1-40.4,7.2A117.45,117.45,0,0,1,102.4,90.56a123.27,123.27,0,0,1,6.4-38.8A107.41,107.41,0,0,1,128,17.36,10.21,10.21,0,0,0,126.4,3a11,11,0,0,0-9.2-2,161.41,161.41,0,0,0-84.8,56.8,158.38,158.38,0,1,0,280,132.8A9.71,9.71,0,0,0,305.2,178.16Z" transform="translate(0 -0.65)" style="fill:#1e1e1e"/>
            </svg>
        </nav>
    </header>
@endsection 

@section('footer')
 @include('front.footer23')
@endsection

@section('content')

<div class="container">
    <h1>Créer un article</h1>

    <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Titre</label>
            <input type="text" name="title" class="form-control" required>
            @error('title') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="5" class="form-control" required></textarea>
            @error('description') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label>Catégorie</label>
            <select name="article_category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('article_category_id') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control" required>
            @error('image') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button class="btn btn-success">Enregistrer</button>
        <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>

@endsection