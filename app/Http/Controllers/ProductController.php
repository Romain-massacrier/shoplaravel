<?php

namespace App\Http\Controllers;

class ProductController extends Controller
{
    private array $products = [
        [
        'id' => 1, 
        'name' => 'Bolter Béni',
        'price' => 199.99,
        'image' =>'bolter.jpg'
        ],
        [
        'id' => 2, 
        'name' => 'Armure MK VII',
        'price' => 2499.99,
        'image' =>'armure.jpg'
        ],
        [
        'id' => 3, 
        'name' => 'Encens sacré',
        'price' => 19.99,
        'image' =>'encens.jpg'
        ],
        [
        'id' => 4, 
        'name' => 'Sceau de pureté',
        'price' => 29.99,
        'image' =>'sceau.jpg'
        ],
        [
        'id' => 5, 
        'name' => 'Servo-crâne',
        'price' => 1799.99,
        'image' =>'servo.jpg'
        ],
    ];

    public function index()
    {
        return view('products.index', ['products' => $this->products]);
    }

    public function show($id)
    {
        $product = collect($this->products)->firstWhere('id', (int) $id);
        abort_if(!$product, 404);

        return view('products.show', ['product' => $product]);
    }

    public function list()
    {
        return "Liste des produits disponibles";
    }
}
