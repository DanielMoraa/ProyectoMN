<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto/Model/OfertasUsuarioModel.php";

    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }

    function ConsultarOfertasUsuario($Id)
    {
        return ConsultarOfertasUsuarioModel($Id);
    }

?>