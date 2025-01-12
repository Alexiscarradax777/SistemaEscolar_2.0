<?php
include('../../../app/config.php');

$id_rol = $_POST['id_rol'];

$sentencia = $pdo->prepare("DELETE FROM roles WHERE id_rol = :id_rol");

$sentencia->bindParam('id_rol', $id_rol);

try {
    if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje'] = "Se elimino el Rol Correctamente";
        $_SESSION['icono'] = "success";
        header('Location:' . APP_URL . "/admin/roles");
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error al registrar el Rol, Por Favor comuniquese con el Administrador";
        $_SESSION['icono'] = "error";
        header('Location:' . APP_URL . "/admin/roles");
    }
} catch (Exception $exception) {
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo eliminar en la base de datos, Por que este registro existe en otras tablas";
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL . "/admin/roles");
}
