@extends('layouts.main')
@section('content')
<body class="d-flex h-100 text-center text-white bg-dark">

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
<header class="mb-auto">
  <div>
    <h3 class="float-md-start mb-0">DEBEDE</h3>
    <nav class="nav nav-masthead justify-content-center float-md-end">
      <a class="nav-link active" aria-current="page" href="#">Home</a>
      {{-- <a class="nav-link" href="#">Features</a> --}}
      <a class="nav-link" href="#">Contacto</a>
    </nav>
  </div>
</header>

<main class="px-3 justify-content-center">
  <h1>Cover your page.</h1>
  <p class="lead">DEBEDE es tu nueva plataform para escuchar musica cuando quieras, donde quieras.</p>
  <p class="lead">Especialmente construida para los alumnos de la USACH, por alumnos de la USACH.</p>
  <p class="lead">
    <a href="#" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Más información</a>
  </p>
</main>

<footer class="mt-auto text-white-50">
  <p>Codigo disponible en <a href="https://github.com/PabloRozas/Laboratorio1_DBD" class="text-white">Github</a>, Hecho por <a href="" class="text-white">Grupo 6</a>.</p>
</footer>
</div>
