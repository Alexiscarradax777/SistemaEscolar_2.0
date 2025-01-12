<?php
include('../../../app/config.php');

$id_estudiante = $_POST['id_estudiante'];



$sentencia = $pdo->prepare("DELETE FROM estudiantes WHERE id_estudiante = :id_estudiante");

$sentencia->bindParam('id_estudiante', $id_estudiante);

try {
    if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje'] = "Se elimino los datos del Estudiante Correctamente";
        $_SESSION['icono'] = "success";
        header('Location:' . APP_URL . "/admin/estudiantes");
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error no se pudo eliminar en la base de datos, Por Favor comuniquese con el Administrador";
        $_SESSION['icono'] = "error";
        header('Location:' . APP_URL . "/admin/estudiantes");
    }
} catch (Exception $exception) {
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo eliminar en la base de datos, Por que este registro existe en otras tablas";
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL . "/admin/estudiantes");
}
