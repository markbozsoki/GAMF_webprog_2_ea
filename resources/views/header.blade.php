<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

        <a href="/" class="logo d-flex align-items-center me-auto me-xl-0">
            <h1 class="sitename">CopyCat Fénymásoló</h1>
            <span>.</span>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="/" class="{{ Request::is('/') ? 'active' : '' }}">Főoldal</a></li>
                <li><a href="/database" class="{{ Request::is('database') ? 'active' : '' }}">Adatbázis</a></li>
                <li><a href="/crud" class="{{ Request::is('crud') ? 'active' : '' }}">CRUD</a></li>
                <li><a href="/diagram" class="{{ Request::is('diagram') ? 'active' : '' }}">Diagram</a></li>
                <li><a href="/contact" class="{{ Request::is('contact') ? 'active' : '' }}">Kapcsolat</a></li>

                @guest
                    <li><a href="/login" class="{{ Request::is('login') ? 'active' : '' }}">Bejelentkezés</a></li>
                    <li><a href="/register" class="{{ Request::is('register') ? 'active' : '' }}">Regisztráció</a></li>
                @else
                    <li><a href="/messages" class="{{ Request::is('messages') ? 'active' : '' }}">Üzenetek</a></li>
                    @if(Auth::user()->role === 'admin')
                        <li><a href="/admin" class="{{ Request::is('admin') ? 'active' : '' }}">Admin</a></li>
                    @endif
                    <li><a href="/logout">Kijelentkezés</a></li>
                @endguest
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

    </div>
</header>