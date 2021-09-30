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
	<title>Consumidor - Ingreso</title>
	<?php $this->load->view('header'); ?>
</head>
<body>
	<header>
		<?php $this->load->view('menu'); ?>
	</header>
	<div class="container-fluid espacio">
		<h3 class="text-center"><i class="fa fa-building"></i> Listado de empresas registrados</h3>
		<h6>Cantidad de empresas ingresados al sistema: <strong style="color: red; font-weight: bold;"><?php echo $registros; ?></strong></h6>
		<center><a href="<?=$base_url?>/proceso/listar_empresa_pdf"  class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Descargar listado</a></center>
		<section>
		  <div class="table-responsive-sm">
		    <table class=" table table-striped table-bordered" id="quejas" class="display nowrap" style="width:100%">
		    <thead> 
		      <tr id="letra_info">
		        <th>No.</th>
		        <th>NIT</th>
		        <th>Nombre de la Empresa</th>
		        <th>Referencia</th>
		        <th>Dirección</th>
		        <th>Municipio</th>
		        <th>Departamento</th>
		        <th>Teléfono</th>
		        <th>Correo</th>
		        <th>Dar Baja</th>
		       </tr>
		    </thead>
		    <tbody >
		       <?php
		          foreach ($arr as $a){
		        
		         ?>
		         <tr>
		          <td class='text-center'><?php echo $a['id_proveedor'] ;?></td>
		          <td><?php echo $a['nit'] ;?></td>
		          <td class='text-center'><?php echo $a['nombre'] ;?></td> 
		          <td><?php echo $a['razon'] ;?></td> 
		          <td><?php echo $a['direccion'] ;?></td> 
		          <td><?php echo $a['municipio'] ;?></td>
		          <td class="text-center"><?php echo $a['departamento'] ;?></td>
		          <td class="text-center"><?php echo $a['telefono'] ;?></td>
		          <td class="text-center"><?php echo $a['correo'] ;?></td>
		          <td class='text-center'><a class='btn btn-danger btn-sm' data-toggle="modal" data-target="#darbaja" onclick="obdatosIdconsumidor('<?php echo $a['id_proveedor'] ;?>')"><i class="fa fa-trash-alt"></i></a></td>
		         </tr>
		      <?php } ?>
		    </tbody>
		    </table>
		    <div class="label label-danger label-md" onclick="$(this).hide(1000)"><?=$mensaje?></div>
		  </div>
		</section>
	</div>
	<footer><?php $this->load->view('footer') ?></footer>
	<!---modals-->
<!-- Modal eliminar-->
<div class="modal fade" id="darbaja" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background-color: red; color: #fff;">
        <h5 class="modal-title" id="exampleModalLabel">DAR DE BAJA AL PROVEEDOR / EMPRESA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <center><p style="color: #0901A4; font-weight: bold;">Detalles Generales</p></center>
        <div class="form-row text-center">
        	<div class="col-sm-6 col-6">
                <label for="fecha">No. de registro de la Empresa</label>
                <input type="text" class="ford texto text-center" name="no_empre" id="no_empre" readonly>
            </div>
            <div class="col-sm-6 col-6">
                <label for="fecha">NIT de la Empresa</label>
                <input type="text" class="ford texto text-center" name="nit" id="nit" readonly>
            </div>
            <div class="col-sm-12 col-12" style="padding-top: 1rem;">
                <label for="cantidad">Nombre de la Empresa</label>
                <input type="text" class="ford texto text-center" name="nombre_empresa" id="nombre_empresa" readonly>
            </div>
            <center></center>
            <div class="col-sm-12 col-12" style="padding-top: 1rem;">
                <label for="usuario">Usuario quién elimina el registro:</label>
                <p><strong><?php echo $this->session->NOMBRE ?></strong></p>
            </div>
        </div>
        <div>
          <br>
        <center><h3 style="color: red;">¿Está seguro de eliminar el registro?</h3></center>
        </div>
        <br>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">No Eliminar</button>
            <form method="POST" id="eliminarRegi" name="eliminarRegi">
                <input type="hidden" name="action" value="eliminarRegi">
                <input type="hidden" id="id_empre" name="id_empre" value="">
                <button type="submit" class="btn btn-danger botoncito" id="enviarDato" readonly><i class="fa fa-trash-alt"></i> SI</button>
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
//obtener id dato selec
  function obdatosIdconsumidor(id_proveedor) {
        datos = {
            "id_proveedor": id_proveedor
        }
        $.ajax({
            data: datos,
            url: '<?=$base_url?>/proceso/buscarRegistroEmpresa',
            type: 'POST',
            beforeSend: function(){},
            success: function(response) {
                data = $.parseJSON(response);
                if(data.length > 0){
                    $('#id_empre').val(data[0]['id_proveedor']);
                    $('#no_empre').val(data[0]['id_proveedor']);
                    $('#nit').val(data[0]['nit']);
                    $('#nombre_empresa').val(data[0]['nombre_empresa']);
                    if ((data[0]['estado']) != 'F') {
                     
                      $('.botoncito').slideUp();
                      Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          text: 'La empresa tiene una queja activa registrada!',
                        })
                    }else{
                      $('.botoncito').slideDown();
                    }
                }
            } 
        });
    };

  //darbaja
    $('#enviarDato').click(function(){
        $.ajax({
            url: '<?=$base_url?>/proceso/darBempresa',
            type: "POST",
            async: true,
            data: $('#eliminarRegi').serialize(),

            success: function(response){
                data = $.parseJSON(response);
                    if(data.length > 0){
                    console.log(response);
                }
            }
        });
    });
 

	</script>
</body>
</html>