<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto/Controller/OfertasController.php";
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

                <h5>Consulta de Ofertas</h5>

                <div style="text-align:right; margin:10px;">
                    <a class="btn btn-outline-primary" href="agregarOfertas.php"><i class="fa fa-plus"></i> Agregar </a>
                </div>

                    <table id="example" class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Puesto</th>
                                <th>Descripción</th>
                                <th>Salario</th>
                                <th>Horario</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $datos = ConsultarOfertas(false);

                                while($row = mysqli_fetch_array($datos))
                                {
                                    echo "<tr>";
                                    echo "<td>" . $row["Id"] . "</td>";
                                    echo "<td>" . $row["Nombre"] . "</td>";
                                    echo "<td>" . $row["Descripcion"] . "</td>";
                                    echo "<td>" . $row["Salario"] . "</td>";
                                    echo "<td>" . $row["Horario"] . "</td>";
                                    echo "<td>" . $row["DescripcionEstado"] . "</td>";
                                    echo "<td><a href='actualizarOfertas.php?q=" . $row["Id"] . "'><i class='fa fa-edit'></i></td>";
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

    <?php PrintScript(); ?>
    <script>
    
        $(document).ready(function() {
            var table = new DataTable('#example', {
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/2.2.2/i18n/es-ES.json',
                },
                columnDefs: [
                    { targets: "_all", className: "dt-left" }
                ]
            });
        });

    </script>

</body>

</html>