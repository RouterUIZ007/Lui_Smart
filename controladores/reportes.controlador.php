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






            /* GENEAR PDF */
            // Creación del objeto de la clase heredada
            $pdf = new PDF();
            $pdf->AliasNbPages();
            $pdf->AddPage();
            $pdf->SetFont('Times', '', 12);

            foreach ($respuesta as $key => $value) {
                $pdf->cell(22, 10, $value['folio_v'], 1, 0, 'C', 0);
                $pdf->cell(22, 10, $value['fecha'], 1, 0, 'C', 0);
                $pdf->cell(22, 10, $value['folio_p'], 1, 0, 'C', 0);
                $pdf->cell(22, 10, $value['id_e'], 1, 0, 'C', 0);
                $pdf->cell(22, 10, $value['total'], 1, 0, 'C', 0);
                $pdf->cell(22, 10, $value['subtotal'], 1, 0, 'C', 0);
                $pdf->cell(22, 10, $value['cantidad'], 1, 0, 'C', 0);
                $pdf->cell(22, 10, $value['cambio'], 1, 1, 'C', 0);
            }

            echo '<script>console.log("recorio los valores");</script>';
            $hoy = getdate();
            $pdf->Output("reporte_$hoy[year]$hoy[mon]$hoy[mday]$hoy[hours]$hoy[minutes].pdf", "F");
            echo '<script>console.log("genero PDF");</script>';


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
