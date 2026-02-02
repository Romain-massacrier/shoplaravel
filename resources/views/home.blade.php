<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil ShopLaravel</title>
</head>
<body>

<h1>{{ $shop['name'] }}</h1>

<p>Nombre de produits : {{ $shop['products'] }}</p>

@if($shop['open'])
    <p>La boutique est ouverte</p>
@else
    <p>La boutique est fermée</p>
@endif

</body>
</html>
