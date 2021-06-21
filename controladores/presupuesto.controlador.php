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

                /* GENERAR PDF DE PRESUPUESTO */


                $pdf = new PRESUPEUSTOPDF();
                $pdf->AliasNbPages();
                $pdf->AddPage();
                $pdf->SetFont('Times', '', 12);

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



                /* Cabecera */
                $pdf->cell(22, 10, 'Nombre', 1, 0, 'C', 0);
                $pdf->cell(22, 10, 'telefono', 1, 1, 'C', 0);

                $pdf->cell(22, 10, $cliente['nombre'], 1, 0, 'C', 0);
                $pdf->cell(22, 10, $cliente['telefono'], 1, 1, 'C', 0);
                $pdf->Ln(10);

                /* SERVICIOS */
                $pdf->cell(22, 10, 'codigo', 1, 0, 'C', 0);
                $pdf->cell(22, 10, 'concepto', 1, 0, 'C', 0);
                $pdf->cell(22, 10, 'costo', 1, 0, 'C', 0);
                $pdf->cell(22, 10, 'tipo', 1, 0, 'C', 0);
                $pdf->cell(22, 10, 'Id_v', 1, 1, 'C', 0);



                foreach ($servicios as $key => $value) {
                    $pdf->cell(22, 10, $value['codigo'], 1, 0, 'C', 0);
                    $pdf->cell(22, 10, $value['concepto'], 1, 0, 'C', 0);
                    $pdf->cell(22, 10, $value['costo'], 1, 0, 'C', 0);
                    $pdf->cell(22, 10, $value['tipo'], 1, 0, 'C', 0);
                    $pdf->cell(22, 10, $value['Id_v'], 1, 1, 'C', 0);
                }
                $pdf->Ln(10);



                $total = ControladorServicios::ctrMostrarServicio2($item);
                $pdf->cell(22, 10, 'TOTAL:', 1, 0, 'C', 0);
                $pdf->cell(22, 10, $total[0][0], 1, 1, 'C', 0);

                echo '<script>console.log("recorio los valores");</script>';
                $hoy = getdate();
                $pdf->Output("presupuesto_$hoy[year]$hoy[mon]$hoy[mday]$hoy[hours]$hoy[minutes].pdf", "F");
                echo '<script>console.log("genero PDF");</script>';













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
        $respuesta = ModeloClientes::MdlMostrarClientes($tabla, $item, $valor);
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

        if (isset($_POST["fecha"])) {

            if (
                true
            ) {


                $tabla = "presupuesto";

                $datos = array(
                    "fecha" => $_POST["editarFecha"],
                    "precio" => $_POST["editarPrecio"]
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
	
										window.location = "ver-presupuesto";
	
										}
									})
	
						</script>';
                }
            } else {


                echo '<script>
	
						swal({
							  type: "error",
							  title: "¡Verifique los datos del PResupuesto recuerde no puede ir vacío o llevar caracteres especiales!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {
	
								window.location = "ver-presupuesto";
	
								}
							})
	
					  </script>';
            }
        }
    }


    /*Eliminar presupuestos*/

    public static function ctrBorrarPresupuestos()
    {

        if (isset($_GET["foliopresupuesto"])) {

            $tabla = "presupuesto";
            $datos = $_GET["foliopresupuesto"];

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
