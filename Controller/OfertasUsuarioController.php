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

        $datos = mysqli_fetch_array($resultado);

        if($datos["Resultado"] == true)
        {
            header('location: ../../View/Ofertas/consultarOfertasAplicadas.php');
        }
        else
        {
            $_POST["Message"] = "Ya se encuentra participando en la oferta #" . $idOferta;
        }
    }

    function ConsultarEstados()
    {
        return ConsultarEstadosModel();
    }

    if(isset($_POST["txtEstado"]))
    {
        $id = $_POST["txtId"];
        $estado = $_POST["txtEstado"];

        $resultado = ActualizarEstadoAplicacionModel($id,$estado);

        if($resultado == true)
        {
            header('location: ../../View/Ofertas/seguimientoOfertas.php');
        }
        else
        {
            $_POST["Message"] = "No se ha podido actualizar el estado de la participación #" . $id;
        }

    }
    

?>