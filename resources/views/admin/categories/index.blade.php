@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gestion des Catégories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Nouvelle Catégorie</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Slug</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                <td>
                    <a href="{{ route('categories.show', $category) }}" class="btn btn-sm btn-info">Voir</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection