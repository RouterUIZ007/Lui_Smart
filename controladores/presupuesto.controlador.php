<?php

class ControladorPresupuesto
{

    /*metodo para crear Cliente*/

    public static function ctrCrearPresupuesto()
    {

        if (isset($_POST["btn1"])) {

            # if (preg_match('/^[[0-9]+([.][0-9])]+$/', $_POST["nuevoTotal"])) {
			if (true) {

                $tabla = "presupuesto";
                $datos = array(
                    "total" => $_POST["nuevoTotal"]
                );
                $respuesta = ModeloPresupuesto::mdlIngresarPresupuesto($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
					swal({
						type: "success",
						title: "¡El presupuesto se agrego correctamente xD!",
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
        } else {
			
			echo '<script>

			swal({

				type:"error",
				title:"No entra al primer if!",
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

	
	public static function ctrMostrarPresupuesto($item,$valor){

        /*Pasando la tabla*/
        $tabla = "presupuesto";
        /* Haciendo uso del modelo*/
        $respuesta = ModeloClientes::MdlMostrarClientes($tabla,$item,$valor);
        return $respuesta;

    }
}