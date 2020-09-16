<?php

$idCurso = $_POST['id_curso'] ?? '';
$horasCurso = $_POST['horas_curso'] ?? '';

$idCurso = trim($idCurso);
$horasCurso = trim($horasCurso);
$errores='';

if ($idCurso === '') {
    $errores .= 'El ID es obligatorio.<br>';
} elseif(!is_numeric($idCurso)) {
    $errores .= 'El ID debe ser numérico.<br>';
} else {
    $idCurso += 0;
    if ($idCurso <= 0) {
        $errores .= 'El ID debe ser positivo.<br>';
    } elseif (is_float($idCurso)){
        $errores .= 'El ID no puede ser un número decimal<br>';
    }
}

if ($horasCurso === '') {
    $errores .= 'El dato horas es obligatorio.<br>';
} elseif(!is_numeric($horasCurso)) {
    $errores .= 'El dato horas debe ser numérico.<br>';
} else {
    $horasCurso += 0;
    if ($horasCurso <= 0) {
        $errores .= 'El dato horas debe ser positivo.<br>';
    } elseif (is_float($horasCurso)){
        $errores .= 'El dato horas no puede ser un número decimal<br>';
    }
}