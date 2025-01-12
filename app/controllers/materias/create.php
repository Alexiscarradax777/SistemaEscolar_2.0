<?php
include('../../../app/config.php');

$carrera_id = $_POST['carrera_id'];
$cuatrimestre_id = $_POST['cuatrimestre_id'];
$nombre_materia = $_POST['nombre_materia'];


$sentencia = $pdo->prepare('INSERT INTO materias
(carrera_id,cuatrimestre_id,nombre_materia, fyh_creacion, estado)
VALUES (:carrera_id,:cuatrimestre_id,:nombre_materia,:fyh_creacion,:estado)');

$sentencia->bindParam(':carrera_id', $carrera_id);
$sentencia->bindParam(':nombre_materia', $nombre_materia);
$sentencia->bindParam(':cuatrimestre_id', $cuatrimestre_id);
$sentencia->bindParam('fyh_creacion', $fechaHora);
$sentencia->bindParam('estado', $estado_de_registro);

if ($sentencia->execute()) {
    //echo 'success';
    session_start();
    $_SESSION['mensaje'] = "Se regitro la Materia correctamente";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . "/admin/materias");
    //header('Location:' .$URL.'/');
} else {
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar la Materia";
    $_SESSION['icono'] = "error";
?><script>
        window.history.back();
    </script> <?php
            }
