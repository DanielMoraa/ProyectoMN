<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto/Model/OfertasModel.php";

    function ConsultarOfertas($estado)
    {
        return ConsultarOfertasModel($estado);
    }

    function ConsultarOfertasPopulares()
    {
        return ConsultarOfertasPopularesModel();
    }

    function ConsultarOferta($id)
    {
        $resultado = ConsultarOfertaModel($id);
        return mysqli_fetch_array($resultado);
    }

    if(isset($_POST["btnCrearOferta"]))
    {
        $puesto = $_POST["txtPuesto"];
        $salario = $_POST["txtSalario"];
        $horario = $_POST["txtHorario"];
        $imagen = '../Img/' . $_FILES["txtImagen"]["name"];

        $origen = $_FILES["txtImagen"]["tmp_name"];
        $destino = $_SERVER["DOCUMENT_ROOT"] . '/Proyecto/View/Img/' . $_FILES["txtImagen"]["name"];
        copy($origen,$destino);

        $resultado = CrearOfertaModel($puesto,$salario,$horario,$imagen);

        if($resultado == true)
        {
            header('location: ../../View/Ofertas/consultarOfertas.php');
        }
        else
        {
            $_POST["Message"] = "La oferta no fue registrada correctamente";
        }
    }

    if(isset($_POST["btnActualizarOferta"]))
    {
        $id = $_POST["txtId"];
        $puesto = $_POST["txtPuesto"];
        $salario = $_POST["txtSalario"];
        $horario = $_POST["txtHorario"];
        $estado = $_POST["txtEstado"];
        $imagen = "";

        if($_FILES["txtImagen"]["name"] != "")
        {
            $imagen = '../Img/' . $_FILES["txtImagen"]["name"]; 

            $origen = $_FILES["txtImagen"]["tmp_name"];
            $destino = $_SERVER["DOCUMENT_ROOT"] . '/Proyecto/View/Img/' . $_FILES["txtImagen"]["name"];
            copy($origen,$destino);
        }

        $resultado = ActualizarOfertaModel($id,$puesto,$salario,$horario,$estado,$imagen);

        if($resultado == true)
        {
            header('location: ../../View/Ofertas/consultarOfertas.php');
        }
        else
        {
            $_POST["Message"] = "La oferta no fue actualizada correctamente";
        }
    }    

    ?>