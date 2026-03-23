@extends('layouts.app')

@section('meta_description', 'Gerador de CPF válido online grátis. Gere CPFs com ou sem pontuação e escolha o estado de origem. Ferramenta rápida para testes e desenvolvimento.')

@section('meta_keywords', 'gerador de cpf, gerar cpf válido, gerador de cpf online, cpf para teste, gerar cpf com pontuação')

@section('title', 'Gerador de CPF - Web Utilitários')

@section('content')

<div class="py-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center mb-4">Gerador de CPF</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Gerar com pontuação?</label>
                            <div class="d-flex gap-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pontuacao" id="pontSim" value="sim" checked>
                                    <label class="form-check-label" for="pontSim">Sim</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pontuacao" id="pontNao" value="nao">
                                    <label class="form-check-label" for="pontNao">Não</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Estado de Origem</label>
                            <select class="form-select" id="estado">
                                <option value="indiferente">Indiferente</option>
                                <option value="0">RS</option>
                                <option value="1">DF, GO, MS, MT, TO</option>
                                <option value="2">AC, AM, AP, PA, RO, RR</option>
                                <option value="3">CE, MA, PI</option>
                                <option value="4">AL, PB, PE, RN</option>
                                <option value="5">BA, SE</option>
                                <option value="6">MG</option>
                                <option value="7">ES, RJ</option>
                                <option value="8">SP</option>
                                <option value="9">PR, SC</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button class="btn btn-primary btn-lg" id="gerarCpf">
                            GERAR CPF
                        </button>
                    </div>

                    <hr class="my-4">

                    <div class="mb-3">
                        <label class="form-label">CPF Gerado</label>
                        <div class="input-group">
                            <input type="text" id="cpfGerado" class="form-control form-control-lg" readonly>
                            <button class="btn btn-secondary" type="button" id="copiarCpf">
                                COPIAR
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {

    document.getElementById("gerarCpf").addEventListener("click", function () {

        let pontuacao = document.querySelector('input[name="pontuacao"]:checked').value;
        let estado = document.getElementById("estado").value;
        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch('/gerar-cpf', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            },
            body: JSON.stringify({
                pontuacao: pontuacao,
                estado: estado
            })
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById("cpfGerado").value = data.cpf;
        })
        .catch(error => {
            console.error('Erro:', error);
        });

    });

  });

  document.getElementById("copiarCpf").addEventListener("click", function(){

    let cpf = document.getElementById("cpfGerado");

    cpf.select();
    cpf.setSelectionRange(0, 99999);

    navigator.clipboard.writeText(cpf.value);

  });

</script>

@endsection