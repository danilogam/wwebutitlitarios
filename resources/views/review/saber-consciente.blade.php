@extends('layouts.app')

@section('title', $title)
@section('meta_description', $meta_description)

@section('content')
<div style="max-width: 900px; margin: 0 auto; padding: 40px 20px;">

    <h1 style="font-size: 32px; font-weight: bold; margin-bottom: 20px;">
        Instituto Saber Consciente Vale a Pena? Review Completo 2026
    </h1>

    <p style="font-size: 18px; margin-bottom: 30px;">
        Veja nossa análise detalhada sobre o Instituto Saber Consciente, como funcionam os cursos,
        certificação, benefícios e se realmente compensa investir.
    </p>

    <div style="background:#f0fdf4; padding:25px; border-radius:12px; text-align:center; margin-bottom:40px;">
        <a href="{{ $link_afiliado }}"
           target="_blank"
           rel="nofollow sponsored"
           style="background:#16a34a; color:white; padding:14px 28px; border-radius:8px; font-weight:bold; text-decoration:none;">
           👉 Acessar Site Oficial
        </a>
    </div>

    <h2 style="font-size:24px; font-weight:bold; margin-bottom:15px;">
        O que é o Instituto Saber Consciente?
    </h2>

    <p style="margin-bottom:20px;">
        O Instituto Saber Consciente oferece formações online na área de terapias integrativas,
        psicanálise e psicoterapia, com foco em capacitação profissional.
    </p>

    <h2 style="font-size:24px; font-weight:bold; margin-bottom:15px;">
        Principais Benefícios
    </h2>

    <ul style="margin-bottom:30px; padding-left:20px;">
        <li>Estudo 100% online e flexível</li>
        <li>Material estruturado para formação profissional</li>
        <li>Certificação ao concluir o curso</li>
        <li>Possibilidade de atuar na área</li>
    </ul>

    <h2 style="font-size:24px; font-weight:bold; margin-bottom:15px;">
        Vale a Pena?
    </h2>

    <p style="margin-bottom:30px;">
        Se você busca formação online com flexibilidade e deseja atuar na área terapêutica,
        pode ser uma boa opção. Recomendamos sempre conferir os detalhes atualizados
        no site oficial.
    </p>

    <div style="background:#16a34a; padding:30px; border-radius:12px; text-align:center;">
        <a href="{{ $link_afiliado }}"
           target="_blank"
           rel="nofollow sponsored"
           style="background:white; color:#16a34a; padding:14px 28px; border-radius:8px; font-weight:bold; text-decoration:none;">
           🔎 Ver Detalhes no Site Oficial
        </a>
    </div>

</div>
@endsection