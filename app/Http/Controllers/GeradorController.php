<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GeradorController extends Controller
{
    public function index()
    {
        return view('bcrypt-hash');
    }

    public function gerar(Request $request)
    {
        $request->validate([
            'texto' => 'required|string',
            'custo' => 'required|integer|min:4|max:31',
        ]);

        $hash = password_hash($request->texto, PASSWORD_BCRYPT, [
            'cost' => $request->custo
        ]);

        return back()->with([
            'hash' => $hash,
            'texto' => $request->texto,
            'custo' => $request->custo
        ])->withInput();
    }
}
