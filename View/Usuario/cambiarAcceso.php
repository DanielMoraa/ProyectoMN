<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto/Controller/UsuariosController.php";
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
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Actualizar Contraseña</h1>
                            </div>

                            <?php
                                if(isset($_POST["Message"]))
                                {
                                    echo '<div class="alert alert-warning Mensajes">' . $_POST["Message"] . '</div>';                                   
                                }
                            ?>
                            
                            <form action="" method="POST">

                                <div class="form-group">
                                    Contraseña Actual
                                    <input type="password" class="form-control"
                                    id="txtContrasennaActual" name="txtContrasennaActual" maxlength="15" required>
                                </div>

                                <div class="form-group">
                                    Contraseña Nueva
                                    <input type="password" class="form-control"
                                    id="txtContrasennaNueva" name="txtContrasennaNueva" maxlength="15" required>
                                </div>

                                <div class="form-group">
                                    Confirmar Contraseña
                                    <input type="password" class="form-control"
                                    id="txtContrasennaConfirmar" name="txtContrasennaConfirmar" maxlength="15" required>
                                </div>
                
                                <input type="submit" class="btn btn-danger" style="width: 200px;" value="Procesar"
                                        id="btnActualizarContrasenna" name="btnActualizarContrasenna">
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