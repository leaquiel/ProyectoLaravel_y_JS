@extends('layout.base')
@section('title')
Ejemplo
@php
  $pageTitle = 'Ejemplo';
@endphp
@endsection
@section('main_content')


  <br><br><br>
  <br>
<div class="container">

  <div class="col-sm-8">
    <h2>{{$activity->name}}</h2>
    <h2>{{$activity->city->name}}, {{$activity->country->name}}</h2>
    {{-- <p>{{$activity->detalle}}</p> --}}
    @if (count($activity->comments)!=0)
      <h2>Otros comentarios:</h2>

      <ul>
        @foreach ($activity->comments as $comment)
          <hr>
          <h3>Hecho por: </h3>
          <h5>{{ $comment->user->name }}</h5>
          <img src="\storage\storage\usersImage\{{ $comment->user->image }}" height="40" width="40" style="border-radius: 50%; ">

          <li><p>{{$comment->text}}</p></li>
        @endforeach
      </ul>
    @endif
  </div>

  <form id="createCommentForm" method="POST" action="/addComment">
      @csrf

              <input type="hidden" name="activity_id"
              value="{{$activity->id}}">


      <div class="form-group row">
          <label for="actualPassword" class="col-md-4 col-form-label text-md-right"><h4>Añadir comentario:</h4></label>

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




</div>
  <br>
  <br>
  <br>
@endsection
