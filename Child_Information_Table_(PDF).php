


<?php

require('fpdf.php');


class PDF extends FPDF
{
	
	// Page header
function Title()
{
 
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(86);
    // Title
    $this->Cell(30,10,'Child Information (Centro Oriental)','C');
    // Line break
    $this->Ln(20);
}


// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

// Load data
function LoadData($file)
{
    // Read file lines
    $lines = file($file);
    $data = array();
    foreach($lines as $line)
        $data[] = explode(';',trim($line));
    return $data;
}


// Better table
function ImprovedTable($header, $data)
{
	

  
	// Colors, line width and bold font
    $this->SetFillColor(250,128,114);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');

    // Column widths
    $w = array(85, 20, 20, 25,25,20,45,45);
	
    // Header
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
	
	// Color and font restoration
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
	
    // Data
	$fill = false;
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
        $this->Cell($w[1],6,$row[1],'LR',0,'C',$fill);
        $this->Cell($w[2],6,$row[2],'LR',0,'C',$fill);
        $this->Cell($w[3],6,$row[3],'LR',0,'C',$fill);
		$this->Cell($w[4],6,$row[4],'LR',0,'C',$fill);
		$this->Cell($w[5],6,$row[5],'LR',0,'C',$fill);
		$this->Cell($w[6],6,$row[6],'LR',0,'C',$fill);
		$this->Cell($w[7],6,$row[7],'LR',0,'C',$fill);
        $this->Ln();
		
        $fill = !$fill;
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}





}

$pdf = new PDF('L');
$pdf->AliasNbPages();
// Column headings
$header = array('Name', 'Age', 'Sex', 'Address','Height','Weight','Height Status','Weight Status');
// Data loading
$data = $pdf->LoadData('child_information.txt');

$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->Title();
$pdf->ImprovedTable($header,$data);


$pdf->Output('I','Child Information Table');





?>
