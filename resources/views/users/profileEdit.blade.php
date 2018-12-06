@extends('users.profile_base')
@section('profile_content')
<div class="col-sm-8">
  <h2>EDITAR PERFIL</h2>
  <hr>
  <div class="card-body">
      <form id="registerForm" method="POST" enctype="multipart/form-data" action="/profile/{{ Auth::user()->id }}">
          @csrf

          {{ method_field('PUT') }}

          @if ($errors)
            @foreach ($errors->all() as $error)
              <li> {{ $error }} </li>
            @endforeach
          @endif

          <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

              <div class="col-md-6">
                  <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                  value="{{ Auth::user()->name ? Auth::user()->name : old('name') }}" autofocus>

                  <span class="invalid-feedback" role="alert">
                  @if ($errors->has('name'))
                          <strong>{{ $errors->first('name') }}</strong>
                  @endif
                </span>
              </div>
          </div>

          <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

            <div class="col-md-6">
              <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
              value="{{ Auth::user()->email ? Auth::user()->email : old('email') }}">

              <span class="invalid-feedback" role="alert">
              @if ($errors->has('email'))
                  <strong>{{ $errors->first('email') }}</strong>
              @endif
            </span>
            </div>
          </div>

          <div class="form-group row">
              <label for="nickname" class="col-md-4 col-form-label text-md-right">User name</label>

              <div class="col-md-6">
                  <input id="nickname" type="text" class="form-control{{ $errors->has('nickname') ? ' is-invalid' : '' }}" name="nickname" value="{{ Auth::user()->nickname ? Auth::user()->nickname : old('nickname') }}">

                  <span class="invalid-feedback" role="alert">
                  @if ($errors->has('nickname'))
                          <strong>{{ $errors->first('nickname') }}</strong>
                  @endif
                </span>
              </div>
          </div>

          <div class="form-group row">
              <label for="target" class="col-md-4 col-form-label text-md-right">Target</label>

              <div class="col-md-6">
                  {{-- <input id="nickname" type="text" class="form-control{{ $errors->has('nickname') ? ' is-invalid' : '' }}" name="nickname" value="{{ old('nickname') }}"> --}}
                  <select id="target" class="form-control{{ $errors->has('target') ? ' is-invalid' : '' }}" name="target">

                    <option value="">Elije un target</option>
                    <option {{ (old('target')=='Relax' || Auth::user()->target) ? ' selected' : '' }} value="Relax">Relax</option>
                    <option {{ (old('target')=='Aventura' || Auth::user()->target) ? ' selected' : '' }} value="Aventura">Aventura</option>
                    <option {{ (old('target')=='Familiar' || Auth::user()->target) ? ' selected' : '' }} value="Familiar">Familiar</option>
                    <option {{ (old('target')=='Fiestero' || Auth::user()->target) ? ' selected' : '' }} value="Fiestero">Fiestero</option>
                    <option {{ (old('target')=='Trabajo' || Auth::user()->target) ? ' selected' : '' }} value="Trabajo">Trabajo</option>

                  </select>

                  <span class="invalid-feedback" role="alert">
                  @if ($errors->has('target'))
                          <strong>{{ $errors->first('target') }}</strong>
                  @endif
                </span>
              </div>
          </div>

          <div class="form-group row">
              <label for="country_id" class="col-md-4 col-form-label text-md-right">Pais</label>

              <div class="col-md-6">
                  <select id="country_id" class="form-control{{ $errors->has('country_id') ? ' is-invalid' : '' }}" name="country_id">

                    <option value="">Elije un pais</option>

                    @foreach ($countries as $country)
                      <option {{ old('country_id')==$country->id  ? ' selected' : '' }} value={{ $country->id }}> {{ $country->name }}</option>
                    @endforeach

                  </select>

                  <span class="invalid-feedback" role="alert">
                  @if ($errors->has('country_id'))
                          <strong>{{ $errors->first('country_id') }}</strong>
                  @endif
                </span>
              </div>
          </div>

          <div class="form-group row">
              <label for="city_id" class="col-md-4 col-form-label text-md-right">Ciudad</label>

              <div class="col-md-6">
                  <select id="city_id" class="form-control{{ $errors->has('city_id') ? ' is-invalid' : '' }}" name="city_id">

                    <option value="">Elije una ciudad</option>

                    {{-- @foreach ($cities as $city)
                      <option value=""> {{ $city->name }}</option>
                    @endforeach --}}

                  </select>

                  <span class="invalid-feedback" role="alert">
                  @if ($errors->has('city_id'))
                          <strong>{{ $errors->first('city_id') }}</strong>
                  @endif
                </span>
              </div>
          </div>

          <div class="form-group row">
              <label for="image" class="col-md-4 col-form-label text-md-right">Imagen</label>

              <div class="col-md-6">
                  <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image"
                  value="{{ Auth::user()->image ? Auth::user()->image : old('image') }}">

                  <span class="invalid-feedback" role="alert">
                  @if ($errors->has('image'))
                          <strong>{{ $errors->first('image') }}</strong>
                  @endif
                </span>
              </div>
          </div>

          <div class="form-group row">
              <label for="actualPassword" class="col-md-4 col-form-label text-md-right">Contraseña actual</label>

              <div class="col-md-6">
                  <input id="actualPassword" type="password" class="form-control{{ $errors->has('actualPassword') ? ' is-invalid' : '' }}" name="actualPassword">

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
                      Modificar 
                  </button>
              </div>
          </div>
      </form>
  </div>

  <script>
    window.addEventListener("load", function () {
      let selectCountries = document.querySelector("#country_id");
      let selectCities = document.querySelector("#city_id");
      let countryId = this.value;

      fetch(`http://localhost:8000/apiCities/${countryId}`)
        .then(response => response.json())
        .then(cities => {
          if (cities.length > 0) {
            cities.forEach(city => {
              selectCities.innerHTML += `<option value="${city.id}"> ${city.name} </option>`;
            })
          } else {
            selectCities.innerHTML += `<option value="0"> Sin ciudad </option>`;
          }
        })
        .catch(error => console.log(error));

/////////////////////////////////////////////////////////////////////////////////////////////

    var formulario = document.querySelector('#registerForm');

    var campos = formulario.elements;

    campos = Array.from(campos);
    campos = campos.filter(campo => campo.classList.contains('form-control'));


    const regexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    const regexNumbers = /^\d+$/;

    var campoName = formulario.name;
    var campoEmail = formulario.email;
    var campoNickname = formulario.nickname;
    var campoTarget = formulario.target;
    var campoCountry = formulario.country_id;
    var campoCity = formulario.city_id;
    var campoActualPassword = formulario.actualPassword;
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

    campoName.addEventListener('blur', validateEmpty);
    campoEmail.addEventListener('blur', validateEmptyAndEmail);
    campoCountry.addEventListener('blur', validateEmpty);

    campoActualPassword.addEventListener('blur', function () {
      var error = this.parentElement.querySelector('.invalid-feedback');
      var nombreCampo = this.parentElement.parentElement.querySelector('label').innerText;
      if (this.value.trim() === '') {
        this.classList.add('is-invalid');
        error.innerText = 'El campo ' + nombreCampo + ' es obligatorio';
      } else {
        error.innerText = '';
        this.classList.remove('is-invalid');
      }
    });

    formulario.addEventListener('submit', function (e) {
      e.preventDefault();
      if (
        campoName.value.trim() === '' ||
        campoEmail.value.trim() === '' ||
        campoNickname.value.trim() === '' ||
        campoTarget.value.trim() === '' ||
        campoCountry.value.trim() === '' ||
        campoCity.value.trim() === '' ||
        campoActualPassword.value.trim() === ''
      )
      {
        campos.forEach(function (campo) {
        var error = campo.parentElement.querySelector('.invalid-feedback');
        var nombreCampo = campo.parentElement.parentElement.querySelector('label').innerText;
        if (campo.value.trim() === '') {
          campo.classList.add('is-invalid');
          error.innerText = 'El campo ' + nombreCampo + ' es obligatorio';
        }
        });
      } else {
        campos.forEach(function (campo) {
          finalData[campo.name] = campo.value;
          var error = campo.parentElement.querySelector('.invalid-feedback');
          campo.classList.remove('is-invalid');
          campo.value = '';
          error.innerText = '';
        });
        formulario.style.display = 'none';
      }
    });


























    });
  </script>



  @endsection
