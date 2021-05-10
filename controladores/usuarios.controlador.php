<?php


/*Clase controlador usuarios*/

class ControladorUsuarios
{

	/*metodo para el ingreso*/

	static public function ctrIngresoUsuario()
	{

		/*pregunta si hay variables post son las que estan en name*/
		if (isset($_POST["ingUsuario"])) {

			/*validando para solo permitir a-zA-Z0-A*/
			if (
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])
			) {

				/*consultando en la tabla usuarios*/
				$tabla = "usuarios";
				/*consultando en el campo usuario*/
				$item = "usuario";
				/*valor a consultar que viene del form*/
				$valor = $_POST["ingUsuario"];
				/*respuesta del modelo*/
				$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

				if ($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $_POST["ingPassword"]) {

					$_SESSION["iniciarSesion"] = "ok";

					echo '<script>

			    	window.location = "inicio";

			    	</script>';
				} else {
					echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
				}
			}
		}
	}

	/*Metoido para agregar el usuario*/
	static public function ctrCrearUsuario()
	{
		if (isset($_POST["nuevoperfil"])) {


			if (
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoNombre"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])
			) {

				$tabla = "usuarios";

				$datos = array(
					"nombre" => $_POST["nuevoNombre"],
					"usuario" => $_POST["nuevoUsuario"],
					"password" => $_POST["nuevoPassword"],
					"rol" => $_POST["nuevoperfil"]
				);

				$respuesta = ModeloUsuarios::mdlIngresarUsuarios($tabla, $datos);

/* 				if ($respuesta == "ok") {
					echo '<scrip> 
						swall({
							type: "success",
							tittle: "El usario ha sido guardado Correctamente.",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false

						}).then((result)=>{
							if(result.value){
								window.location = "usarios";
							}

						});
						</script>';
				} else {
					echo '<scrip> 
						swall({
							type: "error",
							title: "El usario no puede ir vacio o llevar caracteres especiales",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false

						}).then((result)=>{
							if(result.value){
								window.location = "usarios";
							}

						});
						</script>';
				} */

			}
		}
	}
}
