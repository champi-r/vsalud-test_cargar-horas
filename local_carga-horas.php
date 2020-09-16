<?php
include '_header.php';

require 'config.php';

$conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

mysqli_set_charset($conexion, DB_CHARSET);

$consulta = "SELECT 
  c.id as courseid, 
  c.fullname as name, 
  v.horas as horas 
  from course c 
  JOIN vsalud_horas v ON v.courseid = c.id";

$resultados = mysqli_query($conexion, $consulta);

?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID Curso</th>
      <th scope="col">Curso</th>
      <th scope="col">horas</th>
    </tr>
  </thead>
  <tbody>
    
    <?php while ($camposSql = mysqli_fetch_array($resultados)) { ?>
      
      <tr>
      <th scope="row"> <?= $camposSql["courseid"] ?> </th>
      <td> <?= $camposSql["name"] ?> </td>
      <td> <?= $camposSql["horas"] ?> </td>
    
    <?php } ?>
  
  </tbody>
</table>
<br>


<button class="btn btn-primary" type="submit">Descargar CSV</button>


<?php
include '_footer.php';