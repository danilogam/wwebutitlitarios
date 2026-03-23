@extends('layouts.app')

@section('title', 'Página Inicial - Web Utilitários')

@section('content')
    <h1>Bem-vindo ao Web Utilitários</h1>
    <p>Abaixo esta as ferramentas mais acessadas.</p>

    <div class="row g-3"> <!-- g-3 adiciona espaçamento entre colunas e linhas -->

        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">Conversor de Unidades</h5>
                    <p class="card-text">Aqui você pode converter várias unidades de medida.</p>
                    <a href="{{ url('/conversor-unidades') }}" class="btn btn-primary">Acessar</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">Cronômetro</h5>
                    <p class="card-text">Além de cronometrar o tempo você pode criar parciais para comparações.</p>
                    <a href="{{ url('/cronometro') }}" class="btn btn-primary">Acessar</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">Gerador Bcrypt</h5>
                    <p class="card-text">
                        Gere hashes Bcrypt com fator de custo ajustável de forma simples e rápida.
                    </p>
                    <a href="{{ url('/bcrypt-hash') }}" class="btn btn-primary">Acessar</a>
                </div>
            </div>
        </div>


    </div>

@endsection
