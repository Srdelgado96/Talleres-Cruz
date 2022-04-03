<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Talleres Cruz</title>
    <!-- ICONOS FREE FONAWESSOME -->
    <script src="https://kit.fontawesome.com/8261f1f84b.js" crossorigin="anonymous"></script>
    <!-- base:css -->
    <link rel="stylesheet" href="vendors/typicons/typicons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="assets/img/favicon.png" />
    



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
                    <a class="navbar-brand brand-logo" href="index.html"><img src="images/logotaller.png"
                            alt="logo" style="width: 99rem;"></a>
                    <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logoRecodatletra.png"
                            alt="logo" /></a>
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                        <span class="typcn typcn-th-menu"></span>
                    </button>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end ">
                <ul class="navbar-nav mr-lg-2">
                    <li class="nav-item nav-profile">
                    <li class="nav-item nav-profile" style="display: flex !important;">
                        @yield('pagActual')
                        {{-- <span class="nav-profile-name" style="font-size: 140%;">Pag Actual</span> --}}
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
                          
                        {{-- SETINGS POSIBLE PARA CAMBIAR NOMBRE --}}
                        {{-- <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-warning">
                                 
                                        <i class="fa-solid fa-gear mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-normal">Settings</h6>
                                </div>
                            </a> --}}
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-danger">
                                        <i class="fa-solid fa-power-off mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
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
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">
                            <i class="fa-solid fa-chart-line menu-icon"></i>
                            <span class="menu-title">Resumen Global</span>

                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">
                            <i class="fa-solid fa-chart-bar menu-icon"></i>
                            <span class="menu-title">Resumen Corporativo</span>

                        </a>
                    </li>
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
                                        href="pages/ui-features/buttons.html"><i
                                            class="fa-solid fa-users-line menu-icon"></i>Empleados</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="pages/ui-features/dropdowns.html"><img src="images/llaveazul.png"
                                            style="margin-right: 7%;width: 6%;"> Llaveros</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="pages/ui-features/typography.html"><i
                                            class="fa-solid fa-user-graduate menu-icon"></i>Categorías Profesionales</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="pages/ui-features/buttons.html"><i
                                            class="fa-solid fa-hand-holding-dollar menu-icon"></i>Valoración de
                                        Horas</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="pages/ui-features/dropdowns.html"><i
                                            class="fa-solid fa-warehouse menu-icon"></i>Centro de Trabajos</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="pages/ui-features/typography.html"><i
                                            class="fa-solid fa-tablet-screen-button menu-icon"></i>Asig Terminal Centro
                                        de Trabajo</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#zonas" aria-expanded="false"
                            aria-controls="form-elements">
                            <i class="fa-solid fa-border-none menu-icon"></i>
                            <span class="menu-title">Zona / Variedad <br> Envases / Tareas</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="zonas">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link"
                                        href="pages/forms/basic_elements.html"><i
                                            class="fa-solid fa-border-none menu-icon"></i>Zonas</a></li>
                                <li class="nav-item"><a class="nav-link"
                                        href="pages/forms/basic_elements.html"><i
                                            class="fa-solid fa-code-fork menu-icon"></i>Variedades</a></li>
                                <li class="nav-item"><a class="nav-link"
                                        href="pages/forms/basic_elements.html"><i
                                            class="fa-solid fa-box menu-icon"></i>Envases</a></li>
                                <li class="nav-item"><a class="nav-link"
                                        href="pages/forms/basic_elements.html"><i
                                            class="fa-solid fa-list-check menu-icon"></i>Tareas</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#fincas" aria-expanded="false"
                            aria-controls="charts">
                            <i class="fa-solid fa-signs-post menu-icon"></i>
                            <span class="menu-title">Fincas</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="fincas">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="pages/charts/chartjs.html"><i
                                            class="fa-solid fa-signs-post menu-icon"></i>Fincas</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="pages/charts/chartjs.html"><i
                                            class="fa-solid fa-location-crosshairs menu-icon"></i>Asignación de
                                        Fincas</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#resumenes" aria-expanded="false"
                            aria-controls="tables">
                            <i class="fa-solid fa-book-open menu-icon"></i>
                            <span class="menu-title">Resúmenes</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="resumenes">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="pages/tables/basic-table.html"><i
                                            class="fa-solid fa-people-group menu-icon"></i>Cuadrillas</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="pages/tables/basic-table.html"><i
                                            class="fa-solid fa-user-clock menu-icon"></i>Horas del Mes</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="pages/tables/basic-table.html">Horas Extras del Mes</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="pages/tables/basic-table.html">Horas del Mes de Trabajadores</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="pages/tables/basic-table.html"><i
                                            class="fa-solid fa-sack-dollar menu-icon"></i>Salarios del Mes</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="pages/tables/basic-table.html"><i
                                            class="fa-solid fa-user-clock menu-icon"></i>Salarios del Mes
                                        Desglosado</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="pages/tables/basic-table.html">Tareas Recolección</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="pages/tables/basic-table.html"><i
                                            class="fa-solid fa-square-pen menu-icon"></i>Informe Tareas, <br>Costes y
                                        Productividad</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="pages/tables/basic-table.html"><i
                                            class="fa-solid fa-book-bookmark menu-icon"></i>Resumen de Faenas</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#apuntes" aria-expanded="false"
                            aria-controls="icons">
                            <i class="fa-solid fa-folder-minus menu-icon"></i>
                            <span class="menu-title">Apuntes</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="apuntes">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html"><i
                                            class="fa-solid fa-cubes menu-icon"></i>Recolección</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html"><i
                                            class="fa-solid fa-user-clock menu-icon"></i>Jornada</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html"><i
                                            class="fa-solid fa-list-check menu-icon"></i>Tareas</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html"><i
                                            class="fa-solid fa-truck-moving menu-icon"></i>Trazabilidad del Envase</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html"><i
                                            class="fa-solid fa-user-clock menu-icon"></i>Jornada de Trabajadores</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html"><i
                                            class="fa-solid fa-user-large-slash menu-icon"></i>Ausencias</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html"> <i
                                            class="fa-solid fa-pen-clip menu-icon"></i>Días de Trabajo Firmados</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html"><i
                                            class="fa-solid fa-person-digging menu-icon"></i>Faenas</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#maps" aria-expanded="false"
                            aria-controls="auth">
                            <i class="fa-solid fa-map-location-dot menu-icon"></i>
                            <span class="menu-title">Mapas</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="maps">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html">
                                        Geolocalización </a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="pages/samples/register.html"> Geolocalización de Recogidas </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html">
                                        Geolocalización de Tareas </a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="pages/samples/register.html"> Estudio Visual de Discrepancias </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html">
                                        Discrepancias </a></li>

                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.html">
                            <i class="fa-solid fa-gears menu-icon"></i>
                            <span class="menu-title">Configuración Global</span>

                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#manuales" aria-expanded="false"
                            aria-controls="auth">
                            <i class="fa-solid fa-book-atlas menu-icon"></i>
                            <span class="menu-title">Manuales</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="manuales">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="pages/samples/error-404.html"><i
                                            class="fa-solid fa-book menu-icon"></i>Manual Reducido Recodat </a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="pages/samples/error-500.html"> <i
                                            class="fa-solid fa-book menu-icon"></i>Manual Geoloalización </a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="pages/samples/error-500.html"> <i
                                            class="fa-solid fa-book menu-icon"></i>Manual Recodat </a></li>

                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#usuarios" aria-expanded="false"
                            aria-controls="error">
                            <i class="fa-solid fa-users-gear menu-icon"></i>
                            <span class="menu-title">Usuarios</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="usuarios">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="pages/samples/error-404.html"><i
                                            class="fa-solid fa-user-check menu-icon"></i>Gestión Perfiles</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="pages/samples/error-500.html"><i
                                            class="fa-solid fa-users-gear menu-icon"></i>Gestión Usuarios </a></li>

                            </ul>
                        </div>
                    </li>

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
                                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ©
                                    2022 Todos los derechos reservados.</span>
                                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center text-muted"><a
                                        href="https://www.infonetconsultores.com/" class="text-muted"
                                        target="_blank">InfonetConsultores</a></span>
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
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="js/dashboard.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" />
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
 
                            @yield('jspagina')
    <!-- End custom js for this page-->
</body>

</html>
