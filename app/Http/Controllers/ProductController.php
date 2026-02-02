<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        return "Détails du produit avec l'ID: " . $id;
    }

    public function list()
    {
        return "Liste des produits disponibles";
    }

    public function index()
    {
     $products = [
            ['id' => 1, 'name' => 'Bolter Béni', 'price' => 199.99],
            ['id' => 2, 'name' => 'Armure MK VII', 'price' => 2499.99],
            ['id' => 3, 'name' => 'Encens sacré', 'price' => 19.99],
            ['id' => 2, 'name' => 'Sceau de pureté', 'price' => 29.99],
            ['id' => 3, 'name' => 'Servo-crâne', 'price' => 1799.99],
        ];
        return view('products.index', ['products' => $products]);
    }
}