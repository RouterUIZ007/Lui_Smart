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
						title: "¡Los datos del vehículo se han guardado correctamente!",
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
						title:"¡Error al agregar los datos del vehículo!",
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
						title: "¡Los datos del vehículo se han guardado correctamente!",
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
						title:"¡Error al agregar los datos del vehículo!",
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
    /*Editar Vehiculos*/

    public static function ctrEditarVehiculos(){

        if(isset($_POST["editarMatricula"])){

            if (preg_match('/^[a-zA-Z0-9À-ÿ]+$/', $_POST["editarMatricula"]) &&
                preg_match('/^[a-zA-Z0-9À-ÿ\s]+$/', $_POST["editarMarca"]) &&
                preg_match('/^[a-zA-Z0-9À-ÿ\s]+$/', $_POST["editarModelo"]) &&
                preg_match('/^[a-zA-Z0-9À-ÿ\s]+$/', $_POST["editarColor"]) &&
                preg_match('/^[a-zA-Z0-9À-ÿ\s]+$/', $_POST["editarObservaciones"])){


                    $tabla = "vehiculo";

                    $datos = array("Matricula" => $_POST["editarMatricula"],
								   "marca" => $_POST["editarMarca"],
								   "color" => $_POST["editarColor"],
                                   "observaciones" => $_POST["editarObservaciones"],
								   "modelo" => $_POST["editarModelo"]);

                    $respuesta = ModeloVehiculos::mdlEditarVehiculo($tabla,$datos);

                    if($respuesta == "ok"){
	
						echo'<script>
	
						swal({
							  type: "success",
							  title: "Los datos del vehículo se han modificado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {
	
										window.location = "vehiculos";
	
										}
									})
	
						</script>';
	
					}




            }else{


                echo'<script>
	
						swal({
							  type: "error",
							  title: "¡Verifique los campos solicitados recuerde, no pueden ir vacíos o llevar caracteres especiales!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {
	
								window.location = "vehiculos";
	
								}
							})
	
					  </script>';
	

            }


        }

    }

    /*Borrar Vehiculo*/

    public static function ctrBorrarVehiculo(){

        if(isset($_GET["idVehiculo"])){

            $tabla="vehiculo";
            $datos = $_GET["idVehiculo"];

            $respuesta = ModeloVehiculos::mdlBorrarVehiculo($tabla,$datos);

            
            if($respuesta == "ok"){

                echo'<script>

                swal({
                      type: "success",
                      title: "La información del vehículo ha sido eliminada correctamente",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar",
                      closeOnConfirm: false
                      }).then(function(result){
                                if (result.value) {

                                window.location = "vehiculos";

                                }
                            })

                </script>';

            }

        }

    }

    
}