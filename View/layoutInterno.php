<?php

    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }

    function BarraNavegacion()
    {
        $usuario = "";
        if(isset($_SESSION["NombreUsuario"]))
        {
            $usuario = $_SESSION["NombreUsuario"];
        }

        $nombrePerfil = "";
        if(isset($_SESSION["NombrePerfil"]))
        {
            $nombrePerfil = $_SESSION["NombrePerfil"];
        }

        echo '<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>' .

                    $nombrePerfil

                    . '<ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600">' . $usuario . '</span>
                                <img class="img-profile rounded-circle"
                                    src="../Img/undraw_profile.svg">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Seguridad
                                </a>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Salir
                                </a>
                                
                            </div>
                        </li>

                    </ul>

                </nav>';
    }

    function MenuNavegacion()
    {
        echo '<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-text mx-3">Proyecto MN</div>
        </a>

        <hr class="sidebar-divider my-0">';

        if(isset($_SESSION["IdPerfil"]) && $_SESSION["IdPerfil"] == "1")
        {
            echo '<li class="nav-item">
                    <a class="nav-link" href="../Puestos/consultarPuestos.php">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Mant. Puestos</span></a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="../Ofertas/consultarOfertas.php">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Mant. Ofertas</span></a>
                </li>';
        }
        else
        {
            echo '<li class="nav-item">
                    <a class="nav-link" href="index.html">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Ofertas</span></a>
                </li>';
        }

        echo '<hr class="sidebar-divider">
        
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>';
    }

    function PrintCss()
    {
        echo '<head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <meta name="description" content="">
                <meta name="author" content="">

                <title>Proyecto MN</title>
                <link href="../Styles/all.min.css" rel="stylesheet" type="text/css">
                <link href="../Styles/sb-admin-2.min.css" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
            </head>';   
    }

    function PrintScript()
    {
        echo '<script src="../Scripts/jquery.min.js"></script>
              <script src="../Scripts/bootstrap.bundle.min.js"></script>
              <script src="../Scripts/jquery.easing.min.js"></script>
              <script src="../Scripts/sb-admin-2.min.js"></script>';
    }

    function PrintFooter()
    {
        echo '<footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>';
    }

?>