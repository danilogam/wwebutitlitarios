@extends('layouts.app')

@section('meta_description', 'Gerador de CPF válido online grátis. Gere CPFs com ou sem pontuação e escolha o estado de origem. Ferramenta rápida para testes e desenvolvimento.')

@section('meta_keywords', 'gerador de cpf, gerar cpf válido, gerador de cpf online, cpf para teste, gerar cpf com pontuação')

@section('title', 'Gerador de CPF - Web Utilitários')

@section('content')

<div class="container mt-4">

  <div class="row">
    <div class="col-md-12" style="text-align: center">

      <div class="card">
        <div class="card-body">

          <h3 class="mb-4">Gerador de CPF</h3>

          <div class="row">

            <div class="col-md-6">

              <label>Gerar com pontuação?</label>

              <div>
                <input type="radio" name="pontuacao" value="sim" checked> Sim
                <input type="radio" name="pontuacao" value="nao"> Não
              </div>

            </div>

            <div class="col-md-6">

              <label>Estado de Origem</label>

              <select class="form-control" id="estado">

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

          <button class="btn btn-primary mt-3" id="gerarCpf">
            Gerar CPF
          </button>

          <div class="mt-4">

            <label>CPF Gerado</label>

            <div class="input-group">

              <input type="text" id="cpfGerado" class="form-control" readonly>

              <button class="btn btn-outline-secondary" type="button" id="copiarCpf" title="Copiar">
                <i class="bi bi-clipboard"></i>
              </button>

            </div>

          </div>

        </div>
      </div>

    </div>

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