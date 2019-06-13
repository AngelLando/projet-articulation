
<div class="row newsletter justify-content-center" id="newsletter">
  <div class="navbar-text main-nav">
    <a href="#">Inscription à la newsletter</a>
  </div>
</div>
<section class="two-nav" id="two-nav">

<nav  class="navbar first-navbar navbar-expand-md navbar-light shadow-sm">
    <!-- <div class="container"> -->
        <a class="navbar-brand first-nav" href="{{ url('/') }}">
            <!-- {{ config('app.name', 'Gazzar') }} -->
            <img class="logo" src="{{ asset('images/logo.svg') }} " width="200" height="auto" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <!-- Languages -->
                <li class="nav-item first-nav-item dropdown">
                  <img src="{{ asset('images/select-language-button.svg') }} " class="icon icon-nav" width="23" height="23" alt="Languages" >
                  <a class="nav-link fn-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    FR
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <a class="dropdown-item" >FR</a> <!--  href="https://www.gazzar-vins.ch/" -->

                     <a class="dropdown-item">EN</a> <!-- href="https://www.gazzar-wines.ch/" -->

                     <a class="dropdown-item" >DE</a> <!--  href="https://www.gazzar-weine.ch/" -->
                  </div>
                </li>
                <!-- Authentication Links -->
          @guest
          <li class="nav-item first-nav-item dropdown">
            <img src="{{ asset('images/user.svg') }} " width="23" height="23" class="icon icon-nav"alt="Login" >
            <a class="nav-link fn-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">MON COMPTE</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('login') }}">{{ __('Se connecter') }}</a>
              <div class="dropdown-divider"></div>
                @if (Route::has('register'))
              <a class="dropdown-item" href="{{ route('register') }}">{{ __("S'enregistrer") }}</a>
            </div>
          </li>
          @endif

          @else
          <li class="nav-item first-nav-item dropdown">
            <img src="{{ asset('images/user.svg') }} " width="23" height="23" class="icon icon-nav"  alt="Login" >
              <a id="navbarDropdown" class="nav-link fn-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

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
            <li class="nav-item first-nav-item">
              <img src="{{ asset('images/favorite-heart-white.svg') }}" width="23" height="23" class="icon icon-nav"   alt="Mes Préférés">
              <a class="nav-link fn-link" href="#" >MES PRÉFÉRÉS</a>
           </li>
               <div id="app">
                   <cart-nav-component></cart-nav-component>
               </div>
          </li>
          @if(Auth::check())
            @if(Auth::user()->admin)
            <li class="nav-item admin-item">
              <img src="{{ asset('images/administration.svg') }}"class="icon" width="23" height="23" alt="Administration"></a>
              <a class="nav-link fn-link" href="{{route('produits.index')}}">ADMINISTRATION</a>
            </li>
            @endif
          @endif
        </ul>
    </div>

<!-- </div> -->
</nav> <!--  end of a principal nav -->

<!--  secondary nav -->

  <nav class="navbar navbar-expand-lg navbar-light bg-light secondary-nav">
    <button class="second-nav-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#secondNav" aria-controls="secondNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>



  <div class="collapse navbar-collapse second-nav" id="secondNav">
    <ul class="navbar-nav second-nav-list mr-auto">
      <li class="nav-item nav-item-snd-nav" id="nouveautes">
        <a class="nav-link sn-link" href="{{route('nouveautes')}}">Nouveautés <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item nav-item-snd-nav" id="nos-vins">
        <a class="nav-link sn-link" href="{{route('nos-vins')}}">Nos vins</a>
      </li>
      <li class="nav-item nav-item-snd-nav" id="nos-primeurs">
        <a class="nav-link sn-link" href="{{route('nos-primeurs')}}">Nos primeurs</a>
      </li>
        <li class="nav-item nav-item-snd-nav" id="offres-speciales">
          <a class="nav-link sn-link" href="{{route('offres-speciales')}}">Offres spéciales</a>
        </li>
        <li class="nav-item nav-item-snd-nav" id="promotions">
          <a class="nav-link sn-link" href="{{route('promotions')}}">Promotions</a>
        </li>
    </ul>
      <div>
          <form class="form-inline search-bar my-2 my-lg-0" action="{{ route('search') }}" method="GET">
              <input class="form-control mr-sm-2 secondary-nav" type="search" placeholder="Rechercher" aria-label="Search" name="search">
              <button class="btn btn-search btn-outline-success my-2 my-sm-0" type="submit" ><img src="images/search-loupe.svg" alt=""></button>
          </form>
      </div>
  </div>
</nav>
</section>
