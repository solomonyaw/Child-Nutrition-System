


<?php

require('fpdf.php');


class PDF extends FPDF
{
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
    // Column widths
    $w = array(85, 20, 20, 25,20,20,45,45);
    // Header
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR');
        $this->Cell($w[1],6,$row[1],0,0,'C');
        $this->Cell($w[2],6,$row[2],'LR',0,'C');
        $this->Cell($w[3],6,$row[3],'LR',0,'C');
		$this->Cell($w[4],6,$row[4],'LR',0,'C');
		$this->Cell($w[5],6,$row[5],'LR',0,'C');
		$this->Cell($w[6],6,$row[6],'LR',0,'C');
		$this->Cell($w[7],6,$row[7],'LR',0,'C');
        $this->Ln();
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}





}

$pdf = new PDF('L');
// Column headings
$header = array('Name', 'Age', 'Sex', 'Address','Weight','Height','Height Status','Weight Status');
// Data loading
$data = $pdf->LoadData('child_information.txt');

$pdf->SetFont('Arial','',14);
$pdf->AddPage();

$pdf->ImprovedTable($header,$data);


$pdf->Output();





?>
