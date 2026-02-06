@extends('layouts.app')

@section('title', 'Produits')

@section('content')

<div class="hero mb-4">
    <h1 class="imperial-title fw-bold mb-2" style="color: var(--gold);">
        Produits disponibles
    </h1>
    <p class="muted mb-0">
        Sélection certifiée par l’Administratum.
    </p>
</div>

@if($products->isNotEmpty())
    <div class="row g-3">

        @foreach($products as $product)
            <div class="col-md-4">
                <div class="card card-imperial p-3 h-100 d-flex flex-column">

                    <!-- Image -->
                    <img
                        src="{{ asset($product->image) }}"
                        alt="{{ $product->name }}"
                        class="img-fluid rounded mb-3 product-thumb"
                    >

                    <!-- Nom -->
                    <h5 class="fw-bold mb-2">
                        {{ $product->name }}
                    </h5>

                    <!-- Prix -->
                    <div class="fw-bold mb-3" style="color: var(--gold);">
                        {{ number_format($product->price, 2, ',', ' ') }} €
                    </div>

                    <!-- Bouton -->
                    <a href="{{ route('products.show', $product->id) }}"
                       class="btn btn-imperial btn-sm mt-auto align-self-start">
                        Détails
                    </a>

                </div>
            </div>
        @endforeach

    </div>
@else
    <div class="card card-imperial p-4">
        <p class="mb-0 muted">Aucun produit disponible.</p>
    </div>
@endif

@endsection
