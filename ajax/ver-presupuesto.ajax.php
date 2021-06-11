<?php

require_once "../controladores/presupuesto.controlador.php";
require_once "../modelos/presupuesto.modelo.php";

class AjaxPresupuestos{

    /*Editar idPre*/
    public $idPre;

    public function ajaxEditarPresupuesto(){

        $item = "folio_p";
        $valor = $this->idPre;

        $respuesta = ControladorPresupuesto::ctrMostrarPresupuestoS($item,$valor);

        echo json_encode($respuesta);

        



    }

}

/*Objeto para editar idPre*/

if (isset($_POST["idPre"])){

	$editar = new AjaxPresupuestos();
	$editar -> idPre = $_POST["idPre"];
	$editar -> ajaxEditarPresupuesto();

}