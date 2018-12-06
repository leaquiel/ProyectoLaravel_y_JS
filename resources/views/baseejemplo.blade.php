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
  <div id="browserDiv" class="container">

  <h1 class="index-tittle">CustomTrip</h1> <!-- TITULO -->
  <br>
  <p class="sub-tittle">Busca actividades en las ciudades que quieras mientras te premiamos por hacerlo!</p> <!--TITULO DE BUSCADOR-->


  <form action="/busqueda" method="get">
    <div class="input-group mb-3"> <!--FORMULARIO DE BUSQUEDA-->

      <input name="search" id="search" type="text" class="form-control border-secondary border-right-0 rounded-0" placeholder="Ej. Buenos Aires">

      {{-- <input type="date" name="Desde" class="form-control border-secondary">
      <input type="date" name="Hasta" class="form-control border-secondary"> --}}

      <div class="input-group-append">
        <!-- ESTE BOTON REDIRIGE A LA PAG DE DESARROLLO DE BUSQUEDA -->

       <button style="background-color: white" class="btn btn-outline-secondary border-left-0 rounded-0 rounded-right" type="submit">
         <i class="icon ion-md-search"></i>
       </button>
      </div>

    </div>
  </form>
  <ul id="coso">
    <li>Item 1</li>
    <li>Item 2</li>
    <li>Item 3</li>
    <li>Item 4</li>
  </ul>
  </div>

  {{-- <div style="display: none;" id="searchDiv" class="container"> --}}
    {{-- @if ()
      <h1>Hemos encontrado las siguientes actividades para vos!</h1>
      <ul>
        @foreach ()
          <li></li>
        @endforeach
      </ul>
    @else
      <h1>No hemos encontrado ninguna actividad</h1>

    @endif --}}
  {{-- </div> --}}



<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

</div>


<script>

window.addEventListener("load", function () {
  let list = Array.from(document.querySelectorAll('#coso li'));
  let search = document.querySelector('#search');

  list.forEach(function (ele) {
    ele.addEventListener('click', function () {
      search.value = this.innerText;
      ele.parentElement.style.display = 'none';
    })
  })

//   let browserDiv = document.querySelector("#browserDiv");
//   let searchDiv = document.querySelector("#searchDiv");
//   console.log(inputSearch);
//   let inputform = document.querySelector("form");
//   console.log(inputform);
//
//   browserDiv.addEventListener("submit", function (event) {
//     // event.preventDefault();
//     browserDiv.style.display= 'none';
//     searchDiv.style.display= 'block';
//
//   })
})

</script>
@endsection
