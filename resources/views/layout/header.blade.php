<header>
  <nav class="navbar navbar-expand-lg fixed-top navbar-dark" style="background-color: rgba(30, 37, 59, 0.75);">
    <a class="navbar-brand logo_CT" href="{{ url('/') }}">CostumTrip</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse flex-justify-between" id="navbarNav">
    <!-- <div class="collapse navbar-collapse" id="navbarNav" style="display: flex; justify-content: space-between;"> -->
      <ul class="navbar-nav align-items-center">
        <li class="nav-item <?= ($pageTitle === 'Home') ? 'active' : ''; ?>">
          <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item <?= ($pageTitle === 'Nosotros') ? 'active' : ''; ?>">
          <a class="nav-link" href="#">¿Quienes somos?</a>
        </li>
      </ul>

      <div class="dropdown-divider"></div>

      <ul class="navbar-nav align-items-center">
        @guest
          <li class="nav-item <?= ($pageTitle === 'LogIn') ? 'active' : ''; ?>"><a class="nav-link"  href="{{ route('login') }}">LogIn</a></li>
          <li class="nav-item <?= ($pageTitle === 'Register') ? 'active' : ''; ?>"><a class="nav-link" href="{{ route('register') }}">Registrate</a></li>
        @else
           <!--  NO ME DA PELOTA AL ACTIVE EN PROFILE-->
           <li class="nav-item">
             <a class="nav-link" href=" {{ route('users.profile') }} ">
               <img src="\storage\storage\usersImage\{{ Auth::user()->image }}" height="40" width="40" style="border-radius: 50%; ">
             </a>
           </li>
           <li class="nav-item <?= ($pageTitle === 'Profile') ? 'active' : ''; ?>">
             <a class="nav-link" href="{{ route('users.profile') }}">
               {{ Auth::user()->name }}
             </a>
           </li>

           <li class="nav-item">

             <a id="logOutLi" class="nav-link" style=" position: relative; top: 0px;" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 Cerrar sesion
             </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf
             </form>

           </li>
         @endguest

         <script>

           window.addEventListener("load", function () {

           let logOutLi = document.querySelector('#logOutLi');

           logOutLi.addEventListener("click", function(){
             localStorage.removeItem('bodyImage');
             document.body.style.backgroundImage = "url('/images/fondo.jpg')";
           });

         });
         </script>





        {{-- <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                    @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                </li>
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul> --}}




      </ul>
    </div>
  </nav>
</header>
