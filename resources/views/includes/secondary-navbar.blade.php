<!-- secondary nav -->
  <nav class="navbar navbar-expand-lg navbar-light second-nav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="{{route('nouveautes')}}">Nouveautés</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{route('nos-vins')}}">Nos vins</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{route('nos-primeurs')}}">Nos primeurs</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{route('offres-speciales')}}">Offres spéciales</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{route('promotions')}}">Promotions</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Search">
      <button class="btn my-2 my-sm-0" type="submit"><img src="{{ asset('images/search-loupe.svg')}} " alt=""></button>
    </form>
  </nav>
