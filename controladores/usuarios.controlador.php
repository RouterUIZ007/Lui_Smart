<?php


/*Clase controlador usuarios*/

class ControladorUsuarios{

	/*metodo para el ingreso*/

	 public static function ctrIngresoUsuario(){

		/*pregunta si hay variables post son las que estan en name*/
		if(isset($_POST["ingUsuario"])){

			/*validando para solo permitir a-zA-Z0-A*/
			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) && 
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

			   	/*consultando en la tabla usuarios*/
			   	$tabla = "usuarios";
			   	/*consultando en el campo usuario*/
			    $item = "usuario";
			    /*valor a consultar que viene del form*/
			    $valor = $_POST["ingUsuario"];
			    /*respuesta del modelo*/
			    $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

			    if($respuesta["usuario"]==$_POST["ingUsuario"] && $respuesta["password"] ==$_POST["ingPassword"]){

			    	$_SESSION["iniciarSesion"] = "ok";

			    	echo '<script>

			    	window.location = "inicio";

			    	</script>';

			    }else{
			    	echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
			    }

			}

		}
	}



	/*metodo para crear usuario*/
	
	public static function ctrCrearUsuario(){

		if(isset($_POST["nuevoperfil"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
		       preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
		       preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])){

		       	/*Validando la imagen antes de enviar a la bd*/


		       	$tabla = "usuarios";

		  		$datos = array("nombre" => $_POST["nuevoNombre"],
		  					   "usuario" => $_POST["nuevoUsuario"],
		  					   "password" => $_POST["nuevoPassword"],
		  					   "rol" => $_POST["nuevoperfil"]);

		  		$respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla,$datos);

		  		if ($respuesta == "ok") {

		  			echo '<script>

					swal({

						type: "success",
						title: "¡El usuario ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "usuarios";

						}

					});
				

					</script>';

		  		}


			}else{

				echo '<script>

					swal({

						type:"error",
						title:"¡El usuario no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText:"Cerrar",
						closeOnConfirm:false

						}).then((result)=>{

							if(result.value){

								window.location = "usuarios";

							}

						});

				</script>';

			}
		}

	}
}