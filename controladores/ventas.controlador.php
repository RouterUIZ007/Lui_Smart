<?php

class ControladorVentas
{

	public static function ctrCrearVentas()
	{

		if (isset($_POST["btn1x"])) {

			# if (preg_match('/^[[0-9]+([.][0-9])]+$/', $_POST["nuevoTotal"])) {
			if (true) {

				$tabla = "venta";
				$datos = array();
				$respuesta = ModeloVenta::mdlIngresarVenta($tabla, $datos);

				if ($respuesta == "ok") {
					echo '<script>
					swal({
						type: "success",
						title: "¡La Venta se agrego correctamente xD!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
					}).then(function(result){
						if(result.value){
							window.location = "ventas";
						}
					});
					</script>';
				}
			} else {

				echo '<script>

					swal({

						type:"error",
						title:"¡Venta no guardada :c!",
						showConfirmButton: true,
						confirmButtonText:"Cerrar",
						closeOnConfirm:false

						}).then((result)=>{

							if(result.value){

								window.location = "ventas";

							}

						});

				</script>';
			}
		} 
	}
}
