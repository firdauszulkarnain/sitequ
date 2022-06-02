<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/assets/index3.html" class="brand-link">
        <img src="/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">SiTEQU</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-header">MENU</li>
                <li class="nav-item">
                    <a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{ Request::is('kriteria*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Kriteria
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/kriteria/juz"
                                class="nav-link {{ Request::is('kriteria/juz*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Juz</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/kriteria/surah"
                                class="nav-link {{ Request::is('kriteria/surah*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Surah</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/kriteria/tema"
                                class="nav-link  {{ Request::is('kriteria/tema*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tema</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/kriteria/golongan"
                                class="nav-link  {{ Request::is('kriteria/golongan*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Golongan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/browsing" class="nav-link {{ Request::is('browsing*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            Browsing
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/searching" class="nav-link {{ Request::is('searching*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-search"></i>
                        <p>
                            Searching
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/kuesioner" class="nav-link">
                        <i class="nav-icon fas fa-pen"></i>
                        <p>
                            Questionnaire
                        </p>
                    </a>
                </li>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
