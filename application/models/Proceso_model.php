<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proceso_model extends CI_Model {

//Constructor
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function quejasRecibidas(){
		$sql = "SELECT a.id_queja as no_queja, DATE_FORMAT(b.fecha_registro, '%d/%m/%Y') as fecha_registro, c.genero as genero, c.tipo_persona as persona, d.nombre_empresa as nombre, e.nombre_depto as departamento, f.nombre_mun as municipio, a.estado as estado  	
				FROM 	queja a
				JOIN 	control_registro b on b.queja_id_queja = a.id_queja
				JOIN 	consumidor c on c.id_consumidor = b.consum_id_consumidor
				JOIN    proveedor d on d.id_proveedor = b.proveedor_id_proveedor
				JOIN    municipio f on d.muni_id_muni = f.id_municipio
				JOIN    departamento e on f.departamento_id_departamento = e.id_departamento
				WHERE 	a.estado = 'A'
				ORDER BY a.id_queja DESC
				LIMIT 	100";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}

//buscar registro de la queja
	function buscarQuejaRegistro($id_queja){
		$sql = "SELECT id_queja, estado
				FROM 	queja
                WHERE   id_queja = ?
                ";

        $dbres = $this->db->query($sql, array($id_queja));
        $rows = $dbres->result_array();
        return $rows;
	}

	///actualizar estado de queja
	function actualizaQuejaEstado($id_queja, $estado){
		$sql = "UPDATE queja
				SET estado = '$estado'
				WHERE id_queja = '$id_queja' "; 

		$dbres = $this->db->query($sql);
		return $dbres;
	}

	function actualizarControlQueja($id_queja, $fecha_modificacion, $usuario_id_modifica){
		$sql = "UPDATE control_registro
				SET fecha_modificacion = '$fecha_modificacion', usuario_id_modifica = '$usuario_id_modifica'
				WHERE queja_id_queja = '$id_queja'";
		$dbres = $this->db->query($sql);
		return $dbres;
	}

	//quejas aceptadas por un empleado
	function quejasRecibidasAceptadas(){
		$sql = "SELECT a.id_queja as no_queja, DATE_FORMAT(b.fecha_registro, '%d/%m/%Y') as fecha_registro, c.genero as genero, c.tipo_persona as persona, d.nombre_empresa as nombre, e.nombre_depto as departamento, f.nombre_mun as municipio, a.estado as estado  	
				FROM 	queja a
				JOIN 	control_registro b on b.queja_id_queja = a.id_queja
				JOIN 	consumidor c on c.id_consumidor = b.consum_id_consumidor
				JOIN    proveedor d on d.id_proveedor = b.proveedor_id_proveedor
				JOIN    municipio f on d.muni_id_muni = f.id_municipio
				JOIN    departamento e on f.departamento_id_departamento = e.id_departamento
				WHERE 	a.estado = 'B' ||  a.estado =  'C'
				ORDER BY a.id_queja DESC
				LIMIT 	100";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}

	//quejas solucionadas por un empleado
	function quejasSolucionados(){
		$sql = "SELECT a.id_queja as no_queja, DATE_FORMAT(b.fecha_registro, '%d/%m/%Y') as fecha_registro, c.genero as genero, c.tipo_persona as persona, d.nombre_empresa as nombre, e.nombre_depto as departamento, f.nombre_mun as municipio, a.estado as estado  	
				FROM 	queja a
				JOIN 	control_registro b on b.queja_id_queja = a.id_queja
				JOIN 	consumidor c on c.id_consumidor = b.consum_id_consumidor
				JOIN    proveedor d on d.id_proveedor = b.proveedor_id_proveedor
				JOIN    municipio f on d.muni_id_muni = f.id_municipio
				JOIN    departamento e on f.departamento_id_departamento = e.id_departamento
				WHERE 	a.estado = 'D'
				ORDER BY a.id_queja DESC
				LIMIT 	100";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}
//quejas sin solucion
	function quejasSinSolucion(){
		$sql = "SELECT a.id_queja as no_queja, DATE_FORMAT(b.fecha_registro, '%d/%m/%Y') as fecha_registro, c.genero as genero, c.tipo_persona as persona, d.nombre_empresa as nombre, e.nombre_depto as departamento, f.nombre_mun as municipio, a.estado as estado  	
				FROM 	queja a
				JOIN 	control_registro b on b.queja_id_queja = a.id_queja
				JOIN 	consumidor c on c.id_consumidor = b.consum_id_consumidor
				JOIN    proveedor d on d.id_proveedor = b.proveedor_id_proveedor
				JOIN    municipio f on d.muni_id_muni = f.id_municipio
				JOIN    departamento e on f.departamento_id_departamento = e.id_departamento
				WHERE 	a.estado = 'E'
				ORDER BY a.id_queja DESC
				LIMIT 	100";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}

	//ver detalle de la queja
	function verQuejaDetalle($id){
		$sql = "SELECT a.id_queja as id_queja, DATE_FORMAT(b.fecha_registro, '%d/%m/%Y') as fecha_registro, c.genero as genero, c.tipo_persona as persona, h.nombre_mun as municipiocon, g.nombre_depto as departamentocon, i.nombre_sede as sede, c.edad as edad, c.celular as celular, c.correo as correo, d.nit as nit, d.nombre_empresa as nombre, d.razon as razon, d.direccion as direccion, f.nombre_mun as municipio, e.nombre_depto as departamento, d.telefono as telefono, d.email as email, a.no_factura as factura, DATE_FORMAT(a.fecha_documento, '%d/%m/%Y') as fechafac, a.detalle_queja as detalle, a.solicitud as solicitud, a.imagen as imagen 	
				FROM 	queja a
				JOIN 	control_registro b on b.queja_id_queja = a.id_queja
				JOIN 	consumidor c on c.id_consumidor = b.consum_id_consumidor
				JOIN    municipio h on c.muni_id_muni = h.id_municipio
				JOIN    departamento g on h.departamento_id_departamento = g.id_departamento
				JOIN    sede i on c.sede_id_sede = i.id_sede
				JOIN    proveedor d on d.id_proveedor = b.proveedor_id_proveedor
				JOIN    municipio f on d.muni_id_muni = f.id_municipio
				JOIN    departamento e on f.departamento_id_departamento = e.id_departamento
				WHERE a.id_queja = ?
				LIMIT 	1";

			$dbres = $this->db->query($sql, array($id));
			$rows = $dbres->result_array();
			return $rows;
	}

	///seccion del consumidor ////////////////////////////////////////////////
	function mostrarConsumidorRegistrado(){
		$sql = "SELECT c.id_consumidor as id_consumidor, c.genero as genero, c.tipo_persona as persona, h.nombre_mun as municipiocon, g.nombre_depto as departamentocon, i.nombre_sede as sede, c.edad as edad, c.celular as celular, c.correo as correo
				FROM 	consumidor c 
				JOIN    municipio h on c.muni_id_muni = h.id_municipio
				JOIN    departamento g on h.departamento_id_departamento = g.id_departamento
				JOIN   	sede i on c.sede_id_sede = i.id_sede
				WHERE   c.estado = 'A'

				ORDER BY c.id_consumidor DESC
				LIMIT 	1000";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}

	function mostrarDatoConsumIndividual($id_consumidor){
        $sql = "SELECT a.id_consumidor as codigo, a.genero as genero, a.tipo_persona as tipo_persona, a.edad as edad, b.estado as estado
                FROM    consumidor a
                JOIN    control_registro c on a.id_consumidor = c.consum_id_consumidor
                JOIN    queja b on c.queja_id_queja = b.id_queja
                WHERE   id_consumidor = ?
                ";

        $dbres = $this->db->query($sql, array($id_consumidor));
        $rows = $dbres->result_array();
        return $rows;
	}

	function darBajaConsumidor($id_consumidor){
		 is_numeric($id_consumidor) or exit("Número esperado!");

        $sql = "UPDATE  consumidor
                SET     estado = ?
                WHERE   id_consumidor = ?
                LIMIT   1;";

        $valores = array('B', $id_consumidor);
        $dbres = $this->db->query($sql, $valores);
        return $dbres;
	}

	//lsitar empresas

	function mostrarEmpresaRegistrado(){
		$sql = "SELECT p.id_proveedor as id_proveedor, p.nit as nit, p.nombre_empresa as nombre, p.razon as razon, p.direccion as direccion, h.nombre_mun as municipio, g.nombre_depto as departamento, p.telefono as telefono, p.email as correo
				
				FROM 	proveedor p
				JOIN    municipio h on p.muni_id_muni = h.id_municipio
				JOIN    departamento g on h.departamento_id_departamento = g.id_departamento
				WHERE   p.estado = 'A'
				ORDER BY p.id_proveedor DESC
				LIMIT 	1000";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}

	function mostrarDatoEmpresaIndividual($id_proveedor){
        $sql = "SELECT  a.id_proveedor as id_proveedor,  a.nit as nit,  a.nombre_empresa as nombre_empresa,  b.estado as estado
                FROM    proveedor a
                JOIN    control_registro c on a.id_proveedor = c.proveedor_id_proveedor
                JOIN    queja b on c.queja_id_queja = b.id_queja
                WHERE   id_proveedor = ?
                ";

        $dbres = $this->db->query($sql, array($id_proveedor));
        $rows = $dbres->result_array();
        return $rows;
    }

    function darBajaEmpresa($id_proveedor){
		 is_numeric($id_proveedor) or exit("Número esperado!");

        $sql = "UPDATE  proveedor
                SET     estado = ?
                WHERE   id_proveedor = ?
                LIMIT   1;";

        $valores = array('B', $id_proveedor);
        $dbres = $this->db->query($sql, $valores);
        return $dbres;
    }

	
}