<?php
require('fpdf/fpdf.php');

class PDF extends FPDF{
    // Cabecera de página
    function Header(){
        // Logo
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Movernos a la derecha
        $this->Cell(30);
        // Título
        $this->Cell(80, 10, 'Reportes de Ventas', 1, 0, 'C');
        // Salto de línea
        $this->Ln(20);

        $this->cell(22, 10, 'folio_v ', 1, 0, 'C', 0);
        $this->cell(22, 10, 'fecha', 1, 0, 'C', 0);
        $this->cell(22, 10, 'folio_p ', 1, 0, 'C', 0);
        $this->cell(22, 10, 'id_e ', 1, 0, 'C', 0);
        $this->cell(22, 10, 'total', 1, 0, 'C', 0);
        $this->cell(22, 10, 'subtotal', 1, 0, 'C', 0);
        $this->cell(22, 10, 'cantidad', 1, 0, 'C', 0);
        $this->cell(22, 10, 'cambio', 1, 1, 'C', 0);
    }

    // Pie de página
    function Footer(){
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}


class TIKET extends FPDF{
    // Cabecera de página
    function Header(){
        // Logo
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Movernos a la derecha
        $this->Cell(30);
        // Título
        $this->Cell(80, 10, 'TIKET DE VENTA', 1, 0, 'C');
        // Salto de línea
        $this->Ln(20);

        $this->cell(22, 10, 'FOLIO', 1, 0, 'C', 0);
        $this->cell(22, 10, 'SubTotal', 1, 0, 'C', 0);
        $this->cell(22, 10, 'IVA', 1, 0, 'C', 0);
        $this->cell(22, 10, 'Total ', 1, 0, 'C', 0);
        $this->cell(22, 10, 'Pago', 1, 0, 'C', 0);
        $this->cell(22, 10, 'Cambio', 1, 1, 'C', 0);
    }

    // Pie de página
    function Footer(){
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
    }
}

class PRESUPEUSTOPDF extends FPDF{
    // Cabecera de página
    function Header(){
        // Logo
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Movernos a la derecha
        $this->Cell(30);
        // Título
        $this->Cell(80, 10, 'PRESUPUESTO', 1, 0, 'C');
        // Salto de línea
        $this->Ln(20);

    }

    // Pie de página
    function Footer(){
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}