<html>
<head>
<title>Report data</title>
</head>
<body>
<?php
	require('connect.php');
	require('fpdf/fpdf.php');
	require('class_endodontic.php');

	$endo = new Endodontic;

	$pdf=new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Times','B',12);

	$pdf->Cell(0,10,'HN: '.$endo->searchHN($conn),0,1,"L");
	$pdf->Cell(0,10,'Endodontic Record',0,1,"R");
	$pdf->Cell(0,10,'Faculty of Dentistry, Chiang Mai University',0,1,"R");
	$pdf->Cell(0,20,'Patient Name: '.$endo->searchHN1($conn).'            Age: '.'            Gender: '.$endo->searchHN3($conn),0,1); 
	$pdf->Cell(0,25,'Patient history',0,1);
	$pdf->Cell(0,30	,'Medical History',0,1);


	// $pdf->LN(0);
	// $pdf->MultiCell(50, 10, "Date Prepared ", 0);
	// $pdf->MultiCell(50, 10, "Date Prepared2 ", 0);
	// $pdf->Cell(0,10,'Welcome to www.ThaiCreate.Com',0,1);
	// $pdf->Cell(0,20,'Version 2009',0,1,"C");
	$pdf->Output("MyPDF/MyPDF.pdf","F");
?>
	PDF Created Click <a href="MyPDF/MyPDF.pdf">here</a> to Download
</body>
</html>