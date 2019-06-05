<div class="row justify-content-center">
  <div class="navbar-text main-nav">
    <a href="#">Inscription à la newsletter</a>
  </div>
</div>
<nav  class="navbar navbar-expand-md navbar-light shadow-sm">
    <!-- <div class="container"> -->
        <a class="navbar-brand" href="{{ url('/') }}">
            <!-- {{ config('app.name', 'Gazzar') }} -->
            <img src="{{ asset('images/gazzar-logo.svg') }} " width="200" height="auto" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Languages -->
                <li class="nav-item dropdown">
                  <img src="{{ asset('images/select-language-button.svg') }} " width="25" height="25" alt="Languages" >
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    FR
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <a class="dropdown-item" >FR</a> <!--  href="https://www.gazzar-vins.ch/" -->
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item">EN</a> <!-- href="https://www.gazzar-wines.ch/" -->
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item" >DE</a> <!--  href="https://www.gazzar-weine.ch/" -->
                  </div>
                </li>
                <!-- Authentication Links -->
          @guest
          <li class="nav-item dropdown">
            <img src="{{ asset('images/user.svg') }} " width="25" height="25" alt="Login" >
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">MON COMPTE</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('login') }}">{{ __('Se connecter') }}</a>
              <div class="dropdown-divider"></div>
                @if (Route::has('register'))
              <a class="dropdown-item" href="{{ route('register') }}">{{ __("S'enregistrer") }}</a>
            </div>
          </li>
          @endif

          @else
          <li class="nav-item dropdown">
            <img src="{{ asset('images/user.svg') }} " width="25" height="25" alt="Login" >
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                  {{ Auth::user()->username }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('user.account') }}">
                    {{ __('Mon compte') }}
                </a>
                <div class="dropdown-divider"></div>
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
            <li class="nav-item">
              <img src="{{ asset('images/favorite-heart-white.svg') }}" width="25" height="25" alt="Mes Préférés">
              <a class="nav-link" href="#" >MES PRÉFÉRÉS</a>
           </li>
           <li class="nav-item">
            <img src="{{ asset('images/shopping-cart.svg') }}" width="25" height="25" alt="Panier"></a>
            <a class="nav-link" href="{{route('cart')}}">PANIER</a>
          </li>
          @if(Auth::check())
            @if(Auth::user()->admin)
            <li class="nav-item">
              <img src="{{ asset('images/administration.svg') }}" width="25" height="25" alt="Administration"></a>
              <a class="nav-link" href="{{route('produits.index')}}">ADMINISTRATION</a>
            </li>
            @endif
          @endif
        </ul>
    </div>

<!-- </div> -->
</nav> <!--  end of a principal nav -->
