


@extends('layout.base')
@section('title')
Register
@php
  $pageTitle = 'Register';
@endphp
@endsection
@section('main_content')

  @php
  use App\User;
  @endphp

  <br><br><br>
<div class="container">
  {{-- @if ($errors)
    <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
    </ul>
  @endif --}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color:rgba(115, 134, 138, 0.6);">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form id="registerForm" method="POST" enctype="multipart/form-data" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" autofocus>

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
                            <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">

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
                                <input id="nickname" type="text" class="form-control{{ $errors->has('nickname') ? ' is-invalid' : '' }}" name="nickname" value="{{ old('nickname') }}">

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
                                <select id="target" class="form-control{{ $errors->has('target') ? ' is-invalid' : '' }}" name="target">

                                  <option value="">Elije un target</option>
                                  <option {{ old('target')=='Relax' ? ' selected' : '' }} value="Relax">Relax</option>
                                  <option {{ old('target')=='Aventura' ? ' selected' : '' }} value="Aventura">Aventura</option>
                                  <option {{ old('target')=='Familiar' ? ' selected' : '' }} value="Familiar">Familiar</option>
                                  <option {{ old('target')=='Fiestero' ? ' selected' : '' }} value="Fiestero">Fiestero</option>
                                  <option {{ old('target')=='Trabajo' ? ' selected' : '' }} value="Trabajo">Trabajo</option>

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

                        <div id="selectCityDiv" class="form-group row" style="display:none;">
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
                                <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}">

                                <span class="invalid-feedback" role="alert">
                                @if ($errors->has('image'))
                                        <strong>{{ $errors->first('image') }}</strong>
                                @endif
                              </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar Contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation">

                                <span class="invalid-feedback" role="alert">
                                @if ($errors->has('password_confirmation'))
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                @endif
                              </span>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<script>
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
const regexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
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
  window.addEventListener("load", function () {
    let selectCountries = document.querySelector("#country_id");
    let selectCities = document.querySelector("#city_id");
    let selectCitiesDiv = document.querySelector("#selectCityDiv");
    console.log(selectCities);

    selectCountries.addEventListener("change", function () {
      selectCities.innerHTML = "";
      let countryId = this.value;

      console.log(countryId);

      fetch(`http://localhost:8000/apiCities/${countryId}`)
        .then(response => response.json())
        .then(cities => {
          if (cities.length > 0) {
            selectCitiesDiv.style.display = 'flex';
            cities.forEach(city => {
              selectCities.innerHTML += `<option value="${city.id}"> ${city.name} </option>`;
            })
          } else {
            selectCitiesDiv.style.display = 'none';
          }
        })
        .catch(error => console.log(error));
    });


/////////////////////////////////////////////////////////////////////

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
    var campoPassword = formulario.password;
    var campoRePassword = formulario.password_confirmation;
    var campoImagen = formulario.image;
    var finalData = {};

    campoName.addEventListener('blur', validateEmpty);
    campoEmail.addEventListener('blur', validateEmptyAndEmail);
    campoCountry.addEventListener('blur', validateEmpty);
    campoNickname.addEventListener('blur', validateEmpty);
    campoTarget.addEventListener('blur', validateEmpty);
    campoPassword.addEventListener('blur', validateEmpty);
    campoRePassword.addEventListener('blur', validateEmpty);
    campoImagen.addEventListener('blur', validateEmpty);

    campoPassword.addEventListener('blur', function () {
		var error = this.parentElement.querySelector('.invalid-feedback');
		var nombreCampo = this.parentElement.parentElement.querySelector('label').innerText;
		if (this.value.trim() === '') {
			this.classList.add('is-invalid');
			error.innerText = 'El campo ' + nombreCampo + ' es obligatorio';
		} else if (this.value.trim().length < 4) {
			error.innerText = 'La contraseña debe tener más de 4 caracteres';
		} else {
			error.innerText = '';
			this.classList.remove('is-invalid');
		}
	});

	campoRePassword.addEventListener('change', function () {
		var error = this.parentElement.querySelector('.invalid-feedback');
		if (this.value.trim() !== campoPassword.value.trim()) {
			this.classList.add('is-invalid');
			error.innerText = 'Las contraseñas no coinciden';
		} else {
			error.innerText = '';
			this.classList.remove('is-invalid');
		}
	});











    formulario.addEventListener('submit', function (e) {
      if (
			campoName.value.trim() === '' ||
			campoEmail.value.trim() === '' ||
			campoNickname.value.trim() === '' ||
			campoPassword.value.trim() === '' ||
			campoRePassword.value.trim() === '' ||
			campoCountry.value.trim() === '' ||
			campoCity.value.trim() === '' ||
			campoTarget.value.trim() === ''
		) {
      e.preventDefault();
			campos.forEach(function (campo) {
				var error = campo.parentElement.querySelector('.invalid-feedback');
				var nombreCampo = campo.parentElement.parentElement.querySelector('label').innerText;
				if (campo.value.trim() === '') {
					campo.classList.add('is-invalid');
					error.innerText = 'El campo ' + nombreCampo + ' es obligatorio';
				}
			});
		} else if (campoRePassword.value !== campoPassword.value) {
      e.preventDefault();
			campoRePassword.classList.add('is-invalid');
			campoRePassword.parentElement.querySelector('.invalid-feedback').innerText = 'Las contraseñas no coinciden';
		} else {
      e.submit();
			campos.forEach(function (campo) {
				finalData[campo.name] = campo.value;
				var error = campo.parentElement.querySelector('.invalid-feedback');
				campo.classList.remove('is-invalid');
				campo.value = '';
				error.innerText = '';
			});
			// formulario.style.display = 'none';

			// var ul = document.createElement('ul');
      //
			// for (var key in finalData) {
			// 	if (key !== 'password' && key !== 'rePassword') {
			// 		var li = document.createElement('li');
			// 		li.innerText = key + ': ' + finalData[key];
			// 		ul.append(li);
			// 	}
			// }
      //
			// document.querySelector('.col-md-8').append(ul);
		}
	});
});
</script>
@endsection
