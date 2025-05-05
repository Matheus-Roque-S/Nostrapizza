<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    public function showLoginForm()
    {
        return view('admin.login'); // Aponta para resources/views/admin/login.blade.php
    }

    public function adminEntryPoint()
    {
        if (Auth::check()) {
            return redirect('/admin/painel');
        }

        return view('admin.login');
    }

    public function login(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required|string',
            'senha' => 'required|string',
        ]);

        $user = \App\Models\Usuario::where('nome', $request->nome)->first();

        if ($user && Hash::check($request->senha, $user->senha)) {
            Auth::login($user);
            $request->session()->regenerate();

            return redirect('/admin'); 
        }

        return back()->withErrors([
            'nome' => 'Usuário ou senha incorreta.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/');
    }
}