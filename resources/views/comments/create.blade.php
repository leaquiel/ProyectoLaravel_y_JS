@extends('layout.base')
@section('title')
CustomTrip - Detalle Actividad
@php
  $pageTitle = 'CustomTrip - Detalle Actividad';
@endphp
@endsection
@section('main_content')


  <br><br><br>
  <br>
<div class="container">

  <div class="col-sm-8">
    <h2>{{$activity->name}}</h2>
    <h3>{{$activity->city->name}}, {{$activity->country->name}}</h3>
    <p>{{$activity->detail}}</p>
    @if (count($activity->comments)!=0)
      <h2>Comentarios:</h2>

      <ul>
        @foreach ($activity->comments as $comment)
          <hr>
          <h3>Hecho por: </h3>
          @if ($comment->user->name == Auth::user()->name)
            <h5 style="color: red">Vos</h5>
          @else
            <h5>{{$comment->user->name}}</h5>
          @endif

          <img src="\storage\storage\usersImage\{{ $comment->user->image }}" height="40" width="40" style="border-radius: 50%; ">

          <li><p>{{$comment->text}}</p></li>
        @endforeach
      </ul>
    @endif
  </div>
@if (Auth::check())
  <form id="createCommentForm" method="POST" action="/addComment">
      @csrf

              <input type="hidden" name="activity_id"
              value="{{$activity->id}}">


      <div class="form-group row">
          <label class="col-md-4 col-form-label text-md-right"><h4>Añadir comentario:</h4></label>

          <div class="col-md-8">
              <input type="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="text">

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
                  Crear comentario
              </button>
          </div>
      </div>
  </form>
@endif



</div>
  <br>
  <br>
  <br>
  <script>

  window.addEventListener("load", function () {
  /////////////////////////////////////////////////////////////////////////////////////////////

  var formulario = document.querySelector('#createCommentForm');

  var campos = formulario.elements;

  campos = Array.from(campos);
  campos = campos.filter(campo => campo.classList.contains('form-control'));



  var campoTexto = formulario.text;
  var finalData = {};

  formulario.addEventListener('submit', function (e) {
    if (
      campoTexto.value.trim() === ''
    )
    {
      e.preventDefault();
      campos.forEach(function (campo) {
      var error = campo.parentElement.querySelector('.invalid-feedback');
      var nombreCampo = campo.parentElement.parentElement.querySelector('label').innerText;
      if (campo.value.trim() === '') {
        campo.classList.add('is-invalid');
        error.innerText = 'El campo ' + nombreCampo + ' es obligatorio';
      }
      });
    } else {
      e.submit();
      campos.forEach(function (campo) {
        finalData[campo.name] = campo.value;
        var error = campo.parentElement.querySelector('.invalid-feedback');
        campo.classList.remove('is-invalid');
        campo.value = '';
        error.innerText = '';
      });
    }

  });

  });

  </script>
@endsection
