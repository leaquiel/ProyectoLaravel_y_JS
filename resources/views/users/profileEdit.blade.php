@extends('users.profile_base')
@section('listaBotones')
  <li class="nav-item">
    <a class="nav-link alert alert-secondary"
    href="/profile"
    >Mis actividades</a>
  </li>
  <li class="nav-item">
    <a class="nav-link alert alert-secondary"
    href="/profile/friends"
    >Ver Amigos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link alert alert-secondary"
    href="/profile/userComments"
    >Administrar comentarios</a>
  </li>
  <li class="nav-item">
    <a class="nav-link alert alert-secondary"
    href="/profile/changeTheme"
    >Cambiar tema de pagina</a>
  </li>
@endsection
@section('profile_content')
<div class="col-sm-8">
  <h2>EDITAR PERFIL</h2>
  <hr>
  <div class="card-body">
      <form id="registerForm" method="POST" enctype="multipart/form-data" action="/profile/{{ Auth::user()->id }}">
          @csrf

          {{ method_field('PUT') }}



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

          <div id="div_city" class="form-group row" style="display: none;">
              <label for="city_id" class="col-md-4 col-form-label text-md-right">Ciudad</label>

              <div class="col-md-6">
                  <select id="city_id" class="form-control{{ $errors->has('city_id') ? ' is-invalid' : '' }}" name="city_id">

                    <option value="">Elije una ciudad</option>

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

          <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                      Modificar
                  </button>
              </div>
          </div>
      </form>
  </div>
</div>

  <script>
    window.addEventListener("load", function () {
      let selectCountries = document.querySelector("#country_id");
      let selectCities = document.querySelector("#city_id");
      let divCities = document.querySelector("#div_city");
      // let countryName = selectCountries.options[selectCountries.selectedIndex].text;

      selectCountries.addEventListener("change", function(){
        // console.log(selectCountries.options[selectCountries.selectedIndex].text);
        // console.log(selectCountries.value);

        let countryId = selectCountries.value;

        // fetch(`http://localhost:8000/apiCities/20`)
        fetch(`http://localhost:8000/apiCities/${countryId}`)
         .then(response => response.json())
         .then(cities => {

           if (cities.length > 0)
           {
             cities.forEach(city => {
               selectCities.innerHTML += `<option value="${city.id}"> ${city.name} </option>`;
               divCities.style.display = "flex";
             })
           }
           else{
             selectCities.innerHTML += `<option value=NULL></option>`;
             divCities.style.display = "none";
           }
         })
         .catch(error => console.log(error));




      })

      // countryId.addEventListener("change", function (){
      //
      //
      // fetch(`http://localhost:8000/apiCities/${countryId}`)
      //   .then(response => response.json())
      //   .then(cities => {
      //     if (cities.length > 0) {
      //       cities.forEach(city => {
      //         selectCities.innerHTML += `<option value="${city.id}"> ${city.name} </option>`;
      //         divCities.style.display = "block";
      //       })
      //
      //   })
      //   .catch(error => console.log(error));
      //
      // });
/////////////////////////////////////////////////////////////////////////////////////////////



























    });
  </script>



  @endsection
