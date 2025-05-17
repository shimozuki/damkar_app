<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user mr-1"></i>
                {{ Auth::user()->nama }}
            </a>
            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                <form action="{{ route('auth.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item dropdown-footer">
                        <i class="fas fa-power-off"></i>
                        Keluar
                    </button>
                </form>
            </div>
        </li>
    </ul>
</nav>
