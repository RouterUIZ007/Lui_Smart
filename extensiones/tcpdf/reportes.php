<?php

require_once "../../controladores/presupuesto.controlador.php";
require_once "../../modelos/presupuesto.modelo.php";

require_once "../../controladores/servicio.controlador.php";
require_once "../../modelos/servicio.modelo.php";

require_once "../../controladores/vehiculos.controlador.php";
require_once "../../modelos/vehiculos.modelo.php";

require_once "../../controladores/reportes.controlador.php";
require_once "../../modelos/reportes.modelo.php";


//recuperando el valor del reporte

class imprimirReporte{

  public $fecha1;
  public $fecha2;

  public function traerImpresionPresupuesto(){


    $item= "fecha";

    $f1 = $this->fecha1;

    $f2 = $this->fecha2;

    
    $datos = array($f1, $f2);

    
    $tabla = "venta";

    /* RESPUESTA PATA LA TABLA Y RELLENAR VENTAS ENTRE LAS FECHAS */
    $respuestareporte = ControladorReporte::generarPdf($datos);

    echo json_encode($respuestareporte);

	  $folioventa = (int)$respuestareporte["folio_v"];
	  $fechaventa = (string)$respuestareporte["fecha"];
	  $foliopresu = (int)$respuestareporte["folio_p"];
  	$idemp = (int)$respuestareporte["id_e"];
	  $subtotalventa = (int)$respuestareporte["subtotal"];
	  $totalventa = (int)$respuestareporte["total"];
	  $cantidadventa = (int)$respuestareporte["cantidad"];
	  $cambioventa = (int)$respuestareporte["cambio"];



// Include the main TCPDF library (search for installation path).
require_once('tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


$pdf ->startPageGroup();

$pdf ->AddPage('P','A7');

// ---------------------------------------------------------

$bloque1 = <<<EOF
			
			<p style="width:540px"><img src="images/cabecera2.jpg"></p>
EOF;


$pdf->writeHTML($bloque1, false, false, false, false, '');



// ---------------------------------------------------------

$bloque2 = <<<EOF

    <h3>Periodo</h3>
    <table style="font-size:15px; padding5px 10px;">

    <tr>

      <td style=" background-color:white;">

        Fecha inicio: $f1

      </td>

      <td style=" background-color:white; text-align:right">
			
				Fecha final: $f2

			</td>

    </tr>

    </table>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');

// ---------------------------------------------------------

$bloque3 = <<<EOF

	<table style="font-size:12px; padding:5px 10px;">

    <tr>
		
      <td style=" background-color:white; width:540px"></td>

    </tr>

    <tr>
		
      <td style=" font-size:18px; background-color:white; width:540px;text-align:center">VENTAS GENERADAS</td>

    </tr>

    <tr>
		
      <td style=" background-color:white; width:540px"></td>

    </tr>

		<tr>
		
		<td style="border: 1px solid #666; background-color:white; width:67x; text-align:center">Folio venta</td>
		<td style="border: 1px solid #666; background-color:white; width:67px; text-align:center">Fecha</td>
		<td style="border: 1px solid #666; background-color:white; width:67px; text-align:center">Folio Presupuesto</td>
		<td style="border: 1px solid #666; background-color:white; width:67px; text-align:center">Empleado</td>
		<td style="border: 1px solid #666; background-color:white; width:67px; text-align:center">Subtotal</td>
		<td style="border: 1px solid #666; background-color:white; width:67px; text-align:center">Total</td>
		<td style="border: 1px solid #666; background-color:white; width:67px; text-align:center">Cantidad</td>
		<td style="border: 1px solid #666; background-color:white; width:67px; text-align:center">Cambio</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

// ---------------------------------------------------------






// ---------------------------------------------------------




//salida del archivo
$pdf->Output('presupuesto.pdf');

}

}


//traer el codigo de la fatura
$presupuesto = new imprimirReporte();
$presupuesto -> fecha1 = $_GET["fecha1"];
$presupuesto -> fecha2 = $_GET["fecha2"];
$presupuesto -> traerImpresionPresupuesto();

?>