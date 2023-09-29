<?php
require_once('tcpdf/tcpdf.php');

//CABECERAS PERSONALIZADAS
class MYPDF extends TCPDF
{
	//Page header
	
	public function Header()
	{
		// get the current page break margin
		$bMargin = $this->getBreakMargin();
		// get current auto-page-break mode
		$auto_page_break = $this->AutoPageBreak;
		// disable auto-page-break
		$this->SetAutoPageBreak(false, 0);
		// set bacground image
		$img_file = base_url() . 'public/img/fondo.png';
		$this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
		// restore auto-page-break status
		$this->SetAutoPageBreak($auto_page_break, $bMargin);
		// set the starting point for the page content
		$this->setPageMark();
		$this->MultiCell(180, 16.5, "GUÍA DE MANEJO RÁPIDO DE EQUIPOS MÉDICOS", 1, 'C', 0, 0, 15, 30, true, 0, false, true, 16, 'M');
	}
	// Page footer
	public function Footer()
	{

		$this->SetFont('helvetica', '', 6);
		#$this->Line(10, 279, 195, 279);
		$image_file2 = base_url() . 'public/img/footerd.png';
		$this->Image($image_file2, 20, 275, 140, 20, 'png', '', '', false, 300, '', false, false, 0, false, false, false);

		#$this->writeHTMLCell(100, 100, 150, 280, '', 0, 1, 0, true, 'C', true);
	}
}
