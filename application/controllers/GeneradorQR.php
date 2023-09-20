<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GeneradorQR extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Generadorqr_model");
		$this->load->library('ciqrcode');
		#$this->load->library('Dompdf');
		$this->load->library('tcpdf');
	}

	public function index()
	{
		$result['informacion'] = $this->Generadorqr_model->informacion();
		$this->load->view('informacion', $result);
	}

	public function cargarImagenes()
	{
		$lastId = $this->last_id();
		$this->load->view('cargarimagenes', $lastId);
	}

	public function crearguia()
	{

		$this->load->view('generadorqr');
	}

	public function insertarimagenprincipal()
	{
		$ImagenPrincipal = $this->input->post("ImagenPrincipal");

		$ram = rand(1, 10000);
		$file_name = $_FILES['imageInput']['name'];
		$tmp = explode('.', $file_name);
		$extension_img = end($tmp);

		$user_img_profile = $ram . '.' . $extension_img;

		$mi_archivo = 'imageInput';
		$config['upload_path'] = 'uploads/principal';
		//'allowed_types' => "gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp",
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = '5000000';
		$config['quality'] = '90%';
		$config['file_name'] = $user_img_profile;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload($mi_archivo)) {
			echo "se presento un error al cargar la imagen";
		}

		$data = array(
			'nombre_img' => $user_img_profile,
			'descripcion' => $ImagenPrincipal,
			'idguia' => $this->last_id(),
			'seccion' => 'principal'

		);

		$this->Generadorqr_model->insertAllPopUp($data);
		redirect('cargarImagenes/?e=1');
	}

	public function insertarpartes()
	{

		$informacionEquipo = $this->input->post("informacionEquipo");

		$ram = rand(1, 10000);
		$file_name = $_FILES['imageInput']['name'];
		$tmp = explode('.', $file_name);
		$extension_img = end($tmp);

		$user_img_profile = $ram . '.' . $extension_img;

		$mi_archivo = 'imageInput';
		$config['upload_path'] = 'uploads/partes';
		// 'allowed_types' => "gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp",
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = '5000000';
		$config['quality'] = '90%';
		$config['file_name'] = $user_img_profile;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($mi_archivo)) {
			echo "se presento un error al cargar la imagen";
		}

		$data = array(
			'nombre_img' => $user_img_profile,
			'descripcion' => $informacionEquipo,
			'idguia' => $this->last_id(),
			'seccion' => 'partes'

		);

		$this->Generadorqr_model->insertAllPopUp($data);

		redirect('cargarImagenes/?e=1');
	}


	public function insertarFunciones()
	{

		$informacionEquipo = $this->input->post("FunctionamientoEquipo");

		$ram = rand(1, 10000);
		$file_name = $_FILES['imageInputFunciones']['name'];
		$tmp = explode('.', $file_name);
		$extension_img = end($tmp);

		$user_img_profile = $ram . '.' . $extension_img;

		$mi_archivo = 'imageInputFunciones';
		$config['upload_path'] = 'uploads/funciones';
		//              'allowed_types' => "gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp",
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = '5000000';
		$config['quality'] = '90%';
		$config['file_name'] = $user_img_profile;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload($mi_archivo)) {
			echo "se presento un error al cargar la imagen";
		}

		$data = array(
			'nombre_img' => $user_img_profile,
			'descripcion' => $informacionEquipo,
			'idguia' => $this->last_id(),
			'seccion' => 'funciones'
		);

		$this->Generadorqr_model->insertAllPopUp($data);
		redirect('cargarImagenes/?e=1');
	}


	public function insertarAllData()
	{
		$nombreEquipo = $this->input->post('nombreEquipo');
		$descripcion = $this->input->post('descripcion');
		$advertencias = $this->input->post('advertencias');

		$notasPartesEquipo = $this->input->post('nota_partes');
		$notasFuncionamientoEquipo = $this->input->post('nota_funcionamiento');
		$limpiezaEquipo = $this->input->post('limpiezaEquipo');

		$notaLimpieza = $this->input->post('notaLimpieza');
		date_default_timezone_set("America/Bogota");
		$fechaCreacion = date('Y-m-d H:i:s');
		$data = array(
			'nombre_equipo' => $nombreEquipo,
			'descripcion' => $descripcion,
			'advertencias' => $advertencias,
			'nota_partes' => $notasPartesEquipo,
			'nota_funcionamiento' => $notasFuncionamientoEquipo,
			'limpieza' => $limpiezaEquipo,
			'nota_limpieza' => $notaLimpieza,
			'fecha_creacion' => $fechaCreacion
		);

		$this->Generadorqr_model->insertAllData($data);

		redirect('cargarImagenes/?e=0');
	}

	/**
	 * Esta funcion nos permite generar el código QR que va a estar visible en la guia de uso rápido
	 */
	function generate_qrcode($id)
	{
		$this->load->library('ciqrcode');
		$data = base_url() . 'generarpdf/' . $id;;
		/* Data */
		#$hex_data   = bin2hex($data);
		$save_name  = "GMREM-" . rand(1, 100000000) . '.png';

		/* QR Code File Directory Initialize */
		$dir = 'public/qr/';
		if (!file_exists($dir)) {
			mkdir($dir, 0775, true);
		}

		/* QR Configuration  */
		$config['cacheable']    = true;
		$config['imagedir']     = $dir;
		$config['quality']      = true;
		$config['size']         = '1024';
		$config['black']        = array(255, 255, 255);
		$config['white']        = array(255, 255, 255);
		$this->ciqrcode->initialize($config);

		/* QR Data  */
		$params['data']     = $data;
		$params['level']    = 'L';
		$params['size']     = 10;
		$params['savename'] = FCPATH . $config['imagedir'] . $save_name;

		$this->ciqrcode->generate($params);

		/* Return Data */
		$return = array(
			'content' => $data,
			'file'    => $dir . $save_name
		);
		return $save_name;
	}
	/**
	 * Esta funcion nos permite generar el pdf de la guia de uso rapido, dado el id de la guia
	 */
	public function pdf()
	{
		$this->load->library('pdf');
		$id = 5;
		$principal = "principal";
		$funciones = "funciones";
		$partes = "partes";
		$arrayFunciones = array();
		$arrayPartes = array();

		$result['informcionGeneral'] = $this->Generadorqr_model->generatePDF($id);

		$imagenPrincipal = $this->Generadorqr_model->generatePDFImage($id, $principal);
		$imagenFunciones = $this->Generadorqr_model->generatePDFImage($id, $funciones);
		$imagenPartes = $this->Generadorqr_model->generatePDFImage($id, $partes);


		$image_path_principal = base_url() . "uploads/" . $principal . "/" . $imagenPrincipal[0]->nombre_img;
		$image_data = file_get_contents($image_path_principal);
		$base64_image = base64_encode($image_data);
		$result['imagenPrincipal'] = "data:image/jpg;base64," . $base64_image;

		foreach ($imagenFunciones as $if) {
			$image_path_principal = base_url() . "uploads/" . $funciones . "/" . $if->nombre_img;
			$image_data = file_get_contents($image_path_principal);
			$base64_image = base64_encode($image_data);
			$b64 = "data:image/jpg;base64," . $base64_image;
			array_push($arrayFunciones, $b64, $if->descripcion);
		}

		foreach ($imagenPartes as $ip) {
			$image_path_principal = base_url() . "uploads/" . $partes . "/" . $ip->nombre_img;
			$image_data = file_get_contents($image_path_principal);
			$base64_image = base64_encode($image_data);
			$b64 = "data:image/jpg;base64," . $base64_image;
			array_push($arrayPartes, $b64, $ip->descripcion);
		}

		$htmlfuncione = "";

		$htmlarryFuncines = array();
		$htmlarrypartes = array();

		foreach ($arrayFunciones as $af) {
			$htmlfuncione = '<tr>' .
				'<td align="center">' .
				'<img class="img-fuild" src="' . $af . '"/>' .
				'</td>' .
				'</tr>' .
				'<tr>' .
				'<td align="center">' .
				'<p>' . $af . '</p>' .
				'</td>' .
				'</tr>';
			array_push($htmlarryFuncines, $htmlfuncione);
		}

		foreach ($arrayPartes as $af) {
			$htmlpartes = '<tr>' .
				'<td align="center">' .
				'<img class="img-fuild" src="' . $af . '"/>' .
				'</td>' .
				'</tr>' .
				'<tr>' .
				'<td align="center">' .
				'<p>' . $af . '</p>' .
				'</td>' .
				'</tr>';
			array_push($htmlarrypartes, $htmlpartes);
		}


		$result['imagenPrincipal'];
		/* $result['imagenFunciones'] = $arrayFunciones;
		$result['imagenPartes'] = $arrayPartes; */

		$result['htmlarryFuncines'] = $htmlarryFuncines;
		$result['htmlarrypartes'] = $htmlarrypartes;

		$url = base_url() . 'uploads/funciones/1698.png';
		$base64_image = base64_encode($url);
		$result['imagenprueba'] = "data:image/png;base64," . $base64_image;

		$html = $this->load->view('generatePdf', $result, true);
		$valuePDf = "GUÍA DE MANEJO RÁPIDO DE EQUIPOS MÉDICOS";
		$this->pdf->createPDF($html, $valuePDf);
	}

	public function viewPdf()
	{
		$this->load->library('pdf');
		$id = 5;
		$principal = "principal";
		$funciones = "funciones";
		$partes = "partes";
		$arrayFunciones = array();
		$arrayPartes = array();

		$result['informcionGeneral'] = $this->Generadorqr_model->generatePDF($id);
		$imagenPrincipal = $this->Generadorqr_model->generatePDFImage($id, $principal);
		$imagenFunciones = $this->Generadorqr_model->generatePDFImage($id, $funciones);
		$imagenPartes = $this->Generadorqr_model->generatePDFImage($id, $partes);


		$image_path_principal = base_url() . "uploads/" . $principal . "/" . $imagenPrincipal[0]->nombre_img;
		$image_data = file_get_contents($image_path_principal);
		$base64_image = base64_encode($image_data);
		$result['imagenPrincipal'] = "data:image/jpeg;base64," . $base64_image;

		foreach ($imagenFunciones as $if) {
			$image_path_principal = base_url() . "uploads/" . $funciones . "/" . $if->nombre_img;
			$image_data = file_get_contents($image_path_principal);
			$base64_image = base64_encode($image_data);
			$b64 = "data:image/jpeg;base64," . $base64_image;
			array_push($arrayFunciones, $b64, $if->descripcion);
		}

		foreach ($imagenPartes as $ip) {
			$image_path_principal = base_url() . "uploads/" . $partes . "/" . $ip->nombre_img;
			$image_data = file_get_contents($image_path_principal);
			$base64_image = base64_encode($image_data);
			$b64 = "data:image/jpeg;base64," . $base64_image;
			array_push($arrayPartes, $b64, $ip);
		}


		$result['imagenPrincipal'];
		$result['imagenFunciones'] = $arrayFunciones;
		$result['imagenPartes'] = $arrayPartes;

		$this->load->view('generatePdf', $result);
	}

	public function last_id()
	{
		$last_id = $this->Generadorqr_model->last_id();
		$last_id = $last_id[0]->id;
		return $last_id;
	}

	public function GuardarInformacion()
	{
		$id = $this->last_id();

		$urlQR = $this->generate_qrcode($id);
		
		$data = array(
			'url_guia' => $urlQR
		);
		$this->Generadorqr_model->updateQR($id, $data);
		
		$this->generarpdf($id);

		redirect('');
	}

	public function generarpdf($id)
	{

		$this->load->library('MYPDF');

		// create new PDF document
		$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Nicola Asuni');
		$pdf->SetTitle("");
		$pdf->SetSubject('TCPDF Tutorial');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
		$pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));

		// set header and footer fonts
		$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, 49, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(35);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
			require_once(dirname(__FILE__) . '/lang/eng.php');
			$pdf->setLanguageArray($l);
		}

		// ---------------------------------------------------------

		#$id = 5;
		$principal = "principal";
		$funciones = "funciones";
		$partes = "partes";
		$arrayFunciones = array();
		$arrayPartes = array();

		$informcionGeneral = $this->Generadorqr_model->generatePDF($id);

		$imagenPrincipal = $this->Generadorqr_model->generatePDFImage($id, $principal);
		$imagenFunciones = $this->Generadorqr_model->generatePDFImage($id, $funciones);
		$imagenPartes = $this->Generadorqr_model->generatePDFImage($id, $partes);


		$image_path_principal = base_url() . "uploads/" . $principal . "/" . $imagenPrincipal[0]->nombre_img;
		$image_data = file_get_contents($image_path_principal);
		$base64_image = base64_encode($image_data);
		$result['imagenPrincipal'] = "data:image/jpg;base64," . $base64_image;

		foreach ($imagenFunciones as $if) {
			$image_path_principal = base_url() . "uploads/" . $funciones . "/" . $if->nombre_img;
			/* 	$image_data = file_get_contents($image_path_principal);
			$base64_image = base64_encode($image_data);
			$b64 = "data:image/jpg;base64," . $base64_image; */
			array_push($arrayFunciones, $image_path_principal, $if->descripcion);
		}

		foreach ($imagenPartes as $ip) {
			$image_path_principal = base_url() . "uploads/" . $partes . "/" . $ip->nombre_img;
			/* $image_data = file_get_contents($image_path_principal);
			$base64_image = base64_encode($image_data);
			$b64 = "data:image/jpg;base64," . $base64_image; */
			array_push($arrayPartes, $image_path_principal, $ip->descripcion);
		}

		foreach ($informcionGeneral as $ig) {
			$nombre_equipo = $ig->nombre_equipo;
			$descripcion = $ig->descripcion;
			$advertencias = $ig->advertencias;
			$nota_partes = $ig->nota_partes;
			$nota_funcionamiento = $ig->nota_funcionamiento;
			$limpieza = $ig->limpieza;
			$nota_limpieza = $ig->nota_limpieza;
		}


		$pdf->SetFont('helvetica', 'R', 9);
		$pdf->AddPage('A4');

		/** nombre de la guia   */
		$html0 = <<<EOD
		<style>
		table{
			text-align:center;
			
		}

		.p-3{
			padding: 14px;
		}

		.m-3{
			margin-top:20px;
			margin-buttom:20px;
		}
		.warning{
			background-color:#FCFF00;
		}
		</style>
		<table border="1"  width="100%">
		<tr class="p-3">
			<td align="center">
				<h1 >
				<br>
				$nombre_equipo
				<br>
				<br>
				</h1>

			</td>
		</tr>
		<tr  class="p-3">
		<td><img src="$image_path_principal" width='100px' /></td>
		</tr>
		<tr>
			<td align="center">
				<h3>
				<br>
				$descripcion
				<br>
				</h3>
			</td>
		</tr>

		<tr class="warning">
			<td align="center">
				<h3>
				<br>
				<strong>ADVERTENCIA</strong>
				<br>
				$advertencias
				<br>
				</h3>
			</td>
		</tr>

		<tr>
			<td align="center">
				<h3>
				<br>
				En esta guía se muestra la información básica para hacer uso adecuado del equipo, si requiere mayor información comuníquese al (310) 552-4551
				<br>
				</h3>
			</td>
		</tr>

		<tr>
			<td align="center">
				<h2>
				<br>
				FUNCIONES
				<br>
				</h2>
			</td>
		</tr>
	</table>
