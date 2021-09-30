<?php defined('BASEPATH') OR exit('No direct script access allowed');
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
	<div class="container espacio">
      <h3 style="color: #03064A"><i class="icon-chart fa-md" style="font-weight: bold;"></i> <i class="icon-pie-chart fa-md" style="font-weight: bold;"></i> Reportes</h3>
    <hr>
    <h4 class="text-center">Total de quejas ingresados en el Sistema</h4>
    <div class="form-row" style="color: red;">
            <div class="col-3"></div>
            <div class="col-3" style="text-align: right;"><h4 id="totalquejafecha"></h4></div>
            <div class="col-3"><h4> Quejas</h4></div>
            <div class="col-3"></div>
    </div>
    <hr>
    <div class="form-row">
        <div class="col-md-6">
            <center class="h5">Cantidad de quejas <strong>Ingresados</strong> por mes:</center>
            <canvas id="quejasIngresados" width="350" height="350"></canvas>
        </div>
        <div class="col-md-6">
            <center class="h5">Cantidad de quejas <strong>Resueltos</strong> por mes</center>
            <canvas id="quejasResueltas" width="350" height="350"></canvas>
        </div>
    </div>
    <br>
    <div class="form-row">
        <div class="col-md-6">
            <center class="h5">Quejas en <strong>Proceso de Solución</strong></center>
            <canvas id="quejasProceso" width="350" height="350"></canvas>
        </div>
        <div class="col-md-6">
            <center class="h5">Quejas por Departamento</center>
            <canvas id="departamentoquejas" width="350" height="350"></canvas>
        </div>
    </div>  
  </div>
  <br><br>

<script type="text/javascript">
    cantidadQuejas();
    quejaIngresadoPorMes();
    quejaResueltosPorMes();
    quejaProcesoSolucion();
    quejaPorDepartamento();

    function cantidadQuejas(){
        $.ajax({
            url: '<?=$base_url?>/informe/cantidadQuejasIngresados',
            type: 'POST',
        }).done(function(response){
            data = $.parseJSON(response);
            if(data.length > 0){
               $('#totalquejafecha').html(data[0]['totalqfecha']);
            }
        })
    }

    function quejaIngresadoPorMes(){
        $.ajax({
            url: '<?=$base_url?>/informe/cantidadQuejasIngresadosMes',
            type: 'POST',
        }).done(function(response){
            if (response.length > 0){
                       
                var titulo = [];
                var cantidad = [];
                var colores = [];

                var data = JSON.parse(response);
                for (var i = 0; i < data.length; i++) {
                    titulo.push(data[i]['mesIngresado']);
                    cantidad.push(data[i]['totalIngresado']);
                    colores.push(colorRGB());
                }
                maquetarGraficasQueja(titulo, cantidad, colores, 'doughnut','Quejas ingresados al Sistema','quejasIngresados')
            }

        })
    }

    function quejaResueltosPorMes(){
        $.ajax({
            url: '<?=$base_url?>/informe/quejaResuelta',
            type: 'POST',
        }).done(function(response){
            if (response.length > 0){
                       
                var titulo = [];
                var cantidad = [];
                var colores = [];

                var data = JSON.parse(response);
                for (var i = 0; i < data.length; i++) {
                    titulo.push(data[i]['mesSolucionado']);
                    cantidad.push(data[i]['totalSolucionado']);
                    colores.push(colorRGB());
                }
                maquetarGraficasQueja(titulo, cantidad, colores, 'pie','Quejas ingresados al Sistema','quejasResueltas')
            }

        })
    }

    function quejaProcesoSolucion(){
        $.ajax({
            url: '<?=$base_url?>/informe/quejasEnProceso',
            type: 'POST',
        }).done(function(response){
            if (response.length > 0){
                       
                var titulo = [];
                var cantidad = [];
                var colores = [];

                var data = JSON.parse(response);
                for (var i = 0; i < data.length; i++) {
                    titulo.push(data[i]['mesProceso']);
                    cantidad.push(data[i]['totalP']);
                    colores.push(colorRGB());
                }
                maquetarGraficasQueja(titulo, cantidad, colores, 'bar','Quejas en proceso','quejasProceso')
            }

        })
    }

    function quejaPorDepartamento(){
        $.ajax({
            url: '<?=$base_url?>/informe/quejaPorDepartamento',
            type: 'POST',
        }).done(function(response){
            if (response.length > 0){
                       
                var titulo = [];
                var cantidad = [];
                var colores = [];

                var data = JSON.parse(response);
                for (var i = 0; i < data.length; i++) {
                    titulo.push(data[i]['departamento']);
                    cantidad.push(data[i]['totaldep']);
                    colores.push(colorRGB());
                }
                maquetarGraficasQueja(titulo, cantidad, colores, 'bar','Quejas ingresados al Sistema','departamentoquejas')
            }

        })
    }

//generar colores automaticos
    function generarNumero(numero){
        return (Math.random()*numero).toFixed(0);
    }

    function colorRGB(){
        var coolor = "("+generarNumero(255)+"," + generarNumero(255) + "," + generarNumero(255) +")";
        return "rgb" + coolor;
    }

    function maquetarGraficasQueja(titulo, cantidad, colores, tipo, encabezado, id){
        var graficas = document.getElementById(id);
        var myChart = new Chart(graficas, {
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