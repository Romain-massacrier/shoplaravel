<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }


    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'description' => 'nullable|string',
        'stock' => 'nullable|integer|min:0',
        'category_id' => 'required|integer|exists:categories,id',
        'is_active' => 'nullable|boolean',
    ]);

    $validated['is_active'] = $request->boolean('is_active');

    $baseSlug = Str::slug($validated['name']);
    $slug = $baseSlug;
    $suffix = 1;
    while (Product::where('slug', $slug)->exists()) {
        $slug = $baseSlug.'-'.$suffix;
        $suffix++;
    }
    $validated['slug'] = $slug;

    Product::create($validated);

    return redirect()
        ->route('products.index')
        ->with('success', 'Produit créé avec succès.');
}

}


