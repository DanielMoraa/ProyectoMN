<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto/Model/OfertasUsuarioModel.php";

    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }

    function ConsultarOfertasUsuario($Id)
    {
        return ConsultarOfertasUsuarioModel($Id);
    }

    if(isset($_POST["btnAplicarOfertaPopular"]))
    {
        $idOferta = $_POST["txtIdOferta"];
        $idUsuario = $_SESSION["IdUsuario"];

        $resultado = AplicarOfertaModel($idOferta,$idUsuario);

        if($resultado == true)
        {
            header('location: ../../View/Ofertas/consultarOfertasAplicadas.php');
        }
        else
        {
            $_POST["Message"] = "Su apllicación no fue registrada correctamente";
        }
    }
    

?>