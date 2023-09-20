<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GeneradorQR extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Generadorqr_model");
		$this->load->library('ciqrcode');
	}

	public function index()
	{
		$result['informacion'] = $this->Generadorqr_model->informacion();
		$this->load->view('informacion', $result);
	}

	public function cargarImagenes()
	{

		$this->load->view('cargarimagenes');
	}

	public function crearguia()
	{
		/* 	$informacion = $this->Generadorqr_model->informacion();
		$valor_form = "";
		if ($informacion == FALSE) {
			$valor_form = 1;
		} else {
			$ultimo = $this->Generadorqr_model->ultimoRegistro();
			$valor_form = ($ultimo[0]->id) + 1;
		}
		$result['valor_form'] = $valor_form + 1;

		$guia = array('valorForm' => $valor_form);
		$this->session->set_userdata($guia);

		$sessionId = array(
			'id' => $this->session->userdata('valorForm')
		);

		$this->Generadorqr_model->insertarInstancia($sessionId);
		*/

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
			'fecha_creacion' => $fechaCreacion,
			'url_guia' => 'GMREM' . $this->session->userdata('valorForm'),
		);

		$this->Generadorqr_model->insertAllData($data);

		redirect('cargarImagenes/?e=0');
	}

	/**
	 * Esta funcion nos permite generar el código QR que va a estar visible en la guia de uso rápido
	 */
	function generate_qrcode()
	{
		$this->load->library('ciqrcode');
		$data = "https://wa.me/573042388974?text=Hola,%20estoy%20interesado%20en%20el%20empleo,%20puedes%20darme%20más%20información.%20";
		/* Data */
		$hex_data   = bin2hex($data);
		$save_name  = $hex_data . '.png';

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
		return $return;
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
}
