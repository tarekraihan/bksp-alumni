<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('fpdf.php');
class Pdf extends FPDF
{
  // Extend FPDF using this class
  // More at fpdf.org -> Tutorials
  function __construct($orientation='P', $unit='mm', $size='A4')
  {
    // Call parent constructor
    parent::__construct($orientation,$unit,$size);
  }

    // Page header
    function Header()
    {
        // Logo
        $this->Image(base_url().'assets/images/header.jpg',10,0,189,30);
        // Arial bold 15
        $this->SetFont('Arial','B',20);
        // Set Margin
        $this->SetMargins(15,8,15);
        // Line break
        $this->Ln(20);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-25);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        $this->SetTextColor(0,0,0);
        // Page number

        $this->Cell(0,10,'================================================== Page '.$this->PageNo().'/{nb} ====================================================',0,1,'C');
        $this->Cell(0,10,'Powered By : Finager.com',0,0,'R');

    }
}
?>