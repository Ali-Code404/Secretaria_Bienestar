<?php

	# Incluyendo librerias necesarias #
	require "./code128.php";

	$pdf = new PDF_Code128('P','mm','Letter');
	$pdf->SetMargins(17,17,17);
	$pdf->AddPage();

	# Logo de la empresa formato png #
	$pdf->Image('img/LOGORPS.png',15,12,192,38,'PNG');

	# Encabezado y datos de la empresa #
	$pdf->SetFont('Arial','B',20);
	$pdf->SetTextColor(86,7,12);
    $pdf->Ln(9);
    $pdf->Ln(9);
    $pdf->Ln(9);
    $pdf->Ln(9);
	$pdf->Cell(150,10,utf8_decode(strtoupper("SECRETARÍA DE BIENESTAR REGIÓN 11, PAPANTLA")),0,0,'L');

	$pdf->Ln(9);
    $pdf->Ln(9);

	# Tabla de productos #
	$pdf->SetFont('Arial','',10);
	$pdf->SetFillColor(229, 217, 182);
	$pdf->SetDrawColor(86,7,12);
	$pdf->SetTextColor(255,255,255);
	$pdf->Cell(80,8,utf8_decode(""),1,0,'C',true);
	$pdf->Cell(101,8,utf8_decode(""),1,0,'C',true);

	$pdf->Ln(8);

	
	$pdf->SetTextColor(39,39,51);



	/*----------  Detalles de la tabla  ----------*/
	$pdf->Cell(80,7,utf8_decode("FOLIO:"),'L',0,'L');
	$pdf->Cell(101,7,utf8_decode("".$_POST["folio"]),'LR',0,'L');
	$pdf->Ln(7);

    $pdf->Cell(80,7,utf8_decode("NOMBRE:"),'L',0,'L');
	$pdf->Cell(101,7,utf8_decode("".$_POST["encargado"]),'LR',0,'L');
	$pdf->Ln(7);

    $pdf->Cell(80,7,utf8_decode("SERVIDOR_ID:"),'L',0,'L');
	$pdf->Cell(101,7,utf8_decode("".$_POST["servidor"]),'LR',0,'L');
	$pdf->Ln(7);

    $pdf->Cell(80,7,utf8_decode("MOTIVO:"),'L',0,'L');
	$pdf->Cell(101,7,utf8_decode("".$_POST["sucursal"]),'LR',0,'L');
	$pdf->Ln(7);

    $pdf->Cell(80,7,utf8_decode("STATUS:"),'L',0,'L');
	$pdf->Cell(101,7,utf8_decode("".$_POST["status"]),'LR',0,'L');
	$pdf->Ln(7);

    $pdf->Cell(80,7,utf8_decode("COMENTARIO:"),'L',0,'L');
	$pdf->Cell(101,7,utf8_decode("".$_POST["recomendaciones"]),'LR',0,'L');
	$pdf->Ln(7);

	/*----------  Fin Detalles de la tabla  ----------*/

 
	
	$pdf->SetFont('Arial','B',9);
	
	# Impuestos & totales #
	$pdf->Cell(100,7,utf8_decode(''),'T',0,'C');
	$pdf->Cell(15,7,utf8_decode(''),'T',0,'C');
	$pdf->Cell(32,7,utf8_decode(""),'T',0,'C');
	$pdf->Cell(34,7,utf8_decode(""),'T',0,'C');

	

	$pdf->Ln(3);

	$pdf->SetFont('Arial','',9);

	$pdf->SetTextColor(39,39,51);
	$pdf->MultiCell(0,9,utf8_decode("*** Imprimir el documento de permiso laboral como evidencia de que usted realizó el llenado del acuse correspondientes dentro del sistema ***"),0,'C',false);

    $pdf->Ln(3);

    # APARTADO DE TEXTO CENTRADO #
	$pdf->SetFillColor(39,39,51);
	$pdf->SetDrawColor(23,83,201);
	$pdf->SetFont('Arial','B',14);
	$pdf->MultiCell(0,10,utf8_decode("APROBACIÓN DE PERMISO LABORAL"),0,'C',false);

    $pdf->Ln(5);

    # FIRMAS Y LINEAS DE FIRMAS #
	$pdf->SetFont('Arial','',8);
	$pdf->SetFillColor(255,255,255);
	$pdf->SetDrawColor(255,255,255);
	$pdf->SetTextColor(0,0,0);

	$pdf->Ln(8);
    $pdf->Ln(8);
$pdf->Ln(8);
$pdf->Ln(10);

    
    $pdf->Cell(70,8,utf8_decode("______________________________"),1,0,'C',true);
	$pdf->Cell(45,8,utf8_decode("__________________________"),1,0,'C',true);
	$pdf->Cell(60,8,utf8_decode("________________________________"),1,0,'C',true);

	$pdf->Ln(8);

	
	$pdf->SetTextColor(39,39,51);



	/*----------  Textos inferiores  ----------*/
	$pdf->Cell(70,7,utf8_decode("FIRMA DE RECURSOS HUMANOS"),'L',0,'C');
	$pdf->Cell(45,7,utf8_decode("FIRMA DE JEFE DE ÁREA"),'L',0,'C');
	$pdf->Cell(60,7,utf8_decode("FIRMA DEL SERVIDOR"),'L',0,'C');
	
	/*----------  Fin Detalles de la tabla  ----------*/

	$pdf->Ln(8);
 
	# Codigo de barras #
	$pdf->SetFillColor(39,39,51);
	$pdf->SetDrawColor(23,83,201);
	
	$pdf->SetXY(12,$pdf->GetY()+21);
	$pdf->SetFont('Arial','',12);

    
    #Pie de pagina #
    $pdf->SetFont('Arial','',8);
	$pdf->SetFillColor(0,0,0);
	$pdf->SetDrawColor(0,0,0);
	$pdf->SetTextColor(255,255,255);
	
    $pdf->Image('img/foot.png',10,230,192,38,'PNG');

	# Nombre del archivo PDF #
	$pdf->Output("I","PermisoLaboral.pdf",true);