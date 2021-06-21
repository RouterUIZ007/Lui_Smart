<?php


class ControladorVenta
{

    public static function ctrAgregarVenta()
    {

        if (isset($_POST["editarFolio"])) {

            if (true) {

                $tabla = "venta";
                $datos = array(
                    "folio_p" => $_POST["editarFolio"],
                    "total" => $_POST["editarTotal2"],
                    "subtotal" => $_POST["editarTotal"],
                    "cantidad" => $_POST["editarDinero"],
                    "cambio" => $_POST["editarCambio"],
                    "id_e" => $_SESSION["id"]
                );

                $respuesta = ModeloVenta::mdlAgregarVenta($tabla, $datos);



                /* AGREGAR PDF */


                /* GENEAR PDF */
                // Creación del objeto de la clase heredada
                $pdf = new TIKET();
                $pdf->AliasNbPages();
                $pdf->AddPage();
                $pdf->SetFont('Times', '', 12);


                $pdf->cell(22, 10, $_POST["editarFolio"], 1, 0, 'C', 0);
                $pdf->cell(22, 10, $_POST["editarTotal2"], 1, 0, 'C', 0);
                $pdf->cell(22, 10, $_POST["editarIva"], 1, 0, 'C', 0);
                $pdf->cell(22, 10, $_POST["editarTotal"], 1, 0, 'C', 0);
                $pdf->cell(22, 10, $_POST["editarDinero"], 1, 0, 'C', 0);
                $pdf->cell(22, 10, $_POST["editarCambio"], 1, 0, 'C', 0);

                $hoy = getdate();
                $pdf->Output("Tiket_venta_$hoy[year]$hoy[mon]$hoy[mday]$hoy[hours]$hoy[minutes].pdf", "F");
                echo '<script>console.log("genero PDF");</script>';



                /* PDF AGREGADO */
                if ($respuesta == "ok") {
                    echo '<script>
					swal({
						type: "success",
						title: "¡ Venta agregada :) !",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
					}).then(function(result){
						if(result.value){
							window.location = "venta";
						}
					});
					</script>';
                } else {
                    echo '<script>
                        swal({
                            type:"error",
                            title:"¡ Error al agregar la venta BD :( !",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                            }).then((result)=>{
                                if(result.value){
                                    window.location = "venta";
                                }
                            });
                    </script>';
                }
            }
        }
    }

    public static function ctrMostrarPresupuestoVenta($item, $valor)
    {

        /*Pasando la tabla*/
        $tabla = "presupuesto";
        /* Haciendo uso del modelo*/
        $respuesta = ModeloVenta::MdlMostrarPresupuestoVenta($tabla, $item, $valor);

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
								window.location = "venta";
							}
						});

				</script>';
            return null;
        }

        return $respuesta;
    }
    public static function ctrMostrarVentas($item, $valor)
    {

        /*Pasando la tabla*/
        $tabla = "venta";
        /* Haciendo uso del modelo*/
        $respuesta = ModeloVenta::MdlMostrarVentas($tabla, $item, $valor);

        if ($respuesta == false) {
            echo '<script>
					swal({
						type:"error",
						title:"Ventas no encontradas",
						showConfirmButton: true,
						confirmButtonText:"Cerrar",
						closeOnConfirm:false
						}).then((result)=>{
							if(result.value){
								window.location = "venta";
							}
						});

				</script>';
            return null;
        }

        return $respuesta;
    }
}
