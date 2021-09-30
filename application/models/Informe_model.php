<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Informe_model extends CI_Model {
//Constructor
	function __construct(){
		parent::__construct();
		$this->load->database();

	}
//quejas ingresado por mes desde no importando en que categoria se encuentra
	function quejasIngresadoPorMes(){
		$sql = "SELECT DATE_FORMAT(b.fecha_registro, '%M') as mesIngresado,  COUNT(a.id_queja) AS totalIngresado
			FROM 	queja a
			JOIN 	control_registro b on b.queja_id_queja = a.id_queja
			JOIN 	consumidor c on c.id_consumidor = b.consum_id_consumidor
			JOIN    proveedor d on d.id_proveedor = b.proveedor_id_proveedor
			JOIN    municipio f on d.muni_id_muni = f.id_municipio
			JOIN    departamento e on f.departamento_id_departamento = e.id_departamento
			WHERE 	a.estado != 'F'
			GROUP BY mesIngresado
			ORDER BY a.id_queja DESC
			LIMIT 	1000";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}

	function quejasSolucionadasSat(){
		$sql = "SELECT DATE_FORMAT(b.fecha_registro, '%M') as mesSolucionado,  COUNT(a.id_queja) AS totalSolucionado
			FROM 	queja a
			JOIN 	control_registro b on b.queja_id_queja = a.id_queja
			JOIN 	consumidor c on c.id_consumidor = b.consum_id_consumidor
			JOIN    proveedor d on d.id_proveedor = b.proveedor_id_proveedor
			JOIN    municipio f on d.muni_id_muni = f.id_municipio
			JOIN    departamento e on f.departamento_id_departamento = e.id_departamento
			WHERE 	a.estado = 'D'
			GROUP BY mesSolucionado
			ORDER BY a.id_queja DESC
			LIMIT 	1000";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}

	function quejasEnProceso(){
		$sql = "SELECT a.id_queja as no_queja, DATE_FORMAT(b.fecha_registro, '%M') as mesProceso, COUNT(a.id_queja) AS totalP
			FROM 	queja a
			JOIN 	control_registro b on b.queja_id_queja = a.id_queja
			JOIN 	consumidor c on c.id_consumidor = b.consum_id_consumidor
			WHERE 	a.estado = 'C'
			GROUP BY mesProceso
			ORDER BY a.id_queja DESC
			LIMIT 	1000";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
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
	function descargarQuejaResuelta(){
		$sql = "SELECT a.id_queja as no_queja, DATE_FORMAT(b.fecha_registro, '%M') as mes, COUNT(a.id_queja) AS total, c.genero as genero, c.tipo_persona as persona,  a.estado as estado  	
			FROM 	queja a
			JOIN 	control_registro b on b.queja_id_queja = a.id_queja
			JOIN 	consumidor c on c.id_consumidor = b.consum_id_consumidor
			WHERE 	a.estado = 'D'
			GROUP BY mes
			ORDER BY a.id_queja DESC
			LIMIT 	1000";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}

//queja por region
    function descargarQuejaRegion(){
    	$sql = "SELECT a.id_queja as id, DATE_FORMAT(b.fecha_registro, '%d/%m/%Y') as fecha_registro, d.nombre_empresa as nombre, e.nombre_depto as departamento, f.nombre_mun as municipio, r.nombre_region  as region
			FROM 	queja a
			JOIN 	control_registro b on b.queja_id_queja = a.id_queja
			JOIN 	consumidor c on c.id_consumidor = b.consum_id_consumidor
			JOIN    proveedor d on d.id_proveedor = b.proveedor_id_proveedor
			JOIN    municipio f on c.muni_id_muni = f.id_municipio
			JOIN    departamento e on f.departamento_id_departamento = e.id_departamento
			JOIN    region r on e.region_id_region = r.id_region
			WHERE 	a.estado != 'F'
			ORDER BY id DESC
			LIMIT 	100";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
    }

    function descargarQuejaRegionGra(){
    	$sql = "SELECT a.id_queja as id, DATE_FORMAT(b.fecha_registro, '%d/%m/%Y') as fecha_registro, d.nombre_empresa as nombre, e.nombre_depto as departamento, f.nombre_mun as municipio, r.nombre_region  as region, count(r.nombre_region) as totalR
			FROM 	queja a
			JOIN 	control_registro b on b.queja_id_queja = a.id_queja
			JOIN 	consumidor c on c.id_consumidor = b.consum_id_consumidor
			JOIN    proveedor d on d.id_proveedor = b.proveedor_id_proveedor
			JOIN    municipio f on c.muni_id_muni = f.id_municipio
			JOIN    departamento e on f.departamento_id_departamento = e.id_departamento
			JOIN    region r on e.region_id_region = r.id_region
			WHERE 	a.estado != 'F'
			GROUP BY region
			ORDER BY id DESC
			LIMIT 	1000";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
    }
    //por departamento
	function descargarQuejaDepartamento(){
	    	$sql = "SELECT a.id_queja as id, DATE_FORMAT(b.fecha_registro, '%d/%m/%Y') as fecha_registro, d.nombre_empresa as nombre, e.nombre_depto as departamento, f.nombre_mun as municipio
			FROM 	queja a
			JOIN 	control_registro b on b.queja_id_queja = a.id_queja
			JOIN 	consumidor c on c.id_consumidor = b.consum_id_consumidor
			JOIN    proveedor d on d.id_proveedor = b.proveedor_id_proveedor
			JOIN    municipio f on c.muni_id_muni = f.id_municipio
			JOIN    departamento e on f.departamento_id_departamento = e.id_departamento
			WHERE 	a.estado != 'F'
			ORDER BY id DESC
			LIMIT 	1000";

			$dbres = $this->db->query($sql);
			$rows = $dbres->result_array();
			return $rows;
	    }

    function descargarQuejaDepa(){
    	$sql = "SELECT a.id_queja as id, DATE_FORMAT(b.fecha_registro, '%d/%m/%Y') as fecha_registro, d.nombre_empresa as nombre, e.nombre_depto as departamento, count(e.nombre_depto) as totaldep, f.nombre_mun as municipio
			FROM 	queja a
			JOIN 	control_registro b on b.queja_id_queja = a.id_queja
			JOIN 	consumidor c on c.id_consumidor = b.consum_id_consumidor
			JOIN    proveedor d on d.id_proveedor = b.proveedor_id_proveedor
			JOIN    municipio f on c.muni_id_muni = f.id_municipio
			JOIN    departamento e on f.departamento_id_departamento = e.id_departamento
			WHERE 	a.estado != 'F'
			GROUP BY departamento
			ORDER BY id DESC
			LIMIT 	1000";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
    }

    function descargarQuejaMuni(){
    	$sql = "SELECT a.id_queja as id, DATE_FORMAT(b.fecha_registro, '%d/%m/%Y') as fecha_registro, d.nombre_empresa as nombre, e.nombre_depto as departamento, f.nombre_mun as municipio, count(f.nombre_mun) as totalmun
			FROM 	queja a
			JOIN 	control_registro b on b.queja_id_queja = a.id_queja
			JOIN 	consumidor c on c.id_consumidor = b.consum_id_consumidor
			JOIN    proveedor d on d.id_proveedor = b.proveedor_id_proveedor
			JOIN    municipio f on c.muni_id_muni = f.id_municipio
			JOIN    departamento e on f.departamento_id_departamento = e.id_departamento
			WHERE 	a.estado != 'F'
			GROUP BY municipio
			ORDER BY id DESC
			LIMIT 	1000";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
    }

    //datos por empresas 
    function descargarQuejaEmpresa(){
    	$sql = "SELECT a.id_queja as id, DATE_FORMAT(b.fecha_registro, '%d/%m/%Y') as fecha_registro, d.nombre_empresa as nombre, count(d.nombre_empresa) as totalque, e.nombre_depto as departamento, f.nombre_mun as municipio
			FROM 	queja a
			JOIN 	control_registro b on b.queja_id_queja = a.id_queja
			JOIN 	consumidor c on c.id_consumidor = b.consum_id_consumidor
			JOIN    proveedor d on d.id_proveedor = b.proveedor_id_proveedor
			JOIN    municipio f on c.muni_id_muni = f.id_municipio
			JOIN    departamento e on f.departamento_id_departamento = e.id_departamento
			WHERE 	a.estado != 'F'
			GROUP BY nombre
			ORDER BY id DESC
			LIMIT 	1000";

	$dbres = $this->db->query($sql);
	$rows = $dbres->result_array();
	return $rows;
    }

    //por fechas
    function fechaQuejaRegion($fecha_inicio, $fecha_fin){
    	$sql = "SELECT r.nombre_region  as region, count(r.nombre_region) as totalR
			FROM 	queja a
			JOIN 	control_registro b on b.queja_id_queja = a.id_queja
			JOIN 	consumidor c on c.id_consumidor = b.consum_id_consumidor
			JOIN    municipio f on c.muni_id_muni = f.id_municipio
			JOIN    departamento e on f.departamento_id_departamento = e.id_departamento
			JOIN    region r on e.region_id_region = r.id_region
			WHERE 	a.estado != 'F' AND b.fecha_registro BETWEEN '$fecha_inicio' AND '$fecha_fin'
			GROUP BY region
			LIMIT 	1000";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
    }

    function fechaQuejaDepto($fecha_inicio, $fecha_fin){
    	$sql = "SELECT e.nombre_depto as departamento, count(e.nombre_depto) as totalD
			FROM 	queja a
			JOIN 	control_registro b on b.queja_id_queja = a.id_queja
			JOIN 	consumidor c on c.id_consumidor = b.consum_id_consumidor
			JOIN    municipio f on c.muni_id_muni = f.id_municipio
			JOIN    departamento e on f.departamento_id_departamento = e.id_departamento
			JOIN    region r on e.region_id_region = r.id_region
			WHERE 	a.estado != 'F' AND b.fecha_registro BETWEEN '$fecha_inicio' AND '$fecha_fin'
			GROUP BY departamento
			LIMIT 	1000";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
    }

    function fechaQuejaMuni($fecha_inicio, $fecha_fin){
    	$sql = "SELECT f.nombre_mun as municipio, count(f.nombre_mun) as totalM
			FROM 	queja a
			JOIN 	control_registro b on b.queja_id_queja = a.id_queja
			JOIN 	consumidor c on c.id_consumidor = b.consum_id_consumidor
			JOIN    municipio f on c.muni_id_muni = f.id_municipio
			JOIN    departamento e on f.departamento_id_departamento = e.id_departamento
			JOIN    region r on e.region_id_region = r.id_region
			WHERE 	a.estado != 'F' AND b.fecha_registro BETWEEN '$fecha_inicio' AND '$fecha_fin'
			GROUP BY municipio
			LIMIT 	1000";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
    }

    //queja por fecha de empresa
    function fechaQuejaEmpresa($fecha_inicio, $fecha_fin){
    	$sql = "SELECT d.nombre_empresa as nombreEmpre, count(d.nombre_empresa) as totalEmpress

			FROM 	queja a
			JOIN 	control_registro b on b.queja_id_queja = a.id_queja
			JOIN 	consumidor c on c.id_consumidor = b.consum_id_consumidor
			JOIN    proveedor d on d.id_proveedor = b.proveedor_id_proveedor
			JOIN    municipio f on c.muni_id_muni = f.id_municipio
			JOIN    departamento e on f.departamento_id_departamento = e.id_departamento
			WHERE 	a.estado != 'F' AND b.fecha_registro BETWEEN '$fecha_inicio' AND '$fecha_fin'
			GROUP BY nombreEmpre
			LIMIT 	1000";

	$dbres = $this->db->query($sql);
	$rows = $dbres->result_array();
	return $rows;
    }

    //quejas por fecha en tabla
    function quejasTablaFecha($fecha_inicio, $fecha_fin){
    	$sql = "SELECT a.id_queja as id, d.nombre_empresa as nombreEmpre, count(d.nombre_empresa) as totalEmpress

			FROM 	queja a
			JOIN 	control_registro b on b.queja_id_queja = a.id_queja
			JOIN 	consumidor c on c.id_consumidor = b.consum_id_consumidor
			JOIN    proveedor d on d.id_proveedor = b.proveedor_id_proveedor
			JOIN    municipio f on c.muni_id_muni = f.id_municipio
			JOIN    departamento e on f.departamento_id_departamento = e.id_departamento
			WHERE 	a.estado != 'F' AND b.fecha_registro BETWEEN '$fecha_inicio' AND '$fecha_fin'
			GROUP BY nombreEmpre
			LIMIT 	1000";

	$dbres = $this->db->query($sql);
	$rows = $dbres->result_array();
	return $rows;
	}

    //cantidad de quejas por fecha
    function cantQueFecha($fecha_inicio, $fecha_fin){
    	$sql = "SELECT count(a.id_queja) as totalqfecha
			FROM 	queja a
			JOIN 	control_registro b on b.queja_id_queja = a.id_queja
			JOIN 	consumidor c on c.id_consumidor = b.consum_id_consumidor
			JOIN    municipio f on c.muni_id_muni = f.id_municipio
			JOIN    departamento e on f.departamento_id_departamento = e.id_departamento
			JOIN    region r on e.region_id_region = r.id_region
			WHERE 	a.estado != 'F' AND b.fecha_registro BETWEEN '$fecha_inicio' AND '$fecha_fin'
			LIMIT 	1000";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
    }

    //total de quejas ingresados en el sistema
    function cantQueTotal(){
    	$sql = "SELECT count(a.id_queja) as totalqfecha
				FROM 	queja a
			JOIN 	control_registro b on b.queja_id_queja = a.id_queja
			JOIN 	consumidor c on c.id_consumidor = b.consum_id_consumidor
			JOIN    municipio f on c.muni_id_muni = f.id_municipio
			JOIN    departamento e on f.departamento_id_departamento = e.id_departamento
			JOIN    region r on e.region_id_region = r.id_region
			WHERE 	a.estado != 'F'
			LIMIT 	1000";

	$dbres = $this->db->query($sql);
	$rows = $dbres->result_array();
	return $rows;
    }
   

	
}