<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="/">
      <x-brand></x-brand>
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
    @if (Auth::user() && Auth::user()->isAdmin())
      {{-- Has route --}}
      @if (Route::has('manage.game'))
        <a class="navbar-item" href="{{ route('manage.game') }}">
          Manage Game
        </a>
      @endif
      @if (Route::has('manage.game.genre'))
        <a class="navbar-item" href="{{ route('manage.game.genre') }}">
          Manage Game Genre
        </a>
      @endif
    @endif
    </div>

    <div class="column is-half">
      <form method="get" action="{{ route('search') }}">
        <div class="field">
          <p class="control has-icons-left">
            <input class="input" type="text" name="search" placeholder="Search...">
            <span class="icon is-small is-left">
              <i class="fas fa-search"></i>
            </span>
          </p>
        </div>
      </form>
    </div>

    <div class="navbar-end">
      @guest
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-primary" href="{{ route('login') }}">
            Login
          </a>
          <a class="button is-light" href="{{ route('register') }}">
            Register
          </a>
        </div>
      </div>
      @else
      @if (Route::has('user.cart'))
        <a class="navbar-item" href="{{ route('user.cart') }}">
          <i class="fas fa-shopping-cart"></i>
        </a>
      @endif
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link is-arrowless  has-text-centered">
          <figure class="image is-24x24 is-inline-block">
            <x-image-round src="/images/user/{{ Auth::user()->image }}" size="24" :alt="Auth::user()->name" />
          </figure>
        </a>

        <div class="navbar-dropdown is-right">
          <a class="navbar-item">
            Hi,&nbsp;
            {{-- Greet user from auth  --}}
            <strong>{{ Auth::user()->name }}</strong>
          </a>
          <hr class="navbar-divider">
          @if (Route::has('user.profile'))
            <a class="navbar-item" href="{{ route('user.profile') }}">
              Your profile
            </a>
          @endif
          @if (Route::has('user.transaction'))
            <a class="navbar-item" href="{{ route('user.transaction') }}">
              Transaction History
            </a>
          @endif
          <a class="navbar-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
              {{ __('Sign out') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
        </div>
      </div>
      @endguest
    </div>
  </div>
</nav>