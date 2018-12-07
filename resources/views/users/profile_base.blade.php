@extends('layout.base')
@section('title')
CustomTrip - Profile
@php
  $pageTitle = 'CustomTrip - Profile';
@endphp
@endsection
@section('main_content')

<div class="container">


  {{-- <div class="column" style="width: 18rem;">
    <img class="card-img-top" src="\storage\storage\usersImage\{{ $user->image }}" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">{{ $user->nickname }}</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div> --}}


    <br><br><br>
    <br>

      <div style="background-color:rgba(115, 134, 138, 0.6); padding: 1% 0;" class="row">
        <div class="col-sm-4">
          <img style="width: 200px" class="card-img-top" src="\storage\storage\usersImage\{{ Auth::user()->image }}" alt="Card image cap">
          <h2>{{Auth::user()->nickname}}</h2>
          <h3>#{{Auth::user()->target}}</h3>
          <p>{{Auth::user()->name}}</p>
          <p>{{Auth::user()->email}}</p>
          {{-- <p>Aca podria ir una presentacion del user</p> --}}
          <ul class="nav nav-pills flex-column">
            @yield('listaBotones')
          </ul>
          <hr class="d-sm-none">
        </div>

        @yield('profile_content')







      </div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
</div>



@endsection
