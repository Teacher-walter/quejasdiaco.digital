<?php
defined('BASEPATH') OR exit('No direct script access allowed');

foreach ($codConsum as $c) {
  $id_consumidor = $c['id'];
}

foreach ($codProv as $p) {
  $id_proveedor = $p['id'];
}

foreach ($codQueja as $q) {
  $id_queja = $q['id'];
}

?><!DOCTYPE html>
<html lang="es">
<head>
	<title>Quejas - Crear</title>
	<?php $this->load->view('header'); ?>
</head>
<body>
	<header>
		<?php $this->load->view('menu'); ?>
	</header>
	<div class="espacio container-fluid">
		<center><h3><i class="fa fa-clipboard-list"></i> Formulario de registro de queja Anónima</h3></center>
		<br>
		<form action="crear_queja" id="crear_queja" class="needs-validation" novalidate method="POST" enctype="multipart/form-data">
			<input type="hidden" name="action" value="registrarQueja" >
			<?php if ($id_consumidor == null) { ;?>
					<input type="hidden" name="codConsum" id="codConsum" value="1">
			<?php } else { ;?>
					<input type="hidden" name="codConsum" id="codConsum" value="<?php echo $id_consumidor; ?>">
			<?php  }; ?>
			
			<?php if ($id_proveedor == null) { ;?>
			<input type="hidden" name="codProvee" id="codProvee" value="1">
			<?php } else { ;?>
			<input type="hidden" name="codProvee" id="codProvee" value="<?php echo $id_proveedor; ?>">
			<?php  } ;?>

			<?php if ($id_queja == null) { ;?>
			<input type="hidden" name="codQueja" id="codQueja" value="1">
			<?php } else { ;?>
			<input type="hidden" name="codQueja" id="codQueja" value="<?php echo $id_queja; ?>">
			<?php  } ;?>
			<!--barraprograso-->
			<div class="progressbar container">
				<div class="progreso" id="progreso"></div>
				<div class="progress-step progress-step-active" data-title="Consumidor"></div>
				<div class="progress-step" data-title="Proveedor"></div>
				<div class="progress-step" data-title="Queja"></div>
			</div>
			<br><br>
			<div class="usuario form-step form-step-active">
			<h4 class="text-center">Datos del consumidor</h4>
			<hr>
				<div class="form-row divespa">
					<div class="col-sm-6 col-md-2">
						<label for="genero"><i class="fa fa-venus-mars"></i> Género</label>
						<div class="form-check">
						  <input class="form-check-input" type="radio" name="genero" id="generom" value="femenino" required>
						  <label class="form-check-label" for="exampleRadios1">
						   Femenino
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="radio" name="genero" id="generof" value="masculino" required>
						  <label class="form-check-label" for="exampleRadios2">
						   Masculino
						  </label>
						</div>
					</div>
					<div class="col-sm-6 col-md-2">
						<label for="persona"><i class="fa fa-briefcase"></i> Tipo persona</label>
						<div class="form-check">
						  <input class="form-check-input" type="radio" name="persona" id="individual" value="individual"  required>
						  <label class="form-check-label" for="exampleRadios5">
						   Individual
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="radio" name="persona" id="juridica" value="juridica" required>
						  <label class="form-check-label" for="exampleRadios6">
						   Jurídica
						  </label>
						</div>
					</div>		
					<div class="col-sm-6 col-md-4">
					<label for=""><i class="fa fa-flag"></i> Departamento</label>
					<select class="custom-select ford" name="departamento" id="departamento" required>
						</select>	 
					<div class="invalid-feedback"><strong>Campo obligatorio</strong></div>
						<div class="valid-feedback"><i class="fa fa-check"></i></div>
					</div>
					<div class="col-sm-6 col-md-4">
					<label for=""><i class="fa fa-flag"></i> Municipio</label>
						<select class="custom-select ford" name="municipio" id="municipio" required>
						</select>
					<div class="invalid-feedback"><strong>Campo obligatorio</strong></div>
						<div class="valid-feedback"><i class="fa fa-check"></i></div>
					</div>
				</div>
				<div class="form-row divespa">
					<div class="col-sm-6 col-md-3">
						<label for="sede"><i class="fa fa-phone-alt"></i> Sede Cercana</label>
						<select class="custom-select ford" name="sede" id="sede" required>
						</select>
						<div class="invalid-feedback"><strong>Campo obligatorio</strong></div>
						<div class="valid-feedback"><i class="fa fa-check"></i></div>
					</div>
					<div class="col-sm-6 col-md-2">
						<label for="edad"><i class="fa fa-heartbeat"></i> Edad</label>
						<input type="text" class="ford positive" name="edad" id="edad" required>
						<div class="invalid-feedback"><strong>Campo obligatorio</strong></div>
						<div class="valid-feedback"><i class="fa fa-check"></i></div>
					</div>
					<div class="col-sm-6 col-md-3">
						<label for="celular2"><i class="fa fa-mobile"></i> No. de Celular (opcional)</label>
						<input type="text" class="ford positive" name="celular" id="celular" maxlength="15">
						<div class="valid-feedback"><i class="fa fa-check"></i></div>
					</div>
					<div class="col-sm-6 col-md-4">
						<label for="correo"><i class="fa fa-envelope"></i> Correo Electrónico (opcional)</label>
						<input type="email" class="ford" name="correo" id="correo">
						<div class="valid-feedback"><i class="fa fa-check"></i></div>
					</div>
				</div>
				<br><br>
				<center>
					<a type="submit" href="#" class="btn btn-success btnsig" id="btn-siguiente"><i class="fa fa-arrow-circle-right"></i> Siguiente</a>
				</center>
			</div>
		<!--seccion entidad-->
			<div class="entidad form-step">
				<h4 class="text-center">Proveedor / Empresa</h4>
				<hr>
				<div class="form-row">
					<div class="col-sm-3 col-md-3">
						<label for="nit" class="margeninferior"><i class="fa fa-address-card"></i> Número de NIT (Sin guión)</label>
						<input type="text" class="ford positive" id="nit" name="nit"  value="" maxlength="13">
						<div class="valid-feedback"><i class="fa fa-check"></i></div>
					</div>
					<div class="col-sm-9 col-md-9">
						<label for="validationCustom01" class="margeninferior"><i class="fa fa-building"></i> Nombre de la Empresa</label>
						<input type="text" class="ford" id="nombre_empresa" name="nombre_empresa"  placeholder="Escribir el nombre de la empresa" value="" maxlength="75"  required>
						<div class="invalid-feedback"><strong>Campo obligatorio</strong></div>
						<div class="valid-feedback"><i class="fa fa-check"></i></div>
					</div>
				</div>
				<div class="form-row divespa">
					<div class="col-sm-12 col-md-6">
						<label for="primer_nombre" class="margeninferior"><i class="fa fa-signature"></i> Razón Social (Referencia del lugar)</label>
						<input type="text" class="ford" id="razon" name="razon" value="" maxlength="100" required>
						<div class="invalid-feedback"><strong>Campo obligatorio</strong></div>
						<div class="valid-feedback"><i class="fa fa-check"></i></div>
					</div>
					<div class="col-sm-12 col-md-6">
						<label for="segundo_nombre" class="margeninferior"><i class="fa fa-map-marked-alt"></i> Dirección de la Empresa</label>
						<input type="text" class="ford" id="direccion" name="direccion" value="" maxlength="75" required>
						<div class="invalid-feedback"><strong>Campo obligatorio</strong></div>
						<div class="valid-feedback"><i class="fa fa-check"></i></div>
					</div>
				</div>
				<div class="form-row divespa">
					<div class="col-sm-6 col-md-3">
						<label for=""><i class="fa fa-flag"></i> Departamento</label>
						<select class="custom-select ford" name="departamento_empresa" id="departamento_empresa" required>
							<option value="0">Seleccionar</option>
						</select>
						<div class="invalid-feedback"><strong>Campo obligatorio</strong></div>
						<div class="valid-feedback"><i class="fa fa-check"></i></div>
					</div>
					<div class="col-sm-6 col-md-3">
						<label for="segundo_nombre"><i class="fa fa-signature"></i> Municipio</label>
						<label for=""><i class="fa fa-flag"></i> Municipio</label>
						<select class="custom-select ford" name="municipio_empresa" id="municipio_empresa" required>
							<option value="0">Seleccionar</option>
						</select>
						<div class="invalid-feedback"><strong>Campo obligatorio</strong></div>
						<div class="valid-feedback"><i class="fa fa-check"></i></div>
					</div>
					<div class="col-sm-6 col-md-3">
						<label for="telefono_empresa"><i class="fa fa-phone-alt"></i> Teléfono de la empresa</label>
						<input type="text" class="ford positive" id="telefono_empresa" name="telefono_empresa" value="" maxlength="12" required>
						<div class="invalid-feedback"><strong>Campo obligatorio</strong></div>
						<div class="valid-feedback"><i class="fa fa-check"></i></div>
					</div>
					<div class="col-sm-6 col-md-3">
						<label for="correo_empresa"><i class="fa fa-envelope"></i> Correo Electrónico</label>
						<input type="text" class="ford" id="correo_empresa" name="correo_empresa" value="" maxlength="30">
						<div class="valid-feedback"><i class="fa fa-check"></i></div>
					</div>
				</div>
				<br><br>
				<center>
					<a type="button" href="#" class="btn btn-success" id="btn-anterior"><i class="fa fa-arrow-circle-left"></i> Anterior</a>
					<a type="button" href="#" class="btn btn-success btn-siguiente btnsig" id="btn-siguiente"><i class="fa fa-arrow-circle-right"></i> Siguiente</a>
				</center>
			</div>
		<!--seccionqueja-->
		<div class="quiejasec form-step">
			<h4 class="text-center">Detalle de la queja</h4>
			<br>
			<div class="form-row">
				<div class="col-sm-6 col-md-6">
					<label for="no_factura"><i class="fa fa-file-alt"></i> No. Factura / No. Contrato</label>
					<input type="text" class="ford positive" id="no_factura" name="no_factura" placeholder="Solo ingresar números" required>
					<div class="invalid-feedback"><strong>Campo obligatorio</strong></div>
					<div class="valid-feedback"><i class="fa fa-check"></i></div>
				</div>
				<div class="col-sm-6 col-md-6">
					<label for="fecha_documento"><i class="fa fa-calendar-day"></i> Fecha del Documento o factura</label>
					<input type="date" class="ford" id="fecha_documento" name="fecha_documento" value="<?php echo date('Y-m-d') ?>" required>
					<div class="invalid-feedback"><strong>Campo obligatorio</strong></div>
					<div class="valid-feedback"><i class="fa fa-check"></i></div>
				</div>
			</div>
			<div class="form-row divespa">
				<div class="col-sm-6 col-md-6">
					<label for="detalle_queja"><i class="fa fa-tasks"></i> Detalle de la Queja:</label>
					<textarea class="ford" name="detalle_queja" id="detalle_queja" cols="30" rows="2" required></textarea>
					<div class="invalid-feedback"><strong>Campo obligatorio</strong></div>
					<div class="valid-feedback"><i class="fa fa-check"></i></div>
				</div>
				<div class="col-sm-6 col-md-6">
					<label for="solicita_queja"><i class="fa fa-tasks"></i><strong> Solicito que:</strong></label>
					<textarea class="ford" name="solicita_queja" id="solicita_queja" cols="30" rows="2" required></textarea>
					<div class="invalid-feedback"><strong>Campo obligatorio</strong></div>
					<div class="valid-feedback"><i class="fa fa-check"></i></div>
				</div>
			</div>
			<div class="form-row divespa">
				<div class="col-sm-3 col-md-3"></div>
				<div class="col-sm-6 col-md-6">
					<label for="foto" class="text-center"><i class="fa fa-images"></i> Subir Imágen de la Fatura / Contrato (opcional)</label>
					<div class="photo">
		        <div class="prevPhoto">
		          <span class="delPhoto notBlock">X</span>
		          <label for="foto"></label>
		        </div>
		        <div class="upimg">
		          <input type="file" name="foto" id="foto">
		        </div>
		        <div id="form_alert"></div>
		      </div>
				</div>
				<div class="col-sm-3 col-md-3"></div>
				</div>
			<br>
			<center>
				<a type="button" href="#" class="btn btn-success anterior" id="btn-anterior"><i class="fa fa-arrow-circle-left"></i> Anterior</a>
				<button type="submit" class="btn btn-primary btnsig" name="guardar" id="btn-enviar"><i class="fa fa-paper-plane"></i> Enviar queja</button>
			</center>
			<br>
		</div>
	</form>
