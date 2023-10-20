<?php

	# Incluyendo librerias necesarias #
	require "./code128.php";

	$pdf = new PDF_Code128('P','mm','Letter');
	$pdf->SetMargins(17,17,17);
	$pdf->AddPage();

	# Logo de la empresa formato png #
	$pdf->Image('./img/logo.png',15,12,192,38,'PNG');

    # Encabezado DATOS ESCUELA #
	$pdf->SetFont('Arial','B',8);
	$pdf->SetTextColor(0,0,0);
    $pdf->Ln(9);
    $pdf->Ln(9);
    $pdf->Ln(9);
	$pdf->MultiCell(0,5,utf8_decode("COLEGIO DE BACHILLERES DEL ESTADO DE VERACRUZ"),0,'C',false);
    $pdf->MultiCell(0,2,utf8_decode("ORGANISMO PÚBLICO DESCENTRALIZADO"),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("PLANTEL 5, ÁLAMO."),0,'C',false);
    

	# Encabezado y datos de la empresa #
	$pdf->SetFont('Arial','B',16);
	$pdf->SetTextColor(0,0,0);
	$pdf->MultiCell(0,10,utf8_decode("JUSTIFICANTE"),0,'C',false);
	$pdf->Ln(1);

    $pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(45,7,utf8_decode("FECHA DE EXPEDICIÓN:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(70,7,utf8_decode("".$_POST["fecha"]),5,0,'L');
	$pdf->SetTextColor(39,39,51);
	$pdf->Ln(5);
    
    $pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(43,7,utf8_decode("JUSTIFICA AL ALUMNO:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(19,7,utf8_decode("".$_POST["nombre"]),5,0,'L');
	$pdf->SetTextColor(97,97,97);
    $pdf->Cell(70,7,utf8_decode("".$_POST["apellidos"]),5,0,'L');
	$pdf->SetTextColor(39,39,51);
    $pdf->Ln(5);

    $pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(33,7,utf8_decode("CAUSA O MOTIVO:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(18,7,utf8_decode("".$_POST["causa"]),5,0,'L');
	$pdf->Ln(5);

    $pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(37,39,51);
	$pdf->Cell(15,7,utf8_decode("GRUPO:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(22,7,utf8_decode("".$_POST["grupo"]),5,0,'L');
    $pdf->SetTextColor(39,39,51);
	$pdf->Cell(15,7,utf8_decode("TURNO:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(40,7,utf8_decode("".$_POST["turno"]),5,0,'L');
    $pdf->SetTextColor(39,39,51);
	$pdf->Cell(10,7,utf8_decode("MES:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(35,7,utf8_decode("".$_POST["mes"]),5,0,'L');
    $pdf->SetTextColor(39,39,51);
	$pdf->Cell(10,7,utf8_decode("AÑO:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(20,7,utf8_decode("".$_POST["año"]),5,0,'L');
	$pdf->Ln(5);

    $pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(18,7,utf8_decode("HORA (S):"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(18,7,utf8_decode("".$_POST["grupo"]),5,0,'L');
    $pdf->SetTextColor(39,39,51);
	$pdf->Cell(28,7,utf8_decode("PARAESCOLAR:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(50,7,utf8_decode("".$_POST["paraescolar"]),5,0,'L');
    $pdf->SetTextColor(39,39,51);
	$pdf->Cell(28,7,utf8_decode("CAPACITACIÓN:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(35,7,utf8_decode("".$_POST["capacitacion"]),5,0,'L');
    $pdf->SetTextColor(39,39,51);
	$pdf->Ln(5);

	

	$pdf->SetFont('Arial','B',9);

	$pdf->SetTextColor(39,39,51);
	$pdf->MultiCell(0,10,utf8_decode("*** A LOS C. MAESTROS QUE IMPARTEN CLASES AL GRUPO, SE JUSTIFICAN LAS INASISTENCIAS DEL ALUMNO,"),0,'C',false);
    $pdf->SetTextColor(39,39,51);
	$pdf->MultiCell(0,0,utf8_decode("MAS NO APUNTES, TAREAS O TRABAJOS. **"),0,'C',false);
    $pdf->Ln(1);

    # FIRMAS Y LINEAS DE FIRMAS #
	$pdf->SetFont('Arial','B',8);
	$pdf->SetFillColor(255,255,255);
	$pdf->SetDrawColor(255,255,255);
	$pdf->SetTextColor(0,0,0);
	

	$pdf->Ln(15);
    
	$pdf->Cell(81,8,utf8_decode("_________________________"),1,0,'C',true);
	$pdf->Cell(95,8,utf8_decode("____________________________"),1,0,'C',true);

	$pdf->Ln(5);

	
	$pdf->SetTextColor(39,39,51);



	/*----------  Textos inferiores  ----------*/
	$pdf->Cell(10,7,utf8_decode(""),'L',0,'C');
	$pdf->Cell(60,7,utf8_decode("FIRMA DEL PADRE O TUTOR"),'L',0,'C');
	$pdf->Cell(120,7,utf8_decode("FIRMA DEL ENCARGADO DE ORDEN"),'L',0,'C');
    $pdf->Ln(3);

    $pdf->Ln(5);

    $pdf->SetFont('Arial','B',9);

	$pdf->SetTextColor(39,39,51);
	$pdf->MultiCell(0,10,utf8_decode("_____________________________________________________________________________________________________"),0,'C',false);
    $pdf->Ln(1);

    # Logo de la empresa formato png #
	$pdf->Image('./img/logo.png',15,140,192,38,'PNG');

    # Encabezado DATOS ESCUELA #
	$pdf->SetFont('Arial','B',8);
	$pdf->SetTextColor(0,0,0);
    $pdf->Ln(9);
    $pdf->Ln(9);
    $pdf->Ln(9);
	$pdf->MultiCell(0,5,utf8_decode("COLEGIO DE BACHILLERES DEL ESTADO DE VERACRUZ"),0,'C',false);
    $pdf->MultiCell(0,2,utf8_decode("ORGANISMO PÚBLICO DESCENTRALIZADO"),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("PLANTEL 5, ÁLAMO."),0,'C',false);
    

	# Encabezado y datos de la empresa #
	$pdf->SetFont('Arial','B',16);
	$pdf->SetTextColor(0,0,0);
	$pdf->MultiCell(0,10,utf8_decode("JUSTIFICANTE"),0,'C',false);
	$pdf->Ln(1);

    $pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(45,7,utf8_decode("FECHA DE EXPEDICIÓN:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(70,7,utf8_decode("".$_POST["fecha"]),5,0,'L');
	$pdf->SetTextColor(39,39,51);
	$pdf->Ln(5);
    
    $pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(43,7,utf8_decode("JUSTIFICA AL ALUMNO:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(19,7,utf8_decode("".$_POST["nombre"]),5,0,'L');
	$pdf->SetTextColor(97,97,97);
    $pdf->Cell(70,7,utf8_decode("".$_POST["apellidos"]),5,0,'L');
	$pdf->SetTextColor(39,39,51);
    $pdf->Ln(5);

    $pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(33,7,utf8_decode("CAUSA O MOTIVO:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(18,7,utf8_decode("".$_POST["causa"]),5,0,'L');
	$pdf->Ln(5);

    $pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(37,39,51);
	$pdf->Cell(15,7,utf8_decode("GRUPO:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(22,7,utf8_decode("".$_POST["grupo"]),5,0,'L');
    $pdf->SetTextColor(39,39,51);
	$pdf->Cell(15,7,utf8_decode("TURNO:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(40,7,utf8_decode("".$_POST["turno"]),5,0,'L');
    $pdf->SetTextColor(39,39,51);
	$pdf->Cell(10,7,utf8_decode("MES:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(35,7,utf8_decode("".$_POST["mes"]),5,0,'L');
    $pdf->SetTextColor(39,39,51);
	$pdf->Cell(10,7,utf8_decode("AÑO:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(20,7,utf8_decode("".$_POST["año"]),5,0,'L');
	$pdf->Ln(5);

    $pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(18,7,utf8_decode("HORA (S):"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(18,7,utf8_decode("".$_POST["grupo"]),5,0,'L');
    $pdf->SetTextColor(39,39,51);
	$pdf->Cell(28,7,utf8_decode("PARAESCOLAR:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(50,7,utf8_decode("".$_POST["paraescolar"]),5,0,'L');
    $pdf->SetTextColor(39,39,51);
	$pdf->Cell(28,7,utf8_decode("CAPACITACIÓN:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(35,7,utf8_decode("".$_POST["capacitacion"]),5,0,'L');
    $pdf->SetTextColor(39,39,51);
	$pdf->Ln(5);


	$pdf->SetFont('Arial','B',9);

	$pdf->SetTextColor(39,39,51);
	$pdf->MultiCell(0,10,utf8_decode("*** A LOS C. MAESTROS QUE IMPARTEN CLASES AL GRUPO, SE JUSTIFICAN LAS INASISTENCIAS DEL ALUMNO,"),0,'C',false);
    $pdf->SetTextColor(39,39,51);
	$pdf->MultiCell(0,0,utf8_decode("MAS NO APUNTES, TAREAS O TRABAJOS. **"),0,'C',false);
    $pdf->Ln(1);

    # FIRMAS Y LINEAS DE FIRMAS #
	$pdf->SetFont('Arial','B',8);
	$pdf->SetFillColor(255,255,255);
	$pdf->SetDrawColor(255,255,255);
	$pdf->SetTextColor(0,0,0);
	

	$pdf->Ln(15);
    
	$pdf->Cell(81,8,utf8_decode("_________________________"),1,0,'C',true);
	$pdf->Cell(95,8,utf8_decode("____________________________"),1,0,'C',true);

	$pdf->Ln(8);

	
	$pdf->SetTextColor(39,39,51);



	/*----------  Textos inferiores  ----------*/
	$pdf->Cell(10,7,utf8_decode(""),'L',0,'C');
	$pdf->Cell(60,7,utf8_decode("FIRMA DEL PADRE O TUTOR"),'L',0,'C');
	$pdf->Cell(120,7,utf8_decode("FIRMA DEL ENCARGADO DE ORDEN"),'L',0,'C');
    $pdf->Ln(3);

    $pdf->SetFont('Arial','B',9);
	# Nombre del archivo PDF #
	$pdf->Output("I","Justificante.pdf",true);