<?php
include('../../../../app/config.php');

$id_gestion = $_POST['id_gestion'];



$sentencia = $pdo->prepare("DELETE FROM gestiones WHERE id_gestion = :id_gestion");

$sentencia->bindParam('id_gestion', $id_gestion);

try {

    if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje'] = "Se elimino los datos de la Institucion Correctamente";
        $_SESSION['icono'] = "success";
        header('Location:' . APP_URL . "/admin/configuraciones/institucion");
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error no se pudo eliminar los datos de la Institucion, Por Favor comuniquese con el Administrador";
        $_SESSION['icono'] = "error";
        header('Location:' . APP_URL . "/admin/configuraciones/gestion");
    }
} catch (Exception $exception) {
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo eliminar en la base de datos, porque existe este registro en otras tablas";
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL . "/admin/configuraciones/gestion");
}
