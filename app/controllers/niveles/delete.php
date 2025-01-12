<?php
include('../../../app/config.php');

$id_nivel = $_POST['id_nivel'];



$sentencia = $pdo->prepare("DELETE FROM niveles WHERE id_nivel = :id_nivel");

$sentencia->bindParam('id_nivel', $id_nivel);

try {
    if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje'] = "Se elimino los datos del Nivel Correctamente";
        $_SESSION['icono'] = "success";
        header('Location:' . APP_URL . "/admin/niveles");
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error no se pudo eliminar en la base de datos, Por Favor comuniquese con el Administrador";
        $_SESSION['icono'] = "error";
        header('Location:' . APP_URL . "/admin/niveles");
    }
} catch (Exception $exception) {
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo eliminar en la base de datos, Por que este registro existe en otras tablas";
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL . "/admin/niveles");
}
