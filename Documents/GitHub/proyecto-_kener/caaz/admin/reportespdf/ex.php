<?php
require 'mc_table.php';
require '../includes/session.php';
require '../includes/conn.php';
$sqlA =mysqli_query($mysqli,"SELECT * FROM users WHERE username='{$_SESSION['username']}'");
$epro=mysqli_fetch_array($sqlA);
//consulta a la base de datos con operaciones aritmeticas.....

$sqlb1 = "SELECT * FROM periodos WHERE activo= '1' ORDER BY id DESC";
$resultado1 = $mysqli->query($sqlb1);
$trow = $resultado1->fetch_assoc();
$ty=$trow['fechai']." ". $trow['fechaf']." ". $trow['type'];

$sqlb = "SELECT * FROM cases WHERE employee_id= '{$_SESSION['username']}' 
AND (Periodo1= '$ty' or periodo2= '$ty' or periodo3= '$ty')";
$resultado = $mysqli->query($sqlb);

$sqlb2 = "SELECT * FROM historico_comp WHERE employee_id= '{$_SESSION['username']}' AND (periodo1= '$ty' or periodo2= '$ty')";
$resultado2 = $mysqli->query($sqlb2);

$sqlb6 = "SELECT * FROM historico_comp WHERE employee_id= '{$_SESSION['username']}' AND (periodo1= '$ty' or periodo2= '$ty')";
$resultado6 = $mysqli->query($sqlb6);

$sqlb4 = "SELECT AVG(p1) as total1 FROM historico_comp WHERE employee_id='{$_SESSION['username']}' AND (periodo1= '$ty' or periodo2= '$ty') ";
$resultado4 = $mysqli->query($sqlb4);
$trow1 = $resultado4->fetch_assoc();
    
$sqlb3 = "SELECT SUM(calificaciona*porcentaje/100 ) as total FROM cases WHERE employee_id='{$_SESSION['username']}' 
AND (Periodo1='$ty' or periodo2= '$ty' or periodo3= '$ty')";
$resultado3 = $mysqli->query($sqlb3);

$sqlb5 = "SELECT SUM(calificaciona*porcentaje/100 ) as total FROM cases WHERE employee_id='{$_SESSION['username']}' 
AND (Periodo1='$ty' or periodo2= '$ty' or periodo3= '$ty')";
$resultado5 = $mysqli->query($sqlb5);
$trow2 = $resultado5->fetch_assoc();


// apartir de aqui se contruye el PDF

$pdf=new PDF_MC_Table();
$pdf->AddPage();

$pdf->SetDrawColor(61,174,233);
$pdf->Line(10,35,190,35);
$pdf->SetFillColor(232,232,232);
$pdf->SetDrawColor(255,255,255);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(100,6,utf8_decode($trow['type'].' De: '.$trow['fechai'].' A: '.$trow['fechaf']),1,1,'C',1);
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
	$pdf->Cell(75,6,'Medida',1,0,'C',1);
	$pdf->Cell(25,6,utf8_decode('Calificación'),1,1,'C',1);
	$pdf->SetFont('Arial','',10);

$pdf->SetWidths(array(60,20,75,25));
while ($row = $resultado->fetch_assoc()){
	$pdf->Row(array(utf8_decode($row['notes']),
	$row['porcentaje'].'%',"1.-".utf8_decode($row['medida1'])."\n2.-".utf8_decode($row['medida2'])
	."\n3.-".utf8_decode($row['medida3'])."\n4.-".utf8_decode($row['medida4'])."\n5.-".utf8_decode($row['medida5']),$row['calificacionf']));	
}
 //Tabla de Competencias
 $pdf->Ln();
 $pdf->SetFillColor(232,232,232);
 $pdf->SetTextColor(0,0,0);
 $pdf->SetFont('Arial','B',10);
 $pdf->Cell(85,6,'Competencia',1,0,'C',1);
 $pdf->Cell(70,6,utf8_decode('Comentario'),1,0,'C',1);
 $pdf->Cell(25,6,utf8_decode('Calificación'),1,1,'C',1);
 $pdf->SetFont('Arial','',10);

 $pdf->SetWidths(array(85,70,25));
 while ($row3 = $resultado2->fetch_assoc()){
	$pdf->Row(array(utf8_decode($row3['tipo']),
	$row3['comp1'],$row3['p1']));	
 }
// Tabla de Calificacion
$pdf->Ln();
$pdf->SetFillColor(232,232,232);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(45,6,'Objetivos',1,0,'C',1);
$pdf->Cell(35,6,'Competencias',1,0,'C',1);
$pdf->Cell(45,6,utf8_decode('Calificación General'),1,1,'C',1);
$pdf->SetFont('Arial','',10);
$a=$trow2['total'];
$b=$trow1['total1'];
$aa=$a*60/100;
$bb=$b*40/100;
$full=$aa+$bb;
    $pdf->Cell(45,8,$aa,1,0,'C');
    $pdf->Cell(35,8, bcdiv($bb, '1', 2),1,0,'C');
    $pdf->Cell(45,8, bcdiv($full, '1', 2),1,1,'C');
// Tabla de Fortalezas y oportunidades
$pdf->Ln();
$pdf->Ln();
$pdf->SetFillColor(232,232,232);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(60,6,'Fortalezas',1,0,'C',1);
$pdf->Cell(60,6,'Oportunidades',1,0,'C',1);
$pdf->Cell(60,6,utf8_decode('Acciones de desarrollo'),1,1,'C',1);
$pdf->SetFont('Arial','',10);

$pdf->SetWidths(array(60,60,60));
	while($trow3 = $resultado6->fetch_assoc()){
		if($trow3["fortalezas"] && $trow3["fortalezas"]!=""){
	$pdf->Row(array(utf8_decode($trow3['fortalezas']),
	utf8_decode($trow3['oportunidades']),utf8_decode($trow3['conocimientos'])));	
 }
}
$pdf->Output();
?>
