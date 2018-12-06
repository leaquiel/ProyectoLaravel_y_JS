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
  <div style="background-color:rgba(115, 134, 138, 0.6);" class="row">

    <h5>Tu busqueda fue: "{{$search}}"</h5>


      <div class="col-sm-8">
        <h1 style="color: red;">Hemos encontrado las siguientes actividades para vos!</h1>
        {{-- <img class="card-img-top" src="\storage\storage\usersImage\{{ Auth::user()->image }}" alt="Card image cap"> --}}
        <ul>

          @foreach ($cities as $city)
            @if (count($city->activities) > 0)
              <li>
                <h3>{{$city->name}}</h3>
                @foreach ($city->activities as $act)
                  <p> --- {{$act->name}}</p>
                @endforeach
                @if (Auth::check())
                  {{-- <button href="/addComment/{{$act->name}}/{{Auth::user()->id}}">Añadir comentario</button> --}}
                  <a style="background-color: rgb(157, 151, 94); border: 1px solid grey; padding: 3px 5%;" href="/addComment/{{$act->id}}">Añadir comentario</a>
                @endif
              </li>
            @endif
          @endforeach

      </ul>
    </div>
  </div>
</div>
  <br>
  <br>
  <br>

  {{-- <div style="display: none;" id="searchDiv" class="container">
    @if (count($activities)!=0)
      <h1>Hemos encontrado las siguientes actividades para vos!</h1>
      <ul>
        @foreach ($activities as $activity)
          <li>
            asdasdasdasd
          </li>
        @endforeach
      </ul>
    @else
      <h1>No hemos encontrado ninguna actividad</h1>
    @endif
  </div> --}}


























@endsection
