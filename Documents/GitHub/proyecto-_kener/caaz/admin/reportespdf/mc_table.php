<?php
require 'fpdf/fpdf.php';
date_default_timezone_set('America/Mexico_City');
class PDF_MC_Table extends FPDF
{
    function Header()
    {

    $this->image('fpdf\imagen\logo.png',5,5, 30);
    $this->SetFont('Arial','B',15);
    $this->SetXY(10,20);
    $this->Cell(30);
    $this->Cell(120,10, utf8_decode('Evaluación de desempeño'),0,0,'C');
    $this->SetFont('Arial','B',8);
    $this->Cell(40,10,date('d/m/Y'),0,0,'C');
    $this->Ln(20);

    }

    function Footer()
    {

    $this->SetY(-15);
    $this->SetFont('Arial','I', 6);
    $this->Cell(0,10,'Pagina'.$this->PageNo(),0,0,'C' );
    }
var $widths;
var $aligns;

function SetWidths($w)
{
// Establecer la matriz de anchos de columna
	$this->widths=$w;
}

function SetAligns($a)
{
// Establecer la matriz de alineaciones de columnas
	$this->aligns=$a;
}

function Row($data)
{
// Calcula la altura de la fila
$nb=0;
	for($i=0;$i<count($data);$i++)
		$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	$h=5*$nb;
// Emita un salto de página primero si es necesario
	$this->CheckPageBreak($h);
	// Dibuja las celdas de la fila
	for($i=0;$i<count($data);$i++)
	{
		$w=$this->widths[$i];
		$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
// Guarda la posición actual
		$x=$this->GetX();
		$y=$this->GetY();
// Dibuja el borde
		$this->Rect($x,$y,$w,$h);
	// Imprime el texto
		$this->MultiCell($w,5,$data[$i],0,$a);
// Coloca la posición a la derecha de la celda
		$this->SetXY($x+$w,$y);
	}
// Ir a la siguiente línea
	$this->Ln($h);
}

function CheckPageBreak($h)
{
// Si la altura h causaría un desbordamiento, agregue una nueva página inmediatamente
	if($this->GetY()+$h>$this->PageBreakTrigger)
		$this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
// Calcula el número de líneas que tomará una MultiCell de ancho w
	$cw=&$this->CurrentFont['cw'];
	if($w==0)
		$w=$this->w-$this->rMargin-$this->x;
	$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	$s=str_replace("\r",'',$txt);
	$nb=strlen($s);
	if($nb>0 and $s[$nb-1]=="\n")
		$nb--;
	$sep=-1;
	$i=0;
	$j=0;
	$l=0;
	$nl=1;
	while($i<$nb)
	{
		$c=$s[$i];
		if($c=="\n")
		{
			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		}
		if($c==' ')
			$sep=$i;
		$l+=$cw[$c];
		if($l>$wmax)
		{
			if($sep==-1)
			{
				if($i==$j)
					$i++;
			}
			else
				$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		}
		else
			$i++;
	}
	return $nl;
}
}
?>
