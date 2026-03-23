<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IpController;
use App\Http\Controllers\ConversorsController;
use App\Http\Controllers\GeradorController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CpfController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cronometro', function () {
    return view('cronometro');
});

Route::get('/sobre-nos', function () {
    return view('sobre');
});


Route::get('/meu-ip', [IpController::class, 'show'])->name('meu-ip');

Route::get('/conversor-unidades', [App\Http\Controllers\ConversorsController::class, 'index']);
Route::post('/conversor-unidades/converter', [App\Http\Controllers\ConversorsController::class, 'converter']);

Route::get('/bcrypt-hash', [GeradorController::class, 'index'])->name('bcrypt.index');
Route::post('/bcrypt-hash', [GeradorController::class, 'gerar'])->name('bcrypt.gerar');

Route::get('/gerador-de-cpf', [CpfController::class, 'index'])->name('cpf.index');
Route::post('/gerar-cpf', [CpfController::class, 'gerar'])->name('cpf.index');

// PRODUTOS
Route::get('/instituto-saber-consciente', [ProdutoController::class, 'saberConsciente'])
    ->name('review.saber.consciente');


