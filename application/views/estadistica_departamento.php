<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
<head>
	<title>Inicio</title>
	<?php $this->load->view('header'); ?>
</head>
<body>
	<header>
		<?php $this->load->view('menu'); ?>
	</header>
	<div class="container-fluid espacio">
		<h4 class="text-center"><i class="fa fa-chart-bar"></i> Datos Estadísticos de Quejas</h4><br>
		<div class="text-center imprimir">
			<div class="form-row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<label><i class="fa fa-hand-point-down"></i> Seleccionar estadistica</label>
					<select id="categoria" class="form-control">
						<option selected disabled class="text-center">Seleccionar</option>
						<option value="region"class="text-center">Reporte de quejas por Región</option>
		                <option value="depaGrafica" class="text-center">Reporte de quejas por Departamentos</option>
		                <option value="muniGrafica" class="text-center">Reporte de quejas por Municipios</option>
		                <option value="empresa" class="text-center">Reporte de quejas por Empresas</option>
		             </select>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</div>
		<h5 id="totalingresado"></h5>
		<canvas class="data" style="display: none;" id="region" width="400" height="150"></canvas>
		<canvas class="data" style="display: none;" id="depaGrafica" width="400" height="150"></canvas>
		<canvas class="data" style="display: none;" id="muniGrafica" width="400" height="200"></canvas>
		<canvas class="data" style="display: none;" id="empresa" width="400" height="200"></canvas>
<hr>
<div class="container">
	<center><h5 style="color: #00A217;">Gráficas por rangos de Fechas</h5></center>
	<div class="form-row text-center">
		<div class="col-md-1"></div>
		<div class="col-md-4">
				<label><i class="fa fa-calendar-day"></i> Fecha de Inicio</label>
				<input type="date" class="form-control" id="fecha_inicio" value="<?php echo date('Y-m-d') ?>" required>
			</div>
			<div class="col-md-4">
				<label><i class="fa fa-calendar-day"></i> Fecha Fin</label>
				<input type="date" class="form-control" id="fecha_fin" value="<?php echo date('Y-m-d') ?>" required>
			</div>
			<div class="col-md-3">
				<label>&nbsp;</label><br>
				<button type="button  vc cvxc" class="btn btn-primary" onclick="cargarTresGraficas()"><i class="fa fa-search"></i> Buscar</button>
			</div>
		</div>
	</div>
<br>
<div id="graficas" style="display: none;">
		<div class="form-row">
			<div class="col-4"></div>
			<div class="col-2" style="text-align: right;"><h4 id="totalquejafecha"></h4></div>
			<div class="col-2"><h4> Quejas</h4></div>
			<div class="col-4"></div>
		</div>
	<br>
	<div class="form-row">
		<div class="col-md-4">
			<canvas id="reg" width="400" height="400"></canvas>
		</div>
		<div class="col-md-4">
			<canvas id="depto" width="400" height="400"></canvas>
		</div>
		<div class="col-md-4">
			<canvas id="muni" width="400" height="400"></canvas>
		</div>
		<div class="col-sm-12">
			<canvas id="empresaque" width="400" height="150"></canvas>
		</div>
	</div>
	<div class="container">
		<div class="table-responsive">
				<table class="table table-striped table-bordered" class="display nowrap" style="width:100%">
				  <thead>
				    <tr>
				      	<th scope="col">Nombre de la Empresa</th>
				     	<th scope="col">Cantidad de Quejas Recibidas</th>
				    </tr>
				  </thead>
				  <tbody id="resItem">
				  </tbody>
				</table>
			</div>
		</div>
	</div>
	</div>
		
<hr>
<div class="container">
		<h5 class="text-center"><i class="fa fa-table"></i> Tabla de Datos</h5>
		<div class="table-responsive">
			<table class="table table-striped table-bordered" id="datosqueja" class="display nowrap" style="width:100%">
			  <thead>
			    <tr>
			      <th scope="col">Departamento</th>
			      <th scope="col">Municipio</th>
			      <th scope="col">Nombre de la empresa</th>
			      <th scope="col">Detalle</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($arr as $a){ ?>
			    <tr>
		          <td><?php echo $a['departamento'] ;?></td>
		          <td class='text-center'><?php echo $a['departamento'] ;?></td> 
		          <td></td>
		          <td class='text-center'><a class="btn btn-info btn-sm" href="<?=$base_url?>/proceso/detalle_queja/<?php echo 1 ;?>"><i class="fa fa-info-circle"></i></a></td>
			    </tr>
			    <?php } ?>
			  </tbody>
			</table>
		</div>
	</div>
