<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\Product;
use Illuminate\Support\Str;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('generate:product-images {--width=800} {--height=800} {--bg=#0F172A} {--output=public/images/products} {--format=svg} {--update=false}', function () {
    $width = (int) $this->option('width');
    $height = (int) $this->option('height');
    $bg = (string) $this->option('bg');
    $format = strtolower((string) $this->option('format'));
    $update = filter_var($this->option('update'), FILTER_VALIDATE_BOOLEAN);

    if ($format !== 'svg') {
        $this->error('Format non pris en charge: '.$format.'. Utilisez --format=svg');
        return 1;
    }

    $outputOpt = (string) $this->option('output');
    $outputRel = ltrim($outputOpt, '/');
    $outputAbs = base_path($outputRel);

    if (!is_dir($outputAbs)) {
        if (!mkdir($outputAbs, 0775, true) && !is_dir($outputAbs)) {
            $this->error('Impossible de créer le dossier de sortie: '.$outputAbs);
            return 1;
        }
    }

    $products = Product::select(['id','name','slug','image'])->get();
    if ($products->isEmpty()) {
        $this->warn('Aucun produit trouvé.');
        return 0;
    }

    $count = 0;
    foreach ($products as $product) {
        $slug = $product->slug ?: Str::slug($product->name);
        $fileName = $slug.'.svg';
        $filePath = $outputAbs.DIRECTORY_SEPARATOR.$fileName;

        $safeName = htmlspecialchars($product->name, ENT_QUOTES | ENT_XML1, 'UTF-8');

        $svg = <<<SVG
<?xml version="1.0" encoding="UTF-8"?>
<svg xmlns="http://www.w3.org/2000/svg" width="$width" height="$height" viewBox="0 0 $width $height">
  <defs>
    <style>
      .title { fill: #FFFFFF; font-family: system-ui, -apple-system, Segoe UI, Roboto, Ubuntu, Cantarell, Noto Sans, sans-serif; font-weight: 700; }
    </style>
  </defs>
  <rect x="0" y="0" width="$width" height="$height" fill="$bg" />
  <g>
    <text class="title" x="50%" y="50%" font-size="40" text-anchor="middle" dominant-baseline="middle">$safeName</text>
  </g>
</svg>
SVG;

        if (file_put_contents($filePath, $svg) === false) {
            $this->error('Échec d\'écriture du fichier: '.$filePath);
            continue;
        }

        $count++;

        if ($update) {
            // Stocke un chemin relatif public (sans "public"), pour utilisation via asset()
            $publicRel = '/images/products/'.$fileName;
            // Mise à jour directe via le query builder pour éviter les fillable
            Product::where('id', $product->id)->update(['image' => $publicRel]);
        }
    }

    $this->info("Images générées: $count dans $outputAbs");
    if ($update) {
        $this->info('Champs image des produits mis à jour.');
    }

    return 0;
})->purpose('Génère des images SVG uniformes pour chaque produit');
