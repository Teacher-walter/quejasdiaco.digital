<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";

if (count($arr) < 1) {
  $mensaje = "<script>Swal.fire({
  icon: 'warning',
  title: 'No hay ninguna empresa registrado'
  });
</script>";
}

$registros =  count($arr);

?><!DOCTYPE html>
<html lang="es">
<head>
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
	<table style="border-color: #fff;">
		<tr>
			<th>
				<img src="/diaco/recursos/img/diaco1.jpg" alt="" height="50px">
			</th>
			<th class="altura">
				<h3>Listado de empresas registrados en el sistema</h3>
			</th>
		</tr>
	</table>
	<br>
		<table>
		    <thead> 
		      <tr>
		        <th class="bor titulo">No.</th>
		        <th class="bor titulo">NIT</th>
		        <th class="bor titulo">Nombre de la Empresa</th>
		        <th class="bor titulo">Referencia</th>
		        <th class="bor titulo">Dirección</th>
		        <th class="bor titulo">Municipio</th>
		        <th class="bor titulo">Departamento</th>
		        <th class="bor titulo">Teléfono</th>
		        <th class="bor titulo">Correo</th>
		       </tr>
		    </thead>
		    <tbody >
		       <?php
		          foreach ($arr as $a){
		        
		         ?>
		         <tr>
		          <td class="bor" style="text-align: center;"><?php echo $a['id_proveedor'] ;?></td>
		          <td class="bor"><?php echo $a['nit'] ;?></td>
		          <td class="bor"><?php echo $a['nombre'] ;?></td> 
		          <td class="bor"><?php echo $a['razon'] ;?></td> 
		          <td class="bor"><?php echo $a['direccion'] ;?></td> 
		          <td class="bor"><?php echo $a['municipio'] ;?></td>
		          <td class="bor"><?php echo $a['departamento'] ;?></td>
		          <td class="bor"><?php echo $a['telefono'] ;?></td>
		          <td class="bor"><?php echo $a['correo'] ;?></td>
		      <?php } ?>
		    </tbody>
		    </table>
</body>
</html>