@extends('layout.base')
@section('title')
Ejemplo
@php
  $pageTitle = 'Ejemplo';
@endphp
@endsection
@section('main_content')

<div class="container">


  <br><br><br>

  <h1 class="index-tittle">CustomTrip</h1> <!-- TITULO -->
  <br>
  <p class="sub-tittle">Busca actividades en las ciudades que quieras mientras te premiamos por hacerlo!</p> <!--TITULO DE BUSCADOR-->


  <form action="" method="get">
    <div class="input-group mb-3"> <!--FORMULARIO DE BUSQUEDA-->

      <input name="search" id="search" type="text" class="form-control border-secondary border-right-0 rounded-0" placeholder="Ej. Buenos Aires">

      <input type="date" name="Desde" class="form-control border-secondary">
      <input type="date" name="Hasta" class="form-control border-secondary">

      <div class="input-group-append">
        <!-- ESTE BOTON REDIRIGE A LA PAG DE DESARROLLO DE BUSQUEDA -->

       <button style="background-color: white" class="btn btn-outline-secondary  rounded-0 rounded-right" type="submit">
         <i style="line-height: 100%;"class="icon ion-md-search"></i>
       </button>
      </div>

    </div>
  </form>

  <div class="">

  </div>

<script>
window.addEventListener("load", function () {
  let inputSearch = document.querySelector("#search");
  console.log(inputSearch);
  let inputform = document.querySelector("form");
  console.log(inputform);

  inputform.addEventListener("submit", function (event) {
    event.preventDefault();
    window.location.assign("{{ route('login') }}")

  })
})
</script>











<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>



</div>
@endsection
