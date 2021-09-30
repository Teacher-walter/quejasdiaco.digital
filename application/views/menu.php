<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style media="screen">
  <?php
  if (isset($this->session->USUARIO)) { // Sesión iniciada
    $log = "<a class=\"nav-item nav-link active\" style=\"color: white;\" href=\"${base_url}/usuario/logout\">SALIR</a>";
  }?>
</style>
<nav class="navbar navbar-expand-lg fixed-top navbar-dark menu">
  <div class="container">
    <a class="navbar-brand" href="<?=$base_url?>/inicio"><i class="fa fa-home"></i> Inicio</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav justify-content-center me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <strong>QUEJAS</strong>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="<?=$base_url?>/queja/tramite"><i class="fa fa-project-diagram"></i> Tramite de la Queja</a>
            <a class="dropdown-item" href="<?=$base_url?>/queja/crearqueja"><i class="fa fa-comment"></i> Ingresar Quejas</a>
            <a class="dropdown-item" href="<?=$base_url?>/queja/verprocesoqueja"><i class="fa fa-file-import"></i> Consultar Queja</a>
          </div>
        </li>
        <?php if ($this->session->ROL == 'Administrador') { ?>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-comment-dots"></i> QUEJA
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="<?=$base_url?>/proceso/listarrecibidas"><i class="fa fa-user-plus"></i> Quejas recibidas</a>
            <a class="dropdown-item" href="<?=$base_url?>/proceso/listaraceptadas" style="color: blue;"><i class="fa fa-th-list"></i> Listar quejas aceptadas</a>
            <a class="dropdown-item" href="<?=$base_url?>/proceso/listarresueltas" style="color: green;"><i class="fa fa-check"></i> Listar quejas Solucionadas</a>
            <a class="dropdown-item" href="<?=$base_url?>/proceso/listarsinsolucion" style="color: red;"><i class="fa fa-handshake-alt-slash"></i> Listar quejas sin solución</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            USUARIO
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="<?=$base_url?>/usuario/crear"><i class="fa fa-user-plus"></i> Ingresar Usuario</a>
            <a class="dropdown-item" href="<?=$base_url?>/usuario/listar"><i class="fa fa-list-alt"></i> Listar Usuario</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           CONSUMIDOR
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="<?=$base_url?>/proceso/listar_consumidor"><i class="fa fa-list-alt"></i> Listar Consumidores</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           PROVEEDOR
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="<?=$base_url?>/proceso/listar_empresa"><i class="fa fa-building"></i> Registro de Proveedor</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           REPORTE
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="<?=$base_url?>/informe/estadistica"><i class="fa fa-chart-pie"></i> Gráficas Generales</a>
            <a class="dropdown-item" href="<?=$base_url?>/informe/estadistica_region"><i class="fa fa-chart-area"></i> Gráficas por Región</a>
            <a class="dropdown-item" href="<?=$base_url?>/informe/estadistica_departamento"><i class="fa fa-chart-area"></i> Gráficas por Depto, Muni, Empre</a>
          </div>
        </li>
      </ul>
      <ul class="navbar-nav end">
      <li class="nav-item active">
        <a class="navbar-brand" href="<?=$base_url?>/usuario/logout">SALIR</a>
      </li>
    </ul>
    <?php } ?>
    <?php if ($this->session->ROL == 'Usuario') { ?>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-comment-dots"></i> QUEJA
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="<?=$base_url?>/proceso/listarrecibidas"><i class="fa fa-user-plus"></i> Quejas recibidas</a>
            <a class="dropdown-item" href="<?=$base_url?>/proceso/listaraceptadas" style="color: blue;"><i class="fa fa-th-list"></i> Listar quejas aceptadas</a>
            <a class="dropdown-item" href="<?=$base_url?>/proceso/listarresueltas" style="color: green;"><i class="fa fa-check"></i> Listar quejas Solucionadas</a>
            <a class="dropdown-item" href="<?=$base_url?>/proceso/listarsinsolucion" style="color: red;"><i class="fa fa-handshake-alt-slash"></i> Listar quejas sin solución</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           CONSUMIDOR
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="<?=$base_url?>/proceso/listar_consumidor"><i class="fa fa-list-alt"></i> Listar Consumidores</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           PROVEEDOR
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="<?=$base_url?>/proceso/listar_empresa"><i class="fa fa-building"></i> Registro de Proveedor</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           REPORTE
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="<?=$base_url?>/informe/estadistica"><i class="fa fa-chart-pie"></i> Gráficas Generales</a>
            <a class="dropdown-item" href="<?=$base_url?>/informe/estadistica_region"><i class="fa fa-chart-area"></i> Gráficas por Región</a>
            <a class="dropdown-item" href="<?=$base_url?>/informe/estadistica_departamento"><i class="fa fa-chart-area"></i> Gráficas por Depto, Muni, Empre</a>
          </div>
        </li>
      </ul>
      <ul class="navbar-nav end">
      <li class="nav-item active">
        <a class="navbar-brand" href="<?=$base_url?>/usuario/logout">SALIR</a>
      </li>
    </ul>
    <?php } ?>
    </div>
  </div>
</nav>