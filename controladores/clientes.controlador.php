<?php

class ControladorCliente
{

    /*metodo para crear Cliente*/

    public static function ctrCrearClientes(){

        if (isset($_POST["nuevoNombre"])) {

            if (preg_match('/^[a-zA-ZÀ-ÿ\s]+$/', $_POST["nuevoNombre"]) &&
                preg_match('/^[0-9{10}]+$/', $_POST["nuevoTelefono"]) &&
                preg_match('/^[a-zA-À-ÿ\s]+$/', $_POST["nuevoCalle"]) &&
                preg_match('/^[0-9]+$/', $_POST["nuevoInter"]) &&
                preg_match('/^[0-9]+$/', $_POST["nuevoExter"]) &&
                preg_match('/^[a-zA-À-ÿ\s]+$/', $_POST["nuevoColonia"])
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
    
    public static function ctrCrearClientes2(){

        if (isset($_POST["nuevoNombre"])) {

            if (preg_match('/^[a-zA-ZÀ-ÿ\s]+$/', $_POST["nuevoNombre"]) &&
                preg_match('/^[0-9]+$/', $_POST["nuevoTelefono"]) &&
                preg_match('/^[a-zA-ZÀ-ÿ\s]+$/', $_POST["nuevoCalle"]) &&
                preg_match('/^[0-9]+$/', $_POST["nuevoInter"]) &&
                preg_match('/^[0-9]+$/', $_POST["nuevoExter"]) &&
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
						title: "¡El Cliente ha sido guardado correctamente!",
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
						title:"¡El Cliente no puede ir vacío o llevar caracteres especiales!",
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

     public static function ctrMostrarClientes($item,$valor){

        /*Pasando la tabla*/
        $tabla = "cliente";
        /* Haciendo uso del modelo*/
        $respuesta = ModeloClientes::MdlMostrarClientes($tabla,$item,$valor);
        return $respuesta;

    }

     /* Mostrar Cliente RECIENTE*/

     public static function ctrMostrarClientes2($item){

        /*Pasando la tabla*/
        $tabla = "cliente";
        /* Haciendo uso del modelo*/
        $respuesta = ModeloClientes::MdlMostrarClientes2($tabla,$item);
        return $respuesta;

    }

}
