<?php

require_once "../controladores/vehiculos.controlador.php";
require_once "../modelos/vehiculos.modelo.php";

class AjaxVehiculos{

    /*Editar Vehiculo*/

    public $idVehiculo;

    public function ajaxEditarVehiculo(){

        $item = "id_v";
        $valor = $this->idVehiculo;

        $respuesta = ControladorVehiculos::ctrMostrarVehiculos($item,$valor);

        echo json_encode($respuesta);

    }

}

/*Objeto para editar Vehiculo*/

if (isset($_POST["idVehiculo"])){

	$editar = new AjaxVehiculos();
	$editar -> idVehiculo = $_POST["idVehiculo"];
	$editar -> ajaxEditarVehiculo();

}