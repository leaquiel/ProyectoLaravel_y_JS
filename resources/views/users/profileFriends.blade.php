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
    href="/profile/userComments"
    >Administrar comentarios</a>
  </li>
  <li class="nav-item">
    <a class="nav-link alert alert-secondary"
    {{-- href="{{route('profile.changeTheme')}}" --}}
    >Cambiar tema de pagina</a>
  </li>
@endsection
@section('profile_content')
{{-- <div class="container"> --}}
  <div class="col-sm-8">
    <h2>No Tienes amigos aún!</h2>
    <hr>
      <div class="tenor-gif-embed" data-postid="8703361" data-share-method="host" data-width="100%" data-aspect-ratio="1.4285714285714286"><a href="https://tenor.com/view/sad-pout-gif-8703361">Sad Pout GIF</a> from <a href="https://tenor.com/search/sad-gifs">Sad GIFs</a></div><script type="text/javascript" async src="https://tenor.com/embed.js"></script>

  </div>
{{-- </div> --}}
@endsection
