<?php

class ControladorReporte
{

    public static function generarPdf()
    {


        if (isset($_POST["fecha1"])) {

            $tabla = "venta";
            $datos = array($_POST["fecha1"], $_POST["fecha2"]);
            echo '<script>console.log("' . $_POST["fecha1"] . '");</script>';
            echo '<script>console.log("' . $_POST["fecha2"] . '");</script>';
            $item = "fecha";


            echo '<script>console.log("reconocio el input");</script>';

            $respuesta = ModeloReportes::MdlReportes($tabla, $item, $datos);


            echo '<script>console.log("Entrega de resultado");</script>';

            /* PDF */


            /* IMPRIMIR NOTIFICACION */
            echo '<script>
                swal({
                    type: "success",
                    title: "¡ PDF AGREGADO :) !",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function(result){
                    if(result.value){
                        window.location = "reportes";
                    }
                });
                </script>';
        }
    }
}
