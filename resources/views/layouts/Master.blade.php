<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Talleres Cruz</title>
    <!-- ICONOS FREE FONAWESSOME -->
    <script src="https://kit.fontawesome.com/8261f1f84b.js" crossorigin="anonymous"></script>

    <!-- base:css -->
    <link rel="stylesheet" href="{{ secure_asset('vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ secure_asset('css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ secure_asset('images/logo-taller-mini.png') }}" />


</head>

<body>
    <div class="row" id="proBanner">
        <div class="col-12">

        </div>
    </div>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
                <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
                    @if (isset(Auth::user()->rol_id))
                        <a class="navbar-brand brand-logo" href="/home"><img
                                src="{{ secure_asset('images/logotaller.png') }}" alt="logo"
                                style="width: 11rem;height: 5rem !important;"></a>
                    @else
                        <a class="navbar-brand brand-logo" href="/"><img
                                src="{{ secure_asset('images/logotaller.png') }}" alt="logo"
                                style="width: 11rem;height: 5rem !important;"></a>
                    @endif
                    <a class="navbar-brand brand-logo-mini" href="/"><img
                            src="{{ secure_asset('images/logo-taller-mini.png') }}" alt="logo" /></a>
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                        <span class="typcn typcn-th-menu"></span>
                    </button>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end ">
                <ul class="navbar-nav mr-lg-2">
                    <li class="nav-item nav-profile">
                    <li class="nav-item nav-profile" style="display: flex !important;">
                        <span class="nav-profile-name" style="font-size: 140%;"> {{ Session('pagActual') }}</span>


                    </li>
                    </a>
                    </li>

                </ul>
                <ul class="navbar-nav navbar-nav-right">


                    <li class="nav-item dropdown mr-0">
                        <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center"
                            id="notificationDropdown" href="#" data-toggle="dropdown">

                            <i class="fa-solid fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                            aria-labelledby="notificationDropdown">
                            @yield('usuarioRegistrado')

                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-warning">
                                        <i class="typcn typcn-cog-outline mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-normal">Settings</h6>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" f>
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-danger">
                                        <i class="fa-solid fa-power-off mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                    <h6 class="preview-subject font-weight-normal">Salir</h6>
                                </div>
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="typcn typcn-th-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">
            <!--EL DIV DE ABAJO ES EL QUE ESTA AL LADO DE LA PALABRA DE PAGINA ACTUAL-->
            <!-- <div class="navbar-links-wrapper d-flex align-items-stretch">
        
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item ml-0">
            <h4 class="mb-0">Dashboard</h4>
          </li>
          
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          
        </ul>
      </div> -->
        </nav>
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->

            <div id="right-sidebar" class="settings-panel">
                <i class="settings-close typcn typcn-times"></i>
                <ul class="nav nav-tabs" id="setting-panel" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab"
                            aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab"
                            aria-controls="chats-section">CHATS</a>
                    </li>
                </ul>
                <div class="tab-content" id="setting-content">

                    <!-- To do section tab ends -->
                    <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
                        <div class="d-flex align-items-center justify-content-between border-bottom">
                            <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
                            <small
                                class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See
                                All</small>
                        </div>

                    </div>
                    <!-- chat tab ends -->
                </div>
            </div>
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    @if (isset(Auth::user()->rol_id))
                        @if (Auth::user()->rol_id == 1)
                            <li class="nav-item">
                                <a class="nav-link" href="index.html">
                                    <i class="fa-solid fa-chart-line menu-icon"></i>
                                    <span class="menu-title">Resumen Global</span>

                                </a>
                            </li>
                        @endif


                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('Averias.index') }}">
                                <i class="fa-solid fa-screwdriver-wrench menu-icon"></i>
                                <span class="menu-title">Averias</span>

                            </a>
                        </li>
                        @if (Auth::user()->rol_id == 1)
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#empleados" aria-expanded="false"
                                    aria-controls="ui-basic">
                                    <i class="fa-solid fa-users-line menu-icon"></i>
                                    <span class="menu-title">Empleados</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="collapse" id="empleados">
                                    <ul class="nav flex-column sub-menu">
                                        <li class="nav-item"> <a class="nav-link"
                                                href="{{ route('Empleados.index') }}"><i
                                                    class="fa-solid fa-users-line menu-icon"></i>Empleados</a></li>
                                        <li class="nav-item"> <a class="nav-link"
                                                href="{{ route('Empleados.create') }}"><i
                                                    class="fa-solid fa-user-plus menu-icon"></i> Nuevo Empleado</a></li>

                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#clientes" aria-expanded="false"
                                    aria-controls="charts">
                                    <i class="fa-solid fa-people-group menu-icon"></i>
                                    <span class="menu-title">Clientes</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="collapse" id="clientes">
                                    <ul class="nav flex-column sub-menu">
                                        <li class="nav-item"> <a class="nav-link"
                                                href="{{ route('Clientes.index') }}"><i
                                                    class="fa-solid fa-people-group menu-icon"></i>Clientes</a></li>
                                        <li class="nav-item"> <a class="nav-link"
                                                href="{{ route('Clientes.create') }}"><i
                                                    class="fa-solid fa-person-circle-plus menu-icon"></i>Nuevo
                                                Cliente</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#productos" aria-expanded="false"
                                    aria-controls="icons">
                                    <i class="fa-solid fa-boxes-stacked menu-icon"></i>
                                    <span class="menu-title">Productos</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="collapse" id="productos">
                                    <ul class="nav flex-column sub-menu">
                                        <li class="nav-item"> <a class="nav-link"
                                                href="{{ route('Productos.index') }}"><i
                                                    class="fa-solid fa-cubes menu-icon"></i>Productos</a></li>
                                        <li class="nav-item"> <a class="nav-link"
                                                href="{{ route('Productos.create') }}"><i
                                                    class="fa-solid fa-dolly menu-icon"></i>Nuevo Producto</a></li>

                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#facturas" aria-expanded="false"
                                    aria-controls="auth">
                                    <i class="fa-solid fa-folder-open menu-icon"></i>
                                    <span class="menu-title">Facturas</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="collapse" id="facturas">
                                    <ul class="nav flex-column sub-menu">
                                        <li class="nav-item"> <a class="nav-link"
                                                href="{{ route('Facturas.index') }}"><i
                                                    class="fa-solid fa-folder-closed menu-icon"></i> Facturas </a></li>
                                        <li class="nav-item"> <a class="nav-link"
                                                href="{{ route('Facturas.create') }}"><i
                                                    class="fa-solid fa-file-circle-plus menu-icon"></i>Nueva
                                                Factura</a>
                                        </li>


                                    </ul>
                                </div>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#vehiculos"
                                    aria-expanded="false" aria-controls="auth">
                                    <i class="fa-solid fa-car menu-icon"></i>
                                    <span class="menu-title">Veh??culos</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="collapse" id="vehiculos">
                                    <ul class="nav flex-column sub-menu">

                                        <li class="nav-item"> <a class="nav-link"
                                                href="{{ route('Vehiculos.index') }}"><i
                                                    class="fa-solid fa-car menu-icon"></i>Veh??culos </a></li>
                                        <li class="nav-item"> <a class="nav-link"
                                                href="{{ route('Vehiculos.create') }}"><i
                                                    class="fa-solid fa-car-on menu-icon"></i>Nuevo Veh??culo</a></li>


                                    </ul>
                                </div>
                            </li>
                        @endif
                    @endif
                    @if (Session('soyCliente') == 'soyCliente')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('areaClienteAverias') }}">
                                <i class="fa-solid fa-screwdriver-wrench menu-icon"></i>
                                <span class="menu-title">Mis Averias</span>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('areaClienteFacturas') }}">
                                <i class="fa-solid fa-folder-open menu-icon"></i>
                                <span class="menu-title">Mis Facturas</span>

                            </a>
                        </li>
                    @endif

                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    @yield('principal')

                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ??
                                    <script>
                                        document.write(new Date().getFullYear())
                                    </script> Todos los derechos reservados. Creado por: <a
                                        href="https://linkedin.com/in/alejandro-delgado-garrido" class="text-muted"
                                        target="_blank" style="color:blue !important">Alejandro Delgado Garrido</a>
                                </span>

                            </div>
                        </div>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- base:js -->
    <script src="{{ secure_asset('vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="{{ secure_asset('vendors/chart.js/Chart.min.js') }}"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ secure_asset('js/off-canvas.js') }}"></script>
    <script src="{{ secure_asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ secure_asset('js/template.js') }}"></script>
    <script src="{{ secure_asset('js/settings.js') }}"></script>
    <script src="{{ secure_asset('js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ secure_asset('js/dashboard.js') }}"></script>
    {{-- CDN DE SWEET ALERT --}}


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/selectize@0.12.6/dist/js/standalone/selectize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/algoliasearch@3.30.0/dist/algoliasearchLite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/instantsearch.js@beta"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/instantsearch.css@7.1.0/themes/algolia.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/selectize@0.12.6/dist/css/selectize.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    @yield('jspagina')
    <!-- End custom js for this page-->
</body>

</html>
