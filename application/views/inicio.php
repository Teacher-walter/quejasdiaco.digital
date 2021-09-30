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
		<div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
		  <div class="carousel-inner">
		    <div class="carousel-item active" data-interval="10000">
		      <img src="<?=$base_url?>/recursos/img/1.png" class="d-block w-100" alt="...">
		    </div>
		    <div class="carousel-item" data-interval="2000">
		      <img src="<?=$base_url?>/recursos/img/2.jpg" class="d-block w-100" alt="...">
		    </div>
		    <div class="carousel-item">
		      <img src="<?=$base_url?>/recursos/img/3.png" class="d-block w-100" alt="...">
		    </div>
		    <div class="carousel-item">
		      <img src="<?=$base_url?>/recursos/img/4.png" class="d-block w-100" alt="...">
		    </div>
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
		<br>
		 <?php if ($this->session->ROL == 'Administrador') { ?>
		<center><h5 style="color: blue;"><i class="fa fa-user-secret"></i> <?php echo $this->session->ROL ?>: <?php echo $this->session->NOMBRE ?></h5></center>
	<?php } else if ($this->session->ROL == 'Usuario') { ?>
		<center><h5 style="color: green;"><i class="fa fa-user-tie"></i> <?php echo $this->session->ROL ?>: <?php echo $this->session->NOMBRE ?></h5></center>
	<?php } ?>
	<center><h2><strong>Bienvenido al Sistema de Quejas</strong></h2></center>
	<br>
	<section>
    <div class="card-group text-center">
      <div class="col-md-12 col-lg-3">
        <div class="card m-3"><br>
        <img class="card-img-top mb-3" src="<?=$base_url?>/recursos/img/diaco.jpg" alt="Card image cap">
          <div class="card-block">
          <h4 class="card-title">DIACO</h4>
          <a class="btn btn-warning" href="https://www.diaco.gob.gt/" role="button" target="_blank">Visitar</a>                                  
          </div><br>
        </div>
      </div>
      <div class="col-md-12 col-lg-3">
        <div class="card m-3"><br>
        <img class="card-img-top mb-3" src="<?=$base_url?>/recursos/img/lineamiento.jpg" alt="Card image cap">
          <div class="card-block">
          <h4 class="card-title">LINEAMIENTO</h4>
          <a class="btn btn-warning" href="<?=$base_url?>/queja/tramite" role="button">Visitar</a>                                  
          </div><br>
        </div>
      </div>
      <div class="col-md-12 col-lg-3">
        <div class="card m-3"><br>
        <img class="card-img-top mb-3" src="<?=$base_url?>/recursos/img/queja.jpg" alt="Card image cap" >
          <div class="card-block">
          <h4 class="card-title">REGISTRAR QUEJA</h4>
          <a class="btn btn-warning" href="<?=$base_url?>/queja/crearqueja" role="button" >Visitar</a>
          </div><br>
        </div>
      </div>
      <div class="col-md-12 col-lg-3">
        <div class="card m-3"><br>
          <img class="card-img-top mb-3" src="<?=$base_url?>/recursos/img/buscar.jpg" alt="Card image cap" >
            <div class="card-block">
            <h4 class="card-title">CONSULTAR QUEJA</h4>
            <a class="btn btn-warning" href="<?=$base_url?>/queja/verprocesoqueja" role="button" >Visitar</a>
            </div><br>
          </div>
        </div>
      </div>
    </div>
  </section>
  <br><br>
	<h3 class="text-center"><strong>Dirección de Atención y Asistencia al Consumidor</strong></h3>
	<div class="container text-center">
		<h6 align="justify">La Dirección de Atención y Asistencia al Consumidor (DIACO) fue creada como dependencia del Ministerio de Economía según el Acuerdo Gubernativo No. 425-95 de fecha 4 de septiembre de 1995. Actualmente la DIACO tiene la responsabilidad de defender los derechos de los consumidores y usuarios. El Congreso de la República de Guatemala aprobó el Decreto Ley 006-2003 "Ley de Protección al Consumidor y Usuario", habiendo sido publicado en el Diario de Centro América el día 11 de marzo del año 2003, entró en vigencia el 26 de Marzo del 2003. El objeto de la Ley es la de promover, divulgar y defender los derechos de los consumidores y usuarios. <br><br>

    El 10 de diciembre del 2003 se publicó el Acuerdo Gubernativo 777-2003 "Reglamento de la Ley de Protección al Consumidor y Usuario" entrando en vigencia el 22 de diciembre de 2003. Su objetivo es desarrollar las disposiciones de la Ley de Protección al Consumidor, a efecto de regular la estructura administrativa y el funcionamiento de la Dirección de Atención y Asistencia al Consumidor.</h6>
	</div>
	</div>
	<br><br>
	<div class="container">
		<center>
			<?php
            if (isset($this->session->USUARIO)) { ;?>
                <a class="btn btn-success btn-lg" style="display: none;" href="<?=$base_url?>/inicio">Incio</a>
                <?php }else{ ; ?>
                <a class="btn btn-success btn-lg" href="<?=$base_url?>/usuario/login">INGRESAR</a>
            <?php }; ?>
		</center>
	</div>
	<br><br>

	<footer><?php $this->load->view('footer') ?></footer>
	<script type="text/javascript">
		/*
		Swal.fire(
		  '¡Bienvenido!',
		  'Al sistema de quejas de la DIACO',
		 
		);
		+*/
	</script>
</body>
</html>