<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class queja extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('Queja_model');
	}

	private function restringirAcceso() {
		if (!isset($this->session->USUARIO)) {
			redirect("usuario/login");
		}
	}

	public function index(){
		$data['base_url'] = $this->config->item('base_url');
		redirect("inicio");
	}

	function tramite(){
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('queja_pasos', $data);
	}

	public function crearqueja(){
		$data['base_url'] = $this->config->item('base_url');
		$data['codConsum'] = $this->Queja_model->buscarNumeroConsum();
		$data['codProv'] = $this->Queja_model->buscarNumeroProvee();
		$data['codQueja'] = $this->Queja_model->buscarNumeroQueja();
		$this->load->view('queja_crear', $data);
	}

	function crearRegistroQueja(){
		$data['base_url'] = $this->config->item('base_url');
		
		$data['boton'] = " ";
		$data['genero'] = " ";
		$data['persona'] = " ";
		$data['municipio_empresa'] = " ";
		$data['no_factura'] = " ";

			if(($_POST['action'] == 'registrarQueja') || ($_POST['genero'] != null) || ($_POST['persona'] != null) || ($_POST['municipio'] != null) || ($_POST['sede'] != null) || ($_POST['edad'] != null) || ($_POST['nombre_empresa'] != 0)  || ($_POST['municipio_empresa'] != 0) || ($_POST['no_factura'] != null) || ($_POST['detalle_queja'] != null)){

				$dataimg =$_FILES['foto'];
				$nombreFoto = $dataimg['name'];
				$type = $dataimg['type'];
				$url_temp = $dataimg['tmp_name'];

				$imgProducto = 'img_diaco.jpg';

				if ($nombreFoto != '') {
					
					$destino = 'recursos/upload/';
					$img_nombre = 'img_'.date('d-m-Y_H_m_s');
					$imgProducto = $img_nombre.'.jpg';
					$src = $destino.$imgProducto;
					move_uploaded_file($url_temp, $src);
				}

				$data['consum_id_consumidor'] = $_POST['codConsum'];
				$data['proveedor_id_proveedor'] = $_POST['codProvee'];
				$data['queja_id_queja'] = $_POST['codQueja'];

				$data['genero'] = $_POST['genero'];
				$data['tipo_persona'] = $_POST['persona'];
				$data['depto'] = $_POST['departamento'];
				$data['muni_id_municipio'] = $_POST['municipio'];
				$data['sede_id_sede'] = $_POST['sede'];
				$data['edad'] = $_POST['edad'];
				$data['celular'] = $_POST['celular'];
				$data['correo'] = $_POST['correo'];

				$data['nit'] = $_POST['nit'];
				$data['nombre_empresa'] = $_POST['nombre_empresa'];
				$data['razon'] = $_POST['razon'];
				$data['direccion'] = $_POST['direccion'];
				$data['deptoem'] = $_POST['departamento_empresa'];
				$data['muni_id_muni'] = $_POST['municipio_empresa'];
				$data['telefono'] = $_POST['telefono_empresa'];
				$data['email'] = $_POST['correo_empresa'];

				$data['no_factura'] = $_POST['no_factura'];
				$data['fecha_documento'] = $_POST['fecha_documento'];
				$data['detalle_queja'] = $_POST['detalle_queja'];
				$data['solicitud'] = $_POST['solicita_queja'];
				$data['imagen'] = $imgProducto;

				$data['fecha_registro'] = date("Y-m-d");
				$data['fecha_modificacion'] = '0000-00-00';
				$data['usuario_id_modifica'] = '1';

				if (($data['genero'] != null) || ($data['tipo_persona'] != null) || ($data['muni_id_municipio'] != null) || ($data['sede_id_sede'] != null) || ($data['edad'] != null) || ($data['nombre_empresa'] != 0)  || ($data['muni_id_muni'] != 0) || ($data['no_factura'] != null) || ($data['detalle_queja'] != null)) {
					$this->Queja_model->crearQuejaConsumidor($data['genero'],$data['tipo_persona'],$data['muni_id_municipio'],$data['sede_id_sede'],$data['edad'],$data['celular'],$data['correo']);

					$this->Queja_model->crearQuejaProveedor($data['nit'],$data['nombre_empresa'],$data['razon'],$data['direccion'],$data['muni_id_muni'],$data['telefono'], $data['email']);

					$this->Queja_model->crearQueja($data['no_factura'], $data['fecha_documento'], $data['detalle_queja'], $data['solicitud'], $data['imagen']);
				}
				
				$this->Queja_model->crearQuejaControl($data['fecha_registro'], $data['proveedor_id_proveedor'], $data['consum_id_consumidor'], $data['queja_id_queja'], $data['fecha_modificacion'], $data['usuario_id_modifica']);

				$queja_id_queja = $this->Queja_model->selecIdQueja($data['queja_id_queja']);

				$result = $queja_id_queja;
	            echo json_encode($result, JSON_UNESCAPED_UNICODE);
		}


	}

	function verprocesoqueja(){
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('queja_proceso', $data);
	}

	public function sede($id = 0) {
		//$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$data['sede'] =  $this->Queja_model->seleccionarSede(); //Selelcciona el departemanto
		echo '<option selected disabled value="">Seleccionar Sede de DIACO</option>';
		foreach ($data['sede'] as $key) {
		if ($id == $key['id_sede']) {
			echo '<option selected value="'.$key['id_sede'].'">'.$key['nombre_sede'].'</option>'."\n";
			}else {
				echo '<option value="'.$key['id_sede'].'">'.$key['nombre_sede'].'</option>'."\n";
			}
		}
	}

	public function departamento($id = 0) {
		//$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$data['departamento'] =  $this->Queja_model->seleccionarDepartamento(); //Selelcciona el departemanto
		echo '<option selected disabled value="">Seleccionar departamento</option>';
		foreach ($data['departamento'] as $key) {
		if ($id == $key['id_departamento']) {
			echo '<option selected value="'.$key['id_departamento'].'">'.$key['nombre_depto'].'</option>'."\n";
			}else {
				echo '<option value="'.$key['id_departamento'].'">'.$key['nombre_depto'].'</option>'."\n";
			}
		}
	}

	public function municipio($id = 0) {
		//$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$id_depto = $_POST['departamento'];
		$data['municipio'] =  $this->Queja_model->seleccionarMunicipio($id_depto); //Selelcciona el municipio
		echo '<option selected disabled value="">Seleccionar municipio</option>';
		foreach ($data['municipio'] as $key) {
			if ($id == $key['id_municipio']) {
				echo '<option selected value="'.$key['id_municipio'].'">'.$key['nombre_mun'].'</option>'."\n";
			}else {
				echo '<option value="'.$key['id_municipio'].'">'.$key['nombre_mun'].'</option>'."\n";
			}
		}
	}

	function buscarQuejaProceso(){
		$data['base_url'] = $this->config->item('base_url');
		if($_POST['action'] == 'buscar_queja'){

	      $data['id_queja'] = $_POST['codigo'];

	     $arr = $this->Queja_model->BuscarQuejaEnviado($data['id_queja']);

	     $data = $arr;
	     echo json_encode($data, JSON_UNESCAPED_UNICODE);
	    }
	}


}
