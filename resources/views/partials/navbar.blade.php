<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }}">Dashboard</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/browsing" class="nav-link {{ Request::is('browsing*') ? 'active' : '' }}">Browsing</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/searching" class="nav-link {{ Request::is('searching*') ? 'active' : '' }}">Searching</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/about" class="nav-link">About</a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
