<?php

class ControladorServicios
{

    public static function ctrCrearServicio()
    {

        if (isset($_POST["nuevoV"])) {

            if (
                preg_match('/^[0-9]+$/', $_POST["nuevoV"]) &&
                preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["nuevoConcepto"]) &&
                preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["nuevoCosto"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoServicio"])
            ) {

                $tabla = "servicio";

                /*consultando en el campo matricula*/
                $item = "Id_v";
                /*valor a consultar que viene del form*/
                $valor = $_POST["nuevoV"];

                $datos = array(
                    "Id_v" => $_POST["nuevoV"],
                    "concepto" => $_POST["nuevoConcepto"],
                    "costo" => $_POST["nuevoCosto"],
                    "tipo" => $_POST["nuevoServicio"]
                );

                $respuesta = ModeloServicio::mdlIngresarServicio($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({

						type: "success",
						title: "¡Los datos del servicio se agregaron correctamente!",
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
						title:"¡Error al ingresar los datos del servicio!",
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


    public static function ctrMostrarServicio($item, $valor)
    {

        /*Pasando la tabla*/
        $tabla = "servicio";
        /* Haciendo uso del modelo*/
        $respuesta = ModeloServicio::MdlMostrarServicio($tabla, $item, $valor);
        return $respuesta;
    }

    public static function ctrMostrarServicio2($item)
    {

        /*Pasando la tabla*/
        $tabla = "servicio";
        /* Haciendo uso del modelo*/
        $respuesta = ModeloServicio::MdlMostrarServicio2($tabla, $item);
        return $respuesta;
    }

    public static function ctrMostrarServicioPre($valor)
    {

        /*Pasando la tabla*/
        $tabla = "servicio";
        $item = null;
        /* Haciendo uso del modelo*/
        $respuesta = ModeloServicio::MdlMostrarServicioPre($tabla, $valor, $item);
        return $respuesta;
    }
    public static function ctrMostrarSer($item, $valor)
    {

        /*Pasando la tabla*/
        $tabla = "servicio";
        /* Haciendo uso del modelo*/
        $respuesta = ModeloServicio::MdlMostrarServicioPre($tabla, $valor, $item);
        return $respuesta;
    }
    public static function ctrMostrarSer2($item, $valor)
    {

        /*Pasando la tabla*/
        $tabla = "servicio";
        /* Haciendo uso del modelo*/
        $respuesta = ModeloServicio::MdlMostrarServicioPre($tabla, $valor, $item);
        return $respuesta;
    }

    /* Editar Servicio*/

    public static function ctrEditarServicio()
    {

        if (isset($_POST["editarConcepto"])) {

            if (true) {


                $tabla = "servicio";

                $datos = array(
                    "concepto" => $_POST["editarConcepto"],
                    "costo" => $_POST["editarCosto"],
                    "tipo" => $_POST["editarServicio"]
                );

                $respuesta = ModeloServicio::mdlEditarServicio($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>
	
						swal({
							  type: "success",
							  title: "Los datos del servicio se han modificado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {
	
										window.location = "presupuesto";
	
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
	
								window.location = "presupuesto";
	
								}
							})
	
					  </script>';
            }
        }
    }


    /*Borrar Servicio*/

    public static function ctrBorrarServicio()
    {

        if (isset($_GET["idServicio"])) {

            $tabla = "servicio";
            $datos = $_GET["idServicio"];

            $respuesta = ModeloServicio::mdlBorrarServicio($tabla, $datos);


            if ($respuesta == "ok") {

                echo '<script>

                swal({
                      type: "success",
                      title: "La información del servicio ha sido eliminada correctamente",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar",
                      closeOnConfirm: false
                      }).then(function(result){
                                if (result.value) {

                                window.location = "presupuesto";

                                }
                            })

                </script>';
            }
        }
    }

    public static function ctrMostrarServicioPDF($valor)
    {
        
        $tabla = "servicio";
        $item = "Id_v";
        /* Haciendo uso del modelo*/
        $respuesta = ModeloServicio::MdlMostrarServicioPre($tabla, $valor, $item);
        return $respuesta;
    }

}
