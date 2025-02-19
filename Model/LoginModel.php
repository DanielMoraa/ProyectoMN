<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto/Model/BaseDatosModel.php";

    function RegistrarCuentaModel($identificacion,$nombre,$correo,$contrasenna)
    {
        try 
        {
            $context = AbrirBaseDatos();

            $sentencia = "CALL SP_RegistrarCuenta('$identificacion','$nombre','$correo','$contrasenna')";
            $resultado = $context -> query($sentencia);

            CerrarBaseDatos($context);
            return $resultado;
        } 
        catch (Exception $error) 
        {
            return false;
        }
        
    }

    function IniciarSesionModel($identificacion,$contrasenna)
    {
        try
        {
            $context = AbrirBaseDatos();

            $sentencia = "CALL SP_IniciarSesion('$identificacion','$contrasenna')";
            $resultado = $context -> query($sentencia);
    
            CerrarBaseDatos($context);
            return $resultado;
        }
        catch(Exception $error)
        {
            return null;
        }
        
    }

?>