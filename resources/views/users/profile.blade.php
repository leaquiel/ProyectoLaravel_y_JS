@extends('users.profile_base')
@section('listaBotones')
  <li class="nav-item">
    <a style="border: 2px solid rgb(30, 82, 221)" class="nav-link alert alert-secondary"
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
  <li class="nav-item">
    <a class="nav-link alert alert-secondary"
    href="/profile/changeTheme"
    >Cambiar tema de pagina</a>
  </li>
@endsection
@section('profile_content')
<div class="col-sm-8">

  @if (session('profileUpdated'))
    <div class="alert alert-success">
        {{ session('profileUpdated') }}
    </div>
  @endif

  <h2>ACTIVIDAD</h2>
  <hr>
  <h4>Boliche bailable</h4>
  <h5>Buenos Aires, Dec 7, 2017</h5>
  <div class="fakeimg">Fake Image</div>
  <p>Some text..</p>
  <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
  <br>
  <h3>Rafting</h3>
  <h5>San Rafael, Sep 2, 2017</h5>
  <div class="fakeimg">Fake Image</div>
  <p>Some text..</p>
  <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
</div>
@endsection
