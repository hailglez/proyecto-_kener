<?php
include 'plantilla.php';
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

$sqlb2 = "SELECT * FROM historico_comp WHERE employee_id= '{$_SESSION['username']}' AND periodo1= '$ty'";
$resultado2 = $mysqli->query($sqlb2);

$sqlb6 = "SELECT * FROM historico_comp WHERE employee_id= '{$_SESSION['username']}' AND periodo1= '$ty' or periodo2= '$ty'";
$resultado6 = $mysqli->query($sqlb6);


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
    $pdf->Cell(50,6,utf8_decode($trow['type']),1,1,'C',1);
    $pdf->Ln();
// Tabla de datos personales
    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(20,6,utf8_decode('Nómina'),1,0,'C',1);
    $pdf->Cell(60,6,utf8_decode('Nombre'),1,0,'C',1);
    $pdf->Cell(60,6,utf8_decode('Puesto'),1,0,'C',1);
    $pdf->Cell(40,6,utf8_decode('Área'),1,1,'C',1);

    $pdf->SetFont('Arial','',10);
        $pdf->Cell(20,8,$epro['username'],1,0,'C');
        $pdf->Cell(60,8,$epro['name'].' '. $epro['surname'],1,0,'C');
        $pdf->Cell(60,8,$epro['puesto'],1,0,'C');
        $pdf->Cell(40,8,$epro['area'],1,1,'C');
        $pdf->Ln();
    // Tabla de objetivos
    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(120,6,'Objetivo',1,0,'C',1);
    $pdf->Cell(20,6,utf8_decode('Porcentaje'),1,0,'C',1);
    
    $pdf->Cell(40,6,utf8_decode('Calificación'),1,1,'C',1);
    
    
    $pdf->SetFont('Arial','',10);

    while ($row = $resultado->fetch_assoc())
    {

        $pdf->Cell(120,8,utf8_decode($row['notes']),1,0,'C');
        $pdf->Cell(20,8,$row['porcentaje'],1,0,'C');

        $pdf->Cell(40,8,$row['calificacionf'],1,1,'C');
        
    }
    //Tabla de Competencias
while ($row2 = $resultado3->fetch_assoc()){
    $pdf->Ln();
}

$pdf->Ln();
$pdf->SetFillColor(232,232,232);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(85,6,'Competencia',1,0,'C',1);
$pdf->Cell(70,6,utf8_decode('Comentario'),1,0,'C',1);
$pdf->Cell(25,6,utf8_decode('Calificación'),1,1,'C',1);

$pdf->SetFont('Arial','',10);

while ($row3 = $resultado2->fetch_assoc())
{

    $pdf->Cell(85,6,utf8_decode($row3['tipo']),1,0,'C');
    $pdf->Cell(70,6,$row3['comp1'],1,0,'C');
    $pdf->Cell(25,6,$row3['p1'],1,1,'C');
}
// Tabla de Calificacion
$pdf->Ln();
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

while($trow3 = $resultado6->fetch_assoc()){
    if($trow3["fortalezas"] && $trow3["fortalezas"]!=""){
    $pdf->Cell(60,10,utf8_decode($trow3['fortalezas']),1,0,'C');
    $pdf->Cell(60,10,utf8_decode($trow3['oportunidades']),1,0,'C');
    $pdf->Cell(60,10, utf8_decode($trow3['conocimientos']),1,1,'C');
    }
}


    $pdf->output();



?>
