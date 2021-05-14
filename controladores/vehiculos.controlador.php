<?php

class ControladorVehiculos{

    public static function ctrCrearVehiculos(){

        if (isset($_POST["nuevaMatricula"])){

            if (preg_match('/^[0-9]+$/', $_POST["nuevoId_c"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoMatricula"]) &&
                preg_match('/^[a-zA-Z]+$/', $_POST["nuevoMarca"]) &&
                preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["nuevoModelo"]) &&
                preg_match('/^[a-zA-Z ]+$/', $_POST["nuevoColor"]) &&
                preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["nuevoObservaciones"])
            ) {

                $tabla = "vehiculo";

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
						title: "¡Success CAR!",
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
						title:"¡Error CAR!",
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
}
