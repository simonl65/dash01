<header class="app-header navbar bg-primary">
    @auth
        <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
            <span class="navbar-toggler-icon text-white"></span>
        </button>
        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
            <span class="navbar-toggler-icon"></span>
        </button>
    @endauth

    <a class="navbar-brand" href="{{ url('/') }}">
        @svg('svg/content-discovered-logo.svg', 'cdLogoFull');
        {{-- <img class="navbar-brand-full" src="svg/content-discovered-logo.svg" width="89" height="25" alt="Logo">
        <img class="navbar-brand-minimized" src="svg/logo-icon.svg" width="30" height="30" alt="Logo"> --}}
    </a>
    <ul class="nav navbar-nav ml-auto mr-3">

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
                    <img class="img-avatar mx-1" src="{{Auth::user()->avatar_url}}">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item">
                        {{ Auth::user()->name }}<br>
                        <small class="text-muted">{{ Auth::user()->email }}</small>
                    </a>
                    <a class="dropdown-item" href="/profile">
                        <i class="fas fa-user"></i> Profile
                    </a>
                    <div class="divider"></div>
                    <a class="dropdown-item" href="/password">
                        <i class="fas fa-key"></i> Password
                    </a>

                    <div class="divider"></div>

                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
        <!-- /Authentication Links -->
    </ul>
</header>
