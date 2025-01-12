<?php
include('../../../app/config.php');

$id_grupo = $_POST['id_grupo'];



$sentencia = $pdo->prepare("DELETE FROM grupos WHERE id_grupo = :id_grupo");

$sentencia->bindParam('id_grupo', $id_grupo);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se elimino los datos de el Grupo Correctamente";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . "/admin/grupos");
} else {
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo eliminar los datos del el grupo, Por Favor comuniquese con el Administrador";
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL . "/admin/grupos");
}
