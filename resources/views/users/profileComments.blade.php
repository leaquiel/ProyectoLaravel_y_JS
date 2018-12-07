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
    {{-- href="{{route('profile.changeTheme')}}" --}}
    >Cambiar tema de pagina</a>
  </li>
@endsection
@section('profile_content')
<div class="col-sm-8">

  @if (count($comments)!=0)
    <h2>Tus comentarios:</h2>
    <hr>
    @foreach ($comments as $comment)
      <h4>{{$comment->activity->country->name}}, {{$comment->activity->city->name}}</h4>
      <h4>{{$comment->activity->name}}</h4>
      <p>{{$comment->text}}</p>
    @endforeach
  @else
    <h2>No tienes comentarios!</h2>
  @endif
</div>
@endsection