</div>
<br>
<script type="text/javascript">
	//llamar
	CargarDatosRegion();
	CargarDatosDepartamento();
	CargarDatosMunicipio();
	CargarDatosEmpresa();


	function CargarDatosRegion(){
		$.ajax({
			url: '<?=$base_url?>/informe/datosRegion',
			type: 'POST'
		}).done(function(response){
			if (response.length > 0){
			//arreglos para enviar
				var titulo = [];
				var cantidad = [];
				var colores = [];

				//
				var data = JSON.parse(response);
				for (var i = 0; i < data.length; i++) { 
					titulo.push(data[i]['region']);
					cantidad.push(data[i]['totalR']);
					colores.push(colorRGB());
					
				}
				
				maquetarGraficas(titulo, cantidad, colores,'pie','Qujeas por Región','region')
			}

		})
	}

	function CargarDatosDepartamento(){
		$.ajax({
			url: '<?=$base_url?>/informe/mostrarDatos',
			type: 'POST'
		}).done(function(response){
			if (response.length > 0){
			//arreglos para enviar
				var titulo = [];
				var cantidad = [];
				var colores = [];
				//
				var data = JSON.parse(response);
				for (var i = 0; i < data.length; i++) {
					titulo.push(data[i]['departamento']);
					cantidad.push(data[i]['totaldep']);
					colores.push(colorRGB());
				}
				maquetarGraficas(titulo, cantidad, colores, 'bar','Qujeas por Departamento','depaGrafica')
			}

		})
	}

	function CargarDatosMunicipio(){
		$.ajax({
			url: '<?=$base_url?>/informe/mostrarDatosMuni',
			type: 'POST'
		}).done(function(response){
			if (response.length > 0){
				//arreglos para enviar
				var titulo = [];
				var cantidad = [];
				var colores = [];

				var data = JSON.parse(response);
				for (var i = 0; i < data.length; i++) {
					titulo.push(data[i]['municipio']);
					cantidad.push(data[i]['totalmun']);
					colores.push(colorRGB());
				}
				maquetarGraficas(titulo, cantidad, colores, 'horizontalBar','Qujeas por Municipio','muniGrafica')
			}
		})
	}

	function CargarDatosEmpresa(){
		$.ajax({
			url: '<?=$base_url?>/informe/mostrarDatosEmpresa',
			type: 'POST'
		}).done(function(response){
			if (response.length > 0){
				//arreglos para enviar
				var titulo = [];
				var cantidad = [];
				var colores = [];

				var data = JSON.parse(response);
				for (var i = 0; i < data.length; i++) {
					titulo.push(data[i]['nombre']);
					cantidad.push(data[i]['totalque']);
					colores.push(colorRGB());
				}
				maquetarGraficas(titulo, cantidad, colores, 'bar','Qujeas por Nombre de Empresa','empresa')
			}
		})
	}


	function maquetarGraficas(titulo, cantidad, colores, tipo, encabezado, id){
		var ctx = document.getElementById(id);
		var myChart = new Chart(ctx, {
		    type: tipo,
		    data: {
		        labels: titulo,
		        datasets: [{
		            label: encabezado,
		            data: cantidad,
		            backgroundColor: colores,
		            borderColor: colores,
		            borderWidth: 1,
		            padding: 10,
                datalabels:{
                    color: '#000000',
                    font: {
                        size: 14,
                        weight: 'bold',
                        fontFamily: "'Arial'",
                    },
                    anchor: 'end',
                    align: 'end',
                }
		        }]
		    },
		    options: {
		        layout: {
                padding: 20
            },
            legend: {
                display: true,
                labels: {
                    fontColor: '#000',
                    fontStyle: 'bold',
                    padding: 20
                }
            }
		    }
		});
	}

	$(document).ready(function(){
    $("#categoria").on('change', function(){
      $(".data").hide();
      $("#" + $(this).val()).slideDown();
    }).change();
  });

	function generarNumero(numero){
	return (Math.random()*numero).toFixed(0);
    }

    function colorRGB(){
        var coolor = "("+generarNumero(255)+"," + generarNumero(255) + "," + generarNumero(255) +")";
        return "rgb" + coolor;
    }

    //tabla
    $(document).ready(function() {
	    $('#datosqueja').DataTable( {
	        "scrollY": 500,
	        "scrollX": true
	    } );
	} );

