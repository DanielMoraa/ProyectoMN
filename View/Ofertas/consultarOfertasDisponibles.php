<?php
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

                    <h5>Consulta de Ofertas Disponibles</h5>

                    <br /><br />

                    <?php
                                        if(isset($_POST["Message"]))
                                        {
                                            echo '<div class="alert alert-warning Mensajes">' . $_POST["Message"] . '</div>';                                   
                                        }
                                    ?>

                    <table id="example" class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Puesto</th>
                                <th>Cantidad de personas</th>
                                <th>Salario</th>
                                <th>Horario</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $datos = ConsultarOfertas(true);

                                while($fila = mysqli_fetch_array($datos))
                                {
                                    echo "<tr>";
                                    echo "<td>" . $fila["Id"] . "</td>";
                                    echo "<td>" . $fila["Nombre"] . "</td>";
                                    echo "<td>" . $fila["CANTIDAD_APLICACIONES"] . "</td>";
                                    echo "<td> $ " . $fila["Salario"] . "</td>";
                                    echo "<td>" . $fila["Horario"] . "</td>";
                                    echo '<td>
                                            <button id="btnAplicarOferta" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"
                                                        data-idOferta="' . $fila["Id"] . '"
                                                        data-nombre="' . $fila["Nombre"] . '"
                                                        data-desc="' . $fila["Descripcion"] . '"
                                                        data-salario="' . $fila["Salario"] . '"
                                                        data-horario="' . $fila["Horario"] . '">
                                                        APLICAR
                                                    </button>
                                            </td>';
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>

            <?php PrintFooter(); ?>

        </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        <textarea id="txtDescripcion" rows="10" readonly="true" class="form-control"
                            style="resize:none; background-color:transparent;"></textarea><br />
                        Salario: $ <label id="lblSalario"></label> <br />
                        Horario: <label id="lblHorario"></label> <br />
                    </div>
                    <div class="modal-footer">
                        <button id="btnAplicarOfertaPopular" name="btnAplicarOfertaPopular" type="submit"
                            class="btn btn-primary">Confirmar</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <?php PrintScript(); ?>
    <script src="../Scripts/jquery.min.js"></script>
    <script src="../Scripts/aplicarOferta.js"></script>
    <script>
    $(document).ready(function() {
        var table = new DataTable('#example', {
            language: {
                url: 'https://cdn.datatables.net/plug-ins/2.2.2/i18n/es-ES.json',
            },
            columnDefs: [{
                targets: "_all",
                className: "dt-left"
            }],
            order: [
                [2, "desc"],
                [3, "desc"]
            ]
        });
    });
    </script>

</body>

</html>