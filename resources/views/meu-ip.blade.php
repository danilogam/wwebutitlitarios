@extends('layouts.app')

@section('title', 'Verificar IP - Ferramentas da Web')

@section('content')
    
<div class="card">
  <h1>Seu IP</h1>
  <p class="ip">{{ $ip }}</p>
  <p><small>Tipo: {{ $tipo }}</small></p>
  <p><small>Se o IP estiver incorreto, verifique se o site está atrás de proxy/CDN (Cloudflare, Hostinger).</small></p>
</div>

@endsection
