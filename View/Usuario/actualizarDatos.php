<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto/Controller/UsuariosController.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto/View/layoutInterno.php";

    $datosUsuario = ConsultarUsuario($_SESSION["IdUsuario"]);
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
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Actualizar Puesto</h1>
                            </div>

                            <?php
                                if(isset($_POST["Message"]))
                                {
                                    echo '<div class="alert alert-warning Mensajes">' . $_POST["Message"] . '</div>';                                   
                                }
                            ?>
                            
                            <form action="" method="POST">

                                <div class="form-group">
                                    Identificación
                                    <input type="text" class="form-control form-control-user"
                                    id="txtIdentificacion" name="txtIdentificacion"
                                    onkeyup="ConsultarNombre()" required
                                    value="<?php echo $datosUsuario["Identificacion"] ?>">
                                </div>

                                <div class="form-group">
                                    Nombre
                                    <input type="text" class="form-control form-control-user"
                                    id="txtNombre" name="txtNombre" readonly
                                    value="<?php echo $datosUsuario["NombreUsuario"] ?>">
                                </div>

                                <div class="form-group">
                                    Correo
                                    <input type="email" class="form-control form-control-user"
                                        id="txtCorreo" name="txtCorreo" required
                                        value="<?php echo $datosUsuario["Correo"] ?>">
                                </div>
                                 
                                <input type="submit" class="btn btn-danger" style="width: 200px;" value="Procesar"
                                        id="btnActualizarDatos" name="btnActualizarDatos">
                            </form>

                        </div>
                    </div>
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