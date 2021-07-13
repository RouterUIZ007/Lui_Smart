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

                /* PDF AGREGADO */
                if ($respuesta == "ok") {
                    echo '<script>
					swal({
						type: "success",
						title: "¡Pago del servicio registrado!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
					}).then(function(result){
						if(result.value){
                            console.log("abrie ventanas");
                            window.open("extensiones/tcpdf/tiket.php?folio_p2="+'.$_POST["editarFolio"].',"_blank");
                            console.log("abrio PDF");
							window.location = "venta";
                            console.log("abrie NOtify");
						}
					});
					</script>';
                } else {
                    echo '<script>
                        swal({
                            type:"error",
                            title:"¡Error al registrar el Pago del servicio!",
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
						title:"Venta no encontrada",
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

    public static function ctrMostrarventasPDF($valor)
    {
        
        $tabla = "venta";
        $item = "folio_p";
        /* Haciendo uso del modelo*/
        $respuesta = ModeloVenta::MdlMostrarventasPDF($tabla, $valor, $item);
        return $respuesta;
    }
}
