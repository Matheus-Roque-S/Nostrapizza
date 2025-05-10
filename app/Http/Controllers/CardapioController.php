<?php

namespace App\Http\Controllers;

use App\Models\Cardapio;
use Illuminate\Http\Request;

class CardapioController extends Controller
{
    public function index()
    {
        $pizzas = Cardapio::where('categoria', 'pizza')->get();
        $borda = Cardapio::where('categoria', 'borda')->get();
        $bebidas = Cardapio::where('categoria', 'bebidas')->get();
        return view('admin.cardapio_admin', compact('pizzas', 'borda', 'bebidas'));
    }

        public function puxarcardapio()
    {
        $pizzas = Cardapio::where('categoria', 'pizza')->get();
        $borda = Cardapio::where('categoria', 'borda')->get();
        $bebidas = Cardapio::where('categoria', 'bebidas')->get();
        return view('cardapio', compact('pizzas', 'borda', 'bebidas'));
    }

    public function create()
    {
        return view('admin.cadastro');
    }

    public function edit($id)
    {
        $item = Cardapio::findOrFail($id);
        return view('admin.editar', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'ingredientes' => 'nullable|string|max:500',
            'categoria' => 'required|in:pizza,borda,bebidas',
            'preco_g' => 'nullable|numeric',
            'preco_m' => 'nullable|numeric',
            'preco_p' => 'nullable|numeric',
        ]);

        $item = Cardapio::findOrFail($id);
        $item->update($request->only([
            'nome',
            'ingredientes',
            'categoria',
            'preco_p',
            'preco_m',
            'preco_g',
        ]));

        return redirect()->route('admin.cardapio')->with('success', 'Item atualizado com sucesso!');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'ingredientes' => 'nullable|string|max:500',
            'categoria' => 'required|in:pizza,borda,bebidas',
            'preco_g' => 'nullable|numeric',
            'preco_m' => 'nullable|numeric',
            'preco_p' => 'nullable|numeric',
        ]);

        Cardapio::create($request->only([
            'nome',
            'ingredientes',
            'categoria',
            'preco_p',
            'preco_m',
            'preco_g',
        ]));

        return redirect()->route('admin.cadastro')->with('success', 'Item cadastrado com sucesso!');
    }


    public function destroy($id)
    {
        $item = Cardapio::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.cardapio')->with('success', 'Item excluído com sucesso!');
    }
}
