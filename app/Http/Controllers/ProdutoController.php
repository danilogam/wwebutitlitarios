<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Página do Instituto Saber Consciente
     */
    public function saberConsciente()
    {
        $data = [
            'title' => 'Instituto Saber Consciente Vale a Pena? Review Completo',
            'meta_description' => 'Análise completa do Instituto Saber Consciente. Veja como funciona, benefícios, certificado e se realmente vale a pena.',
            'slug' => 'instituto-saber-consciente',
            'link_afiliado' => 'https://go.hotmart.com/K103798172R'
        ];

        return view('review.saber-consciente', $data);
    }
}