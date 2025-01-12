<?php
include('../../../app/config.php');

$id_docente = $_POST['id_docente'];



$sentencia = $pdo->prepare("DELETE FROM docentes WHERE id_docente = :id_docente");

$sentencia->bindParam('id_docente', $id_docente);

try {
    if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje'] = "Se elimino los datos del Docente Correctamente";
        $_SESSION['icono'] = "success";
        header('Location:' . APP_URL . "/admin/docentes");
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error no se pudo eliminar en la base de datos, Por Favor comuniquese con el Administrador";
        $_SESSION['icono'] = "error";
        header('Location:' . APP_URL . "/admin/docentes");
    }
} catch (Exception $exception) {
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo eliminar en la base de datos, Por que este registro existe en otras tablas";
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL . "/admin/docentes");
}
