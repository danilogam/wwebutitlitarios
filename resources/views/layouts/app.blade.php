<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="@yield('meta_description', 'Ferramentas online gratuitas como cronômetro, verificador de IP, gerador de CPF, contador de palavras, calculadoras e muito mais. Tudo em um só lugar, rápido e sem precisar instalar nada.')">
    <meta name="keywords" content="@yield('meta_keywords', 'ferramentas online, cronometro online, verificador de ip, gerador de cpf, contador de palavras, ferramentas gratuitas, utilitários online, ferramentas da web')">
    <meta name="robots" content="index, follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <title>@yield('title', 'Ferramentas da Web')</title>
    @vite('resources/css/app.css')

     <!-- Google tag (gtag.js) -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=G-6J6CTVEKNX"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-6J6CTVEKNX');
      </script>

      <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9389073246212889"
     crossorigin="anonymous"></script>
     
</head>
<body>
    <button class="menu-toggle" onclick="document.querySelector('.sidebar').classList.toggle('open')">
      ☰ Menu
    </button>

    <div class="container-fluid p-0">
        <div class="row g-0 min-vh-100">

            <!-- Sidebar -->
            <nav class="col-12 col-md-3 col-lg-2 bg-dark text-white p-3 sidebar">
                <h4 class="mb-4">Ferramentas</h4>

                <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Home</a>
                <a href="{{ url('/conversor-unidades') }}" class="{{ request()->is('conversor-unidades') ? 'active' : '' }}">Conversor de Unidades</a>
                <a href="{{ url('/cronometro') }}" class="{{ request()->is('cronometro') ? 'active' : '' }}">Cronômetro</a>
                <a href="{{ url('/bcrypt-hash') }}" class="{{ request()->is('bcrypt-hash') ? 'active' : '' }}">Gerador Bcrypt</a>
                <a href="{{ url('/gerador-de-cpf') }}" class="{{ request()->is('gerador-de-cpf') || request()->is('gerador-cpf') ? 'active' : '' }}">Gerador de CPF</a>

                {{-- <a href="{{ url('/meu-ip') }}" class="d-block py-2 text-white {{ request()->is('meu-ip') ? 'fw-bold' : '' }}">
                    Meu IP
                </a> --}}
            </nav>

            <!-- Conteúdo -->
            <main class="col p-4 content">
                @yield('content')
            </main>

        </div>
    </div>


    @vite('resources/js/app.js')
</body>
</html>
