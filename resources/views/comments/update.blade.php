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
    href="/profile/changeTheme"
    >Cambiar tema de pagina</a>
  </li>
@endsection
@section('profile_content')
<div class="col-sm-8">

  <form id="updatedCommentForm" method="POST" action="/editComment/{{$comment->id}}">
      @csrf
      {{ method_field('PUT') }}


      <h3>Comentario actual: </h3> <span>{{$comment->text}}</span>
      <hr>
      <div class="form-group row">


          <label class="col-md-4 col-form-label text-md-right"><h4>Editar comentario:</h4></label>

          <div class="col-md-8">
              <input type="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="text" value="{{$comment->text}}">

              <span class="invalid-feedback" role="alert">
              @if ($errors->has('text'))
                  <strong>{{ $errors->first('text') }}</strong>
              @endif
              </span>
          </div>
      </div>

      <div class="form-group row mb-0">
          <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary">
                  Editar
              </button>
          </div>
      </div>
  </form>

</div>


@endsection
