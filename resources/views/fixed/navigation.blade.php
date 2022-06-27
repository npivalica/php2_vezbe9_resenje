<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#"><h1 class="h3">Shop</h1></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          @foreach($menu as $link)
          <li class="nav-item @if(request()->routeIs($link->route)) active @endif">
            <a class="nav-link" href="{{ route($link->route) }}">{{ $link->name }}</a>
          </li>
          @endforeach
          @if(Session::get('user'))
          <li class="nav-item @if(request()->routeIs($link->route)) active @endif">
            <form action="{{route('logout')}}" method="POST">
              @csrf
              <button class="btn btn-link">Logout</button>
            </form>
          </li>
          @else
          <li class="nav-item @if(request()->routeIs('login')) active @endif">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>