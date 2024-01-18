<?php
// подключаем библиотеку
require_once('plugins/tcpdf/tcpdf.php');

// create new PDF document
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// set document information
$pdf->SetAuthor('LarisaPomidor');
$pdf->SetTitle('Test document');

// set default header data
$PDF_HEADER_TITLE = "Header Data";
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set font
$fontname = TCPDF_FONTS::addTTFfont('plugins/tcpdf/fonts/myFonts/arial.ttf', 'TrueTypeUnicode', '', 32);
$pdf->SetFont($fontname, '', 14, '', true);

// add a page
$pdf->AddPage();

// print a line using Cell()
$pdf->Cell(0, 12, 'Пример 1', 1, 1, 'C');

//$websiteContent = file_get_contents('https://google.com');
//$pdf->writeHTML($websiteContent);

$pdf->writeHTML("<h1>Hello</h1><style>h1 {color: red;}</style>");

//Close and output PDF document
$pdf->Output('example_1.pdf', 'I');
?>