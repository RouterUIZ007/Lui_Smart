<?php

class ControladorCliente
{

    /*metodo para crear Cliente*/

    public static function ctrCrearClientes()
    {

        if (isset($_POST["nuevoNombre"])) {

            if (
                preg_match('/^[a-zA-ZÀ-ÿ\s]+$/', $_POST["nuevoNombre"]) &&
                preg_match('/^[0-9{10}]+$/', $_POST["nuevoTelefono"]) &&
                preg_match('/^[a-zA-Z0-9À-ÿ\s]+$/', $_POST["nuevoCalle"]) &&
                preg_match('/^[a-zA-Z0-9À-ÿ\s]+$/', $_POST["nuevoColonia"])
            ) {

                $tabla = "cliente";
                /*consultando en el campo matricula*/
                $item = "nombre";
                /*valor a consultar que viene del form*/
                $valor = $_POST["nuevoNombre"];

                $datos = array(
                    "nombre" => $_POST["nuevoNombre"],
                    "telefono" => $_POST["nuevoTelefono"],
                    "calle" => $_POST["nuevoCalle"],
                    "inter" => $_POST["nuevoInter"],
                    "exter" => $_POST["nuevoExter"],
                    "colonia" => $_POST["nuevoColonia"]
                );

                $respuesta = ModeloClientes::mdlIngresarClientes($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({

						type: "success",
						title: "¡Los datos del cliente se han guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "presupuesto";

						}

					});
				

					</script>';
                }
            } else {

                echo '<script>

					swal({

						type:"error",
						title:"¡Los datos del cliente no pueden ir vacíos o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText:"Cerrar",
						closeOnConfirm:false

						}).then((result)=>{

							if(result.value){

								window.location = "presupuesto";

							}

						});

				</script>';
            }
        }
    }

    public static function ctrCrearClientes2()
    {

        if (isset($_POST["nuevoNombre"])) {

            if (
                preg_match('/^[a-zA-ZÀ-ÿ\s]+$/', $_POST["nuevoNombre"]) &&
                preg_match('/^[0-9]+$/', $_POST["nuevoTelefono"]) &&
                preg_match('/^[a-zA-ZÀ-ÿ\s]+$/', $_POST["nuevoCalle"]) &&
                preg_match('/^[a-zA-Z0-9À-ÿ\s]+$/', $_POST["nuevoColonia"])
            ) {

                $tabla = "cliente";
                /*consultando en el campo matricula*/
                $item = "nombre";
                /*valor a consultar que viene del form*/
                $valor = $_POST["nuevoNombre"];

                $datos = array(
                    "nombre" => $_POST["nuevoNombre"],
                    "telefono" => $_POST["nuevoTelefono"],
                    "calle" => $_POST["nuevoCalle"],
                    "inter" => $_POST["nuevoInter"],
                    "exter" => $_POST["nuevoExter"],
                    "colonia" => $_POST["nuevoColonia"]
                );

                $respuesta = ModeloClientes::mdlIngresarClientes($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({

						type: "success",
						title: "¡Los datos del cliente se han guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "clientes";

						}

					});
				

					</script>';
                }
            } else {

                echo '<script>

					swal({

						type:"error",
						title:"¡Los datos del cliente no pueden ir vacíos o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText:"Cerrar",
						closeOnConfirm:false

						}).then((result)=>{

							if(result.value){

								window.location = "clientes";

							}

						});

				</script>';
            }
        }
    }


    /* Mostrar Clientes*/

    public static function ctrMostrarClientes($item, $valor){
        /*Pasando la tabla*/
        $tabla = "cliente";
        /* Haciendo uso del modelo*/
        $respuesta = ModeloClientes::MdlMostrarClientes($tabla, $item, $valor);
        return $respuesta;
    }

    /* Mostrar Cliente RECIENTE*/

    public static function ctrMostrarClientes2($item)
    {

        /*Pasando la tabla*/
        $tabla = "cliente";
        /* Haciendo uso del modelo*/
        $respuesta = ModeloClientes::MdlMostrarClientes2($tabla, $item);
        return $respuesta;
    }



    /* Editar Cliente*/

    public static function ctrEditarcliente()
    {

        if (isset($_POST["editarNombre"])) {

            if (

                preg_match('/^[a-zA-ZÀ-ÿ\s]+$/', $_POST["editarNombre"]) &&
                preg_match('/^[0-9{10}]+$/', $_POST["editarTelefono"]) &&
                preg_match('/^[a-zA-Z0-9À-ÿ\s]+$/', $_POST["editarCalle"]) &&
                preg_match('/^[a-zA-Z0-9À-ÿ\s]+$/', $_POST["editarColonia"])
            ) {


                $tabla = "cliente";

                $datos = array(
                    "nombre" => $_POST["editarNombre"],
                    "telefono" => $_POST["editarTelefono"],
                    "calle" => $_POST["editarCalle"],
                    "inter" => $_POST["editarInter"],
                    "exter" => $_POST["editarExter"],
                    "colonia" => $_POST["editarColonia"]
                );

                $respuesta = ModeloClientes::mdlEditarCliente($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>
	
						swal({
							  type: "success",
							  title: "Los datos del cliente se han modificado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {
	
										window.location = "clientes";
	
										}
									})
	
						</script>';
                }
            } else {


                echo '<script>
	
						swal({
							  type: "error",
							  title: "¡Verifique los campos solicitados recuerde, no pueden ir vacíos o llevar caracteres especiales!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {
	
								window.location = "clientes";
	
								}
							})
	
					  </script>';
            }
        }
    }


    /*Borrar Cliente*/

    public static function ctrBorrarCliente()
    {

        if (isset($_GET["idCliente"])) {

            $tabla = "cliente";
            $datos = $_GET["idCliente"];

            $respuesta = ModeloClientes::mdlBorrarCliente($tabla, $datos);


            if ($respuesta == "ok") {

                echo '<script>

                swal({
                      type: "success",
                      title: "La información del cliente ha sido eliminada correctamente",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar",
                      closeOnConfirm: false
                      }).then(function(result){
                                if (result.value) {

                                window.location = "clientes";

                                }
                            })

                </script>';
            }
        }
    }
    
}
