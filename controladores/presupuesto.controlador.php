<?php

class ControladorPresupuesto
{

    /*metodo para crear Cliente*/

    public static function ctrCrearPresupuesto(){
        
        if (isset($_POST["nuevoNombre"])) {

            if (preg_match('/^[a-zA-Z0-9 ñÑáéíóúÁÉÍÓÚ]+$/', $_POST["nuevoNombre"]) &&
                preg_match('/^[0-9]+$/', $_POST["nuevoTelefono"]) &&
                preg_match('/^[a-zA-Z ]+$/', $_POST["nuevoCalle"]) &&
                preg_match('/^[0-9]+$/', $_POST["nuevoNcalle"]) &&
                preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["nuevoColonia"])
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
                    "numero" => $_POST["nuevoNcalle"],
                    "colonia" => $_POST["nuevoColonia"]
                );

                $respuesta = ModeloClientes::mdlIngresarClientes($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({

						type: "success",
						title: "¡El Cliente ha sido guardado correctamente!",
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
						title:"¡El Cliente no puede ir vacío o llevar caracteres especiales!",
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