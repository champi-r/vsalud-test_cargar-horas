<?php 
if (!isset($titulo)){
    $titulo = 'Plugin VSalud';
}

function rutaURL ($x){
    $ultimoElemento = (explode("/",$x));
    return end($ultimoElemento);
} 

$urlEnd = rutaURL($_SERVER['REQUEST_URI']);

$horasActuales = 'local_carga-horas.php';
$horasAgregar = 'horas-agregar.php';
$horasActualizar = 'horas-actualizar.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $titulo ?> </title>
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>

<main role="main">

  <div class="container">
  <h1>VSALUD - Horas Certificaciones</h1><br>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item <?php if ($urlEnd == $horasActuales) { echo 'active'; } ?>">
        <a class="nav-link" href="<?= $horasActuales ?>">Actuales</a>
      </li>
      <li class="nav-item <?php if ($urlEnd == $horasAgregar) { echo 'active'; } ?>">
        <a class="nav-link" href="<?= $horasAgregar ?>">Agregar</a>
      </li>
      <li class="nav-item <?php if ($urlEnd == $horasActualizar) { echo 'active'; } ?>">
        <a class="nav-link" href="<?= $horasActualizar ?>">Actualizar</a>
      </li>
    </ul>
   
  </div>
</nav>
<br>