</div>
	<br><br>
	<script type="text/javascript">
	$(document).ready(function(){
	    validarCualquierNumero()
	});

	function validarCualquierNumero(){
	    $(".positive").numeric({ negative: false }, function() { alert("No negative values"); this.value = ""; this.focus(); });
	    $("#remove").click(
	      function(e){
	        e.preventDefault();
	        $(".positive").removeNumeric();
	     });
	};

	(function() {
	  'use strict';
	  window.addEventListener('load', function() {
	    // Fetch all the forms we want to apply custom Bootstrap validation styles to
	    var forms = document.getElementsByClassName('needs-validation');
	    // Loop over them and prevent submission
	    var validation = Array.prototype.filter.call(forms, function(form) {
	      form.addEventListener('submit', function(event) {
	        if (form.checkValidity() === false) {
	          event.preventDefault();
	          event.stopPropagation();
	          Swal.fire({
						  icon: 'error',
						  title: 'Oops...',
						  text: 'Seleccionar o llenar los campos obligatorios',
						})
	        }
	        form.classList.add('was-validated');
	      }, false);
	    });
	  }, false);
	})();

	//funcion Ajax para buscar en base de datos
	$(function(){
		$.post('<?=$base_url?>/queja/sede').done(function(respuesta){
		$('#sede').html(respuesta);
		});
	});

	//funcion Ajax para buscar en base de datos
	$(function(){
		$.post('<?=$base_url?>/queja/departamento').done(function(respuesta){
		$('#departamento').html(respuesta);
	});

	//lista de municipios
	$('#departamento').change(function(){
		var id_depto = $(this).val();

		$.post('<?=$base_url?>/queja/municipio',{departamento: id_depto}).done(function(respuesta){
				$('#municipio').html(respuesta);
			});
		});
	});

	//funcion Ajax para buscar en base de datos
	$(function(){
		$.post('<?=$base_url?>/queja/departamento').done(function(respuesta){
		$('#departamento_empresa').html(respuesta);
	});

	//lista de municipios
	$('#departamento_empresa').change(function(){
		var id_depto = $(this).val();

		$.post('<?=$base_url?>/queja/municipio',{departamento: id_depto}).done(function(respuesta){
				$('#municipio_empresa').html(respuesta);
			});
		});
	});

	//guardar queja
  $('#crear_queja').submit(function(e){
    e.preventDefault();

    let form = document.getElementById('crear_queja');
    let formData = new FormData(form);

    $.ajax({
      	url: '<?=$base_url?>/queja/crearRegistroQueja',
        method: "POST",
        async: true,
        data: formData,
        processData: false,
        contentType: false,
         
        success: function(response){
        var inf = JSON.parse(response);

	        $('#codConsum').val('');
	        $('#codProvee').val('');
	        $('#codQueja').val('');
	        $('#generom').val('');
	        $('#generof').val('');
	        $('#individual').val('');
	        $('#juridica').val('');
	        $('#departamento').val('');
	        $('#municipio').val('');
	        $('#sede').val('');
	        $('#edad').val('');
	        $('#nit').val('');
	        $('#nombre_empresa').val('');
	        $('#razon').val('');
	        $('#direccion').val('');
	        $('#departamento_empresa').val('');
	        $('#municipio_empresa').val('');
	        $('#telefono_empresa').val('');
	        $('#no_factura').val('');
	        $('#detalle_queja').val('');
	        $('#solicita_queja').val('');

	        $('#btn-enviar').slideUp();
	        $('.btn-anterior').slideUp();

	         Swal.fire({
           	title: 'Su número de queja es:',
           	html: '<h1><strong>'+inf+'</strong></h1><br><p style="color: red; font-weight: bold;">Copie el número de su queja, para cunsultar sobre el proceso.</p>',
					  icon: 'success',
					  confirmButtonText: '<i class="fa fa-thumbs-up"></i> Ok!',

					  }).then((result) => {
						  if (result.isConfirmed) {
						   	redirect();
						  } else {
						    redirect();
						  }
					});
 
				}
    });
  });

  //redirigr al cliente a la sigueinte pagina sin antes mostrar el resultado de su proceso
  function redirect(){
  	window.location.href='<?=$base_url?>/inicio';
}


