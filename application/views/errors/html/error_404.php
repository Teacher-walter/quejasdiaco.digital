<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<title>404 Página no encontrada</title>
<link rel="icon" href="/diaco/recursos/img/diaco.ico">
<script type="text/javascript" src="http://localhost/diaco/recursos/js/jquery.min.js"></script>
<script type="text/javascript" src="http://localhost/diaco/recursos/js/bootstrap.min.js"/></script>
<link href="http://localhost/diaco/recursos/css/bootstrap.min.css" rel="stylesheet"/>
<script type="text/javascript" src="http://localhost/diaco/recursos/fontAwesome/js/all.min.js"></script>
<link type="text/css" href="http://localhost/diaco/recursos/fontAwesome/css/all.min.css" rel="stylesheet">
<style type="text/css">
	.espacio{
		padding-top: 5rem;
	}


@media screen and (min-width: 719px) {
    body {
        background-image: url("recursos/img/fondo.jpg");
        height: 650px;
        background-size: cover;
		background-repeat:no-repeat;
		background-position: center center;
    }
}

@media screen and (min-width: 400px) {
    body {
        background-image: url("http://localhost/diaco/recursos/img/fondo.jpg");
        height: 753px;
        background-size: cover;
		background-repeat:no-repeat;
		background-position: center center;
    }
}

@media screen and (min-width: 719px) {
    .tamano {
        height: 400px;
 
    }
}

@media screen and (min-width: 400px) {
    .tamano {
        height: 300px;
    }
}

@media screen and (max-width: 399px) {
    .tamano {
        height: 200px;
    }
} 
@media screen and (max-width: 399px) {
    body {
         background-image: url("http://localhost/diaco/recursos/img/vertical.jpg");
    }
}

.color{
	color: #fff;
}


</style>
</head>
<body>
	<div class="container espacio">
		<h1 class="text-center color"><?php echo $heading; ?></h1>
		<h4 class="text-center color"><?php echo $message; ?></h4>
		<br>
		<br>
		<div class="container-fluid">
		<center>
			<img src="http://localhost/diaco/recursos/img/404.png" class="tamano" >
		</center>
		</div>
		<br>
		<center>
			<a href="http://localhost/diaco" type="submit" class="btn btn-primary "><i class="fa fa-home"></i> Inicio</a>
		</center>
	</div>
	<br><br>
</body>
</html>