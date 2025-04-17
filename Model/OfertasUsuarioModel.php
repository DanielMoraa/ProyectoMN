<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto/Model/BaseDatosModel.php";

    function ConsultarOfertasUsuarioModel($Id)
    {
        try
        {
            $context = AbrirBaseDatos();

            $sentencia = "CALL SP_ConsultarOfertasUsuario('$Id')";
            $resultado = $context -> query($sentencia);
    
            CerrarBaseDatos($context);

            return $resultado;
        }
        catch(Exception $error)
        {
            return null;
        }        
    }

    function AplicarOfertaModel($idOferta,$idUsuario)
    {
        try
        {
            $context = AbrirBaseDatos();

            $sentencia = "CALL SP_AplicarOferta('$idOferta','$idUsuario')";
            $resultado = $context -> query($sentencia);
    
            CerrarBaseDatos($context);

            return $resultado;
        }
        catch(Exception $error)
        {
            return null;
        }        
    }

    function ConsultarEstadosModel()
    {
        try
        {
            $context = AbrirBaseDatos();

            $sentencia = "CALL SP_ConsultarEstados()";
            $resultado = $context -> query($sentencia);
    
            CerrarBaseDatos($context);

            return $resultado;
        }
        catch(Exception $error)
        {
            return null;
        }        
    }

    function ActualizarEstadoAplicacionModel($id,$estado)
    {
        try
        {
            $context = AbrirBaseDatos();

            $sentencia = "CALL SP_ActualizarEstadoAplicacion('$id','$estado')";
            $resultado = $context -> query($sentencia);
    
            CerrarBaseDatos($context);

            return $resultado;
        }
        catch(Exception $error)
        {
            return false;
        }        
    }  

?>