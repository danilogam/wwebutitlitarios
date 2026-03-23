<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CpfController extends Controller
{

    public function index()
    {
        return view('gerador-cpf');
    }

    public function gerar(Request $request)
    {
        $pontuacao = $request->pontuacao;
        $estado = $request->estado;

        $n = [];

        for ($i = 0; $i < 9; $i++) {
            $n[$i] = rand(0,9);
        }

        if($estado !== 'indiferente'){
            $n[8] = $estado;
        }

        $d1 = 0;
        for ($i = 0; $i < 9; $i++) {
            $d1 += $n[$i] * (10 - $i);
        }

        $d1 = 11 - ($d1 % 11);
        if ($d1 >= 10) $d1 = 0;

        $d2 = 0;
        for ($i = 0; $i < 9; $i++) {
            $d2 += $n[$i] * (11 - $i);
        }

        $d2 += $d1 * 2;
        $d2 = 11 - ($d2 % 11);
        if ($d2 >= 10) $d2 = 0;

        $cpf = implode('', $n) . $d1 . $d2;

        if($pontuacao == 'sim'){
            $cpf = substr($cpf,0,3).'.'.substr($cpf,3,3).'.'.substr($cpf,6,3).'-'.substr($cpf,9,2);
        }

        return response()->json([
            'cpf' => $cpf
        ]);
    }

}