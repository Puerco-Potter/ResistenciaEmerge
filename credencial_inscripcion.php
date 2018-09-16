<?php

include "model.php";
require('fpdf/fpdf.php');

$inscripcion_id= $_GET['inscripcion_id'];

//echo "Id Inscripción: ".$inscripcion_id;

class PDF extends FPDF
{
	// Cabecera de pagina
	function Header()
	{
	    // Logo
	    $this->Image('images/LogoYNombre.png',10,8,50);
	    // Arial bold 15
	    $this->SetFont('Arial','B',15);
	    // Movernos a la derecha
	    $this->Cell(60);
	    // Titulo
	    //$this->Cell(80,10,'Resistencia Emerge',1,0,'C');
	    // Salto de linea
	    //$this->Ln(20);
	}

	// Pie de pagina
	function Footer()
	{
	    // Posicion: a 1,5 cm del final
	    $this->SetY(-15);
	    // Arial italic 8
	    $this->SetFont('Arial','I',8);
	    // Numero de pagina
	    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
	}
}

	// Creacion del objeto de la clase heredada
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->Cell(0,10,"",0,1);
	$pdf->SetFont('Times','b',16);

	$conn= conectar();
	$filas= mysqli_query($conn, "SELECT * FROM inscripciones WHERE id=".$inscripcion_id);

	$pdf->SetFont('Times','',11);
	$fila=mysqli_fetch_array($filas);
	$pdf->Cell(0,10,"",0,1);
	$pdf->Cell(0,10,"Apellido y Nombre: ". $fila['apellido'].", ".$fila['nombre'],0,1);
	$pdf->Output();



?>