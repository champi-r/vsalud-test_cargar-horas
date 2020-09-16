<?php
include '_header.php';
$botonFormulario = 'Agregar';

function initVariables(){
    GLOBAL $idCurso, $horasCurso;
    $idCurso = '';
    $horasCurso = '';
}

initVariables();

// SI SE RECIBE DATOS DEL FORM, REALIZA VALIDACIÓN
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    include 'validar-form.php';
    if ($errores !== ''){
        $mensaje = '<strong>Atención:</strong><br>' . $errores;
        $alertClass = 'alert-danger';
    } else {
        require_once 'config.php';

        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        mysqli_set_charset($link, DB_CHARSET);

        //INSERCIÓN DE DATOS
        $idCurso = mysqli_real_escape_string($link, $idCurso);
        $horasCurso = mysqli_real_escape_string($link, $horasCurso);

        $sql1 = "SELECT * FROM course WHERE id = $idCurso";

        $validarIdCurso = mysqli_query($link, $sql1);

        if (mysqli_num_rows($validarIdCurso) !== 1) {
            ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  No se encuentra el ID curso
              </div>
            <?php
            die;
        }
        
        $sql2 = "SELECT * FROM vsalud_horas WHERE courseid = $idCurso";

        $validarIdCurso = mysqli_query($link, $sql2);

        if (mysqli_num_rows($validarIdCurso) == 1) {
            ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  El ID curso ya tiene horas asociadas
              </div>
            <?php
            die;
        }

        $sql = "INSERT INTO vsalud_horas (courseid, horas) VALUES ($idCurso, $horasCurso)";

        print_r($sql);
        $rs = mysqli_query($link, $sql);
        mysqli_close($link);

        initVariables();

        $mensaje = 'Se cargaron los registros';
        $alertClass = 'alert-success';
    }

    ?>
    <div class="alert <?= $alertClass ?> alert-dismissible fade show" role="alert">
        <?= $mensaje ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
}

include 'formulario-horas.php';
include '_footer.php';