EOD;
		$pdf->writeHTML($html0, true, false, false, false, '');


		for ($i = 0; $i < count($arrayFunciones); $i++) {
			if ($i % 2 == 0) {
				$html1 = <<<EOD
				<style>
				table{
					text-align:center;
					
				}

				</style>
<table border="1">
<tr>
    <td><img src="$arrayFunciones[$i]" width='800px' /></td>
</tr>
</table>
EOD;
				$pdf->writeHTML($html1, true, false, false, false, '');
			} else {
				$html1 = <<<EOD
				<style>
				table{
					text-align:center;
					
				}

				</style>
				<table border="1">
				<tr>
				<td>
					<h3>$arrayFunciones[$i]</h3>
					</td>
					</tr>
				</table>
				EOD;
				$pdf->writeHTML($html1, true, false, false, false, '');
			}
		}


		$pdf->ln(10);
		$htmlPartes = <<<EOD
				<style>
				table{
					text-align:center;
					
				}

				</style>
				<table border="1">
				<tr>
				<td>
					<h2><strong>PARTES</strong></h2>
					</td>
					</tr>
				</table>
				EOD;
		$pdf->writeHTML($htmlPartes, true, false, false, false, '');

		for ($i = 0; $i < count($arrayPartes); $i++) {
			if ($i % 2 == 0) {
				$html2 = <<<EOD
				<style>
				table{
					text-align:center;
					
				}

				</style>
<table border="1">
<tr>
    <td><img src="$arrayPartes[$i]" width='800px' /></td>
</tr>
</table>
EOD;
				$pdf->writeHTML($html2, true, false, false, false, '');
			} else {
				$html2 = <<<EOD
				<style>
				table{
					text-align:center;
					
				}

				</style>
				<table border="1">
				<tr>
				<td>
					<h3>$arrayPartes[$i]</h3>
					</td>
					</tr>
				</table>
				EOD;
				$pdf->writeHTML($html2, true, false, false, false, '');
			}
		}

		$html3 = <<<EOD
		<style>
		table{
			text-align:center;
			
		}

		.p-3{
			padding: 14px;
		}

		.m-3{
			margin-top:20px;
			margin-buttom:20px;
		}
		.warning{
			background-color:#FCFF00;
		}
		</style>
		<table border="1"  width="100%">
		<tr class="p-3">
			<td align="center">
				<h1 >
				<br>
				$nota_partes
				<br>
				<br>
				</h1>

			</td>
		</tr>
		
		<tr>
			<td align="center">
				<h3>
				<br>
				$nota_funcionamiento
				<br>
				</h3>
			</td>
		</tr>

		<tr>
			<td align="center">
				<h3>
				<br>
				$nota_limpieza
				<br>
				</h3>
			</td>
		</tr>

		
	</table>





EOD;
		$pdf->writeHTML($html3, true, false, false, false, '');




		$pdf->Output('Algo.pdf', 'I');
	}
}
