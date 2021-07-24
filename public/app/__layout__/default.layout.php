
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://localhost:8181/public/boot/concept-master/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost:8181/public/boot/concept-master/assets/vendor/fonts/circular-std/style.css">
    <link rel="stylesheet" href="http://localhost:8181/public/boot/concept-master/assets/libs/css/style.css">
    <link rel="stylesheet" href="http://localhost:8181/public/boot/concept-master/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">


    <!-- jquery 3.3.1 AND libs -->
    <script src="http://localhost:8181/public/boot/concept-master/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- gerador de parcelas -->
    <script src="http://localhost:8181/public/assets/libs/gerador-de-parcela/generateParcel.js"></script>
    <title>Imob Gestor</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.html">Imob Gestor</a>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>

                            <a class="nav-link" href="index.php"><i class="fab fa-houzz"></i> Inicio</a>

                            <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fas fa-plus"></i> Cadastros <span class="badge badge-success">6</span></a>
                                <div id="submenu-1" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="?fld=cadastro&pg=locatario">Locatário (cliente)</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="?fld=cadastro&pg=locador">Locador (proprietário)</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="?fld=cadastro&pg=imovel">Imóvel</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-list-ul"></i>Lista</a>
                                <div id="submenu-2" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="?fld=lista&pg=locatario">Locatário (cliente)</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="?fld=lista&pg=locador">Locador (proprietário)</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="?fld=lista&pg=imovel">Imóvel</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="?fld=lista&pg=contrato">Contrato</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-fw fa-chart-pie"></i>Financeiro</a>
                                <div id="submenu-3" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="?fld=lista&pg=mensalidade">Mensalidade</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="?fld=lista&pg=repasse">Repasses</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Gestor imobiliário</h2>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    {{dynamicArea}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- bootstap bundle js -->
    <script src="http://localhost:8181/public/boot/concept-master/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="http://localhost:8181/public/boot/concept-master/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="http://localhost:8181/public/boot/concept-master/assets/libs/js/main-js.js"></script>
</body>

</html>
