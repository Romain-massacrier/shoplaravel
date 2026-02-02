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
}