<?php
include 'plantilla1.php';
require '../includes/session.php';
require '../includes/conn.php';

//consulta a la base de datos con operaciones aritmeticas.....
$sqlb = "SELECT * FROM historico WHERE employee_id= '{$_SESSION['username']}'";
$resultado = $mysqli->query($sqlb);

$sqlb1 = "SELECT * FROM periodos WHERE activo= '1' ORDER BY id DESC";
$resultado1 = $mysqli->query($sqlb1);
$trow = $resultado1->fetch_assoc();
$ty=$trow['fechai']." ". $trow['fechaf']." ". $trow['type'];

$sqlb2 = "SELECT * FROM historico_comp WHERE employee_id= '{$_SESSION['username']}' AND periodo1= '$ty'";
$resultado2 = $mysqli->query($sqlb2);

$sqlb4 = "SELECT AVG(p1) as total1 FROM historico_comp WHERE employee_id='{$_SESSION['username']}' AND periodo1= '$ty' ";
$resultado4 = $mysqli->query($sqlb4);
$trow1 = $resultado4->fetch_assoc();
    
$sqlb3 = "SELECT SUM(calificacionf*porcentaje/100 ) as total FROM historico WHERE employee_id='{$_SESSION['username']}'";
$resultado3 = $mysqli->query($sqlb3);

$sqlb5 = "SELECT SUM(calificacionf*porcentaje/100 ) as total FROM historico WHERE employee_id='{$_SESSION['username']}'";
$resultado5 = $mysqli->query($sqlb5);
$trow2 = $resultado5->fetch_assoc();

// apartir de aqui se contruye el PDF

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();

    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(15,6,'Nomina',1,0,'C',1);
    $pdf->Cell(70,6,'Objetivo',1,0,'C',1);
    $pdf->Cell(30,6,utf8_decode('Autoevaluación'),1,0,'C',1);
    $pdf->Cell(20,6,utf8_decode('Porcentaje'),1,0,'C',1);
    $pdf->Cell(20,6,utf8_decode('Medio Año'),1,0,'C',1);
    $pdf->Cell(15,6,utf8_decode('Final'),1,1,'C',1);
    
    
    $pdf->SetFont('Arial','',10);

    while ($row = $resultado->fetch_assoc())
    {

        $pdf->Cell(15,6,$row['employee_id'],1,0,'C');
        $pdf->Cell(70,6,utf8_decode($row['notes']),1,0,'C');
        $pdf->Cell(30,6,$row['calificaciona'],1,0,'C');
        $pdf->Cell(20,6,$row['porcentaje'],1,0,'C');
        $pdf->Cell(20,6,$row['calificacionm'],1,0,'C');
        $pdf->Cell(15,6,$row['calificacionf'],1,1,'C');
        
    }
while ($row2 = $resultado3->fetch_assoc()){
    $pdf->Ln();
}

$pdf->Ln();
$pdf->SetFillColor(232,232,232);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(15,6,'Nomina',1,0,'C',1);
$pdf->Cell(65,6,'Competencia',1,0,'C',1);
$pdf->Cell(70,6,utf8_decode('Comentario'),1,0,'C',1);
$pdf->Cell(20,6,utf8_decode('calificacion'),1,1,'C',1);

$pdf->SetFont('Arial','',10);

while ($row3 = $resultado2->fetch_assoc())
{

    $pdf->Cell(15,6,$row3['employee_id'],1,0,'C');
    $pdf->Cell(65,6,utf8_decode($row3['tipo']),1,0,'C');
    $pdf->Cell(70,6,$row3['comp1'],1,0,'C');
    $pdf->Cell(20,6,$row3['p1'],1,1,'C');

}
$pdf->Ln();
$pdf->Ln();
$pdf->SetFillColor(232,232,232);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(55,6,'Objetivos',1,0,'C',1);
$pdf->Cell(55,6,'Competencias',1,0,'C',1);
$pdf->Cell(55,6,utf8_decode('calificacion General'),1,1,'C',1);

$pdf->SetFont('Arial','',10);
$a=$trow2['total'];
$b=$trow1['total1'];
$aa=$a*60/100;
$bb=$b*40/100;
$full=$aa+$bb;
    $pdf->Cell(55,6,$aa,1,0,'C');
    $pdf->Cell(55,6, bcdiv($bb, '1', 2),1,0,'C');
    $pdf->Cell(55,6, bcdiv($full, '1', 2),1,1,'C');

    $pdf->output();



?>
