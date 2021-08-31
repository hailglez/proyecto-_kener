<?php
require 'fpdf/fpdf.php';

class PDF extends FPDF
{
    function Header()
    {

    $this->image('fpdf\imagen\logo.png',5,5, 30);
    $this->SetFont('Arial','B',15);
    $this->SetXY(10,20);
    $this->Cell(30);
    $this->Cell(120,10, 'Reporte Hirorico',0,0,'C');

    $this->Ln(20);

    }

    function Footer()
    {

    $this->SetY(-15);
    $this->SetFont('Arial','I', 6);
    $this->Cell(0,10,'Pagina'.$this->PageNo().'/{nb}',0,0,'C' );
    }

}