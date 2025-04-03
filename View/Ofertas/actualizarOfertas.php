<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto/Controller/OfertasController.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto/Controller/PuestosController.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto/View/layoutInterno.php";

    $datosOferta = ConsultarOferta($_GET["q"]);
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
                                <h1 class="h4 text-gray-900 mb-4">Actualizar Oferta</h1>
                            </div>

                            <?php
                                if(isset($_POST["Message"]))
                                {
                                    echo '<div class="alert alert-warning Mensajes">' . $_POST["Message"] . '</div>';                                   
                                }
                            ?>
                            
                            <form action="" method="POST" enctype="multipart/form-data">

                                <div class="form-group">
                                    <input type="hidden" class="form-control"
                                    placeholder="id" id="txtId" name="txtId" maxlength="50" required 
                                    value="<?php echo $datosOferta["Id"] ?>">
                                </div>

                                <div class="form-group">
                                    <select class="form-control" id="txtPuesto" name="txtPuesto" required>
                                        <?php
                                            $datos = ConsultarPuestos();

                                            echo "<option value=''>Seleccione</option>";
                                            while($row = mysqli_fetch_array($datos))
                                            {
                                                if($row["Id"] == $datosOferta["IdPuesto"])
                                                {
                                                    echo "<option selected value=" . $row["Id"] . ">" . $row["Nombre"] . "</option>";
                                                }
                                                else
                                                {
                                                    echo "<option value=" . $row["Id"] . ">" . $row["Nombre"] . "</option>";
                                                }                                                
                                            }
                                        ?>
                                    </select>
                                </div>
                
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                    placeholder="Salario" id="txtSalario" name="txtSalario" maxlength="11" required
                                    value="<?php echo $datosOferta["Salario"] ?>">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control"
                                    placeholder="Horario" id="txtHorario" name="txtHorario" maxlength="255" required
                                    value="<?php echo $datosOferta["Horario"] ?>">
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-9 col-md-7 col-sm-6">
                                           <input type="file" class="form-control" id="txtImagen" name="txtImagen" accept="image/png, image/jpg, image/jpeg">
                                        </div>
                                        <div class="col-lg-3 col-md-5 col-sm-6" style="margin-top:10px;">
                                            ¿Disponible? 
                                            <input type="checkbox" id="txtEstado" name="txtEstado" <?php echo $datosOferta["IndicadorEstado"] ?>>  
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <img class="card-img-top" src="<?php echo $datosOferta["Imagen"] ?>" alt="Imagen No Disponible"
                                    style="width:20%; height:175px;">
                                </div>

                                <input type="submit" class="btn btn-danger" style="width: 200px;" value="Procesar"
                                        id="btnActualizarOferta" name="btnActualizarOferta">
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