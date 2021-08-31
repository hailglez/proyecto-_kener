<?php
require 'plantilla1.php';
require '../includes/session.php';
require '../includes/conn.php';
$sqlA =mysqli_query($mysqli,"SELECT * FROM users WHERE username='{$_SESSION['username']}'");
$epro=mysqli_fetch_array($sqlA);
//consulta a la base de datos con operaciones aritmeticas.....
$sqlb = "SELECT * FROM historico WHERE employee_id= '{$_SESSION['username']}'";
$resultado = $mysqli->query($sqlb);

$sqlb1 = "SELECT * FROM periodos WHERE activo= '1' ORDER BY id DESC";
$resultado1 = $mysqli->query($sqlb1);
$trow = $resultado1->fetch_assoc();
$ty=$trow['fechai']." ". $trow['fechaf']." ". $trow['type'];

$sqlb2 = "SELECT * FROM historico_comp WHERE employee_id= '{$_SESSION['username']}'";
$resultado2 = $mysqli->query($sqlb2);

$sqlb6 = "SELECT * FROM historico_comp WHERE employee_id= '{$_SESSION['username']}'";
$resultado6 = $mysqli->query($sqlb6);



// apartir de aqui se construye el PDF
$pdf=new PDF_MC_Table();
$pdf->AddPage();

$pdf->SetDrawColor(61,174,233);
$pdf->Line(10,35,190,35);
$pdf->SetFillColor(232,232,232);
$pdf->SetDrawColor(255,255,255);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(50,6,utf8_decode('Reporte General'),1,1,'C',1);
$pdf->Ln();
// Tabla de datos personales
$pdf->SetFillColor(232,232,232);
$pdf->SetDrawColor(40,40,40);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,6,utf8_decode('Nómina'),1,0,'C',1);
$pdf->Cell(60,6,utf8_decode('Nombre'),1,0,'C',1);
$pdf->Cell(60,6,utf8_decode('Puesto'),1,0,'C',1);
$pdf->Cell(40,6,utf8_decode('Área'),1,1,'C',1);

// Tabla con 1 filas y 4 columnas
$pdf->SetWidths(array(20,60,60,40));
for($i=0;$i<1;$i++)
	$pdf->Row(array(utf8_decode($epro['username']),
	utf8_decode($epro['name'].' '. $epro['surname']),
	utf8_decode($epro['puesto']),utf8_decode($epro['area'])));
	$pdf->Ln();

 // Tabla de objetivos
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(60,6,'Objetivo',1,0,'C',1);
	$pdf->Cell(20,6,utf8_decode('Porcentaje'),1,0,'C',1);
	$pdf->Cell(20,6,utf8_decode('Calificación'),1,0,'C',1);
	$pdf->Cell(40,6,utf8_decode('Comentarios'),1,0,'C',1);
	$pdf->Cell(40,6,utf8_decode('Periodo'),1,1,'C',1);
	$pdf->SetFont('Arial','',10);

$pdf->SetWidths(array(60,20,20,40,40));
while ($row = $resultado->fetch_assoc()){
	$pdf->Row(array(utf8_decode($row['notes']),
	$row['porcentaje'],$row['calificacionf'],
	$row['justificacionf'], $row['periodo3']));	
}
 //Tabla de Competencias
 $pdf->Ln();
 $pdf->SetFillColor(232,232,232);
 $pdf->SetTextColor(0,0,0);
 $pdf->SetFont('Arial','B',10);
 $pdf->Cell(60,6,'Competencia',1,0,'C',1);
 $pdf->Cell(60,6,utf8_decode('Comentario'),1,0,'C',1);
 $pdf->Cell(20,6,utf8_decode('Calificación'),1,0,'C',1);
 $pdf->Cell(40,6,utf8_decode('Periodo'),1,1,'C',1);
 $pdf->SetFont('Arial','',10);

 $pdf->SetWidths(array(60,60,20,40));
 while ($row3 = $resultado2->fetch_assoc()){
	$pdf->Row(array(utf8_decode($row3['tipo']),
	utf8_decode($row3['comp1']),utf8_decode($row3['p1']),
		$row3['periodo2']));	
 }
// Tabla de Fortalezas y oportunidades
$pdf->Ln();
$pdf->Ln();
$pdf->SetFillColor(232,232,232);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(50,6,'Fortalezas',1,0,'C',1);
$pdf->Cell(50,6,'Oportunidades',1,0,'C',1);
$pdf->Cell(50,6,utf8_decode('Acciones de desarrollo'),1,0,'C',1);
$pdf->Cell(30,6,utf8_decode('periodo'),1,1,'C',1);
$pdf->SetFont('Arial','',10);

$pdf->SetWidths(array(50,50,50,30));
	while($trow3 = $resultado6->fetch_assoc()){
		if($trow3["fortalezas"] && $trow3["fortalezas"]!=""){
	$pdf->Row(array(utf8_decode($trow3['fortalezas']),
	utf8_decode($trow3['oportunidades']),utf8_decode($trow3['conocimientos']),
	$trow3['periodo2']));	
 }
}
$pdf->Output();
?>
