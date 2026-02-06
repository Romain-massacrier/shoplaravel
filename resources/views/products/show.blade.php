@extends('layouts.app')

@section('title', 'Détails')

@section('content')
<div class="card card-imperial p-4">
    <h1 class="imperial-title fw-bold mb-2" style="color: var(--gold);">
        {{ $product->name }}
    </h1>

    <div class="fw-bold fs-4 mb-4" style="color: var(--gold);">
        {{ number_format($product->price, 2, ',', ' ') }} €
    </div>

    <a href="{{ route('products.index') }}" class="btn btn-outline-light">
        Retour
    </a>
</div>
@endsection
