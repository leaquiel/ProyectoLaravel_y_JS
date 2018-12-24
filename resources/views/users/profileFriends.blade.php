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
    <a style="border: 2px solid rgb(30, 82, 221)" class="nav-link alert alert-secondary"
    href="/profile/friends"
    >Ver Amigos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link alert alert-secondary"
    href="/profile/userComments"
    >Administrar comentarios</a>
  </li>
  <li class="nav-item">
    <a class="nav-link alert alert-secondary"
    href="/profile/changeTheme"
    >Cambiar tema de pagina</a>
  </li>
@endsection
@section('profile_content')
{{-- <div class="container"> --}}
  <div class="col-sm-8">
    <h2>No Tienes amigos aún!
      <i style="font-size: .8em; margin-left: 25px;" id="searchFriends" class="icon ion-ios-information-circle-outline ">
        <span id="spanInformation" style="border-radius: 10px; display: none; background-color: white; padding: 2px .8em">Area en desarrollo :o</span>
      </i>
    </h2>
    <h4>Buscar amigos</h4>
    <form action="" method="get">
      <div class="input-group mb-3"> <!--FORMULARIO DE BUSQUEDA-->
        <input name="searchFriend" type="text" class="form-control border-secondary border-right-0 rounded-0">

        <div class="input-group-append">


           <button style="background-color: white" disabled class="btn btn-outline-secondary border-left-0 rounded-0 rounded-right" type="submit">
             <i class="icon ion-md-search"></i>
           </button>

        </div>

      </div>
    </form>
    <hr>
      <div class="tenor-gif-embed" data-postid="8703361" data-share-method="host" data-width="100%" data-aspect-ratio="1.4285714285714286"><a href="https://tenor.com/view/sad-pout-gif-8703361">Sad Pout GIF</a> from <a href="https://tenor.com/search/sad-gifs">Sad GIFs</a></div><script type="text/javascript" async src="https://tenor.com/embed.js"></script>

  </div>
{{-- </div> --}}
<script>

window.addEventListener("load", function () {
    let searchFriends = document.querySelector("#searchFriends");
    let spanInformation = document.querySelector("#spanInformation");

    searchFriends.addEventListener("mouseover", function(){
      spanInformation.style.display= "inline";
    })
    searchFriends.addEventListener("mouseout", function(){
      spanInformation.style.display= "none";
    })

});


</script>




@endsection
