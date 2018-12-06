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
    <p>$activity->detalle}}</p>
  </div>

  <form id="createCommentForm" method="POST" action="/addComment">
      @csrf

              <input type="hidden" name="activity_id"
              value="{{$activity->id}}">

      <div class="form-group row">
          <label for="actualPassword" class="col-md-4 col-form-label text-md-right">Comentario:</label>

          <div class="col-md-6">
              <input type="text" class="form-control{{ $errors->has('actualPassword') ? ' is-invalid' : '' }}" name="text">

              <span class="invalid-feedback" role="alert">
              @if ($errors->has('actualPassword'))
                  <strong>{{ $errors->first('actualPassword') }}</strong>
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
