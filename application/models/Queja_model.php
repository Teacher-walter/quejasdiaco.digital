<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Queja_model extends CI_Model {

//Constructor
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function seleccionarSede(){
		$sql = "SELECT 	id_sede, nombre_sede
				FROM 	sede
				order by id_sede ASC
				LIMIT 	50";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}

	function seleccionarDepartamento() {
		$sql = "SELECT id_departamento, nombre_depto
				FROM 	departamento
				order by nombre_depto ASC
				LIMIT 	500";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}

	function seleccionarMunicipio($id) {
		if (isset($id)) {
			$sql = "SELECT id_municipio, nombre_mun
					FROM 	municipio
					where departamento_id_departamento = ?
					order by nombre_mun ASC
					LIMIT 	500";

			$dbres = $this->db->query($sql, $id);
		}else {
			$sql = "SELECT id_municipio, nombre_mun
					FROM 	municipio
					where id_municipio = 2
					order by nombre_mun ASC
					LIMIT 	500";

			$dbres = $this->db->query($sql);
		}

		$rows = $dbres->result_array();
		return $rows;
	}

	//seccion de quejas
	function buscarNumeroConsum(){
		$sql = "SELECT MAX(id_consumidor)+1 as id
				FROM consumidor
				";
		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}
	function buscarNumeroProvee(){
		$sql = "SELECT MAX(id_proveedor)+1 as id
				FROM proveedor
				";
		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}
	function buscarNumeroQueja(){
		$sql = "SELECT MAX(id_queja)+1 as id
				FROM queja
				";
		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}

	function crearQuejaConsumidor($genero, $tipo_persona, $muni_id_municipio, $sede_id_sede, $edad, $celular, $correo){
		$sql = "INSERT INTO consumidor(genero,tipo_persona,muni_id_muni,sede_id_sede,edad,celular,correo, estado)
				VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

		$estado = "A";
		$valores = array($genero, $tipo_persona, $muni_id_municipio, $sede_id_sede, $edad, $celular, $correo, $estado);
		$dbres = $this->db->query($sql, $valores);
		return $dbres;
	}

	function crearQuejaProveedor($nit, $nombre_empresa, $razon, $direccion, $muni_id_muni, $telefono, $email){
		$sql = "INSERT INTO proveedor(nit, nombre_empresa, razon, direccion, muni_id_muni, telefono, email, estado)
				VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

		$estado = "A";
		$valores = array($nit, $nombre_empresa, $razon, $direccion, $muni_id_muni, $telefono, $email, $estado);
		$dbres = $this->db->query($sql, $valores);
		return $dbres;
	}

	function crearQueja($no_factura, $fecha_documento, $detalle_queja, $solicitud, $imagen){
		$sql = "INSERT INTO queja(no_factura, fecha_documento, detalle_queja, solicitud, imagen, estado)
				VALUES (?, ?, ?, ?, ?, ?)";

		$estado = "A";
		$valores = array($no_factura, $fecha_documento, $detalle_queja, $solicitud, $imagen, $estado);
		$dbres = $this->db->query($sql, $valores);
		return $dbres;
	}

	function selecIdConsumidor($cod_consumidor){
		$sql = "SELECT 	id_consumidor
				FROM 	consumidor
				WHERE 	id_consumidor = ?
				LIMIT 	1";

		$dbres = $this->db->query($sql, array($cod_consumidor));
		$rows = $dbres->result_array();
		return $rows[0]['id_consumidor'];
	}

	function selecIdQueja($id_queja){
		$sql = "SELECT 	id_queja
				FROM 	queja
				WHERE 	id_queja = ?
				LIMIT 	1";

		$dbres = $this->db->query($sql, array($id_queja));
		$rows = $dbres->result_array();
		return $rows[0]['id_queja'];

	}

	function selecIdProveedor($cod_proveedor){
		$sql = "SELECT 	id_proveedor
				FROM 	proveedor
				WHERE 	id_proveedor = ?
				LIMIT 	1";

		$dbres = $this->db->query($sql, array($cod_proveedor));
		$rows = $dbres->result_array();
		return $rows[0]['id_proveedor'];

	}

	function crearQuejaControl($fecha_registro, $proveedor_id_proveedor, $consum_id_consumidor, $queja_id_queja, $fecha_modificacion, $usuario_id_modifica){
		$sql = "INSERT INTO control_registro(fecha_registro, proveedor_id_proveedor, consum_id_consumidor, queja_id_queja, fecha_modificacion, usuario_id_modifica)
				VALUES (?, ?, ?, ?, ?, ?)";

		$valores = array($fecha_registro, $proveedor_id_proveedor, $consum_id_consumidor, $queja_id_queja, $fecha_modificacion, $usuario_id_modifica);
		$dbres = $this->db->query($sql, $valores);
		return $dbres;
	}

	//buscar queja registrado
	function BuscarQuejaEnviado($id_queja){
		$sql = "SELECT a.id_queja as codigo, DATE_FORMAT(b.fecha_registro, '%d/%m/%Y') as fecha_registro, c.genero as genero, c.tipo_persona as persona, a.estado as estado  	
				FROM 	queja a
				JOIN 	control_registro b on b.queja_id_queja = a.id_queja
				JOIN 	consumidor c on c.id_consumidor = b.consum_id_consumidor
			
				WHERE 	a.id_queja = ?
				LIMIT 	1";

		$dbres = $this->db->query($sql, array($id_queja));
		$rows = $dbres->result_array();
		return $rows;
	}
}