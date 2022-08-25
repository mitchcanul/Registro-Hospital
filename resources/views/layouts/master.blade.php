<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="token" id="token" value="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Clean Blog - Start Bootstrap Theme</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="js/vue.min.js"></script>
    <script src="js/vue-resource.min.js"></script>
    <link rel="stylesheet" href="dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="css/ionicons.min.css">
    <!--  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
    <script src="js/all.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
        rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.html">Hospital Infantil</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    {{-- <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.html">Home</a></li> --}}
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"
                            href="{{ url('pacientes') }}">Pacientes</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"
                            href="{{ url('hospital') }}">Hospital</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ url('ciudad') }}">Ciudad</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Hospital Infantil</h1>
                        <!-- <span class="subheading">A Blog Theme by Start Bootstrap</span> -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <div>
        <!--Content Header (Page header) -->

        <!-- /.content-header -->

        <!-- Main content -->
        @yield('contenido')
        <!-- /.content -->
    </div>

    <!-- Footer-->
    <footer class="border-top">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <ul class="list-inline text-center">



                    </ul>
                    <div class="small text-center text-muted fst-italic">Copyright &copy; Nativo Digital 2022</div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    @stack('scripts')
    <script src="js/jquery-3.5.0.min.js"></script>
    <!-- <script src="js/popper.min.js"></script> -->
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/Chart.js"></script>
    <script src="js/modal.js"></script>
    <script src="js/sweetalert2.all.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <input type="hidden" name="route" value="{{ url('/') }}">
</body>

</html>
