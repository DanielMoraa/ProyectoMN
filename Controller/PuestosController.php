<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto/Model/PuestosModel.php";

    function ConsultarPuestos()
    {
        return ConsultarPuestosModel();
    }

    function ConsultarPuesto($id)
    {
        $resultado = ConsultarPuestoModel($id);
        return mysqli_fetch_array($resultado);
    }

    if(isset($_POST["btnCrearPuesto"]))
    {
        $nombre = $_POST["txtNombre"];
        $descripcion = $_POST["txtDescripcion"];

        $resultado = CrearPuestoModel($nombre,$descripcion);

        if($resultado == true)
        {
            header('location: ../../View/Puestos/consultarPuestos.php');
        }
        else
        {
            $_POST["Message"] = "El puesto no fue registrado correctamente";
        }
    }

    if(isset($_POST["btnActualizarPuesto"]))
    {
        $id = $_POST["txtId"];
        $nombre = $_POST["txtNombre"];
        $descripcion = $_POST["txtDescripcion"];

        $resultado = ActualizarPuestoModel($id,$nombre,$descripcion);

        if($resultado == true)
        {
            header('location: ../../View/Puestos/consultarPuestos.php');
        }
        else
        {
            $_POST["Message"] = "El puesto no fue actualizado correctamente";
        }
    }    

    ?>