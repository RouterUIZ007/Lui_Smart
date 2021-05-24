<?php

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxUsuarios{

	/*Editar usuarios*/

	/*Recogiendo el id de usuario que manda JS*/
	public $idUsuario;

	public  function ajaxEditarUsuario(){

		/*solicitando los usuarios*/
		$item="id";
		$valor = $this->idUsuario;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

		echo json_encode($respuesta); 

	}

	/*Activar usuarios*/

	public $activarUsuario;
	public $activarId;

	public  function ajaxActivarUsuario(){

		$tabla = "usuarios";
		$item1 = "estado";
		$valor1 = $this->activarUsuario;

		$item2 = "id";
		$valor2 = $this->activarId;

		$respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);


	}

	/*Validar no repetir usuarios*/
	public $validarUsuario;

	public function ajaxValidarUsuario(){

		$item="usuario";
		$valor = $this->validarUsuario;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

		echo json_encode($respuesta); 

	}


}

/*si la variable post viene con el id ejecuta el objeto*/


if (isset($_POST["idUsuario"])){

	$editar = new AjaxUsuarios();
	$editar -> idUsuario = $_POST["idUsuario"];
	$editar -> ajaxEditarUsuario();

}


/*Objetos para activar el usuario*/
if (isset($_POST["activarUsuario"])){

	$activarUsuario = new AjaxUsuarios();
	$activarUsuario -> activarUsuario = $_POST["activarUsuario"];
	$activarUsuario -> activarId = $_POST["activarId"];
	$activarUsuario -> ajaxActivarUsuario();

}

/*Objeto para validar no repetir usuario*/

if (isset($_POST["validarUsuario"])){

	$valUsuario = new ajaxUsuarios();
	$valUsuario -> validarUsuario = $_POST["validarUsuario"];
	$valUsuario -> ajaxValidarUsuario();

}