/*por fechas*/
	function cargarTresGraficas(){
		cantidadQuejas();
		regionesFechas();
		deptoFechas();
		muniFechas();
		empresaFechas();
		quejasTablasFechas();
	}

	function cantidadQuejas(){
		var fecha_inicio = $('#fecha_inicio').val();
		var fecha_fin = $('#fecha_fin').val();

		$.ajax({
			url: '<?=$base_url?>/informe/cantidadQuejasFecha',
			type: 'POST',
			data:{
				inicio: fecha_inicio,
				fin: fecha_fin
			}
		}).done(function(response){
			data = $.parseJSON(response);
        if(data.length > 0){
           $('#totalquejafecha').html(data[0]['totalqfecha']);
        }
		})
	}

	function regionesFechas(){
		var fecha_inicio = $('#fecha_inicio').val();
		var fecha_fin = $('#fecha_fin').val();

		$.ajax({
			url: '<?=$base_url?>/informe/regionFecha',
			type: 'POST',
			data:{
				inicio: fecha_inicio,
				fin: fecha_fin
			}
		}).done(function(response){
			//console.log(response);
			if (response.length > 0){
				$('#graficas').slideDown();
				//arreglos para enviar
		
				var titulo = [];
				var cantidad = [];
				var colores = [];

				var data = JSON.parse(response);
				for (var i = 0; i < data.length; i++) {
					titulo.push(data[i]['region']);
					cantidad.push(data[i]['totalR']);
					colores.push(colorRGB());
				}
				graficarResultadoFechas(titulo, cantidad, colores, 'doughnut','Quejas por Región','reg')
			}

		})
	}

	function deptoFechas(){
		var fecha_inicio = $('#fecha_inicio').val();
		var fecha_fin = $('#fecha_fin').val();
		
		$.ajax({
			url: '<?=$base_url?>/informe/deptoFecha',
			type: 'POST',
			data:{
				inicio: fecha_inicio,
				fin: fecha_fin
			}
		}).done(function(response){
			if (response.length > 0){
				//arreglos para enviar
				var titulo = [];
				var cantidad = [];
				var colores = [];

				var data = JSON.parse(response);
				for (var i = 0; i < data.length; i++) {
					titulo.push(data[i]['departamento']);
					cantidad.push(data[i]['totalD']);
					colores.push(colorRGB());
				}
				graficarResultadoFechas(titulo, cantidad, colores, 'horizontalBar','Quejas por Departamento','depto')
			}
		})
	}

	function muniFechas(){
		var fecha_inicio = $('#fecha_inicio').val();
		var fecha_fin = $('#fecha_fin').val();
		
		$.ajax({
			url: '<?=$base_url?>/informe/muniFecha',
			type: 'POST',
			data:{
				inicio: fecha_inicio,
				fin: fecha_fin
			}
		}).done(function(response){
			if (response.length > 0){
				//arreglos para enviar
				var titulo = [];
				var cantidad = [];
				var colores = [];

				var data = JSON.parse(response);
				for (var i = 0; i < data.length; i++) {
					titulo.push(data[i]['municipio']);
					cantidad.push(data[i]['totalM']);
					colores.push(colorRGB());
				}
				graficarResultadoFechas(titulo, cantidad, colores, 'bar','Quejas por Municipio','muni')
			}
		})
	}

	function empresaFechas(){
		var fecha_inicio = $('#fecha_inicio').val();
		var fecha_fin = $('#fecha_fin').val();
		
		$.ajax({
			url: '<?=$base_url?>/informe/empresaFecha',
			type: 'POST',
			data:{
				inicio: fecha_inicio,
				fin: fecha_fin
			}
		}).done(function(response){
			if (response.length > 0){
				//arreglos para enviar
				var titulo = [];
				var cantidad = [];
				var colores = [];

				var data = JSON.parse(response);
				for (var i = 0; i < data.length; i++) {
					titulo.push(data[i]['nombreEmpre']);
					cantidad.push(data[i]['totalEmpress']);
					colores.push(colorRGB());
				}
				graficarResultadoFechas(titulo, cantidad, colores, 'bar','Quejas por Empresa','empresaque')
			}
		})
	}

	function quejasTablasFechas(){
		var fecha_inicio = $('#fecha_inicio').val();
		var fecha_fin = $('#fecha_fin').val();
		
		$.ajax({
			url: '<?=$base_url?>/informe/quejaTablaFecha',
			type: 'POST',
			data:{
				inicio: fecha_inicio,
				fin: fecha_fin
			}
		}).done(function(response){
			let result = JSON.parse(response);
			//console.log(result);
			let res = document.querySelector('#resItem');
			res.innerHTML = '';

			if (result.length > 0){

				for(let item of result){
				//console.log(item.id);
					res.innerHTML += `
						<tr>
							<td>${item.nombreEmpre}</td>
							<td>${item.totalEmpress}</td>
						</tr>
					`
				}
			}
		})
	}

	function graficarResultadoFechas(titulo, cantidad, colores, tipo, encabezado, id){
		var ctx = document.getElementById(id);
		var myChart = new Chart(ctx, {
		    type: tipo,
		    data: {
		        labels: titulo,
		        datasets: [{
		            label: encabezado,
		            data: cantidad,
		            backgroundColor: colores,
		            borderColor: colores,
		            borderWidth: 1,
		            padding: 10,
                datalabels:{
                    color: '#000000',
                    font: {
                        size: 14,
                        weight: 'bold',
                        fontFamily: "'Arial'",
                    },
                    anchor: 'end',
                    align: 'end',
                }
		        }]
		    },
		    options: {
		    	layout: {
                padding: {
                    left: 0,
                    right: 0,
                    top: 0,
                    bottom: 20
                }
            },
            legend: {
                display: true,
                labels: {
                    fontColor: '#000',
                    fontStyle: 'bold',
                    padding: 20
                }
            }  
		    }
		});
	}


</script>
</body>
</html>