<?php
include('../../../app/config.php');

$id_carrera = $_POST['id_carrera'];



$sentencia = $pdo->prepare("DELETE FROM carreras WHERE id_carrera = :id_carrera");

$sentencia->bindParam('id_carrera', $id_carrera);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se elimino los datos de la Carrera Correctamente";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . "/admin/carreras");
} else {
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo eliminar los datos de la Carrera, Por Favor comuniquese con el Administrador";
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL . "/admin/carreras");
}
