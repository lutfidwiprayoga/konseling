<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="/dashboard"><img
                src="{{ asset('template') }}/images/BK-Poliwangi.svg" class="mr-2" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="/dashboard"><img
                src="{{ asset('template') }}/images/logo-poliwangi.png" alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                    @if (Auth::user()->foto == null)
                        <img src="{{ asset('template') }}/images/logo-poliwangi.png" alt="profile">
                    @else
                        <img src="{{ url('foto_profil/' . auth()->user()->foto) }}" alt="profile">
                    @endif
                </a>
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                    <h5 class="ml-2 mt-3 mb-0" style="font-family: Arial, Helvetica, sans-serif; font-weight: bold">
                        {{ auth()->user()->name }}</h5>
                    <p class="ml-2 mt-0" style="font-family: Arial, Helvetica, sans-serif;">
                        {{ auth()->user()->role_user }}</p>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="{{ route('profil.edit') }}">
                        <i class="ti-settings text-primary"></i>
                        Settings
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ti-power-off text-primary"></i>
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
