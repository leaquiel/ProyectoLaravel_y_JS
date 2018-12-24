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
    <a style="border: 2px solid rgb(30, 82, 221)" class="nav-link alert alert-secondary"
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

  @if (session('deleted'))
    <div class="alert alert-danger">
        {{ session('deleted') }}
    </div>
  @endif

  @if (session('updated'))
    <div class="alert alert-success">
        {{ session('updated') }}
    </div>
  @endif

  @if (count($comments)!=0)
    <h2>Tus comentarios:</h2>
    <hr>
    @foreach ($comments as $comment)
      <h4>{{$comment->activity->country->name}}, {{$comment->activity->city->name}}</h4>
      <h4>{{$comment->activity->name}}</h4>
      <p>{{$comment->text}}</p>

      <a href="/editComment/{{$comment->id}}" class="btn btn-success"><i class="icon ion-md-create"></i></a>

      <form action="{{ route('comment.destroy', $comment->id) }}" method="post" style="display: inline-block;">
    		@csrf
    		{{ method_field('DELETE') }}
    		<button type="submit" class="btn btn-danger"><i class="icon ion-md-trash"></i></button>
    	</form>

      <hr>
    @endforeach
  @else
    <h2>No tienes comentarios!</h2>
  @endif
</div>


@endsection
