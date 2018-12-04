@extends('users.profile_base')
@section('profile_content')
<div class="col-sm-8">
  <h2>EDITAR PERFIL</h2>
  <hr>
  <div class="card-body">
      <form method="POST" enctype="multipart/form-data" action="/profile/{{ Auth::user()->id }}">
          @csrf

          <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

              <div class="col-md-6">
                  <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                  value="{{ Auth::user()->name ? Auth::user()->name : old('name') }}" autofocus>

                  @if ($errors->has('name'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

            <div class="col-md-6">
              <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
              value="{{ Auth::user()->email ? Auth::user()->email : old('email') }}">

              @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
              @endif
            </div>
          </div>

          <div class="form-group row">
              <label for="nickname" class="col-md-4 col-form-label text-md-right">User name</label>

              <div class="col-md-6">
                  <input id="nickname" type="text" class="form-control{{ $errors->has('nickname') ? ' is-invalid' : '' }}" name="nickname" value="{{ Auth::user()->nickname ? Auth::user()->nickname : old('nickname') }}">

                  @if ($errors->has('nickname'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('nickname') }}</strong>
                      </span>
                  @endif
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

                  @if ($errors->has('target'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('target') }}</strong>
                      </span>
                  @endif
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

                  @if ($errors->has('country_id'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('country_id') }}</strong>
                      </span>
                  @endif
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

                  @if ($errors->has('city_id'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('city_id') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group row">
              <label for="image" class="col-md-4 col-form-label text-md-right">Imagen</label>

              <div class="col-md-6">
                  <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image"
                  value="{{ Auth::user()->image ? Auth::user()->image : old('image') }}">

                  @if ($errors->has('image'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('image') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group row">
              <label for="actualPassword" class="col-md-4 col-form-label text-md-right">Contraseña actual</label>

              <div class="col-md-6">
                  <input id="actualPassword" type="password" class="form-control{{ $errors->has('actualPassword') ? ' is-invalid' : '' }}" name="actualPassword">

                  @if ($errors->has('actualPassword'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('actualPassword') }}</strong>
                      </span>
                  @endif
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

  <script>
    window.addEventListener("load", function () {
      let selectCountries = document.querySelector("#country_id");
      let selectCities = document.querySelector("#city_id");
      console.log(selectCities);

      selectCountries.addEventListener("change", function () {
        selectCities.innerHTML = "";
        let countryId = this.value;

        console.log(countryId);

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
      })
    })
  </script>



  @endsection