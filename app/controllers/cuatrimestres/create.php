<?php
include('../../../app/config.php');

$nombre_cuatrimestre = $_POST['nombre_cuatrimestre'];


$sentencia = $pdo->prepare('INSERT INTO cuatrimestres
(nombre_cuatrimestre, fyh_creacion, estado)
VALUES (:nombre_cuatrimestre,:fyh_creacion,:estado)');

$sentencia->bindParam(':nombre_cuatrimestre', $nombre_cuatrimestre);
$sentencia->bindParam('fyh_creacion', $fechaHora);
$sentencia->bindParam('estado', $estado_de_registro);

if ($sentencia->execute()) {
    //echo 'success';
    session_start();
    $_SESSION['mensaje'] = "Se regitro el Cuatrimestre correctamente";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . "/admin/cuatrimestre");
    //header('Location:' .$URL.'/');
} else {
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar el Cuatrimestre";
    $_SESSION['icono'] = "error";
?><script>
        window.history.back();
    </script> <?php
            }
