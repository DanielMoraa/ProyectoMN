<?php

    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }

    if(isset($_SESSION["IdPerfil"]) && $_SESSION["IdPerfil"] == "1")
    {
        header('location: estadisticas.php');
    }

    include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto/Controller/OfertasController.php";
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
                        $datos = ConsultarOfertasPopulares();

                        if($datos != null)
                        {
                            While($fila = mysqli_fetch_array($datos))
                            {
                                echo '
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="card">

                                            <div class="text-center">
                                                <img class="card-img-top" src="' . $fila["Imagen"] . '" alt="Imagen No Disponible"
                                                style="width:50%; height:175px;">
                                            </div>

                                            <div class="card-body">
                                                <h5 class="card-title"> #' . $fila["Id"] . ' ' . $fila["Nombre"] . '</h5>
                                                <p class="card-text">
                                                Cantidad de personas: ' . $fila["CANTIDAD_APLICACIONES"] . '<br/>
                                                Salario: $ ' . $fila["Salario"] . '<br/>
                                                Horario: ' . $fila["Horario"] . '<br/>
                                                Estado Actual : ' . $fila["DescripcionEstado"] . '</p>

                                                <div class="text-center">
                                                    <button id="btnAplicarOferta" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"
                                                        data-idOferta="' . $fila["Id"] . '"
                                                        data-nombre="' . $fila["Nombre"] . '"
                                                        data-desc="' . $fila["Descripcion"] . '"
                                                        data-salario="' . $fila["Salario"] . '"
                                                        data-horario="' . $fila["Horario"] . '">
                                                        APLICAR
                                                    </button>
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
            <script src="../Scripts/jquery.min.js"></script>
            <script src="../Scripts/aplicarOferta.js"></script>
        </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><label id="lblNombre"></label></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST">
                    
                    <div class="modal-body">
                        <input type="hidden" id="txtIdOferta" name="txtIdOferta">
                        <textarea id="txtDescripcion" rows="10" readonly="true" class="form-control" style="resize:none; background-color:transparent;"></textarea><br/>
                        Salario: $ <label id="lblSalario"></label> <br/>
                        Horario: <label id="lblHorario"></label> <br/>
                    </div>
                    <div class="modal-footer">
                        <button id="btnAplicarOfertaPopular" name="btnAplicarOfertaPopular" type="submit" class="btn btn-primary">Confirmar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <?php PrintScript(); ?>

</body>

</html>