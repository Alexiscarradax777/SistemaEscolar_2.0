<?php
include('../../../app/config.php');

$id_rol_permiso = $_POST['id_rol_permiso'];



$sentencia = $pdo->prepare("DELETE FROM roles_permisos WHERE id_rol_permiso = :id_rol_permiso");

$sentencia->bindParam('id_rol_permiso', $id_rol_permiso);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se elimino los datos de el Permiso, Correctamente";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . "/admin/roles");
} else {
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo eliminar los datos de el Permiso, Por Favor comuniquese con el Administrador";
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL . "/admin/roles");
}
