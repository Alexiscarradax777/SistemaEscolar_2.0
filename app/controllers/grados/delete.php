<?php
include('../../../app/config.php');

$id_grado = $_POST['id_grado'];



$sentencia = $pdo->prepare("DELETE FROM grados WHERE id_grado = :id_grado");

$sentencia->bindParam('id_grado', $id_grado);

try {
    if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje'] = "Se elimino los datos del Grado Correctamente";
        $_SESSION['icono'] = "success";
        header('Location:' . APP_URL . "/admin/grados");
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error no se pudo eliminar en la base de datos, Por Favor comuniquese con el Administrador";
        $_SESSION['icono'] = "error";
        header('Location:' . APP_URL . "/admin/grados");
    }
} catch (Exception $exception) {
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo eliminar en la base de datos, Por que este registro existe en otras tablas";
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL . "/admin/grados");
}
