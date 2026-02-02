@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
<div class="hero mb-4">
    <h1 class="imperial-title fw-bold mb-2" style="color: var(--gold);">Bienvenue, citoyen de l’Imperium.</h1>
    <p class="muted mb-0">Derniers articles approuvés par l’Administratum.</p>
</div>

@if(isset($articles) && $articles->count())
    <div class="row g-3">
        @foreach($articles as $article)
            <div class="col-md-4">
                <div class="card card-imperial p-3 h-100">
                    <h5 class="fw-bold mb-1">{{ $article->title }}</h5>

                    @if(!empty($article->excerpt))
                        <p class="muted tiny mb-3">{{ $article->excerpt }}</p>
                    @else
                        <p class="muted tiny mb-3">{{ \Illuminate\Support\Str::limit($article->content ?? '', 120) }}</p>
                    @endif

                    <a class="btn btn-imperial btn-sm mt-auto align-self-start"
                       href="{{ url('/articles/'.$article->id) }}">
                        Lire
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="card card-imperial p-4">
        <p class="mb-0 muted">Aucun article pour le moment.</p>
    </div>
@endif
@endsection
