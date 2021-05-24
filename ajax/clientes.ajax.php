<?php

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class AjaxClientes{

    /*Editar Cliente*/
    public $idCliente;

    public function ajaxEditarCliente(){

        $item = "id_c";
        $valor = $this->idCliente;

        $respuesta = ControladorCliente::ctrMostrarClientes($item,$valor);

        echo json_encode($respuesta);

        



    }

}

/*Objeto para editar Cliente*/

if (isset($_POST["idCliente"])){

	$editar = new AjaxClientes();
	$editar -> idCliente = $_POST["idCliente"];
	$editar -> ajaxEditarCliente();

}