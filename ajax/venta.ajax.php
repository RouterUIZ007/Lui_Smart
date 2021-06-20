<?php

require_once "../controladores/venta.controlador.php";
require_once "../modelos/venta.modelo.php";

class AjaxVenta{

    /*Editar Vehiculo*/

    public $folio;

    public function ajaxEditarVenta(){

        $item = "folio_p";
        $valor = $this->folio;

        $respuesta = ControladorVenta::ctrMostrarPresupuestoVenta($item,$valor);
        echo json_encode($respuesta);

    }

}

/*Objeto para editar Vehiculo*/

if (isset($_POST["idPres"])){

	$editar = new AjaxVenta();
	$editar -> folio = $_POST["idPres"];
	$editar -> ajaxEditarVenta();

}