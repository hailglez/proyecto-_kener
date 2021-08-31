
<?php
include 'plantilla2.php';
require '../includes/session.php';
require '../includes/conn.php';
$sqlA =mysqli_query($mysqli,"SELECT * FROM users WHERE username='{$_SESSION['username']}'");
$epro=mysqli_fetch_array($sqlA);
//consulta a la base de datos con operaciones aritmeticas.....
$sqlb = "SELECT * FROM historico WHERE employee_id= '{$_SESSION['username']}'";
$resultado = $mysqli->query($sqlb);

//$sqlb6 = "SELECT * FROM historico_comp WHERE employee_id= '{$_SESSION['username']}' AND periodo1= '$ty' or periodo2= '$ty'";
//$resultado6 = $mysqli->query($sqlb6);

//$sqlb4 = "SELECT AVG(p1) as total1 FROM historico_comp WHERE employee_id='{$_SESSION['username']}' AND periodo1= '$ty' ";
//$resultado4 = $mysqli->query($sqlb4);
//$trow1 = $resultado4->fetch_assoc();
    
//$sqlb3 = "SELECT SUM(calificacionf*porcentaje/100 ) as total FROM historico WHERE employee_id='{$_SESSION['username']}'";
//$resultado3 = $mysqli->query($sqlb3);

//$sqlb5 = "SELECT SUM(calificacionf*porcentaje/100 ) as total FROM historico WHERE employee_id='{$_SESSION['username']}'";
//$resultado5 = $mysqli->query($sqlb5);
//$trow2 = $resultado5->fetch_assoc();
if(isset($mysqli,$_POST['update']));
					
    $type = mysqli_real_escape_string($mysqli,$_POST['type']);
    $periodo = mysqli_real_escape_string($mysqli,$_POST['periodo']);
    $colaborador = mysqli_real_escape_string($mysqli,$_POST['colaborador']);
if ($_POST['colaborador'] != '*'){
    $sqlb = "SELECT * FROM users WHERE id= '{$_POST['colaborador']}'";
    $resultado = $mysqli->query($sqlb);
    $row = $resultado->fetch_assoc();
    $sqlb1 = "SELECT * FROM periodos WHERE id= '{$_POST['periodo']}'";
    $resultado1 = $mysqli->query($sqlb1);
    $row1 = $resultado1->fetch_assoc();
    $ty=$row1['fechai']." ". $row1['fechaf']." ". $row1['type'];

    $sqlb2 = "SELECT * FROM historico WHERE employee_id= '{$row['username']}' 
    AND Periodo1= '$ty' or periodo2= '$ty' or periodo3= '$ty'";
    $resultado2 = $mysqli->query($sqlb2);
// apartir de aqui se contruye el PDF

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
// Tabla de datos personales
    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(20,6,utf8_decode('Nómina'),1,0,'C',1);
    $pdf->Cell(60,6,utf8_decode('Nombre'),1,0,'C',1);
    $pdf->Cell(60,6,utf8_decode('Puesto'),1,0,'C',1);
    $pdf->Cell(40,6,utf8_decode('Área'),1,1,'C',1);
    $pdf->SetFont('Arial','',10);
        $pdf->Cell(20,8,$row['username'],1,0,'C');
        $pdf->Cell(60,8,$row['name'].' '. $row['surname'],1,0,'C');
        $pdf->Cell(60,8,$row['puesto'],1,0,'C');
        $pdf->Cell(40,8,$row['area'],1,1,'C');
        $pdf->Ln();
// Tabla de objetivos
        $pdf->SetFillColor(232,232,232);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(80,6,'Objetivo',1,0,'C',1);
        $pdf->Cell(20,6,utf8_decode('Porcentaje'),1,0,'C',1);
        $pdf->Cell(40,6,utf8_decode('Calificación Medio Año'),1,0,'C',1);
        $pdf->Cell(40,6,utf8_decode('Calificación Final'),1,1,'C',1);
        $pdf->SetFont('Arial','',10);
        while ($row2 = $resultado2->fetch_assoc())
        {
            $pdf->Cell(80,8,utf8_decode($row2['notes']),1,0,'C');
            $pdf->Cell(20,8,$row2['porcentaje'],1,0,'C');
            $pdf->Cell(40,8,$row2['calificacionm'],1,0,'C');
            $pdf->Cell(40,8,$row2['calificacionf'],1,1,'C');
            
        }

    }
    if ($_POST['colaborador'] == '*'){
        
// apartir de aqui se contruye el PDF
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
// Tabla de datos personales
    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(20,6,utf8_decode('Nómina'),1,0,'C',1);
    $pdf->Cell(60,6,utf8_decode('Nombre'),1,0,'C',1);
    $pdf->Cell(60,6,utf8_decode('Puesto'),1,0,'C',1);
    $pdf->Cell(40,6,utf8_decode('Área'),1,1,'C',1);
    }
    $pdf->output();



?>
