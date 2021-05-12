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

			   	$encriptar = crypt($_POST["ingPassword"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

			   	/*consultando en la tabla usuarios*/
			   	$tabla = "usuarios";
			   	/*consultando en el campo usuario*/
			    $item = "usuario";
			    /*valor a consultar que viene del form*/
			    $valor = $_POST["ingUsuario"];
			    /*respuesta del modelo*/
			    $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

			    if($respuesta["usuario"]==$_POST["ingUsuario"] && $respuesta["password"] == $encriptar){

			    	$_SESSION["iniciarSesion"] = "ok";
			    	$_SESSION["id"] = $respuesta["id"];
			    	$_SESSION["nombre"] = $respuesta["nombre"];
			    	$_SESSION["usuario"] = $respuesta["usuario"];
			    	$_SESSION["foto"] = $respuesta["foto"];
			    	$_SESSION["perfil"] = $respuesta["perfil"];


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
		       $ruta = "";

		       if(isset($_FILES["nuevaFoto"]["tmp_name"])){
		       	/*para almacenar la imagen de un tamaño*/
		       	list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);
		       	$nuevoAncho = 500;
		       	$nuevoAlto = 500;

		       	/*Creando el directorio donde guardaremos la foto del usuario*/
		       	$directorio = "vistas/img/usuarios/".$_POST["nuevoUsuario"];
		       	/*Comando que permite la escritura y lectura*/
		       	mkdir($directorio,0755);

		       	/*De acuerdo a la imagen se aplican funciones de php*/

		       	if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){

		       		/*Guardamos la imagen en el directorio*/
		       		$aleatorio = mt_rand(100,999);
		       		$ruta = "vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".jpg";
		       		$origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);
		       		$destino = imagecreatetruecolor($nuevoAncho,$nuevoAlto);

		       		imagecopyresized($destino,$origen,0,0,0,0,$nuevoAncho,$nuevoAlto,$ancho,$alto);

		       		imagejpeg($destino,$ruta);

		       	}

		       		if($_FILES["nuevaFoto"]["type"] == "image/png"){

		       		/*Guardamos la imagen en el directorio*/
		       		$aleatorio = mt_rand(100,999);
		       		$ruta = "vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".png";
		       		$origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);
		       		$destino = imagecreatetruecolor($nuevoAncho,$nuevoAlto);

		       		imagecopyresized($destino,$origen,0,0,0,0,$nuevoAncho,$nuevoAlto,$ancho,$alto);

		       		imagepng($destino,$ruta);

		       	}

		       }


		       	$tabla = "usuarios";

		       	/*Variable que gracias a un metodo ayuda a encriptar la contraseña*/
		       	$encriptar = crypt($_POST["nuevoPassword"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

		  		$datos = array("nombre" => $_POST["nuevoNombre"],
		  					   "usuario" => $_POST["nuevoUsuario"],
		  					   "password" => $encriptar,
		  					   "rol" => $_POST["nuevoperfil"],
		  					   "foto" =>$ruta);

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

	/*Mostrar Usuarios*/
	public static function ctrMostrarUsuarios($item,$valor){

		/*Se le pasa la tabla*/
		$tabla = "usuarios";

		/*Hacemos uso del modelo*/
		$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);
		return $respuesta;

	}
}