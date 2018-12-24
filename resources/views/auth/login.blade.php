@extends('layout.base')
@section('title')
LogIn
@php
  $pageTitle = 'LogIn';
@endphp
@endsection
@section('main_content')

    <br><br><br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color:rgba(115, 134, 138, 0.6);">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form id="registerForm" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  autofocus>

                                <span class="invalid-feedback" role="alert">
                                @if ($errors->has('email'))
                                        <strong>{{ $errors->first('email') }}</strong>
                                @endif
                              </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

                                <span class="invalid-feedback" role="alert">
                                @if ($errors->has('password'))
                                        <strong>{{ $errors->first('password') }}</strong>
                                @endif
                              </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

window.addEventListener("load", function () {
/////////////////////////////////////////////////////////////////////////////////////////////

var formulario = document.querySelector('#registerForm');

var campos = formulario.elements;

campos = Array.from(campos);
campos = campos.filter(campo => campo.classList.contains('form-control'));


const regexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

var campoEmail = formulario.email;
var campoPassword = formulario.password;
var finalData = {};

function validateEmpty () {
  var error = this.parentElement.querySelector('.invalid-feedback');
  var nombreCampo = this.parentElement.parentElement.querySelector('label').innerText;
  if (this.value.trim() === '') {
    this.classList.add('is-invalid');
    error.innerText = 'El campo ' + nombreCampo + ' es obligatorio';
  } else {
    error.innerText = '';
    this.classList.remove('is-invalid');
    }
}

function validateEmptyAndEmail () {
var error = this.parentElement.querySelector('.invalid-feedback');
var nombreCampo = this.parentElement.parentElement.querySelector('label').innerText;
if (this.value.trim() === '') {
  this.classList.add('is-invalid');
  error.innerText = 'El campo ' + nombreCampo + ' es obligatorio';
} else if (!regexEmail.test(this.value.trim())) {
  error.innerText = 'Escribí un formato de email valido';
} else {
  error.innerText = '';
  this.classList.remove('is-invalid');
}
}

campoPassword.addEventListener('blur', validateEmpty);
campoEmail.addEventListener('blur', validateEmptyAndEmail);

formulario.addEventListener('submit', function (e) {
  if (
    campoEmail.value.trim() === '' ||
    campoPassword.value.trim() === ''
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

<br><br><br>


@endsection
