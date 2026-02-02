<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Produits</title>
</head>
<body>

<h1>Liste des produits</h1>

<ul>
@forelse($products as $product)
    <li>
        {{ $loop->iteration }}.
        {{ $product['name'] }} – {{ $product['price'] }} Aquilas
    </li>
@empty
    <li>Aucun produit disponible.</li>
@endforelse
</ul>

</body>
</html>
