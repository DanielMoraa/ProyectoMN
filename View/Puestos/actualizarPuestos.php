<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto/Controller/PuestosController.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto/View/layoutInterno.php";

    $datosPuesto = ConsultarPuesto($_GET["q"]);
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
                                    <input type="hidden" class="form-control"
                                    placeholder="id" id="txtId" name="txtId" maxlength="50" required 
                                    value="<?php echo $datosPuesto["Id"] ?>">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control"
                                    placeholder="Nombre" id="txtNombre" name="txtNombre" maxlength="50" required 
                                    value="<?php echo $datosPuesto["Nombre"] ?>">
                                </div>
                
                                <div class="form-group">
                                    <textarea class="form-control"
                                        placeholder="Descripción" id="txtDescripcion" name="txtDescripcion" maxlength="255" rows="8" required><?php echo $datosPuesto["Descripcion"] ?></textarea>
                                </div>

                                <input type="submit" class="btn btn-danger" style="width: 200px;" value="Procesar"
                                        id="btnActualizarPuesto" name="btnActualizarPuesto">
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