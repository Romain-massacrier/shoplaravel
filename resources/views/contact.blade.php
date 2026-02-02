@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<div class="card card-imperial p-4">
    <h1 class="imperial-title fw-bold mb-3" style="color: var(--gold);">Contact</h1>
    <p class="muted">Une question ? Écrivez au bureau de l’Administratum.</p>

    <a href="mailto:contact@lex-imperialis.test" class="btn btn-imperial">
        Envoyer un mail
    </a>
</div>
@endsection
