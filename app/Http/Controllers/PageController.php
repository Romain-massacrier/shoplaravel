<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
   public function home()
   {
    $shop = [
        'name' => 'Lex Imperialis Store',
        'products' => 42,
        'open' => true,
    ];
    return view('home', ['shop' => $shop]);
   }

   public function contact()
   {
    return "Transmettez votre requête au Scriptorium. Toute demande sera traitée selon le Lex Imperialis.";
   }

   public function about()
   {
    return "La Lex Imperialis Store est une boutique impériale dédiée aux reliques sacrées de l’Humanité.";
   }
}