/*estilo progreso y habilitar el formulario*/
	const btnAnterior = document.querySelectorAll("#btn-anterior");
	const btnSiguiente = document.querySelectorAll("#btn-siguiente");
	const progreso = document.getElementById("progreso");
	const formulario = document.querySelectorAll(".form-step");
	const barraProgreso = document.querySelectorAll(".progress-step");
	let numFomulario = 0;

	btnSiguiente.forEach(btn => {
		btn.addEventListener("click", () => {
			numFomulario ++;
			actualizarNumFormulario();
			actualizarProgresobar();
		});

	});

	btnAnterior.forEach(btn => {
		btn.addEventListener("click", () => {
			numFomulario --;
			actualizarNumFormulario();
			actualizarProgresobar();
		});

	});

	function actualizarNumFormulario() {
		formulario.forEach((formularios) => {
		    formularios.classList.contains("form-step-active") &&
		    formularios.classList.remove("form-step-active");
	  });
		formulario[numFomulario].classList.add("form-step-active");
	};

	function actualizarProgresobar() {
	  barraProgreso.forEach((barraProgresos, idx) => {
	    if (idx < numFomulario + 1) {
	      barraProgresos.classList.add("progress-step-active");
	    } else {
	      barraProgresos.classList.remove("progress-step-active");
	    }
	  });

	  const progresoActivo = document.querySelectorAll(".progress-step-active");

	  progreso.style.width =
	    ((progresoActivo.length - 1) / (barraProgreso.length - 1)) * 100 + "%";
	};

	 $('#municipio,#sede').change(function(){
		 	var muni = $('#municipio').val();
	    var sede = $('#sede').val();

	    if( (muni == null) || (sede == null)){
	    	$('#btn-siguiente').slideUp();
	    } else{
	    	$('#btn-siguiente').slideDown();
	    }
		});

	 $('#nombre_empresa,#razon, #direccion, #municipio_empresa, #telefono_empresa').keyup(function(){
		 	var nombreem = $('#nombre_empresa').val();
	    var razon = $('#razon').val();
	    var direccion = $('#direccion').val();
	    var munempre = $('#municipio_empresa').val();
	    var telempre = $('#telefono_empresa').val();

	    if( (nombreem == 0) || (razon == null) || (direccion == null) || (munempre == 0) || (telempre == 0)){
	    	$('.btn-siguiente').slideUp();
	    } else{
	    	$('.btn-siguiente').slideDown();
	    }
		});

	  $('#no_factura,#fecha_documento, #detalle_queja, #solicita_queja').keyup(function(){
		 	var nofactura = $('#no_factura').val();
	    var fechadoc = $('#fecha_documento').val();
	    var detqueja = $('#detalle_queja').val();
	    var solcitaq = $('#solicita_queja').val();


	    if( (nofactura.length == 0) || (fechadoc == null) || (detqueja.length == 0) || (solcitaq.length == 0)){
	    	$('#btn-enviar').slideUp();
	    } else{
	    	$('#btn-enviar').slideDown();
	    }
		});

