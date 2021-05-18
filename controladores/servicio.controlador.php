<?php

class ControladorServicios{

    public static function ctrCrearServicio()
    {

        if (isset($_POST["nuevoV"])) {

            if (
                preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["nuevoV"]) &&
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
						title: "¡Se agrego de manera corecta el servicio :)!",
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
						title:"¡Error al ingresar el servicio, verifique los datos :(!",
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


    public static function ctrMostrarServicio($item,$valor){

        /*Pasando la tabla*/
        $tabla = "servicio";
        /* Haciendo uso del modelo*/
        $respuesta = ModeloServicio::MdlMostrarServicio($tabla,$item,$valor);
        return $respuesta;

    }
    
}
