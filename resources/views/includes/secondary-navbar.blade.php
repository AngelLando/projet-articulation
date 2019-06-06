<!-- secondary nav -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light secondary-nav">
    <button class="second-nav-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#secondNav" aria-controls="secondNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>



  <div class="collapse navbar-collapse second-nav" id="secondNav">
    <ul class="navbar-nav second-nav-list mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('nouveautes')}}">Nouveautés <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('nos-vins')}}">Nos vins</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('nos-primeurs')}}">Nos primeurs</a>
      </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('offres-speciales')}}">Offres spéciales</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('promotions')}}">Promotions</a>
        </li>
    </ul>
    <form class="form-inline search-bar my-2 my-lg-0">
      <input class="form-control mr-sm-2 secondary-nav" type="search" placeholder="Rechercher" aria-label="Search">
      <button class="btn btn-search btn-outline-success my-2 my-sm-0" type="submit" ><img src="{{ asset('images/search-loupe.svg')}} " alt=""></button>
    </form>
  </div>
</nav>

