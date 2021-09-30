<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
<head>
	<title>Diaco - Quejas</title>
	<?php $this->load->view('header'); ?>
</head>
<body>
	<header>
		<?php $this->load->view('menu'); ?>
	</header>
	<div class="espacio">
		<br>
		<center><h3>Proceso de la Queja</h3></center>
	</div>
	<hr>
	<div class="alert alert-warning alert-dismissible fade show container" role="alert">
		 	Recuerde ingresar el número de queja que se le generó al momento de registrar la queja.
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
	<div class="container" align="justify">
		<div class="form-row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4 text-center">
				<label for="buscar" ><i class="fa fa-envelope-open-text"></i> Buscar número de queja</label>
				<form name="buscar_queja" id="buscar_queja">
					<input type="hidden" name="action" value="buscar_queja" >
				 	<div class="input-group mb-3">
					  <input type="text" class="form-control colinput text-center positive" id="codigo" name="codigo" required>
					  <div class="input-group-append">
					  	<button type="submit" autocomplete="off" class="btn btn-outline-primary" id="buscar" ><i class="fa fa-search"></i> Buscar</button>
					  	<button type="button"  class="btn btn-outline-success" id="salir"><i class="fa fa-sign-out-alt"></i> Salir</button>
					  </div>
					</div>
			    </form>
			</div>
			<div class="col-sm-4">
			</div>
		</div>
		<br>
		<div class="formestilo div" id="div">
			<h5 class="text-center">Detalle general de la queja</h5>
			<div class="form-row text-center">
				<div class="col-md-3"></div>
				<div class="col-sm-6 col-md-3">
					<label for=""><i class="fa fa-hashtag"></i> Número de queja</label>
					<input type="text" class="ford text-center" id="numero" value="" readonly>
				</div>
				<div class="col-sm-6 col-md-3">
					<label for=""><i class="fa fa-comment-dots"></i> Fecha de Registro</label>
					<input type="text" class="ford text-center" id="fecha" value="" readonly>
				</div>
			</div>
			<br>
			<div class="card div" id="error">
			  <div class="card-header colorcardred">
			    <strong>Estado</strong>
			  </div>
			  <div class="card-body">
			    <blockquote class="blockquote mb-0">
			      <p><i class="fa fa-exclamation-triangle error"></i> Estado de la Queja</p>
			      <footer class="blockquote-footer">Hubo un error en su queja</footer>
			    </blockquote>
			  </div>
			</div>
			<br>
			<div class="card div" id="enviado">
			  <div class="card-header colorcard">
			    <strong>Fase 1</strong>
			  </div>
			  <div class="card-body">
			    <blockquote class="blockquote mb-0">
			      <p><i class="fa fa-check success"></i> Queja Enviado</p>
			      <h6>Tipo de persona quién envío la queja</h6> <h6 class="colh6" id="persona" ></h6>
			      <footer class="blockquote-footer">Se ha enviado su queja al sistema</footer>
			    </blockquote>
			  </div>
			</div>
			<br>
			<div class="card div" id="aceptado">
			  <div class="card-header colorcard2">
			    <strong>Fase 2</strong>
			  </div>
			  <div class="card-body">
			    <blockquote class="blockquote mb-0">
			      <p><i class="fa fa-check success"></i> Queja Aceptada</p>
			      <footer class="blockquote-footer">Se ha aceptado su queja de parte de la DIACO</footer>
			    </blockquote>
			  </div>
			</div>
			<br>
			<div class="card div" id="proceso">
			  <div class="card-header colorcard3">
			    <strong>Fase 3</strong>
			  </div>
			  <div class="card-body">
			    <blockquote class="blockquote mb-0">
			      <p><i class="fa fa-check success"></i> Queja en Proceso</p>
			      <footer class="blockquote-footer">Se encuentra en proceso su queja</footer>
			    </blockquote>
			  </div>
			</div>
			<br>
			<div class="card div" id="notificado">
			  <div class="card-header colorcard4">
			    <strong>Fase 4</strong>
			  </div>
			  <div class="card-body">
			    <blockquote class="blockquote mb-0">
			      <p><i class="fa fa-check success"></i> Queja notificada</p>
			      <footer class="blockquote-footer">Se ha notificado su queja a donde corresponde.</footer>
			    </blockquote>
			  </div>
			</div>
			<br>
			<div class="card div" id="finalizado">
			  <div class="card-header colorcard5">
			    <strong>Fase 5</strong>
			  </div>
			  <div class="card-body">
			    <blockquote class="blockquote mb-0">
			      <p><i class="fa fa-check success"></i> Finalizado</p>
			      <footer class="blockquote-footer">Se ha finalizado el proceso de su queja. <br><h6>Gracias por utilizar el sistema de Quejas de la DIACO</h6></footer>
			    </blockquote>
			  </div>
			  <br>
			  <center><button type="button" class="btn btn-outline-success" id="salirb"><i class="fa fa-sign-out-alt"></i> Salir</button></center>
			</div>
			
		</div>
	</div>

	<br><br><br>
	<footer><?php $this->load->view('footer') ?></footer>
	<script type="text/javascript">
		
		$(document).ready(function(){
		    validarCualquierNumero()
		});

		function validarCualquierNumero(){
		    $(".positive").numeric({ negative: false }, function() { alert("No negative values"); this.value = ""; this.focus(); });
		    $("#remove").click(
		      function(e)
		      {
		        e.preventDefault();
		        $(".positive").removeNumeric();
		      }
		    );
		 };

		 $('#buscar_queja').submit(function(e){
		    e.preventDefault();

		    $.ajax({
		      url: '<?=$base_url?>/queja/buscarQuejaProceso',
		        type: "POST",
		        async: true,
		        data: $('#buscar_queja').serialize(),
		         
		        success: function(response){
		        	data = $.parseJSON(response);
                	if(data.length > 0){
	                    $('#numero').val(data[0]['codigo']);
	                    $('#fecha').val(data[0]['fecha_registro']);
	                   	$('#persona').html(data[0]['persona']);
	                   	$('#estado').val(data[0]['estado']);
			            
			            $('#div').slideDown();
			            $('#buscar').attr('disabled','disabled');
			            $('#codigo').attr('disabled','disabled');
			            $('#salir').slideDown();

			            if (data[0]['estado'] == 'A')	{
			         		$('#enviado').slideDown();
						} 
						else if (data[0]['estado'] == 'B')	{
							$('#enviado').slideDown();
							$('#aceptado').slideDown();
						}
						else if (data[0]['estado'] == 'C') {
			         		$('#enviado').slideDown();
			         		$('#aceptado').slideDown();
			         		$('#proceso').slideDown();
						} 
						else if	(data[0]['estado'] == 'D') {
			         		$('#enviado').slideDown();
			         		$('#aceptado').slideDown();
			         		$('#proceso').slideDown();
			         		$('#notificado').slideDown();
			         		$('#finalizado').slideDown();
			         	}
			         	else if	(data[0]['estado'] == 'E') {
			         		$('#error').slideDown();
			         	}
		          	}

		        },
		        error: function(error){
		        }
		    });
		  });

		 $('#salir, #salirb').click(function(e){
		    e.preventDefault();

		    $('#numero').val('');
	        $('#fecha').val('');
	        $('#div').slideUp();
			$('#salir').slideUp();
			$('#buscar').removeAttr('disabled');
			$('#codigo').removeAttr('disabled');
			$('#codigo').val('');

			//ocultar los div de cada opcion
			$('#enviado').slideUp();
     		$('#aceptado').slideUp();
     		$('#proceso').slideUp();
     		$('#notificado').slideUp();
     		$('#finalizado').slideUp();
     		$('#error').slideUp();
		  });

	</script>
</body>
</html>