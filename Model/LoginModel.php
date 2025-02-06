<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto/Model/BaseDatosModel.php";

    function RegistrarCuentaModel($identificacion,$nombre,$correo,$contrasenna)
    {
        $context = AbrirBaseDatos();

        $sentencia = "CALL SP_RegistrarCuenta('$identificacion','$nombre','$correo','$contrasenna')";
        $resultado = $context -> query($sentencia);

        CerrarBaseDatos($context);
        return $resultado;
    }

    function IniciarSesionModel($identificacion,$contrasenna)
    {
        $context = AbrirBaseDatos();

        $sentencia = "CALL SP_IniciarSesion('$identificacion','$contrasenna')";
        $resultado = $context -> query($sentencia);

        CerrarBaseDatos($context);
        return $resultado;
    }

?>