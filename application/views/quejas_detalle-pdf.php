 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";

foreach ($arr as $key) {
  $numero = $key['id_queja'];
  $fechacreacion = $key['fecha_registro'];
  $genero = $key['genero'];
  $persona = $key['persona'];
  $munipersona = $key['municipiocon'];
  $deptopersona = $key['departamentocon'];
  $sede = $key['sede'];
  $edad = $key['edad'];
  $celular = $key['celular'];
  $correo = $key['correo'];
  $nit = $key['nit'];
  $nombre = $key['nombre'];
  $razon = $key['razon'];
  $direccion = $key['direccion'];
  $muniempresa = $key['municipio'];
  $deptoempresa = $key['departamento'];
  $telefono = $key['telefono'];
  $email = $key['email'];
  $factura = $key['factura'];
  $fecha = $key['fechafac'];
  $detalle = $key['detalle'];
  $solicita = $key['solicitud'];
  $direccionimg ='/diaco/recursos/upload/';
  $imagen = $direccionimg.$key['imagen'];
}

$dato = date('d_m_Y_H_m_s');
?><!DOCTYPE html>
<html lang="es">
<head>
	<title>Queja_<?php echo $numero; ?>_gen_<?php echo $dato; ?></title>
	<?php $this->load->view('header'); ?>
	
	<style type="text/css">
		/*tablas*/
	.tables {
	  width: 100%;
	  border-collapse: separate;
		border-spacing: 15px;

	}

	th,td{
			text-align: center;
		}

	th{
			border-bottom: 1px solid;
			border-color: blue;
		}

	td{
			color: blue;
			font-weight: bold;
			vertical-align: button;
	}
	.fondo{
		padding-top: 8px;
		padding-bottom: 8px;
	}

	.forme{
  padding: 1rem;
  border-radius: 10px;
  border: 1px solid;
  border-color: blue;

}
	.datosali{
		text-align: center;
	}

	body { 
    font-family: arial; 
    font-size: 9pt; 
}

.direcciontexto{
	padding-left: 75px; 
	text-align: center; 
	padding-top: 25px;
}

	</style>
</head>
<body>
	<div class="container-fluid">
	<table>
		<tr>
			<td><img src="/diaco/recursos/img/diaco.jpg" height="50px" alt="img"></td>
			<td class="direcciontexto"><h3>Datos detallados de la queja</h3></td>
		</tr>
	</table>
	<div class="forme">
		<h4 class="datosali">Número de queja: <strong style="color: #E61202;"> <?php echo  $numero; ?></strong> | Fecha del registro: <?php echo $fechacreacion ?></h4>
		<center class="h5 fondo datosali" style="background-color:#FFFED1"><i class="fa fa-user-check"></i> Datos del Consumidor</center>
		<hr>
		<table class="tables">
		  <thead>
		    <tr>
		     <td><i class="fa fa-venus-mars"></i> Género</td>
		     <td><i class="fa fa-user-tie"></i> Tipo de Persona</td>
		     <td><i class="fa fa-flag"></i> Muninicipio</td>
		     <td><i class="fa fa-flag"></i> Departamento</td>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      <th><?php echo $genero ?></th>
		   		<th><?php echo $persona ?></th>
		      <th><?php echo $munipersona; ?></th>
		    	<th><?php echo $deptopersona ?></th>
		    </tr>
		  </tbody>
		</table>
		<table class="tables">
		  <thead>
		    <tr>
		     <td><i class="fa fa-landmark"></i> Sede Cercana</td>
		     <td><i class="fa fa-heartbeat"></i> Edad</td>
		     <td><i class="fa fa-mobile-alt"></i> No. de Celular</td>
		     <td><i class="fa fa-envelope"></i> Correo Electrónico</td>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      <th><?php echo $sede ?></th>
		   		<th><?php echo $edad ?> años</th>
		      <th><?php echo $celular; ?></th>
		    	<th><?php echo $correo ?></th>
		    </tr>
		  </tbody>
		</table>
<br>
		<center class="h5 fondo datosali" style="background-color:#D1FFD3"><i class="fa fa-building"></i> Datos de la empresa</center>
		<hr>
		<table class="tables">
		  <thead>
		    <tr>
		     <td><i class="fa fa-id-card-alt"></i> NIT</td>
		     <td><i class="fa fa-building"></i> Nombre de la Empresa</td>
		     <td><i class="fa fa-map-marked-alt"></i> Referencias del lugar</td>
		     <td><i class="fa fa-map-marker-alt"></i> Dirección</td>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      <th><?php echo $nit; ?></th>
		   		<th><?php echo $nombre; ?></th>
		      <th><?php echo $razon; ?></th>
		    	<th><?php echo $direccion; ?></th>
		    </tr>
		  </tbody>
		</table>
		<table class="tables">
		  <thead>
		    <tr>
		     <td><i class="fa fa-flag"></i> Municipio</td>
		     <td><i class="fab fa-font-awesome-flag"></i> Departamento</td>
		     <td><i class="fa fa-phone-alt"></i> Teléfono</td>
		     <td><i class="fa fa-envelope-open-text"></i> Correo Electrónico</td>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      <th><?php echo $muniempresa; ?></th>
		   		<th><?php echo $deptoempresa; ?></th>
		      <th><?php echo $telefono; ?></th>
		    	<th><?php echo $email; ?></th>
		    </tr>
		  </tbody>
		</table>
			<br>
		<center class="h5 fondo datosali" style="background-color:#B1FFFA"><i class="fa fa-comment-dots"></i> Datos de la queja</center>
		<hr>
		<table class="tables">
		  <thead>
		    <tr>
		     <td><i class="fa fa-hashtag"></i> Número de Factura / Contrato</td>
		     <td><i class="fa fa-calendar-day"></i> Fecha de emisión del documento</td>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      <th><?php echo $factura; ?></th>
		   		<th><?php echo $fecha; ?></th>
		    </tr>
		  </tbody>
		</table>
		<table class="tables">
		  <thead>
		    <tr>
		     <td><i class="fa fa-comments"></i> Detalle de la Queja</td>
		     <td><i class="fa fa-puzzle-piece"></i> Que solicita</td>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      <th><?php echo $detalle; ?></th>
		   		<th><?php echo $solicita; ?></th>
		    </tr>
		  </tbody>
		</table>
	</div>
		<br>
			<div class="form-row">
				<div class="col-sm-2">
				</div>
				<div class="col-sm-8">
					<?php if($key['imagen'] != 'img_diaco.jpg') { ?>
					<img src="<?php echo $imagen ?>"  class="img-fluid">
				<?php } else { ?>
					<img src="<?php echo $imagen ?>"  height="100px">
				<?php } ?>
				</div>
				<div class="col-sm-2">
				</div>
			</div>
		</div>
</div>
</body>
</html>