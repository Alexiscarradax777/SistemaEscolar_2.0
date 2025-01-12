<?php
include('../../../app/config.php');

$id_cuatrimestre = $_POST['id_cuatrimestre'];



$sentencia = $pdo->prepare("DELETE FROM cuatrimestres WHERE id_cuatrimestre = :id_cuatrimestre");

$sentencia->bindParam('id_cuatrimestre', $id_cuatrimestre);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se elimino los datos de el Cuatrimestre Correctamente";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . "/admin/cuatrimestre");
} else {
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo eliminar los datos del el cuatrimestre, Por Favor comuniquese con el Administrador";
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL . "/admin/cuatrimestre");
}
