<?php


/*Clase controlador usuarios*/

class ControladorUsuarios
{

	/*metodo para el ingreso*/

	public static function ctrIngresoUsuario()
	{

		/*pregunta si hay variables post son las que estan en name*/
		if (isset($_POST["ingUsuario"])) {

			/*validando para solo permitir a-zA-Z0-A*/
			if (
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])
			) {

				$encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				/*consultando en la tabla usuarios*/
				$tabla = "usuarios";
				/*consultando en el campo usuario*/
				$item = "usuario";
				/*valor a consultar que viene del form*/
				$valor = $_POST["ingUsuario"];
				/*respuesta del modelo*/
				$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

				if ($respuesta == false) {
					$respuesta["usuario"] = "";
					echo '<br><div class="alert alert-danger">Usuario incorrecto.</div>';
					echo '<div class="alert alert-warning">Si tiene problemas para acceder, consulte con el jefe del taller.</div>';
				}

				if ($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $encriptar) {

					if ($respuesta["estado"] == 1) {

						$_SESSION["iniciarSesion"] = "ok";
						$_SESSION["id"] = $respuesta["id"];
						$_SESSION["nombre"] = $respuesta["nombre"];
						$_SESSION["usuario"] = $respuesta["usuario"];
						$_SESSION["foto"] = $respuesta["foto"];
						$_SESSION["perfil"] = $respuesta["rol"];

						/*Capturar la fecha y hora de inicio de sesion*/

						date_default_timezone_set('America/Mexico_City');

						$fecha = date('Y-m-d');
						$hora = date('H:i:s');

						$fechaActual = $fecha . ' ' . $hora;

						$item1 = "ultimo_login";
						$valor1 = $fechaActual;

						$item2 = "id";
						$valor2 = $respuesta["id"];

						$ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

						if ($ultimoLogin == "ok") {

							echo '<script>

			    				window.location = "inicio";

			    			</script>';
						}
					} else {

						echo '<br>
							<div class"alert alert-danger">El usuario aún no está activado.</div>';
					}
				} else {
					echo '<br><div class="alert alert-danger">Contraseña incorrecta. </div>
					<div class="alert alert-warning">La contraseña debe tener: 
					<br>Una mayúscula, minúscula y números. 
					<br>Sin caracteres especiales.</div>';
				}
			}
		}
	}



	/*metodo para crear usuario*/

	public static function ctrCrearUsuario()
	{

		if (isset($_POST["nuevoperfil"])) {

			if (
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])
			) {

				/*Validando la imagen antes de enviar a la bd*/
				$ruta = "";

				if (isset($_FILES["nuevaFoto"]["tmp_name"])) {
					/*para almacenar la imagen de un tamaño*/
					list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);
					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*Creando el directorio donde guardaremos la foto del usuario*/
					$directorio = "vistas/img/usuarios/" . $_POST["nuevoUsuario"];
					/*Comando que permite la escritura y lectura*/
					mkdir($directorio, 0755);

					/*De acuerdo a la imagen se aplican funciones de php*/

					if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {

						/*Guardamos la imagen en el directorio*/
						$aleatorio = mt_rand(100, 999);
						$ruta = "vistas/img/usuarios/" . $_POST["nuevoUsuario"] . "/" . $aleatorio . ".jpg";
						$origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);
					}

					if ($_FILES["nuevaFoto"]["type"] == "image/png") {

						/*Guardamos la imagen en el directorio*/
						$aleatorio = mt_rand(100, 999);
						$ruta = "vistas/img/usuarios/" . $_POST["nuevoUsuario"] . "/" . $aleatorio . ".png";
						$origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);
					}
				}


				$tabla = "usuarios";

				/*Variable que gracias a un metodo ayuda a encriptar la contraseña*/
				$encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$datos = array(
					"nombre" => $_POST["nuevoNombre"],
					"usuario" => $_POST["nuevoUsuario"],
					"password" => $encriptar,
					"rol" => $_POST["nuevoperfil"],
					"foto" => $ruta
				);

				$respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

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
			} else {

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
	public static function ctrMostrarUsuarios($item, $valor)
	{

		/*Se le pasa la tabla*/
		$tabla = "usuarios";

		/*Hacemos uso del modelo*/
		$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);
		return $respuesta;
	}


	/*Editar Usuarios*/

	public static function ctrEditarUsuario()
	{

		if (isset($_POST["editarUsuario"])) {

			if (
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])
			) {

				/*=============================================
					VALIDAR IMAGEN
					=============================================*/

				$ruta = $_POST["fotoActual"];

				if (isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])) {

					list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
						CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
						=============================================*/

					$directorio = "vistas/img/usuarios/" . $_POST["editarUsuario"];

					/*=============================================
						PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
						=============================================*/

					if (!empty($_POST["fotoActual"])) {

						unlink($_POST["fotoActual"]);
					} else {

						mkdir($directorio, 0755);
					}

					/*=============================================
						DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
						=============================================*/

					if ($_FILES["editarFoto"]["type"] == "image/jpeg") {

						/*=============================================
							GUARDAMOS LA IMAGEN EN EL DIRECTORIO
							=============================================*/

						$aleatorio = mt_rand(100, 999);

						$ruta = "vistas/img/usuarios/" . $_POST["editarUsuario"] . "/" . $aleatorio . ".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);
					}

					if ($_FILES["editarFoto"]["type"] == "image/png") {

						/*=============================================
							GUARDAMOS LA IMAGEN EN EL DIRECTORIO
							=============================================*/

						$aleatorio = mt_rand(100, 999);

						$ruta = "vistas/img/usuarios/" . $_POST["editarUsuario"] . "/" . $aleatorio . ".png";

						$origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);
					}
				}

				$tabla = "usuarios";

				if ($_POST["editarPassword"] != "") {

					if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])) {

						$encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
					} else {

						echo '<script>
	
									swal({
										  type: "error",
										  title: "¡La contraseña no puede ir vacía o llevar caracteres especiales!",
										  showConfirmButton: true,
										  confirmButtonText: "Cerrar"
										  }).then(function(result){
											if (result.value) {
	
											window.location = "usuarios";
	
											}
										})
	
								  </script>';
					}
				} else {

					$encriptar = $_POST["passwordActual"];
				}

				$datos = array(
					"nombre" => $_POST["editarNombre"],
					"usuario" => $_POST["editarUsuario"],
					"password" => $encriptar,
					"rol" => $_POST["editarperfil"],
					"foto" => $ruta
				);

				$respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

				if ($respuesta == "ok") {

					echo '<script>
	
						swal({
							  type: "success",
							  title: "El usuario ha sido editado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {
	
										window.location = "usuarios";
	
										}
									})
	
						</script>';
				}
			} else {

				echo '<script>
	
						swal({
							  type: "error",
							  title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {
	
								window.location = "usuarios";
	
								}
							})
	
					  </script>';
			}
		}
	}

	/*Borrar usuario*/

	public static function ctrBorrarUsuario()
	{

		if (isset($_GET["idUsuario"])) {

			$tabla = "usuarios";
			$datos = $_GET["idUsuario"];

			if ($_GET["fotoUsuario"] != "") {

				unlink($_GET["fotoUsuario"]);
				rmdir('vistas/img/usuarios/' . $_GET["usuario"]);
			}

			$respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla, $datos);


			if ($respuesta == "ok") {

				echo '<script>

					swal({
						  type: "success",
						  title: "El usuario ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then(function(result){
									if (result.value) {

									window.location = "usuarios";

									}
								})

					</script>';
			}
		}
	}
}
