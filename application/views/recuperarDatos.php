<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
foreach ($arr as $a) {
  $id = $a['id_usuario'];
}
?><!DOCTYPE html>
<html lang="es">
<head>
	<?php $this->load->view('header'); ?>

	<title>Autenticación</title>
</head>
<body>
<div class="container espacio">
<?php $this->load->view('menu'); ?>

		<br>
	<header>
		<center><h3 style="color: black"><i class="fa fa-key"></i> SQA-DIACO</h3></center>
	</header>
	<br><hr><br>
	<h5 class="text-center">Generar otra contraseña</h5>
	<div class="abs-center">
		<div id="container-fluid bg">
			<div class="row">
				<form class="form-container" action="<?=$base_url?>/usuario/restaurar_datos/" method="POST">
					<div class="form-group">
						<label for="Pasword">Ingrese contraseña</label>
						<input id="clave1" type="password" class="form-control" minlength="8" placeholder="Contraseña" name="clave1"  autocomplete="off" required>
					</div>
					<div class="form-group">
						<label for="Pasword">Repita contraseña</label>
						<input id="clave2" type="password" onkeyup="ValidarPass()" minlength="8" class="form-control" placeholder="Contraseña" name="clave2" autocomplete="off"  required>
					</div>
					<input type="hidden" name="id" value="<?php echo $id; ?>"> 
					<td colspan="2">
						<center><button type="submit" id="enviar" disabled = "false" class="btn btn-success btn-md" role="button" name="Enviar" value="Enviar"><i class="fa fa-sync-alt"></i> Actualizar</button></center>
					</td>
					<center><div id="mensaje"></div></center>
					<center><div><?php echo $mensaje; ?></div></center>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
<script type="text/javascript">
var ValidarPass = function() {
var valor1 = $("#clave1").val();
var valor2 = $("#clave2").val();
var botonEnviar = document.getElementById('enviar');


if (valor1 != valor2) {
	$("#mensaje").text("Contraseñas no coinciden");
	$("#mensaje").addClass("alert alert-danger");
	botonEnviar.disabled = true;//desactiva el boton
}else {
	botonEnviar.disabled = false;//activa el boton
	$("#mensaje").removeClass("alert alert-danger");
	$("#mensaje").text("");
}
}
</script>
</html>
