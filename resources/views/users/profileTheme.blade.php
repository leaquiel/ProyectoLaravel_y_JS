@extends('users.profile_base')
@section('listaBotones')
  <li class="nav-item">
    <a class="nav-link alert alert-secondary"
    href="/profile"
    >Mis actividades</a>
  </li>
  <li class="nav-item">
    <a class="nav-link alert alert-secondary"
    href="/profile/edit"
    >Editar perfil</a>
  </li>
  <li class="nav-item">
    <a class="nav-link alert alert-secondary"
    href="/profile/friends"
    >Ver Amigos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link alert alert-secondary"
    href="/profile/userComments"
    >Administrar comentarios</a>
  </li>
@endsection
@section('profile_content')
{{-- <div class="container"> --}}
  <div class="col-sm-8">
    <h2>Aqui puedes elegir entre estos fondos!</h2>
    <hr><br>
    <img id="fondo" style="width: 200px; margin-right: 5%;" src="/images/fondo.jpg">
    <img id="Golden_Gate" style="width: 200px;" src="/images/Golden_Gate.jpg">
    <img id="Road" style="width: 200px; margin-left: 5%;" src="/images/Road.jpg">

  </div>
{{-- </div> --}}

<script>
  window.addEventListener("load", function () {
    let imgFondo = document.querySelector("#fondo");
    let imgGoldenGate = document.querySelector("#Golden_Gate");
    let imgRoad = document.querySelector("#Road");

    if (localStorage.getItem("bodyImage") == "url('/images/fondo.jpg')"){
      imgFondo.style.border = "solid rgba(6, 244, 144, 0.31) 5px";
    }else if (localStorage.getItem("bodyImage") == "url('/images/Golden_Gate.jpg')") {
      imgGoldenGate.style.border = "solid rgba(6, 244, 144, 0.31) 5px";
    }else {
      imgRoad.style.border = "solid rgba(6, 244, 144, 0.31) 5px";
    }

    imgGoldenGate.addEventListener("click", function() {
      this.style.border = "solid rgba(6, 244, 144, 0.31) 5px";
      imgFondo.style.border = "none";
      imgRoad.style.border = "none";
      document.body.style.backgroundImage = "url('/images/Golden_Gate.jpg')";
      localStorage.setItem("bodyImage", "url('/images/Golden_Gate.jpg')");
      console.log(localStorage.getItem('bodyImage'));
    })

    imgRoad.addEventListener("click", function() {
      this.style.border = "solid rgba(6, 244, 144, 0.31) 5px";
      imgGoldenGate.style.border = "none";
      imgFondo.style.border = "none";
      document.body.style.backgroundImage = "url('/images/Road.jpg')";
      localStorage.setItem("bodyImage", "url('/images/Road.jpg')");
      console.log(localStorage.getItem('bodyImage'));
    })

    imgFondo.addEventListener("click", function() {
      this.style.border = "solid rgba(6, 244, 144, 0.31) 5px";
      imgGoldenGate.style.border = "none";
      imgRoad.style.border = "none";
      document.body.style.backgroundImage = "url('/images/fondo.jpg')";
      localStorage.setItem("bodyImage", "url('/images/fondo.jpg')");
      console.log(localStorage.getItem('bodyImage'));
    })

  })
</script>
@endsection
