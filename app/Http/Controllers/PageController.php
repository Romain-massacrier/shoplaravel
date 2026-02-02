<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
   public function home()
   {
    $url = route('products.show', ['id' => 5]);
    return "Lex Imperialis Store, reliques autorisées par le Code. Pour l’Empereur." . $url ;
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

