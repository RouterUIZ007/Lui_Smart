<?php

class ControladorVehiculos{

    public static function ctrCrearVehiculos(){

        if (isset($_POST["nuevoMatricula"])){

            if (preg_match('/^[0-9]+$/', $_POST["nuevoId_c"]) &&
                preg_match('/^[a-zA-Z0-9À-ÿ]+$/', $_POST["nuevoMatricula"]) &&
                preg_match('/^[a-zA-Z0-9À-ÿ\s]+$/', $_POST["nuevoMarca"]) &&
                preg_match('/^[a-zA-Z0-9À-ÿ\s]+$/', $_POST["nuevoModelo"]) &&
                preg_match('/^[a-zA-Z0-9À-ÿ\s]+$/', $_POST["nuevoColor"]) &&
                preg_match('/^[a-zA-Z0-9À-ÿ\s]+$/', $_POST["nuevoObservaciones"])
            ) {

                $tabla = "vehiculo";
                /*consultando en el campo matricula*/
				$item = "matricula";
				/*valor a consultar que viene del form*/
				$valor = $_POST["nuevoMatricula"];

                $datos = array(
                    "id_c" => $_POST["nuevoId_c"],
                    "matricula" => $_POST["nuevoMatricula"],
                    "marca" => $_POST["nuevoMarca"],
                    "modelo" => $_POST["nuevoModelo"],
                    "color" => $_POST["nuevoColor"],
                    "observaciones" => $_POST["nuevoObservaciones"]
                );

                $respuesta = ModeloVehiculos::mdlIngresarVehiculo($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({

						type: "success",
						title: "¡Vehículo agregado :)!",
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
						title:"¡Error al agregar datos del vehículo :(!",
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
    public static function ctrCrearVehiculos2(){

        if (isset($_POST["nuevoMatricula"])){

            if (preg_match('/^[0-9]+$/', $_POST["nuevoId_c"]) &&
                preg_match('/^[a-zA-Z0-9À-ÿ]+$/', $_POST["nuevoMatricula"]) &&
                preg_match('/^[a-zA-ZÀ-ÿ\s]+$/', $_POST["nuevoMarca"]) &&
                preg_match('/^[a-zA-Z0-9À-ÿ\s]+$/', $_POST["nuevoModelo"]) &&
                preg_match('/^[a-zA-ZÀ-ÿ\s]+$/', $_POST["nuevoColor"]) &&
                preg_match('/^[a-zA-Z0-9À-ÿ\s]+$/', $_POST["nuevoObservaciones"])
            ) {

                $tabla = "vehiculo";
                /*consultando en el campo matricula*/
				$item = "matricula";
				/*valor a consultar que viene del form*/
				$valor = $_POST["nuevoMatricula"];

                $datos = array(
                    "id_c" => $_POST["nuevoId_c"],
                    "matricula" => $_POST["nuevoMatricula"],
                    "marca" => $_POST["nuevoMarca"],
                    "modelo" => $_POST["nuevoModelo"],
                    "color" => $_POST["nuevoColor"],
                    "observaciones" => $_POST["nuevoObservaciones"]
                );

                $respuesta = ModeloVehiculos::mdlIngresarVehiculo($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({

						type: "success",
						title: "¡Vehículo agregado :)!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "vehiculos";

						}

					});
				

					</script>';
                }
            } else {

                echo '<script>

					swal({

						type:"error",
						title:"¡Error al agregar datos del vehículo :(!",
						showConfirmButton: true,
						confirmButtonText:"Cerrar",
						closeOnConfirm:false

						}).then((result)=>{

							if(result.value){

								window.location = "vehiculos";

							}

						});

				</script>';
            }
        }
    }
    /* Mostrar Vehiculos*/

    public static function ctrMostrarVehiculos($item,$valor){

        /*Pasando la tabla*/
        $tabla = "vehiculo";
        /* Haciendo uso del modelo*/
        $respuesta = ModeloVehiculos::MdlMostrarVehiculos($tabla,$item,$valor);
        return $respuesta;

    }

    
    public static function ctrMostrarVehiculo2($item){

        /*Pasando la tabla*/
        $tabla = "vehiculo";
        /* Haciendo uso del modelo*/
        $respuesta = ModeloVehiculos::MdlMostrarVehiculo2($tabla,$item);
        return $respuesta;

    }
    
}