@extends('layouts.app')

@section('meta_description', 'Gerador de hash Bcrypt online. Crie hashes seguros rapidamente com custo personalizado. Ferramenta ideal para desenvolvedores que precisam gerar hashes para senhas e sistemas de autenticação.')
@section('meta_keywords', 'bcrypt, gerar hash bcrypt, hash online, gerador de hash, encriptar senha, bcrypt generator, hash seguro, criptografia')

@section('content')
<div class="py-5">

    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center mb-4">Gerador de Hash Bcrypt</h1>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body">

                <form method="POST" action="{{ route('bcrypt.gerar') }}">
                    @csrf

                    <!-- Texto -->
                    <div class="mb-4">
                        <label class="form-label">Texto para gerar hash</label>
                        <input type="text" name="texto" class="form-control"
                              value="{{ old('texto') ?? ($texto ?? '') }}" required>
                    </div>

                    <!-- Custo -->
                    <div class="mb-4">
                        <label class="form-label">Fator de Custo</label>
                        <select name="custo" class="form-control" required>
                            @for ($i = 4; $i <= 19; $i++)
                                <option value="{{ $i }}" 
                                    {{ (string) old('custo', $custo ?? 10) === (string) $i ? 'selected' : '' }}>
                                    {{ $i }}
                                </option>
                            @endfor
                        </select>
                    </div>

                    <!-- Link explicativo -->
                    <div class="mb-3">
                        <a href="https://auth0.com/blog/hashing-in-action-understanding-bcrypt/"
                          target="_blank">
                            Como escolher o fator de custo ideal para o Bcrypt »
                        </a>
                    </div>

                    <hr>

                    <!-- Output -->
                    <div class="mb-3">
                        <label class="form-label">Resultado</label>

                        <div class="input-group">
                            <input type="text" id="hashOutput" class="form-control"
                                  value="{{ session('hash') ?? '' }}" readonly>

                            <button type="button" class="btn btn-secondary" onclick="copiarHash()">
                                COPIAR
                            </button>
                        </div>
                    </div>

                    <!-- Botões -->
                    <div class="mt-4 d-flex justify-content-between">
                        <button class="btn btn-primary px-5">GERAR HASH</button>
                        <a href="{{ route('bcrypt.index') }}" class="btn btn-outline-secondary px-5">
                            LIMPAR
                        </a>
                    </div>

                </form>

            </div>
        </div>
      </div>
      <div class="col-md-3"></div>
    </div>
</div>

<script>
function copiarHash() {
    let copyText = document.getElementById("hashOutput");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    document.execCommand("copy");
}
</script>

@endsection
