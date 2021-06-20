<?php

require_once "../controladores/servicio.controlador.php";
require_once "../modelos/servicio.modelo.php";

class AjaxServicios
{

    /*Editar Cliente*/
    public $idServicio;

    public function ajaxEditarServicio()
    {

        $item = "codigo";
        $valor = $this->idServicio;

        $respuesta = ControladorServicios::ctrMostrarServicio($item, $valor);

        echo json_encode($respuesta);
    }

    /*mos cad Cliente*/
    public $id_v;

    public function ajaxMostrarSer()
    {

        $item = "Id_v";
        $valor = $this->id_v;

        $respuesta = ControladorServicios::ctrMostrarServicioPre($item, $valor);

        echo json_encode($respuesta);
    }
}

/*Objeto para editar Cliente*/

if (isset($_POST["idServicio"])) {

    $editar = new AjaxServicios();
    $editar->idServicio = $_POST["idServicio"];
    $editar->ajaxEditarServicio();
} 

if (isset($_POST["nuevoVe"])) {
    $editar = new AjaxServicios();
    $editar->id_v = $_POST["nuevoVe"];
    $editar->ajaxMostrarSer();
}
