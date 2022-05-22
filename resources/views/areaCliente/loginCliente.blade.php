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
    <div class="container-scroller" id="fondo">
        <div class=" content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-center py-5 px-4 px-sm-5">
                        <div class="brand-logo">
                            <img src="{{ secure_asset('images/logotaller.png') }}" style="width: 101%;"
                                alt="logo" /></a>

                        </div>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                placeholder="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    {{-- <strong>{{ $message }}</strong> --}}
                                    <strong>Credenciales incorrecta</strong>
                                </span>
                            @enderror
                            <br>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Credenciales incorrecta</strong>
                                </span>
                            @enderror
                            {{-- <input class="btn btn-default btn-login" type="button" value="Login" onclick="loginAjax()"> --}}
                            <button type="submit" class="btn btn-info" style="margin:4%">
                                {{ __('Login') }}
                            </button>
                            <br>
                            @if (Route::has('password.request'))
                                <a href="javascript: showRegisterForm();">olvide la contraseña</a>
                                </a>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
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
</body>

</html>
