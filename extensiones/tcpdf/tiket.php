<?php

require_once "../../controladores/presupuesto.controlador.php";
require_once "../../modelos/presupuesto.modelo.php";

require_once "../../controladores/servicio.controlador.php";
require_once "../../modelos/servicio.modelo.php";

require_once "../../controladores/vehiculos.controlador.php";
require_once "../../modelos/vehiculos.modelo.php";

require_once "../../controladores/venta.controlador.php";
require_once "../../modelos/venta.modelo.php";


//recuperando el valor del reporte

class imprimirReporte{

  public $codigo;

  public function traerImpresionPresupuesto(){
    
    $itemPresupuesto = "folio_p";
    $valorPresupuesto = $this->codigo;


    //traemos la informacion del presupuesto
    $respuestaPresupuesto = ControladorPresupuesto::ctrMostrarPresupuesto($itemPresupuesto, $valorPresupuesto);

  
    

    $foliop = (int)$respuestaPresupuesto["folio_p"];
    $fecha = (string)$respuestaPresupuesto["fecha"];
    $id_v = (int)$respuestaPresupuesto["id_v"];
    $subtotal = (int)$respuestaPresupuesto["total"];


    //traemos la informacion de los servicios

    $respuestaServicio = ControladorServicios::ctrMostrarServicioPDF($id_v);



    //traemos la informacion del Vehiculo
    $itemautomovil = "id_v";
    $respuestaVehiculo = ControladorVehiculos::ctrMostrarVehiculos($itemautomovil,$id_v);

    $matricula = (string)$respuestaVehiculo["Matricula"];
    $marca = (string)$respuestaVehiculo["marca"];
    $modelo = (string)$respuestaVehiculo["modelo"];

    //traemos la informacion de las ventas

   

    $respuestaVentas = ControladorVenta::ctrMostrarventasPDF($valorPresupuesto);
   

    $folioventa = (int)$respuestaVentas["folio_v"];
    $fechaventa = (string)$respuestaVentas["fecha"];
    $subtotalventa = (int)$respuestaVentas["subtotal"];
    $iva = $subtotalventa * .16;
    $totalventa = (int)$respuestaVentas["total"];
    $pagoventa = (int)$respuestaVentas["cantidad"];
    $cambioventa = (int)$respuestaVentas["cambio"];


    date_default_timezone_set('America/Mexico_City');
    $hora = date('H:i:s');
    
    
 

// Include the main TCPDF library (search for installation path).
require_once('tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


$pdf ->startPageGroup();

$pdf ->AddPage('P','A7');
// ---------------------Ancho 150------------------------------------

$bloque1 = <<<EOF
			
			<p style="width:150px"><img src="images/cabecera2.jpg"></p>
EOF;


$pdf->writeHTML($bloque1, false, false, false, false, '');



// ---------------------------------------------------------

$bloque2 = <<<EOF

    <table style="font-size:5px; padding5px 10px;">

    <tr>

      <td style=" font-size:9px; background-color:white; width:150px;text-align:center">

        Ticket No. $folioventa

      </td>

    </tr>

    <tr>
		
		  <td style=" background-color:white; width:150px"></td>

		</tr>

    <tr>

      <td style=" background-color:white; width:75px">

        Fecha: $fechaventa

      </td>

      <td style=" background-color:white; width:75px; text-align:right">

        Hora: $hora

      </td>

     

    </tr>

    </table>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');


// ---------------------------------------------------------

$bloque3 = <<<EOF

    <table style="font-size:5px; padding5px 10px;">

    <tr>
		
		<td style=" background-color:white; width:540px"></td>

		</tr>



    <tr>

    <td style=" background-color:white; width:50x">

      Matrícula: $matricula

    </td>

    <td style="background-color:white; width:50px; text-align:right">
  
      Marca: $marca

    </td>

    <td style="background-color:white; width:50px; text-align:right">
  
      Modelo: $modelo

    </td>

    </tr>

  </table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

// ---------------------------------------------------------
$bloque4 = <<<EOF

	<table style="font-size:5px; padding5px 10px;">

    <tr>
		
      <td style=" background-color:white; width:150px"></td>

    </tr>

    <tr>
		
      <td style=" background-color:white; width:150px"></td>

    </tr>

    <tr>
		
      <td style=" font-size:5px; background-color:white; width:150px;text-align:center">SERVICIOS</td>

    </tr>

    <tr>
		
      <td style=" background-color:white; width:150px"></td>

    </tr>

		<tr>
		
		<td style="border: 1px solid #666; background-color:white; width:90px; text-align:center">Concepto</td>
		<td style="border: 1px solid #666; background-color:white; width:60px; text-align:center">Costo</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');

// ---------------------------------------------------------
foreach ($respuestaServicio as $key => $value) {
  $conceptos = $value["concepto"];
  $costos = $value["costo"];

$bloque5 = <<<EOF

	<table style="font-size:5px; padding:2px 10px;">

    <tr>
			
      <td style="border: 1px solid #666; color:#333; background-color:white; width:90px; text-align:center">
              $conceptos
      </td>

      <td style="border: 1px solid #666; color:#333; background-color:white; width:60px; text-align:center">$
             $costos
      </td>
</tr>

	</table>

EOF;

$pdf->writeHTML($bloque5, false, false, false, false, '');

}
// ---------------------------------------------------------
$bloque6 = <<<EOF

	<table style="font-size:5px; padding:1px 10px;">

  	<tr>
		
      <td style=" background-color:white; width:150px"></td>
      <td style=" background-color:white; width:150px"></td>
      <td style=" background-color:white; width:150px"></td>

    </tr>
		
		<tr>
		
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:30px; text-align:center"></td>

			<td style="font-weight: bold; font-size:5px;border: 1px solid #666;  background-color:white; width:60px; text-align:right">
				Subtotal:
			</td>

			<td style="font-weight: bold; font-size:5px;border: 1px solid #666; color:#333; background-color:white; width:60px; text-align:left">
				$ $subtotalventa.00
			</td>

		</tr>

		<tr>

			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:30px; text-align:center"></td>

			<td style="font-weight: bold; font-size:5px;border: 1px solid #666; background-color:white; width:60px; text-align:right">
				IVA (16%):
			</td>
		
			<td style="font-weight: bold; font-size:5px;border: 1px solid #666; color:#333; background-color:white; width:60px; text-align:left">
				$ $iva  
			</td>

		</tr>

		<tr>
		
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:30px; text-align:right"></td>

			<td style="font-weight: bold; font-size:5px;border: 1px solid #666; background-color:white; width:60px; text-align:right">
				Total:
			</td>
			
			<td style="font-weight: bold; font-size:5px;border: 1px solid #666; color:#333; background-color:white; width:60px; text-align:left">
				$ $totalventa.00 
			</td>

		</tr>

    <tr>
		
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:30px; text-align:right"></td>

			<td style="font-weight: bold; font-size:5px;border: 1px solid #666; background-color:white; width:60px; text-align:right">
				Pago:
			</td>
			
			<td style="font-weight: bold; font-size:5px;border: 1px solid #666; color:#333; background-color:white; width:60px; text-align:left">
				$ $pagoventa.00 
			</td>

		</tr>

    <tr>
		
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:30px; text-align:right"></td>

			<td style="font-weight: bold; font-size:5px;border: 1px solid #666; background-color:white; width:60px; text-align:right">
				Cambio:
			</td>
			
			<td style="font-weight: bold; font-size:5px;border: 1px solid #666; color:#333; background-color:white; width:60px; text-align:left">
				$ $cambioventa.00 
			</td>

		</tr>

    <tr>
		
      <td style=" background-color:white; width:150px"></td>

    </tr>

    <tr>
		
      <td style=" background-color:white; width:150px"></td>

    </tr>

    


	</table>

EOF;

$pdf->writeHTML($bloque6, false, false, false, false, '');


// ---------------------------------------------------------
$bloque7 = <<<EOF
			
			<p style="width:150px; font-size:5px; text-align:center">¡GRACIAS POR SU COMPRA!</p>
EOF;


$pdf->writeHTML($bloque7, false, false, false, false, '');





//salida del archivo
$pdf->Output('presupuesto.pdf');

}

}


//traer el codigo de la fatura
$presupuesto = new imprimirReporte();
$presupuesto -> codigo = $_GET["folio_p2"];
$presupuesto -> traerImpresionPresupuesto();

?>