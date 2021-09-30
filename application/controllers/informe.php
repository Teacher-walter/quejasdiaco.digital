<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class informe extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('date');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('Informe_model');
	}

	private function restringirAcceso() {
		if (!isset($this->session->USUARIO)) {
			redirect("usuario/login");
		}
	}

	public function index(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		redirect("inicio");
	}

	public function bienvenido(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('bienvenida', $data);
	}

	function estadistica(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('estadistica', $data);
	}

	function estadistica_region(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data['arr'] = $this->Informe_model->descargarQuejaRegion();
		$this->load->view('estadistica_region', $data);
	}

	function datosRegion(){
		$this->restringirAcceso();
		$region = $this->Informe_model->descargarQuejaRegionGra();
		$data = $region;
		echo json_encode($data, JSON_UNESCAPED_UNICODE);
	}

	function estadistica_departamento(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data['arr'] = $this->Informe_model->descargarQuejaDepartamento();
		$this->load->view('estadistica_departamento', $data);
	}

	function mostrarDatos(){
		$this->restringirAcceso();
		$data = $this->Informe_model->descargarQuejaDepa();
	    echo json_encode($data, JSON_UNESCAPED_UNICODE);
	}

	function mostrarDatosMuni(){
		$this->restringirAcceso();
		$data = $this->Informe_model->descargarQuejaMuni();
		echo json_encode($data, JSON_UNESCAPED_UNICODE);
	}

	function mostrarDatosEmpresa(){
		$this->restringirAcceso();
		$data = $this->Informe_model->descargarQuejaEmpresa();
		echo json_encode($data, JSON_UNESCAPED_UNICODE);
	}
	//por fechas
	function regionFecha(){
		$this->restringirAcceso();
		//print_r($_POST);
		$mens = '';

		if(!empty($_POST['inicio']) && !empty($_POST['fin'])){

			$fecha_inicio =  $_POST['inicio'];
			$fecha_fin =  $_POST['fin'];

			if ($fecha_inicio > $fecha_fin) {
				$mens = 'mayor';

			} else if($fecha_inicio == $fecha_fin){
				$resultado = $this->Informe_model->fechaQuejaRegion($fecha_inicio, $fecha_fin);
					$data = $resultado;
					echo json_encode($data, JSON_UNESCAPED_UNICODE);
			} else {
				$result = $this->Informe_model->fechaQuejaRegion($fecha_inicio, $fecha_fin);
					$data = $result;
					echo json_encode($data, JSON_UNESCAPED_UNICODE);
			}
		
		}
		
	}

	function deptoFecha(){
		$this->restringirAcceso();
		$mens = '';

		if(!empty($_POST['inicio']) && !empty($_POST['fin'])){

			$fecha_inicio =  $_POST['inicio'];
			$fecha_fin =  $_POST['fin'];

			if ($fecha_inicio > $fecha_fin) {
				$mens = 'mayor';

			} else if($fecha_inicio == $fecha_fin){
				$resultado = $this->Informe_model->fechaQuejaDepto($fecha_inicio, $fecha_fin);
					$data = $resultado;
					echo json_encode($data, JSON_UNESCAPED_UNICODE);
			} else {
				$result = $this->Informe_model->fechaQuejaDepto($fecha_inicio, $fecha_fin);
					$data = $result;
					echo json_encode($data, JSON_UNESCAPED_UNICODE);
			}
		
		}
	}

	function muniFecha(){
		$this->restringirAcceso();
		$mens = '';

		if(!empty($_POST['inicio']) && !empty($_POST['fin'])){

			$fecha_inicio =  $_POST['inicio'];
			$fecha_fin =  $_POST['fin'];

			if ($fecha_inicio > $fecha_fin) {
				$mens = 'mayor';

			} else if($fecha_inicio == $fecha_fin){
				$resultado = $this->Informe_model->fechaQuejaMuni($fecha_inicio, $fecha_fin);
					$data = $resultado;
					echo json_encode($data, JSON_UNESCAPED_UNICODE);
			} else {
				$result = $this->Informe_model->fechaQuejaMuni($fecha_inicio, $fecha_fin);
					$data = $result;
					echo json_encode($data, JSON_UNESCAPED_UNICODE);
			}
		
		}
	}

	function empresaFecha(){
		$this->restringirAcceso();
		$mens = '';

		if(!empty($_POST['inicio']) && !empty($_POST['fin'])){

			$fecha_inicio =  $_POST['inicio'];
			$fecha_fin =  $_POST['fin'];

			if ($fecha_inicio > $fecha_fin) {
				$mens = 'mayor';

			} else if($fecha_inicio == $fecha_fin){
				$resultado = $this->Informe_model->fechaQuejaEmpresa($fecha_inicio, $fecha_fin);
					$data = $resultado;
					echo json_encode($data, JSON_UNESCAPED_UNICODE);
			} else {
				$result = $this->Informe_model->fechaQuejaEmpresa($fecha_inicio, $fecha_fin);
					$data = $result;
					echo json_encode($data, JSON_UNESCAPED_UNICODE);
			}
		
		}
	}

	function cantidadQuejasFecha(){
		$this->restringirAcceso();
		if(!empty($_POST['inicio']) && !empty($_POST['fin'])){

			$fecha_inicio =  $_POST['inicio'];
			$fecha_fin =  $_POST['fin'];

			if ($fecha_inicio > $fecha_fin) {
				$mens = 'mayor';

			} else if($fecha_inicio == $fecha_fin){
				$resultado = $this->Informe_model->cantQueFecha($fecha_inicio, $fecha_fin);
					$data = $resultado;
					echo json_encode($data, JSON_UNESCAPED_UNICODE);
			} else {
				$result = $this->Informe_model->cantQueFecha($fecha_inicio, $fecha_fin);
					$data = $result;
					echo json_encode($data, JSON_UNESCAPED_UNICODE);
			}
		
		}
	}
	//sección estadistica
	function cantidadQuejasIngresados(){
		$this->restringirAcceso();
		$resultado = $this->Informe_model->cantQueTotal();
		$data = $resultado;
		echo json_encode($data, JSON_UNESCAPED_UNICODE);	
	}
	//quejas resueltos por mes
	function quejaResuelta(){
		$this->restringirAcceso();
		$resueltas = $this->Informe_model->quejasSolucionadasSat();
		$data = $resueltas;
		echo json_encode($data, JSON_UNESCAPED_UNICODE);
	}
	//quejas por mes
	function cantidadQuejasIngresadosMes(){
		$this->restringirAcceso();
		$resultado = $this->Informe_model->quejasIngresadoPorMes();
		$data = $resultado;
		echo json_encode($data, JSON_UNESCAPED_UNICODE);	
	}

	function quejaTablaFecha(){
		$this->restringirAcceso();

		if(!empty($_POST['inicio']) && !empty($_POST['fin'])){

			$fecha_inicio =  $_POST['inicio'];
			$fecha_fin =  $_POST['fin'];

			if ($fecha_inicio > $fecha_fin) {
				$mens = 'mayor';

			} else if($fecha_inicio == $fecha_fin){
				$resultado = $this->Informe_model->quejasTablaFecha($fecha_inicio, $fecha_fin);
					$data = $resultado;
					echo json_encode($data, JSON_UNESCAPED_UNICODE);
			} else {
				$result = $this->Informe_model->quejasTablaFecha($fecha_inicio, $fecha_fin);
					$data = $result;
					echo json_encode($data, JSON_UNESCAPED_UNICODE);
			}
		
		}
	}
	//para traer quejas en proceso
	function quejasEnProceso(){
		$this->restringirAcceso();
		$resultado = $this->Informe_model->quejasEnProceso();
		$data = $resultado;
		echo json_encode($data, JSON_UNESCAPED_UNICODE);
	}

	function quejaPorDepartamento(){
		$this->restringirAcceso();
		$data = $this->Informe_model->descargarQuejaDepa();
	    echo json_encode($data, JSON_UNESCAPED_UNICODE);
	}


}