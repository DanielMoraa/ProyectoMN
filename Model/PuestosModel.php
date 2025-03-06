<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto/Model/BaseDatosModel.php";

    function ConsultarPuestosModel()
    {
        try
        {
            $context = AbrirBaseDatos();

            $sentencia = "CALL SP_ConsultarPuestos()";
            $resultado = $context -> query($sentencia);
    
            CerrarBaseDatos($context);
            return $resultado;
        }
        catch(Exception $error)
        {
            return null;
        }        
    }

    function ConsultarPuestoModel($id)
    {
        try
        {
            $context = AbrirBaseDatos();

            $sentencia = "CALL SP_ConsultarPuesto('$id')";
            $resultado = $context -> query($sentencia);
    
            CerrarBaseDatos($context);
            return $resultado;
        }
        catch(Exception $error)
        {
            return null;
        }        
    }

    function CrearPuestoModel($nombre,$descripcion)
    {
        try 
        {
            $context = AbrirBaseDatos();

            $sentencia = "CALL SP_CrearPuesto('$nombre','$descripcion')";
            $resultado = $context -> query($sentencia);

            CerrarBaseDatos($context);
            return $resultado;
        } 
        catch (Exception $error) 
        {
            return false;
        }        
    }  

    function ActualizarPuestoModel($id,$nombre,$descripcion)
    {
        try 
        {
            $context = AbrirBaseDatos();

            $sentencia = "CALL SP_ActualizarPuesto('$id','$nombre','$descripcion')";
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