@extends('layouts.layout23')
@section('title', 'Blog')

@section('header')
    @include('front.header23')
@endsection 

@section('footer')
    @include('front.footer23')
@endsection

@section('content')
<div class="blog-container">
    <div class="articles-list">
        @foreach($articles as $article)
            <article class="article-card">
                <img src="{{ asset('storage/'.$article->image) }}" alt="{{ $article->title }}">
                <div class="article-content">
                    <span class="category">{{ $article->category->name }}</span>
                    <h2>{{ $article->title }}</h2>
                    <p>{{ Str::limit($article->description, 150) }}</p>
                    <a href="{{ route('blog.show', $article) }}" class="read-more">Lire la suite</a>
                </div>
            </article>
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

{{ $articles->links() }}
@endsection
