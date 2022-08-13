<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
        </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle emaillink" href="#" role="button"
                data-toggle="dropdown" v-pre>
                {{ Auth::user()->email }}
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                {{-- <a href="#" class="dropdown-item">Profile</a>
                <div class="dropdown-divider"></div> --}}
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
