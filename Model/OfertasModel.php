<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto/Model/BaseDatosModel.php";

    function ConsultarOfertasModel($estado)
    {
        try
        {
            $context = AbrirBaseDatos();

            $sentencia = "CALL SP_ConsultarOfertas('$estado')";
            $resultado = $context -> query($sentencia);
    
            CerrarBaseDatos($context);
            return $resultado;
        }
        catch(Exception $error)
        {
            return null;
        }        
    }

    function ConsultarOfertasPopularesModel()
    {
        try
        {
            $context = AbrirBaseDatos();

            $sentencia = "CALL SP_ConsultarOfertasPopulares()";
            $resultado = $context -> query($sentencia);
    
            CerrarBaseDatos($context);
            return $resultado;
        }
        catch(Exception $error)
        {
            return null;
        }        
    }

    function ConsultarOfertaModel($id)
    {
        try
        {
            $context = AbrirBaseDatos();

            $sentencia = "CALL SP_ConsultarOferta('$id')";
            $resultado = $context -> query($sentencia);
    
            CerrarBaseDatos($context);
            return $resultado;
        }
        catch(Exception $error)
        {
            return null;
        }        
    }

    function CrearOfertaModel($puesto,$salario,$horario,$imagen)
    {
        try 
        {
            $context = AbrirBaseDatos();

            $sentencia = "CALL SP_CrearOferta('$puesto','$salario','$horario','$imagen')";
            $resultado = $context -> query($sentencia);

            CerrarBaseDatos($context);
            return $resultado;
        } 
        catch (Exception $error) 
        {
            return false;
        }        
    }    

    function ActualizarOfertaModel($Id,$puesto,$salario,$horario,$estado,$imagen)
    {
        try 
        {
            $context = AbrirBaseDatos();

            $sentencia = "CALL SP_ActualizarOferta('$Id','$puesto','$salario','$horario','$estado','$imagen')";
            $resultado = $context -> query($sentencia);

            CerrarBaseDatos($context);
            return $resultado;
        } 
        catch (Exception $error) 
        {
            return false;
        }        
    } 

    ?>