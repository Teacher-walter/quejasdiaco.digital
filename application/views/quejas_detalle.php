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
?><!DOCTYPE html>
<html lang="es">
<head>
	<title>Detalle - Queja</title>
	<?php $this->load->view('header'); ?>
</head>
<body>
	<header>
		<?php $this->load->view('menu'); ?>
	</header>
	<div class="container-fluid espacio">
	<center><h3>Datos detallados de la queja</h3></center>	
	<br>
	<div class="formestilo">
		<h4 class="text-center">Número de queja: <strong style="color: #E61202;"> <?php echo  $numero; ?></strong> | Fecha del registro: <?php echo $fechacreacion ?></h4>
		<br>
		<center class="h5" style="background-color:#FFFED1"><i class="fa fa-user-check"></i> Datos del Consumidor</center>
		<hr>
			<div class="form-row text-center">
				<div class="col-sm-6 col-md-2 ">
					<label for="genero"><i class="fa fa-venus-mars"></i> Género</label>
					<input type="text" class="ford text-center texto" value="<?php echo $genero ?>" readonly>
				</div>
				<div class="col-sm-6 col-md-3">
					<label for="persona"><i class="fa fa-user-tie"></i> Tipo de Persona</label>
					<input type="text" class="ford text-center texto" value="<?php echo $persona ?>" readonly>
				</div>
				<div class="col-sm-6 col-md-4">
					<label for="municipio"><i class="fa fa-flag"></i> Muninicipio</label>
					<input type="text" class="ford text-center texto" value="<?php echo $munipersona; ?>" readonly>
				</div>
				<div class="col-sm-6 col-md-3">
					<label for="departamento"><i class="fa fa-flag"></i> Departamento</label>
					<input type="text" class="ford text-center texto" value="<?php echo $deptopersona ?>" readonly>
				</div>
			</div>
			<br>
			<div class="form-row text-center">
				<div class="col-sm-6 col-md-3">
					<label for="sede"><i class="fa fa-landmark"></i> Sede Cercana</label>
					<input type="text" class="ford text-center texto" value="<?php echo $sede ?>" readonly>
				</div>
				<div class="col-sm-6 col-md-2">
					<label for="edad"><i class="fa fa-heartbeat"></i> Edad</label>
					<input type="text" class="ford text-center texto" value="<?php echo $edad ?> años" readonly>
				</div>
				<div class="col-sm-6 col-md-3">
					<label for="celular"><i class="fa fa-mobile-alt"></i> No de Celular</label>
					<input type="text" class="ford text-center texto" value="<?php echo $celular ?>" readonly>
				</div>
				<div class="col-sm-6 col-md-4">
					<label for="correo"><i class="fa fa-mail-bulk"></i> Correo Electrónico</label>
					<input type="text" class="ford text-center texto" value="<?php echo $correo ?>" readonly>
				</div>
			</div>
		<br><br>
		<center class="h5" style="background-color:#D1FFD3"><i class="fa fa-building"></i> Datos de la empresa</center>
		<hr>
			<div class="form-row text-center">
				<div class="col-sm-6 col-md-4">
					<label for=""><i class="fa fa-id-card-alt"></i> NIT</label>
					<input type="text" class="ford text-center texto" value="<?php echo $nit ?>" readonly>
				</div>
				<div class="col-sm-6 col-md-8">
					<label for=""><i class="fa fa-signature"></i> Nombre de la Empresa</label>
					<input type="text" class="ford text-center texto" value="<?php echo $nombre ?>" readonly>
				</div>
			</div>
			<br>
			<div class="form-row text-center">
				<div class="col-sm-6 col-md-6">
					<label for=""><i class="fa fa-signature"></i> Razón (Referencias del lugar)</label>
					<input type="text" class="ford text-center texto" value="<?php echo $razon ?>" readonly>
				</div>
				<div class="col-sm-6 col-md-6">
					<label for=""><i class="fa fa-map-marked-alt"></i> Dirección</label>
					<input type="text" class="ford text-center texto" value="<?php echo $direccion ?>" readonly>
				</div>
			</div>
			<br>
			<div class="form-row text-center">
				<div class="col-sm-6 col-md-3">
					<label for=""><i class="fa fa-flag"></i> Municipio</label>
					<input type="text" class="ford text-center texto" value="<?php echo $muniempresa ?>" readonly>
				</div>
				<div class="col-sm-6 col-md-3">
					<label for=""><i class="fab fa-font-awesome-flag"></i> Departamento</label>
					<input type="text" class="ford text-center texto" value="<?php echo $deptoempresa ?>" readonly>
				</div>
				<div class="col-sm-6 col-md-3">
					<label for=""><i class="fa fa-phone-alt"></i> Teléfono</label>
					<input type="text" class="ford text-center texto" value="<?php echo $telefono ?>" readonly>
				</div>
				<div class="col-sm-6 col-md-3">
					<label for=""><i class="fa fa-envelope-open-text"></i> Correo</label>
					<input type="text" class="ford text-center texto" value="<?php echo $email ?>" readonly>
				</div>
			</div>
			<br><br>
		<center class="h5" style="background-color:#B1FFFA"><i class="fa fa-comment-dots"></i> Datos de la queja</center>
		<hr>
			<div class="form-row text-center">
				<div class="col-sm-6 col-md-3"></div>
				<div class="col-sm-6 col-md-3">
					<label for=""><i class="fa fa-hashtag"></i> Número de factura / contrato</label>
					<input type="text" class="ford text-center texto" value="<?php echo $factura ?>" readonly>
				</div>
				<div class="col-sm-6 col-md-3">
					<label for=""><i class="fa fa-calendar-day"></i> Fecha de emisión</label>
					<input type="text" class="ford text-center texto" value="<?php echo $fecha ?>" readonly>
				</div>
			</div>
			<br>
			<div class="form-row text-center">
				<div class="col-sm-12 col-md-12">
					<label for=""><i class="fa fa-comments"></i> Detalles de la Queja</label>
					<input class="ford text-center texto" value="<?php echo $detalle ?>" rows="2" readonly>
				</div>
				</div>
			<br>
			<div class="form-row text-center">
				<div class="col-sm-12 col-md-12">
					<label for=""><i class="fa fa-puzzle-piece"></i> Que solicita</label>
					<input class="ford text-center texto" value="<?php echo $solicita ?>" rows="2" readonly>
				</div>
			</div>
			<br>
			<div class="form-row text-center">
				<div class="col-sm-4 col-md-2">
				</div>
				<div class="col-sm-4 col-md-6">
					<label for=""><i class="fa fa-image"></i> Imágen de la Factura / Contrato</label>
					<a href="<?php echo $imagen ?>" download="<?php echo  $numero; ?>.jpg">
 						<img src="<?php echo $imagen ?>" height="150px">
					</a>
				</div>
				<div class="col-sm-4 col-md-2">
				</div>
			</div>
			<br><br>
		</div><br>
		<center><a href="javascript:history.back()" class="btn btn-primary" type="button"><i class="fa fa-arrow-circle-left"></i> Regresar</a></center>

	</div>
	<br><br><br>
	<footer><?php $this->load->view('footer') ?></footer>
</body>
</html>