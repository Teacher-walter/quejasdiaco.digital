<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";

if (count($arr) < 1) {
  $mensaje = "<script>Swal.fire({
  icon: 'warning',
  title: 'No hay ninguna queja registrado'
  });
</script>";
}

$registros =  count($arr);

?><!DOCTYPE html>
<html lang="es">
<head>
	<title>Quejas - Aceptados</title>
	<?php $this->load->view('header'); ?>
</head>
<body>
	<header>
		<?php $this->load->view('menu'); ?>
	</header>
	<div class="container-fluid espacio">
		<h4 class="text-center"><i class="fa fa-comments"></i> Ingreso de Quejas aceptadas por el departamento de gestión</h4>
		<h6 style="color: green; font-weight: bold;">Quejas Solucionado: <strong style="color: red; font-weight: bold;"><?php echo $registros; ?></strong></h6>
		<section>
		  <div class="table-responsive-sm">
		    <table class=" table table-striped table-bordered" id="quejas" class="display nowrap" style="width:100%">
		    <thead> 
		      <tr id="letra_info">
		        <th>No. de Queja</th>
		        <th>Fecha de registro</th>
		        <th>Género</th>
		        <th>Tipo Persona</th>
		        <th>Empresa</th>
		        <th>Departamento</th>
		        <th>Municipio</th>
		        <th>Estado</th>
		        <th>Detalle</th>
		        <th>Descargar</th>
		        <th>Dar Baja</th>
		      </tr>
		    </thead>
		    <tbody >
		       <?php
		          foreach ($arr as $a){
		          	$number = $a['no_queja'];
					$length = 10;
					$string = substr(str_repeat(0, $length).$number, - $length);
		         ?>
		         <tr>
		          <td class='text-center'><?php echo $string ;?></td>
		          <td><?php echo $a['fecha_registro'] ;?></td>
		          <td><?php echo $a['genero'] ;?></td>
		          <td class='text-center'><?php echo $a['persona'] ;?></td> 
		          <td><?php echo $a['nombre'] ;?></td> 
		          <td><?php echo $a['departamento'] ;?></td> 
		          <td><?php echo $a['municipio'] ;?></td>
		          <td class="text-center">
		          	<?php if ($a['estado'] == 'D') { ?>
		          		<p style="color: green; font-weight: bold;"><i class="fa fa-check"></i> Solucionado</p>
		          		<?php } ?>
		          	</td>
		          <td class='text-center'><a class="btn btn-success btn-sm" href="<?=$base_url?>/proceso/detalle_queja/<?php echo $a['no_queja'] ;?>"><i class="fa fa-info-circle"></i></a></td>
		          <td class='text-center'><a class="btn btn-info btn-sm" href="<?=$base_url?>/proceso/detalle_queja_pdf/<?php echo $a['no_queja'] ;?>"><i class="fa fa-download"></i></a></td>
		          <td class='text-center'><a class='btn btn-danger btn-sm' data-toggle="modal" data-target="#updateQueja" onclick="obdatosIdmodificar('<?php echo $a['no_queja'] ;?>')"><i class="fa fa-trash"></i></a></td>
		         </tr>
		      <?php } ?>
		    </tbody>
		    </table>
		    <div class="label label-danger label-md" onclick="$(this).hide(1000)"><?=$mensaje?></div>
		  </div>
		</section>
	</div>
	<br>
	<footer><?php $this->load->view('footer') ?></footer>
	<!---modals-->
	<!-- Modal actualizar-->
	<div class="modal fade" id="updateQueja" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      <div class="modal-header" style="background-color:#790000; color: #fff;">
	        <h5 class="modal-title" id="exampleModalLabel">Dar de baja a la queja</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <center><p style="color: #0901A4; font-weight: bold;">Número de Queja</p></center>
	        <form method="POST" id="actualizarEstadoQueja" name="actualizarEstadoQueja">
	          <input type="hidden" name="action" value="updateRegi">
	        <div class="form-row">
	            <div class="col-sm-8 col-8">
	                <label for="fecha" class="result">Número de la Queja</label>
	                <input type="text" class="ford text-center" id="id_que" name="id_que" value="" readonly>
	            </div>
	            <div class="col-sm-4 col-4">
	            	<input type="hidden" class="ford text-center" id="estado" value="" readonly>
	            </div>

	        </div>
	        <br>
	          <div class="form-row">
	            <div class="col-sm-6 col-6">
	                <label for="cantidad" class="result">Fecha de la modificación</label>
	                <input type="date" class="ford resul" id="fecha_modifica" name="fecha_modifica" value="<?php echo date("Y-m-d"); ?>" readonly required>
	            </div>
	            <div class="col-sm-6 col-6">
	                <label for="cantidad" class="result">Seleccionar opcion para dar de baja</label>
	                <select class="custom-select ford" name="estado" required>
				        <option selected disabled value="">Seleccionar</option>
				        <option value="F">Dar de baja</option>
				        <option value="D">No dar de baja</option>
				     </select>
	          </div>
	          <br><br>
	        <div class="form-row">
	            <div class="col-sm-12 col-12">
	                <label for="usuario">Empleado quién da de baja al registro:</label>
	                <p><strong><?php echo $this->session->NOMBRE ?></strong></p>
	            </div>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-sign-out-alt" style="font-weight: bold;"></i> No actualizar</button>
	        <button type="submit" class="btn btn-success" id="actualizarDatos"><i class="fa fa-sync-alt"></i> Actualizar Registro</button>
	      </form>           
	      </div>
	    </div>
	  </div>
	</div>
	<script>
		$(document).ready(function () {
		    $('#quejas').DataTable({
		          language: {
		            processing: "Tratamiento en curso...",
		            search: "Buscar&nbsp;:",
		            lengthMenu: "Agrupar por _MENU_ items",
		            info: "Mostrando del item _START_ al _END_ de un total de _TOTAL_ items",
		            infoEmpty: "No existen datos.",
		            infoFiltered: "(filtrado de _MAX_ elementos en total)",
		            infoPostFix: "",
		            loadingRecords: "Cargando...",
		            zeroRecords: "No se encontraron datos con tu busqueda",
		            emptyTable: "No hay datos disponibles en la tabla.",
		            paginate: {
		                first: "Primero",
		                previous: "Anterior",
		                next: "Siguiente",
		                last: "Ultimo"
		            },
		            aria: {
		                sortAscending: ": active para ordenar la columna en orden ascendente",
		                sortDescending: ": active para ordenar la columna en orden descendente"
		            }
		        },
		        "order": [
				       [0, "desc"]
				     ],
		        scrollY: 2500,
		        scrollCollapse: true,
		        lengthMenu: [ [15, 30, 50, -1], [15, 30, 50, "All"] ],
		    });
		});

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
		        }
		        form.classList.add('was-validated');
		      }, false);
		    });
		  }, false);
		})();

//obtener id dato selec
  function obdatosIdmodificar(no_queja) {
        datos = {
            "no_queja": no_queja
        }
        $.ajax({
            data: datos,
            url: '<?=$base_url?>/proceso/buscarRegistroQueja',
            type: 'POST',
            beforeSend: function(){},
            success: function(response) {
                data = $.parseJSON(response);
                if(data.length > 0){
                    $('#id_que').val(data[0]['id_queja']);
                    $('#estado').val(data[0]['estado']);
                }
            } 
        });
    };

    //actualizad datos del producto
  $('#actualizarEstadoQueja').submit(function(e){
    e.preventDefault();

    $.ajax({
      url: '<?=$base_url?>/proceso/actualizarEstadoQueja',
        type: "POST",
        async: true,
        data: $('#actualizarEstadoQueja').serialize(),
         
        success: function(response){
          if (response != 'error') {
            redlistarresuelto()   
          }
        }
    });
  });

  function redlistarresuelto(){
  window.location.href='<?=$base_url?>/proceso/listarresueltas';
};
 

	</script>
</body>
</html>