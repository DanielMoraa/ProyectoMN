<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto/Model/LoginModel.php";

    if(isset($_POST["btnRegistrarCuenta"]))
    {
        $identificacion = $_POST["txtIdentificacion"];
        $nombre = $_POST["txtNombre"];
        $correo = $_POST["txtCorreo"];
        $contrasenna = $_POST["txtContrasenna"];

        $resultado = RegistrarCuentaModel($identificacion,$nombre,$correo,$contrasenna);

        if($resultado == true)
        {
            header('location: ../../View/Login/login.php');
        }
        else
        {
            $_POST["Message"] = "Su información no fue registrada correctamente";
        }
    }

    if(isset($_POST["btnIniciarSesion"]))
    {
        $identificacion = $_POST["txtIdentificacion"];
        $contrasenna = $_POST["txtContrasenna"];

        $resultado = IniciarSesionModel($identificacion,$contrasenna);

        if($resultado != null && $resultado -> num_rows > 0)
        {
            header('location: ../../View/Login/home.php');
        }
        else
        {
            $_POST["Message"] = "Su información no fue validada correctamente";
        }
    }

?>