//mensaje
	 const Toast = Swal.mixin({
		  toast: true,
		  position: 'top-end',
		  showConfirmButton: false,
		  timer: 5000,
		  timerProgressBar: true,
		  didOpen: (toast) => {
		    toast.addEventListener('mouseenter', Swal.stopTimer)
		    toast.addEventListener('mouseleave', Swal.resumeTimer)
		  }
		});

		Toast.fire({
		  title: 'Recuerde seleccionar y llenar los campos.',
		  icon: 'info'
		});

		/*Fotografía o imagen de la factura*/
$(document).ready(function(){
    $("#foto").on("change",function(){
      var uploadFoto = document.getElementById("foto").value;
        var foto       = document.getElementById("foto").files;
        var nav = window.URL || window.webkitURL;
        var contactAlert = document.getElementById('form_alert');
        
            if(uploadFoto !='')
            {
                var type = foto[0].type;
                var name = foto[0].name;
                if(type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png')
                {
                    alert.error('Imágen no compatible');                       
                    $("#img").remove();
                    $(".delPhoto").addClass('notBlock');
                    $('#foto').val('');
                    return false;
                }else{  
                        contactAlert.innerHTML='';
                        $("#img").remove();
                        $(".delPhoto").removeClass('notBlock');
                        var objeto_url = nav.createObjectURL(this.files[0]);
                        $(".prevPhoto").append("<img id='img' src="+objeto_url+">");
                        $(".upimg label").remove();
                        
                    }
              }else{
               alert.error('No seleccionó una imágen');
                $("#img").remove();
              }              
    });

    $('.delPhoto').click(function(){
      $('#foto').val('');
      $(".delPhoto").addClass('notBlock');
      $("#img").remove();

    });

});
	</script>	
</body>
</html>