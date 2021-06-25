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


                /* RESUTLADO DE LA CONSULTA */
                $item = null;
                $valor = null;
                $servicios = ControladorServicios::ctrMostrarServicio($item, $valor);
                //echo json_encode($servicios);
                $idvehiculo = $servicios[0][4];
                $vehiculos = ControladorVehiculos::ctrMostrarVehiculos("id_v", $idvehiculo);
                //echo json_encode($vehiculos);
                $idcliente = $vehiculos[5];
                $cliente = ControladorCliente::ctrMostrarClientes("id_c", $idcliente);




                /* TERMINO DE GENERARCE */
                /* NOTOFOCACION DE AGREGAR EN PRESUPUESTo */

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


    public static function ctrMostrarPresupuesto($item, $valor)
    {

        /*Pasando la tabla*/
        $tabla = "presupuesto";
        /* Haciendo uso del modelo*/
        $respuesta = ModeloPresupuesto::MdlMostrarPresupuestoS($tabla, $item, $valor);
        return $respuesta;
    }

    public static function ctrMostrarPresupuestoS($item, $valor)
    {

        /*Pasando la tabla*/
        $tabla = "presupuesto";
        /* Haciendo uso del modelo*/
        $respuesta = ModeloPresupuesto::MdlMostrarPresupuestoS($tabla, $item, $valor);
        return $respuesta;
    }

    public static function ctrMostrarPresupuestoVenta($item, $valor)
    {

        /*Pasando la tabla*/
        $tabla = "presupuesto";
        /* Haciendo uso del modelo*/
        $respuesta = ModeloPresupuesto::MdlMostrarPresupuestoVenta($tabla, $item, $valor);

        if ($respuesta == false) {
            echo '<script>

					swal({
						type:"error",
						title:"Presupuesto no encontrado",
						showConfirmButton: true,
						confirmButtonText:"Cerrar",
						closeOnConfirm:false

						}).then((result)=>{
							if(result.value){
								window.location = "ventas";
							}
						});

				</script>';
            return null;
        }

        return $respuesta;
    }


    /*Editar presupuestos*/
    public static function ctrEditarPresupuesto()
    {

        if (isset($_POST["editarPrecio"])) {

            echo json_encode("Hizo clic xD al btn ");


            $tabla = "presupuesto";

            $datos = array(
                "id" => $_POST["editarId"],
                "fecha" => $_POST["editarFecha"],
                "total" => $_POST["editarPrecio"]
            );

            $respuesta = ModeloPresupuesto::MdlEditarPresupuesto($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>
	
						swal({
							  type: "success",
							  title: "El Presupuesto ha sido editado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {
	
										window.location = "ver-presupuestos";
	
										}
									})
	
						</script>';
            } else {


                echo '<script>
	
						swal({
							  type: "error",
							  title: "¡Verifique los datos del PResupuesto recuerde no puede ir vacío o llevar caracteres especiales!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {
	
								window.location = "ver-presupuestos";
	
								}
							})
	
					  </script>';
            }
        }
    }


    /*Eliminar presupuestos*/

    public static function ctrBorrarPresupuestos()
    {

        if (isset($_GET["idPre"])) {

            $tabla = "presupuesto";
            $datos = $_GET["idPre"];

            $respuesta = ModeloPresupuesto::mdlBorrarPresupuesto($tabla, $datos);


            if ($respuesta == "ok") {

                echo '<script>

                swal({
                      type: "success",
                      title: "El presupuesto ha sido borrado correctamente",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar",
                      closeOnConfirm: false
                      }).then(function(result){
                                if (result.value) {

                                window.location = "ver-presupuestos";

                                }
                            })

                </script>';
            }
        }
    }
}
