<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto/Controller/LoginController.php";
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
                    <div class="row">

                    <?php
                        $datos = ConsultarOfertasUsuario($_SESSION["IdUsuario"]);

                        if($datos != null)
                        {
                            While($fila = mysqli_fetch_array($datos))
                            {
                                echo '
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="card">

                                            <div class="text-center">
                                                <img class="card-img-top" src="' . $fila["Imagen"] . '" alt="Imagen No Disponible"
                                                style="width:40%; height:200px;">
                                            </div>

                                            <div class="card-body">
                                                <h5 class="card-title"> #' . $fila["IdOferta"] . ' ' . $fila["Nombre"] . '</h5>
                                                <p class="card-text">
                                                Salario: $ ' . $fila["Salario"] . '<br/>
                                                Horario:' . $fila["Horario"] . '<br/>
                                                Estado Actual: ' . $fila["DescripcionEstado"] . '</p>

                                                <div class="text-center">
                                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                                </div>
                                            </div>
                                    </div>
                                </div>';  
                            }
                        }
                    ?>
                    </div>

                </div>
            </div>

            <?php PrintFooter(); ?>

        </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php PrintScript(); ?>

</body>

</html>