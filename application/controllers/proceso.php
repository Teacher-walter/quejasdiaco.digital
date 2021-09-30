<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class proceso extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('Proceso_model');
	}

	private function restringirAcceso() {
		if (!isset($this->session->USUARIO)) {
			redirect("usuario/login");
		}
	}

	function index(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		redirect("inicio");
	}

	function listarrecibidas(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data['arr'] = $this->Proceso_model->quejasRecibidas();
		$this->load->view('quejas_recibidas_proceso', $data);
	}


	function buscarRegistroQueja(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		if(!empty($_POST['no_queja'])){
        $data['id_queja'] = $_POST['no_queja'];
        $arr = $this->Proceso_model->buscarQuejaRegistro($data['id_queja']);

            $result = $arr;
            $data = '';
            if($result > 0){
              $data = $arr;
            }else{
              $data = 0;
            }
        	echo json_encode($data, JSON_UNESCAPED_UNICODE);
      	}
    	exit;
	}

	function actualizarEstadoQueja(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
	
			if(($_POST['action'] == 'updateRegi') & (empty($_POST['id_que'])) ){
				echo "error";
			}else {

			$data['id_producto'] = $_POST['id_que'];
			$data['fecha_modificacion'] = $_POST['fecha_modifica'];
			$data['estado'] = $_POST['estado'];
			$data['usuario_id_modifica'] = $this->session->IDUSUARIO;

			//Todos los datos son correctos, guardar en la BD.
			$this->Proceso_model->actualizaQuejaEstado($data['id_producto'], $data['estado']);

			$arr = 	$this->Proceso_model->actualizarControlQueja($data['id_producto'], $data['fecha_modificacion'], $data['usuario_id_modifica']);

			$result = '1';
	        $data1 = '';
	        if($result > 0){
	          $data1 = $arr;
	        }else{
	          $data1 = 0;
	        }
	      	echo json_encode($data1, JSON_UNESCAPED_UNICODE);
		} 
	}
//quejas aceptadas
	function listaraceptadas(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data['arr'] = $this->Proceso_model->quejasRecibidasAceptadas();
		$this->load->view('quejas_aceptadas_proceso', $data);
	}

	//quejas solucionados
	function  listarsinsolucion(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data['arr'] = $this->Proceso_model->quejasSinSolucion();
		$this->load->view('quejas_sin_solucion', $data);
	}

	function listarresueltas(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data['arr'] = $this->Proceso_model->quejasSolucionados();
		$this->load->view('quejas_solucionadas', $data);
	}

	function detalle_queja($id = 0){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data['arr'] = $this->Proceso_model->verQuejaDetalle($id);
		$this->load->view('quejas_detalle', $data);

	}

	///seccion del consumidor
	function listar_consumidor(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data['arr'] = $this->Proceso_model->mostrarConsumidorRegistrado();
		$this->load->view('consumidor_listar', $data);
	}

	function buscarRegistroConsumidor(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		if(!empty($_POST['id_consumidor'])){
        $data['id_consumidor'] = $_POST['id_consumidor'];
        $arr = $this->Proceso_model->mostrarDatoConsumIndividual($data['id_consumidor']);

            $result = $arr;
            $data = '';
            if($result > 0){
              $data = $arr;
            }else{
              $data = 0;
            }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
      }
    	exit;
	}

	function darBajaConsu(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

			if($_POST['action'] == 'eliminarRegi'){
		 		if(!empty($_POST['id_con'])){
		        $data['id_consumidor'] = $_POST['id_con'];
		        $arr = $this->Proceso_model->darBajaConsumidor($data['id_consumidor']);
		   	}
		  }
	}

//seccion de la empresa
	function listar_empresa(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data['arr'] = $this->Proceso_model->mostrarEmpresaRegistrado();
		$this->load->view('empresa_listar', $data);
	}

	function buscarRegistroEmpresa(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		if(!empty($_POST['id_proveedor'])){
        $data['id_proveedor'] = $_POST['id_proveedor'];
        $arr = $this->Proceso_model->mostrarDatoEmpresaIndividual($data['id_proveedor']);

            $result = $arr;
            $data = '';
            if($result > 0){
              $data = $arr;
            }else{
              $data = 0;
            }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
      }
    	exit;
	}

	function darBempresa(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

			if($_POST['action'] == 'eliminarRegi'){
		 		if(!empty($_POST['id_empre'])){
		        $data['id_proveedor'] = $_POST['id_empre'];
		        $arr = $this->Proceso_model->darBajaEmpresa($data['id_proveedor']);
		   	}
		  }
	}

	//seccion de generar pdf
	function htmldetalle_queja_pdf($id = 0){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data['arr'] = $this->Proceso_model->verQuejaDetalle($id);
		$this->load->view('quejas_detalle-pdf', $data);
	}

	function detalle_queja_pdf($id = 0){
		$this->restringirAcceso();
		$data['arr'] = $this->Proceso_model->verQuejaDetalle($id);
		$hoy = date("dmY");
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4',]);
		$html=$this->load->view('quejas_detalle-pdf', $data, true);
		$pdfFilePath = "DIACO".'_'.$hoy.".pdf";

		$mpdf->WriteHTML($html);
		$mpdf->Output($pdfFilePath, 'D');
		}

	function listar_consumidor_pdf(){
		$this->restringirAcceso();
		$data['arr'] = $this->Proceso_model->mostrarConsumidorRegistrado();
		$hoy = date("dmY");
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L',]);
		$html=$this->load->view('consumidor_listar_pdf', $data, true);
		$pdfFilePath = "DIACO".'_'.$hoy.".pdf";

		$mpdf->WriteHTML($html);
		$mpdf->Output($pdfFilePath, 'D');
	}

	function listar_empresa_pdf(){
		$this->restringirAcceso();
		$data['arr'] = $this->Proceso_model->mostrarEmpresaRegistrado();
		$hoy = date("dmY");
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L',]);
		$html=$this->load->view('empresa_listar_pdf', $data, true);
		$pdfFilePath = "DIACO".'_'.$hoy.".pdf";

		$mpdf->WriteHTML($html);
		$mpdf->Output($pdfFilePath, 'D');
	}


}