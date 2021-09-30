<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
if (count($arr) < 1) {
	$mensaje = "No hay usuarios activos!";
}

$htmltrow = "<tr>
				<td>%s</td>
				<td>%s</td>
				<td>%s</td>
				<td>%s</td>
				<td>%s</td>
			 	</tr>";
$htmltrows = "";
$id_usuario = '';
foreach ($arr as $a) {
	$id_usuario = $a['id_usuario'];
	$htmltrows .= sprintf($htmltrow, $a['nombre'], $a['cui'], $a['numero'], $a['usuario'], $a['rol']);
}
?><!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Diaco - Usuarios</title>
	<style type="text/css">
	.borde{
		border: solid 0.5px;
		border-color: blue;
		padding: 5px;
		border-radius: 5px;
	}

	body{
		font-family: arial;
	}

	table{
		border:  1px solid;
		border-color: #0A0049;
		table-layout: fixed;
		width: 100%;
		border-collapse: collapse;


	}
	th{
		font-weight: bold;
	}
	h3{
		text-align: center;
	}
	.altura{
		padding-top: 25px;
	}
	.bor{
		border:  1px solid;
		border-color: #0A0049;
	}
	.titulo{
		background-color: #05006B;
		color:  #fff;
	}
	</style>

</head>
<body>
	<div class="borde">
	<br>
	<table style="border-color: #fff;">
		<tr>
			<th>
				<img src="/diaco/recursos/img/diaco1.jpg" alt="" height="50px">
			</th>
			<th class="altura">
				<h3>Listado de usuarios registrados en el sistema</h3>
			</th>
		</tr>
	</table>
	
	<br>
		  	<table>
		    <thead> 
		      <tr>
		        <th class="bor titulo">No.</th>
		        <th class="bor titulo">Nombre</th>
		        <th class="bor titulo">CUI</th>
		        <th class="bor titulo">Teléfono</th>
		        <th class="bor titulo">Usuario</th>
		        <th class="bor titulo">Rol</th>
		      </tr>
		    </thead>
		    <tbody >
		       <?php
		          foreach ($arr as $a){
		         ?>
		         <tr>
		          <td class="bor"><?php echo $a['id_usuario'];?></td>
		          <td class="bor"><?php echo $a['nombre'] ;?></td>
		          <td class="bor"><?php echo $a['cui'] ;?></td>
		          <td class="bor"><?php echo $a['numero'] ;?></td> 
		          <td class="bor"><?php echo $a['usuario'] ;?></td> 
		          <td class="bor"><?php echo $a['rol'] ;?></td> 
		         </tr>
		      <?php } ?>
		    </tbody>
		    </table>
		    <br>
		    <br>
	</div>	
</body>
</html>