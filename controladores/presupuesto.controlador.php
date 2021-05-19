<?php

class ControladorPresupuesto
{

    /*metodo para crear Cliente*/

    public static function ctrCrearPresupuesto($v)
    {

        if (isset($_POST["nuevoCosto"])) {

            if (preg_match('/^[0-9.0-9]+$/', $_POST["nuevoCosto"])) {

                $tabla = "presupuesto";


                $datos = array(
                    "costo" => $_POST["nuevoCosto"]
                );

                $respuesta = ModeloPresupuesto::mdlIngresarPresupuesto($tabla, $datos, $v);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({

						type: "success",
						title: "¡El presupuesto se agrego correctamente!",
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
						title:"¡Presupuesto no guardado :c!",
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