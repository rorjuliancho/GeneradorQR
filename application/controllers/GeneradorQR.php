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

	/**
	 *  Funcion donde se muestra la tabla con todos los registros de las guías
	 * 
	 */
	public function index()
	{
		$result['informacion'] = $this->Generadorqr_model->informacion();
		$this->load->view('informacion', $result);
	}

	/**
	 *  Funcion donde se muestra la interfaz para cargar las imágenes
	 * 
	 */
	public function cargarImagenes()
	{
		$lastId = $this->last_id();
		$this->load->view('cargarimagenes', $lastId);
	}
	/**
	 *  Funcion para mostrar la interfaz para crera la guía
	 * 
	 */
	public function crearguia()
	{

		$this->load->view('generadorqr');
	}


	/**
	 *  Funcion que se utiliza para guardar la información de la imágen principal
	 * 
	 */

	public function insertarimagenprincipal()
	{
		$informacionEquipo = $this->input->post("ImagenPrincipal");
		$nombreImagen = "";
		if (empty($_FILES['imageInput']['name'])) {
			$nombreImagen = "blanco.png";
			$file_name = $nombreImagen;
			$user_img_profile = $file_name;
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
				'seccion' => 'pricipal'

			);

			$this->Generadorqr_model->insertAllPopUp($data);

			redirect('cargarImagenes/?e=1');
		} else {
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
				'seccion' => 'principal'

			);

			$this->Generadorqr_model->insertAllPopUp($data);

			redirect('cargarImagenes/?e=1');
		}
	}

	/**
	 *  Funcion que se utiliza para guardar la información de las partes de la guía
	 * 
	 */


	public function insertarpartes()
	{
		$nombreImagen = "";
		$informacionEquipo = $this->input->post("informacionEquipo");
		if (empty($_FILES['imageInputPartes']['name'])) {
			$nombreImagen = "blanco.png";
			$file_name = $nombreImagen;
			$user_img_profile = $file_name;
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
		} else {
			$ram = rand(1, 10000);
			$file_name = $_FILES['imageInputPartes']['name'];
			$tmp = explode('.', $file_name);
			$extension_img = end($tmp);

			$user_img_profile = $ram . '.' . $extension_img;

			$mi_archivo = 'imageInputPartes';
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
	}

	/**
	 *  Funcion que se utiliza para guardar la información de las funciones de la guía
	 * 
	 */
	public function insertarFunciones()
	{

		$informacionEquipo = $this->input->post("FunctionamientoEquipo");

		$nombreImagen = "";
		if (empty($_FILES['imageInputFunciones']['name'])) {
			$nombreImagen = "blanco.png";
			$file_name = $nombreImagen;
			$user_img_profile = $file_name;
			$mi_archivo = 'imageInputFunciones';
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
				'seccion' => 'funciones'

			);

			$this->Generadorqr_model->insertAllPopUp($data);

			redirect('cargarImagenes/?e=1');
		} else {
			$ram = rand(1, 10000);
			$file_name = $_FILES['imageInputFunciones']['name'];
			$tmp = explode('.', $file_name);
			$extension_img = end($tmp);

			$user_img_profile = $ram . '.' . $extension_img;

			$mi_archivo = 'imageInputFunciones';
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
				'seccion' => 'funciones'

			);

			$this->Generadorqr_model->insertAllPopUp($data);

			redirect('cargarImagenes/?e=1');
		}
	}

	/**
	 *  Funcion que se utiliza para guardar los registros principales de la guia
	 * 
	 */
	public function insertarAllData()
	{
		$nombreEquipo = $this->input->post('nombreEquipo');
		$descripcion = $this->input->post('descripcion');
		$advertencias = $this->input->post('advertencias');

		$notasPartesEquipo = $this->input->post('nota_partes');
		$notasFuncionamientoEquipo = $this->input->post('nota_funcionamiento');
		$limpiezaEquipo = $this->input->post('limpiezaEquipo');

		$biblioteca = $this->input->post('bibliotecaMedicamentos');

		$notaLimpieza = $this->input->post('notaLimpieza');
		date_default_timezone_set("America/Bogota");
		$fechaCreacion = date('Y-m-d H:i:s');
		$data = array(
			'nombre_equipo' => $nombreEquipo,
			'descripcion' => $descripcion,
			'advertencias' => $advertencias,
			'limpieza' => $limpiezaEquipo,
			'nota_limpieza' => $notaLimpieza,
			'biblioteca_medicamentos' => $biblioteca,
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
		//$data = base_url() . 'generarpdf/' . $id;
		$data = "https://jagesint.com/guiadeusorapido/Welcome/generarpdf/" . $id;
		/* Data */
		#$hex_data   = bin2hex($data);
		$save_name  = "GMREM-" . $id . '.png';

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



	public function last_id()
	{
		$last_id = $this->Generadorqr_model->last_id();
		$last_id = $last_id[0]->id;
		return $last_id;
	}

	/**
	 *  Funcion que se utiliza para crear la guia
	 */
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
	/**
	 *  Funcion que se utiliza para generar el pdf de la guía
	 */
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
		#$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
			require_once(dirname(__FILE__) . '/lang/eng.php');
			$pdf->setLanguageArray($l);
		}

		$principal = "principal";
		$funciones = "funciones";
		$partes = "partes";

		$arrayFunciones = array();
		$arrayPartes = array();

		$imagenvaciaPrincipal = "";
		$imagenvaciaPartes = "";
		$imagenvaciaFunciones = "";


		$informcionGeneral = $this->Generadorqr_model->generatePDF($id);

		$imagenPrincipal = $this->Generadorqr_model->generatePDFImage($id, $principal);
		$imagenFunciones = $this->Generadorqr_model->generatePDFImage($id, $funciones);
		$imagenPartes = $this->Generadorqr_model->generatePDFImage($id, $partes);


		$urlQR = base_url() . "public/qr/" . $informcionGeneral[0]->url_guia;

		if (isset($imagenPrincipal[0]->nombre_img)) {
			$imagenvaciaPrincipal = $imagenPrincipal[0]->nombre_img;
		} else {
			$imagenvaciaPrincipal = "blanco.png";
		}

		$image_path_principal = base_url() . "uploads/" . $principal . "/" . $imagenvaciaPrincipal;


		foreach ($imagenPartes as $ip) {
			if (isset($ip->nombre_img)) {
				$imagenvaciaPartes = $ip->nombre_img;
			} else {
				$imagenvaciaPartes = "blanco.png";
			}
			$image_path_partes = base_url() . "uploads/" . $partes . "/" . $imagenvaciaPartes;
			array_push($arrayPartes, $image_path_partes, $ip->descripcion);
		}

		foreach ($imagenFunciones as $if) {
			if (isset($if->nombre_img)) {
				$imagenvaciaFunciones = $if->nombre_img;
			} else {
				$imagenvaciaFunciones = "blanco.png";
			}

			$image_path_funciones = base_url() . "uploads/" . $funciones . "/" . $imagenvaciaFunciones;
			array_push($arrayFunciones, $image_path_funciones, $if->descripcion);
		}



		foreach ($informcionGeneral as $ig) {
			$nombre_equipo = $ig->nombre_equipo;
			$descripcion = $ig->descripcion;
			$advertencias = $ig->advertencias;
			$limpieza = $ig->limpieza;
			$nota_limpieza = $ig->nota_limpieza;
			$biblioteca_medicamentos = $ig->biblioteca_medicamentos;
		}



		$pdf->SetFont('helvetica', 'R', 9);

		$pdf->AddPage('A4');

		$html0 = <<<EOD
		<style>
		
		table{
			text-align:center;
			width:100%;
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
		img{
			width:400px;
		}

		.text-center{
			text-align:center;
		}

		tr{
			background-color:#fff;
		}

		td{
			background-color:#fff;
		}

		</style>
		<table>
		<tr class="p-3" >
			<td>
				<h1 >
				<br>
				$nombre_equipo
				<br>
				<br>
				</h1>

			</td>
		</tr>
		</table>
		EOD;


		$pdf->writeHTML($html0, true, false, false, false, '');


		if (empty($imagenPrincipal[0]->nombre_img)) {
			$htmlvacio = <<<EOD
				<table>
				<tr class="p-3">
				<td></td>
				</tr>
				</table>
		EOD;
			$pdf->writeHTML($htmlvacio, true, false, false, false, '');
		} else {
			$htmlImgenPrincipal = <<<EOD
			<table>
			<tr  class="p-3">
			<td><img src="$image_path_principal"  /></td>
			</tr>
			</table>
			EOD;
			$pdf->writeHTML($htmlImgenPrincipal, true, false, false, false, '');
		}

		$htmlDes = <<<EOD
		<style>
		table{
			text-align:center;
			width:100%;
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
		img{
			width:400px;
		}

		.text-center{
			text-align:center;
		}

		</style>
		<table>
		<tr>
			<td align="justify" style="background-color:#fff">
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
				</h3>
				<br>
				<h3><span>$advertencias</span></h3>
				<br>
			</td>
		</tr>

		<tr>
			<td align="left">
				<h3>
				<br>
				En esta guía se muestra la información básica para hacer uso adecuado del equipo, si requiere mayor información comuníquese al (310) 552-4551
				<br>
				</h3>
			</td>
		</tr>

	</table>
EOD;
		$pdf->writeHTML($htmlDes, true, false, false, false, '');

		$pdf->AddPage('A4');

		$htmlPartes = <<<EOD
		<style>
				table{
					text-align:center;
				}

				img{
					width:500px;
				}

				</style>
			<table>
			<tr>
				<td>
				<h2>PARTES</h2>
				</td>
			</tr>
			</table>
		EOD;
		$pdf->writeHTML($htmlPartes, true, false, false, false, '');
		$pdf->Ln(10);
		for ($i = 0; $i < count($arrayPartes); $i++) {
			if ($i % 2 == 0) {
				if (empty($arrayPartes[$i])) {
					$htmlImagenPartes = <<<EOD
					<style>
					table{
						text-align:center;
					}
	
					img{
						width:300px;
					}
					ul li{
					list-style:none;
					}
					</style>
					<table>
					<tr>
						<td>
						</td>
					</tr>
					</table>
				EOD;
					$pdf->writeHTML($htmlImagenPartes, true, false, false, false, '');
				} else {

					$htmlImagenPartes = <<<EOD
					<style>
					table{
						text-align:center;
					}
	
					img{
						width:300px;
					}
					ul li{
					list-style:none;
					}
					</style>
					<table>
					<tr>
						<td>
						<img src="$arrayPartes[$i]"/>
						</td>
					</tr>
					</table>
				EOD;

					$pdf->writeHTML($htmlImagenPartes, true, false, false, false, 'C');
				}
			} else {
				$htmlTextoPartes = <<<EOD
				<style>
				table{
					text-align:center;
				}
				ul li{
					list-style:none;
				}
				</style>
				<table >
				<tr>
				<td align="justify">
					<h3>$arrayPartes[$i]</h3>
					</td>
					</tr>
				</table>
				EOD;
				$pdf->writeHTML($htmlTextoPartes, true, false, false, false, '');
			}
		}

		$pdf->AddPage('A4');
		$pdf->Ln(20);
		$htmlFunciones = <<<EOD
				<style>
				table{
					text-align:center;
				}

				</style>
				<table >
				<tr>
				<td align="center">
					<h2>FUNCIONES</h2>
					</td>
					</tr>
				</table>
				EOD;
		$pdf->writeHTML($htmlFunciones, true, false, false, false, '');



		for ($i = 0; $i < count($arrayFunciones); $i++) {
			if ($i % 2 == 0) {
				if (empty($arrayFunciones[$i])) {
					$htmlFuncionesImagen = <<<EOD
				<style>
				table{
					text-align:center !important;
				}
				img{
					width:700px;
				}
				.text-center {
					text-align: center !important;
				}
				</style>
				<table>
				
				</table>
EOD;
					$pdf->writeHTML($htmlFuncionesImagen, true, false, false, false, '');
					$pdf->Ln(20);
				} else {
					$htmlFuncionesImagen = <<<EOD
					<style>
					table{
						text-align:center !important;
					}
					img{
						width:500px;
					}
					.text-center {
						text-align: center !important;
					}
					</style>
					<table >
					<tr class="text-center">
						<td align="center" ><img src="$arrayFunciones[$i]" /></td>
					</tr>
					</table>
	EOD;
					$pdf->writeHTML($htmlFuncionesImagen, true, false, false, false, '');
				}
			} else {
				$htmlDecripcionFunciones = <<<EOD
				<style>
				table{
					text-align:center;
				}

				</style>
				<table>
				<tr>
				<td align="justify">
					<h3>$arrayFunciones[$i]</h3>
				</td>
				</tr>
				</table>
				EOD;
				$pdf->writeHTML($htmlDecripcionFunciones, true, false, false, false, '');
			}
		}


		if (isset($biblioteca_medicamentos)) {
			$pdf->AddPage('A4');
			$htmlmedicamentos = <<<EOD
		<style>
		table{
			text-align:center;
			
		}
		</style>
		<table   width="100%">
		<tr class="p-3">
			<td align="center">
				<h2 >
				<br>
				BIBLIOTECA DE MEDICAMENTOS
				<br>
				<br>
				</h2>

			</td>
		</tr>
		<tr class="p-3">
			<td align="justify">
				<h3 >
				<br>
				$biblioteca_medicamentos
				<br>
				<br>
				</h3>

			</td>
		</tr>
		</table>
	
EOD;
			$pdf->writeHTML($htmlmedicamentos, true, false, false, false, '');
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
		
		
		<table   width="100%">
		<tr>
			<td align="center">
				<h2>
				<br>
				LIMPIEZA Y DESINFECCION
				<br>
				</h2>
			</td>
		</tr>
		
		<tr>
			<td align="justify">
				<h3>
				<br>
				$limpieza
				<br>
				</h3>
			</td>
		</tr>

		<tr>
			<td align="justify">
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
		$pdf->AddPage('A4');
		$htmlQr = <<<EOD
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
		img{
			width:800px;
		}
		</style>
		<table  width="100%">
		<tr>
    		<td><img src="$urlQR" /></td>
		</tr>
		</table>
EOD;
		$pdf->writeHTML($htmlQr, true, false, false, false, '');

		$pdf->Output('GMREP.pdf', 'I');
	}

	public function editarGuia($id)
	{

		$result['guiaGeneral'] = $this->Generadorqr_model->encontrarGuiaId($id);
		$result['encontrarGuiaIdPrincipal'] = $this->Generadorqr_model->encontrarGuiaIdPrincipal($id);
		$result['encontrarGuiaIdPartes'] = $this->Generadorqr_model->encontrarGuiaIdPartes($id);
		$result['encontrarGuiaIdFunciones'] = $this->Generadorqr_model->encontrarGuiaIdFunciones($id);

		$this->load->view('editarGuia', $result);
	}

	public function updateGuia()
	{
		$idGuia = $this->input->post('idGuia');
		$nombreEquipo = $this->input->post('nombreEquipo');
		$descripcion = $this->input->post('descripcion');
		$advertencias = $this->input->post('advertencias');
		$limpiezaEquipo = $this->input->post('limpiezaEquipo');
		$notaLimpieza = $this->input->post('notaLimpieza');
		$bibliotecaMedicamentos = $this->input->post('bibliotecaMedicamentos');

		$data = array(
			'nombre_equipo' => $nombreEquipo,
			'descripcion' => $descripcion,
			'advertencias' => $advertencias,
			'limpieza' => $limpiezaEquipo,
			'nota_limpieza' => $notaLimpieza,
			'biblioteca_medicamentos' => $bibliotecaMedicamentos
		);

		$this->Generadorqr_model->updateInformacionGuia($data, $idGuia);
		redirect('editarGuia/' . $idGuia . '?e=1');
	}


	public function updateImagenPrincipal()
	{
		$idImagen = $this->input->post('idImagen');
		$idGuia = $this->input->post('idGuia');


		$ram = rand(1, 10000);
		$file_name = $_FILES['imageInput']['name'];
		$tmp = explode('.', $file_name);
		$extension_img = end($tmp);

		$user_img_profile = $ram . '.' . $extension_img;

		$mi_archivo = 'imageInput';
		$config['upload_path'] = 'uploads/principal';
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
		);

		$this->Generadorqr_model->updateImagenesGuia($data, $idImagen);

		redirect('editarGuia/' . $idGuia . '?e=1');
	}


	public function updateImagenPartes()
	{
		$idImagen = $this->input->post('idImagen');
		$idGuia = $this->input->post('idGuia');
		$informacionEquipo = $this->input->post('informacionEquipo');

		$ram = rand(1, 10000);
		$file_name = $_FILES['imageInputPartes']['name'];
		$tmp = explode('.', $file_name);
		$extension_img = end($tmp);

		$user_img_profile = $ram . '.' . $extension_img;

		$mi_archivo = 'imageInputPartes';
		$config['upload_path'] = 'uploads/partes';
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
		);

		$this->Generadorqr_model->updateImagenesGuia($data, $idImagen);

		redirect('editarGuia/' . $idGuia . '?e=1');
	}

	public function updateImagenFunciones()
	{
		$idImagen = $this->input->post('idImagen');
		$idGuia = $this->input->post('idGuia');

		$FunctionamientoEquipo = $this->input->post('FunctionamientoEquipo');

		$ram = rand(1, 10000);
		$file_name = $_FILES['imageInputFunciones']['name'];
		$tmp = explode('.', $file_name);
		$extension_img = end($tmp);

		$user_img_profile = $ram . '.' . $extension_img;

		$mi_archivo = 'imageInputFunciones';
		$config['upload_path'] = 'uploads/funciones';
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
			'descripcion' => $FunctionamientoEquipo,
		);

		$this->Generadorqr_model->updateImagenesGuia($data, $idImagen);

		redirect('editarGuia/' . $idGuia . '?e=1');
	}

	public function DeleteGuia($id)
	{
		$data = array(
			'estado' => 1
		);

		$this->Generadorqr_model->DeleteGuia($data, $id);
	}
}
