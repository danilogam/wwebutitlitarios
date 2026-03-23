@extends('layouts.app')

@section('meta_description', 'Cronômetro online simples e fácil de usar. Marque tempo com precisão para estudos, exercícios e outras tarefas.')
@section('meta_keywords', 'cronometro, cronometro online, contador de tempo, cronometro gratuito')


@section('title', 'Cronômetro - Web Utilitários')

@section('content')

<div class="py-5">
  <div class="row">
    <div class="col-md-12">
      <h1 class="text-center mb-4">Cronômetro Online</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="cronometro-container">
          <div id="display-tempo">00:00:00</div>

          <div class="botoes">
              <button id="btn-iniciar">INICIAR</button>
              <button id="btn-parcial">PARCIAL</button>
              <button id="btn-zerar">ZERAR</button>
          </div>

          <div id="parciais" class="parciais-lista"></div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12" style="text-align: center">

      <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9389073246212889"
        crossorigin="anonymous"></script>
        <ins class="adsbygoogle"
            style="display:block"
            data-ad-format="autorelaxed"
            data-ad-client="ca-pub-9389073246212889"
            data-ad-slot="4922531833"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
  </div>

</div>



    <style>
        .cronometro-container {
            text-align: center;
            margin-top: 100px;
        }

        #display-tempo {
            font-size: 70px;
            font-weight: bold;
            margin-bottom: 30px;
            font-family: 'Clockicons';
        }

        .botoes button {
            font-size: 20px;
            padding: 10px 30px;
            margin: 0 10px;
            cursor: pointer;
            border: none;
            border-radius: 6px;
            color: #fff;
            transition: background 0.3s;
        }

        .botoes #btn-iniciar {
          background-color: #508f58;
        }

        .botoes #btn-parcial {
          background-color: #007bff;
        }

        .botoes #btn-zerar {
          background-color: #c61c16;
        }

        .botoes button:hover {
            background-color: #0056b3;
        }

        #parciais {
            margin-top: 30px;
            text-align: left;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }

        .parcial-linha {
            background: #080505;
            padding: 10px;
            margin-bottom: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-family: monospace;
            display: flex;
            justify-content: space-between;
            color: #fff;
            font-weight: bold;
        }
    </style>

    <script>
        let inicio = null;
        let intervalo = null;
        let rodando = false;
        let tempoDecorrido = 0;
        let contadorParciais = 0;

        const display = document.getElementById('display-tempo');
        const btnIniciar = document.getElementById('btn-iniciar');
        const btnZerar = document.getElementById('btn-zerar');
        const btnParcial = document.getElementById('btn-parcial');
        const containerParciais = document.getElementById('parciais');

        function formatarTempo(ms) {
            const total = Math.floor(ms);
            const mil = Math.floor((total % 1000) / 10);
            const totalSeg = Math.floor(total / 1000);
            const s = totalSeg % 60;
            const m = Math.floor((totalSeg % 3600) / 60);
            const h = Math.floor(totalSeg / 3600);

            const partes = [];
            if (h > 0) partes.push(String(h));
            partes.push(m.toString().padStart(2, '0'));
            partes.push(s.toString().padStart(2, '0'));

            return partes.join(':') + '.' + mil.toString().padStart(2, '0');
        }

        function atualizarDisplay() {
            const agora = performance.now();
            const decorrido = tempoDecorrido + (agora - inicio);
            display.textContent = formatarTempo(decorrido);
        }

        function iniciarOuPausar() {
            if (!rodando) {
                inicio = performance.now();
                intervalo = setInterval(atualizarDisplay, 10);
                rodando = true;
                btnIniciar.textContent = 'PAUSAR';
            } else {
                tempoDecorrido += performance.now() - inicio;
                clearInterval(intervalo);
                rodando = false;
                btnIniciar.textContent = 'INICIAR';
            }
        }

        function zerar() {
            clearInterval(intervalo);
            inicio = null;
            rodando = false;
            tempoDecorrido = 0;
            contadorParciais = 0;
            display.textContent = "00:00.00";
            btnIniciar.textContent = 'INICIAR';
            containerParciais.innerHTML = '';
        }

        function registrarParcial() {
            if (!rodando) return;

            const agora = performance.now();
            const decorrido = tempoDecorrido + (agora - inicio);
            const tempo = formatarTempo(decorrido);
            contadorParciais++;

            const div = document.createElement('div');
            div.className = 'parcial-linha';
            div.innerHTML = `<span>Parcial ${contadorParciais}</span><span>${tempo}</span>`;
            containerParciais.appendChild(div);
        }

        btnIniciar.addEventListener('click', iniciarOuPausar);
        btnZerar.addEventListener('click', zerar);
        btnParcial.addEventListener('click', registrarParcial);
    </script>

@endsection
