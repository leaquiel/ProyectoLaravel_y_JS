@extends('layout.base')
@section('title')
CustomTrip
@php
  $pageTitle = 'CustomTrip';
@endphp
@endsection
@section('main_content')

<div class="container">


  <br><br><br>
  <div id="browserDiv" class="container">

  <h1 class="index-tittle">CustomTrip</h1> <!-- TITULO -->
  <br>
  <p class="sub-tittle">Busca actividades en las ciudades preferidas!</p> <!--TITULO DE BUSCADOR-->


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
  {{-- <ul id="coso">
    <li>Item 1</li>
    <li>Item 2</li>
    <li>Item 3</li>
    <li>Item 4</li>
  </ul> --}}
  </div>


<br><br><br>
<div style="display: none;" id="carousel">

  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <a href="activityDetail/7">

        <img class="d-block w-100" src="/images/trekking.jpg" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
          <h2>Trekking en Bariloche!</h2>
          <p></p>
        </div>
      </a>

    </div>
    <div class="carousel-item">
      <a href="activityDetail/7">

        <img class="d-block w-100" src="/images/paracaidismo.jpg" alt="Second slide">
        <div class="carousel-caption d-none d-md-block">
          <h2>Paracaidismo en Lujan!</h2>
          <p></p>
        </div>

      </a>
    </div>
    <div class="carousel-item">
      <a href="activityDetail/7">

        <img class="d-block w-100" src="/images/bolichito.jpg" alt="Third slide">
        <div class="carousel-caption d-none d-md-block">
          <h2>Boliches en la noche de Buenos Aires</h2>
          <p></p>
        </div>

      </a>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

</div>











<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

</div>


<script>

window.addEventListener("load", function () {
  // let list = Array.from(document.querySelectorAll('#coso li'));
  // let search = document.querySelector('#search');
  //
  // list.forEach(function (ele) {
  //   ele.addEventListener('click', function () {
  //     search.value = this.innerText;
  //     ele.parentElement.style.display = 'none';
  //   })
  // });

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

let carouselActivities = document.querySelector('#carousel');

window.addEventListener("scroll", function(){
  carouselActivities.style.display = "block";
  console.log(carouselActivities);
});





})

</script>
@endsection
