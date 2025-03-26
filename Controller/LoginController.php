<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto/Model/LoginModel.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto/Controller/UtilitariosController.php";

    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }

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
            $datos = mysqli_fetch_array($resultado);
            $_SESSION["IdUsuario"] = $datos["Id"];
            $_SESSION["CorreoUsuario"] = $datos["Correo"];
            $_SESSION["NombreUsuario"] = $datos["NombreUsuario"];
            $_SESSION["NombrePerfil"] = $datos["NombrePerfil"];
            $_SESSION["IdPerfil"] = $datos["IdPerfil"];

            header('location: ../../View/Login/home.php');
        }
        else
        {
            $_POST["Message"] = "Su información no fue validada correctamente";
        }
    }

    if(isset($_POST["btnSalir"]))
    {
        session_destroy();
        header('location: ../../View/Login/login.php');
    }

    if(isset($_POST["btnRecuperarCuenta"]))
    {
        $correo = $_POST["txtCorreo"];

        $resultado = ValidarUsuarioCorreoModel($correo);

        if($resultado != null && $resultado -> num_rows > 0)
        {
            $datos = mysqli_fetch_array($resultado);
            $codigo = GenerarCodigo();

            //Actualizar Contraseña por el código
            $resultadoActualizacion = RecuperarContrasennaModel($datos["Id"], $codigo);

            //Enviamos el correo
            $contenido = "<html><body>
            Estimado(a) " . $datos["NombreUsuario"] . "<br/><br/>
            Se ha generado el siguiente código de seguridad: <b>" . $codigo . "</b><br/>
            Recuerde realizar el cambio de contraseña una vez que ingrese al sistema. </b><br/>";

            $resultadoCorreo = EnviarCorreo("Recuperar Contraseña",$contenido, $datos["Correo"]);
        
            if($resultadoCorreo == true)
            {
                header('location: ../../View/Login/login.php');
            }
            else
            {
                $_POST["Message"] = "No se pudo recuperar el acceso al sistema correctamente";
            }
        
        }
    }

    function GenerarCodigo() {
        $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 6; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }

?>