<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto/Controller/OfertasUsuarioController.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto/View/layoutInterno.php";
?>

<!DOCTYPE html>
<html lang="en">

<?php PrintCss(); ?>

<body id="page-top">

    <div id="wrapper">

        <?php MenuNavegacion(); ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <?php BarraNavegacion(); ?>

                <div class="container-fluid">

                    <?php
                    if(isset($_POST["Message"]))
                    {
                        echo '<div class="alert alert-warning Mensajes">' . $_POST["Message"] . '</div>';                                   
                    }
                ?>

                    <div class="row">

                        <?php
                        $datos = ConsultarEstadisticas();

                        if($datos != null)
                        {
                            While($fila = mysqli_fetch_array($datos))
                            {
                                echo '
                                    <div class="col-xl-2 col-md-6 mb-4">
                                        <div class="card border-left-success shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">' 
                                                        . $fila["Descripcion"] . 
                                                        '</div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">' . $fila["Cantidad"] . ' Usuario(s)</div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';  
                            }
                        }
                    ?>

                    </div>


                    <div class="row">

                        <div class="col-10 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <div class="chartjs-size-monitor">
                                            <div class="chartjs-size-monitor-expand">
                                                <div class=""></div>
                                            </div>
                                            <div class="chartjs-size-monitor-shrink">
                                                <div class=""></div>
                                            </div>
                                        </div>
                                        <canvas id="myAreaChart" width="426" height="320"
                                            style="display: block; width: 426px; height: 320px;"
                                            class="chartjs-render-monitor"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <?php PrintFooter(); ?>
            <script src="../Scripts/jquery.min.js"></script>
            <script src="../Scripts/Chart.min.js"></script>
            <script src="../Scripts/chart-area-demo.js"></script>
        </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php PrintScript(); ?>

</body>

</html>