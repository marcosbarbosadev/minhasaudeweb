<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Minha Saúde Web</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

</head>

<body>
@php
$selectedMenu = Request::get('menu') != null ? Request::get('menu') : 'liberar-medicamentos';
@endphp
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Minha Saúde Web</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link {{ $selectedMenu ==  'medicamentos' ? 'active' : '' }}" href="{{ route('medicamento.index', ['menu' => 'medicamentos']) }}">Medicamentos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $selectedMenu ==  'laboratorios' ? 'active' : '' }}" href="{{ route('laboratorio.index', ['menu' => 'laboratorios']) }}">Laboratórios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $selectedMenu ==  'liberar-medicamentos' ? 'active' : '' }}" href="{{ route('liberar-medicamento.index', ['menu' => 'liberar-medicamentos']) }}">Liberar Medicamentos</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            @yield('page-title')
            @yield('content')
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('vendor/jquery/jquery.slim.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
@yield('javascript')

</body>

</html>
