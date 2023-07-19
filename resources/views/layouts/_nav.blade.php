<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="profile-image">
                    <img src="/Melody/images/faces/face-miguel.jpg" alt="image" />
                </div>
                <div class="profile-name">
                    <p class="name">
                        {{ Auth::user()->name }}
                    </p>
                    <p class="designation">
                        {{ Auth::user()->email }}
                    </p>
                </div>
            </div>
        </li>
        @can('home')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fa fa-home menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
        @endcan

        <li class="nav-item">
            <a class="nav-link" href="{{ route('clients.index') }}">
                <i class="fas fa-users menu-icon"></i>
                <span class="menu-title">Clientes</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('sales.index') }}">
                <i class="fas fa-shopping-cart menu-icon"></i>
                <span class="menu-title">Ventas</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('providers.index') }}">
                <i class="fas fa-shopping-cart menu-icon"></i>
                <span class="menu-title">Proveedores</span>
            </a>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts1" aria-expanded="false"
                aria-controls="page-layouts">
                <i class="fab fa-trello menu-icon"></i>
                <span class="menu-title">Almacen</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts1">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item d-none d-lg-block"> <a class="nav-link"
                        href="{{ route('products.index') }}">Articulos</a></li>
                    
                    <li class="nav-item d-none d-lg-block"> <a class="nav-link"
                            href="{{ route('categories.index') }}">Categorias</a></li>
                </ul>
            </div>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts1" aria-expanded="false"
                aria-controls="page-layouts">
                <i class="fas fa-chart-line menu-icon"></i>
                <span class="menu-title">Almacén</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts1">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('products.index') }}">Articulos</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('categories.index') }}">Categorias</a>
                    </li>

                </ul>
            </div>
        </li>



        @can('users.index')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <i class="fas fa-user-tag menu-icon"></i>
                    <span class="menu-title">Usuarios</span>
                </a>
            </li>
        @endcan
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false"
                aria-controls="page-layouts">
                <i class="fas fa-chart-line menu-icon"></i>
                <span class="menu-title">Reportes</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('reports.day') }}">Reportes por Dia</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('reports.date') }}">Reportes por Fecha</a>
                    </li>

                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                <i class="fas fa-cogs menu-icon"></i>
                <span class="menu-title">Configuracion</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('business.index') }}">Empresa</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('printers.index') }}">Impresora</a></li>

                </ul>
            </div>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" href="pages/ui-features/popups.html">
                <i class="fas fa-minus-square menu-icon"></i>
                <span class="menu-title">Popups</span>
            </a>
        </li> --}}
        {{-- <li class="nav-item">
            <a class="nav-link" href="pages/ui-features/notifications.html">
                <i class="fas fa-bell menu-icon"></i>
                <span class="menu-title">Notifications</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false"
                aria-controls="icons">
                <i class="fa fa-stop-circle menu-icon"></i>
                <span class="menu-title">Icons</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/icons/flag-icons.html">Flag
                            icons</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/icons/font-awesome.html">Font
                            Awesome</a></li>
                    <li class="nav-item"> <a class="nav-link"
                            href="pages/icons/simple-line-icon.html">Simple line icons</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/icons/themify.html">Themify
                            icons</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#maps" aria-expanded="false"
                aria-controls="maps">
                <i class="fas fa-map-marker-alt menu-icon"></i>
                <span class="menu-title">Maps</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="maps">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/maps/mapeal.html">Mapeal</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/maps/vector-map.html">Vector
                            Map</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/maps/google-maps.html">Google
                            Map</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false"
                aria-controls="auth">
                <i class="fas fa-window-restore menu-icon"></i>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2
                        </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html">
                            Register </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html">
                            Register 2 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html">
                            Lockscreen </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false"
                aria-controls="error">
                <i class="fas fa-exclamation-circle menu-icon"></i>
                <span class="menu-title">Error pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="error">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404
                        </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500
                        </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false"
                aria-controls="general-pages">
                <i class="fas fa-file menu-icon"></i>
                <span class="menu-title">General Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank
                            Page </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/profile.html"> Profile
                        </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/faq.html"> FAQ </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/faq-2.html"> FAQ 2 </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/news-grid.html"> News
                            grid </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/timeline.html">
                            Timeline </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/search-results.html">
                            Search Results </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/portfolio.html">
                            Portfolio </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#apps" aria-expanded="false"
                aria-controls="apps">
                <i class="fas fa-briefcase menu-icon"></i>
                <span class="menu-title">Apps</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="apps">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/apps/email.html"> Email </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/apps/calendar.html"> Calendar
                        </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/apps/todo.html"> Todo </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/apps/gallery.html"> Gallery
                        </a></li>
                </ul>`
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#e-commerce" aria-expanded="false"
                aria-controls="e-commerce">
                <i class="fas fa-shopping-cart menu-icon"></i>
                <span class="menu-title">E-commerce</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="e-commerce">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/invoice.html"> Invoice
                        </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/pricing-table.html">
                            Pricing Table </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/orders.html"> Orders
                        </a></li>
                </ul>
            </div>
        </li> --}}
        {{-- <li class="nav-item">
            <a class="nav-link" href="pages/documentation.html">
                <i class="far fa-file-alt menu-icon"></i>
                <span class="menu-title">Documentation</span>
            </a>
        </li> --}}
    </ul>
</nav>
