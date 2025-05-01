<?php

namespace App\Http\Controllers;
use App\Models\Cardapio;

class CardapioController extends Controller
{
    public function puxarcardapio()
    {
        $pizzas = Cardapio::where('categoria', 'pizza')->get();
        $borda = Cardapio::where('categoria', 'borda')->get();
        $bebidas = Cardapio::where('categoria', 'bebidas')->get();
        return view('cardapio', compact('pizzas','borda','bebidas'));
    }
}
