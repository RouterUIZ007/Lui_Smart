<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'Title',1,0,'C');
    // Salto de línea
    $this->Ln(20);

	$this->cell(20,10,'codigo',1,0,'C',0);
	$this->cell(60,10,'concepto',1,0,'C',0);
	$this->cell(20,10,'costo',1,0,'C',0);
	$this->cell(50,10,'tipo',1,0,'C',0);
	$this->cell(20,10,'Id_v',1,1,'C',0);


}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

require 'cn.php';
$consulta = "Select * FROM servicio";
$resultado = $mysqli -> query($consulta);


// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);


while($row = $resultado->fetch_assoc()){

	$pdf->cell(20,10,$row['codigo'],1,0,'C',0);
	$pdf->cell(60,10,$row['concepto'],1,0,'C',0);
	$pdf->cell(20,10,$row['costo'],1,0,'C',0);
	$pdf->cell(50,10,$row['tipo'],1,0,'C',0);
	$pdf->cell(20,10,$row['Id_v'],1,1,'C',0);

}


$pdf->Output("nombre_archivoo.pdf","F");
?>