<?php

require_once "../../controladores/presupuesto.controlador.php";
require_once "../../modelos/presupuesto.modelo.php";

require_once "../../controladores/servicio.controlador.php";
require_once "../../modelos/servicio.modelo.php";

require_once "../../controladores/vehiculos.controlador.php";
require_once "../../modelos/vehiculos.modelo.php";


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
  

    //foreach ($respuestaServicio as $key => $value) {

      //$conceptos = $value["concepto"];
      //$costos = $value["costo"];
  
      
    //}


    //traemos la informacion del Vehiculo
    $itemautomovil = "id_v";
    $respuestaVehiculo = ControladorVehiculos::ctrMostrarVehiculos($itemautomovil,$id_v);

    $matricula = (string)$respuestaVehiculo["Matricula"];
    $marca = (string)$respuestaVehiculo["marca"];
    $modelo = (string)$respuestaVehiculo["modelo"];
    $color = (string)$respuestaVehiculo["color"];

  
   


 

// Include the main TCPDF library (search for installation path).
require_once('tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf ->startPageGroup();

$pdf->AddPage();

// ---------------------------------------------------------

$bloque1 = <<<EOF
			
			<p style="width:540px"><img src="images/cabecera2.jpg"></p>
EOF;


$pdf->writeHTML($bloque1, false, false, false, false, '');



// ---------------------------------------------------------

$bloque2 = <<<EOF

    <table style="font-size:15px; padding5px 10px;">

    <tr>

      <td style=" background-color:white; width:390px">

        Folio:$foliop

      </td>

      <td style=" background-color:white; width:150px; text-align:right">
			
				Fecha: $fecha

			</td>

    </tr>

    </table>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');


// ---------------------------------------------------------

$bloque3 = <<<EOF

    <table style="font-size:12px; padding5px 10px;">

    <tr>
		
		<td style="border-bottom: 1px solid #666; background-color:white; width:540px"></td>

		</tr>



    <tr>

    <td style="border: 1px solid #666; background-color:white; width:270px">

      Matrícula: $matricula

    </td>

    <td style="border: 1px solid #666; background-color:white; width:270px; text-align:right">
  
      Marca: $marca

    </td>

    </tr>




    <tr>

      <td style="border: 1px solid #666; background-color:white; width:270px">

				Modelo: $modelo

			</td>

			<td style="border: 1px solid #666; background-color:white; width:270px; text-align:right">
			
				Color: $color

			</td>
     

    </tr>

    <tr>
		
		<td style="background-color:white; width:540px"></td>

		</tr>

    <tr>
		
		<td style="background-color:white; width:540px"></td>

		</tr>


    <tr>
      <td style="font-size: 11px; background-color:white; width:540px; text-align:center">
        * Este presupuesto solo será vigente los próximos 7 días después de su emisión.
			</td>

    </tr>

  </table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

// ---------------------------------------------------------

$bloque4 = <<<EOF

	<table style="font-size:12px; padding:5px 10px;">

    <tr>
		
      <td style=" background-color:white; width:540px"></td>

    </tr>

    <tr>
		
      <td style=" font-size:18px; background-color:white; width:540px;text-align:center">SERVICIOS</td>

    </tr>

    <tr>
		
      <td style=" background-color:white; width:540px"></td>

    </tr>

		<tr>
		
		<td style="border: 1px solid #666; background-color:white; width:340px; text-align:center">Concepto</td>
		<td style="border: 1px solid #666; background-color:white; width:200px; text-align:center">Costo</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');

// ---------------------------------------------------------

// ---------------------------------------------------------
foreach ($respuestaServicio as $key => $value) {
  $conceptos = $value["concepto"];
  $costos = $value["costo"];

$bloque5 = <<<EOF

	<table style="font-size:12px; padding:5px 10px;">

    <tr>
			
      <td style="border: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center">
              $conceptos
      </td>

      <td style="border: 1px solid #666; color:#333; background-color:white; width:200px; text-align:center">$
             $costos
      </td>
</tr>

	</table>

EOF;

$pdf->writeHTML($bloque5, false, false, false, false, '');

}


// ---------------------------------------------------------
$iva = $subtotal * .16;
$tot = $iva+$subtotal;



$bloque6 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="color:#333; background-color:white; width:340px; text-align:center"></td>

			<td style="border-bottom: 1px solid #666; background-color:white; width:100px; text-align:center"></td>

			<td style="border-bottom: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center"></td>

		</tr>
		
		<tr>
		
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>

			<td style="border: 1px solid #666;  background-color:white; width:100px; text-align:center">
				Subtotal:
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">
				$ $subtotal
			</td>

		</tr>

		<tr>

			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>

			<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">
				IVA (16%):
			</td>
		
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">
				$ $iva
			</td>

		</tr>

		<tr>
		
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>

			<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">
				Total:
			</td>
			
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">
				$ $tot
			</td>

		</tr>


	</table>

EOF;

$pdf->writeHTML($bloque6, false, false, false, false, '');


// ---------------------------------------------------------




//salida del archivo
$pdf->Output('presupuesto.pdf');

}

}


//traer el codigo de la fatura
$presupuesto = new imprimirReporte();
$presupuesto -> codigo = $_GET["folio_p2"];
$presupuesto -> traerImpresionPresupuesto();

?>