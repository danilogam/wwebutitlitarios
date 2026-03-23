@extends('layouts.app')

@section('meta_description', 'Conversor de unidades online fácil e rápido. Converta polegadas, centímetros, metros, quilômetros, milhas e diversas outras unidades com precisão imediata.')
@section('meta_keywords', 'conversor de unidades, conversor online, converter medidas, polegadas para centímetros, centímetros para metros, converter milhas, converter km, ferramentas online')



@section('title', 'Conversor de Unidades - Web Utilitários')

@section('content')

<div class="py-5">

    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center mb-4">Conversor de Unidades</h1>
      </div>
    </div>

    <div class="mx-auto shadow p-4 rounded-4" style="max-width: 650px; background: #fff;">
        
        <!-- Valor -->
        <label class="fw-semibold">
            <i class="bi bi-clipboard-check"></i> Valor:
        </label>
        <input type="number" id="value" class="form-control form-control-lg mb-3" placeholder="Digite o valor">

        <div class="row g-3">

            <!-- De -->
            <div class="col-md-6">
                <label class="fw-semibold">
                    <i class="bi bi-arrow-down-circle"></i> De:
                </label>
                <select class="form-select form-select-lg" id="fromUnit">
                    <option value="inches">Polegadas (in)</option>
                    <option value="centimeters">Centímetros (cm)</option>
                    <option value="meters" selected>Metros (m)</option>
                    <option value="kilometers">Quilômetros (km)</option>
                    <option value="millimeters">Milímetros (mm)</option>
                    <option value="feet">Pés (ft)</option>
                    <option value="miles">Milhas (mi)</option>
                    <option value="micrometers">Micrômetros (µm)</option>
                    <option value="nanometers">Nanômetros (nm)</option>
                    <option value="nauticalMiles">Milhas Náuticas (nmi)</option>
                    <option value="yards">Jardas (yd)</option>
                </select>
            </div>

            <!-- Ícone central -->
            <div class="col-md-12 text-center d-md-none">
                <i class="bi bi-arrow-down-up fs-3 text-primary"></i>
            </div>

            <!-- Para -->
            <div class="col-md-6">
                <label class="fw-semibold">
                    <i class="bi bi-arrow-up-circle"></i> Para:
                </label>
                <select class="form-select form-select-lg" id="toUnit">
                    <option value="inches">Polegadas (in)</option>
                    <option value="centimeters">Centímetros (cm)</option>
                    <option value="meters">Metros (m)</option>
                    <option value="kilometers">Quilômetros (km)</option>
                    <option value="millimeters">Milímetros (mm)</option>
                    <option value="feet">Pés (ft)</option>
                    <option value="miles">Milhas (mi)</option>
                    <option value="micrometers">Micrômetros (µm)</option>
                    <option value="nanometers">Nanômetros (nm)</option>
                    <option value="nauticalMiles">Milhas Náuticas (nmi)</option>
                    <option value="yards">Jardas (yd)</option>
                </select>
            </div>

        </div>

        <button class="btn w-100 mt-4 btn-lg" style="background-color:#181313; color:#fff" onclick="convert()">
            <i class="bi bi-lightning-charge"></i> Converter
        </button>


        <!-- Resultado -->
        <div class="mt-4 p-3 rounded-3 bg-light border">
            <label class="fw-semibold">
                <i class="bi bi-calculator"></i> Resultado:
            </label>

            <div class="input-group">
                <input type="text" id="result" class="form-control form-control-lg" readonly>

                <button class="btn" style="background-color:#181313; color:#fff" onclick="copyResult()">
                    <i class="bi bi-clipboard"></i> Copiar
                </button>
            </div>
        </div>

    </div>
</div>


<script>
function convert() {

    let value = document.getElementById("value").value;
    let fromUnit = document.getElementById("fromUnit").value;
    let toUnit = document.getElementById("toUnit").value;

    fetch("/conversor-unidades/converter", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({
            value: value,
            fromUnit: fromUnit,
            toUnit: toUnit
        })
    })
    .then(res => res.json())
    .then(data => {
        document.getElementById("result").value = data.result ?? "Erro";
    });
}

function copyResult() {
    let text = document.getElementById("result");
    text.select();
    text.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(text.value);
}
</script>

@endsection
