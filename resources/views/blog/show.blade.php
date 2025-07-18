@extends('layouts.layout23')
@section('title', $article->title)

@section('header')
    @include('front.header23')
@endsection 

@section('footer')
    @include('front.footer23')
@endsection

@section('content')
<div class="article-detail-container">
    <article class="article-full">
        <img src="{{ asset('storage/'.$article->image) }}" alt="{{ $article->title }}">
        <h1>{{ $article->title }}</h1>
        <span class="category">{{ $article->category->name }}</span>
        <p>{{ $article->description }}</p>
    </article>

    <aside class="sidebar">
        <h3>Articles récents</h3>
        <ul>
            @foreach($recentArticles as $recent)
                <li><a href="{{ route('blog.show', $recent) }}">{{ $recent->title }}</a></li>
            @endforeach
        </ul>
    </aside>
</div>
@endsection
