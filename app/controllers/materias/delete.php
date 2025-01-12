<?php
include('../../../app/config.php');

$id_materia = $_POST['id_materia'];



$sentencia = $pdo->prepare("DELETE FROM materias WHERE id_materia = :id_materia");

$sentencia->bindParam('id_materia', $id_materia);

try {
    if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje'] = "Se elimino los datos de la Materia Correctamente";
        $_SESSION['icono'] = "success";
        header('Location:' . APP_URL . "/admin/materias");
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error no se pudo eliminar los datos de la Materia, Por Favor comuniquese con el Administrador";
        $_SESSION['icono'] = "error";
        header('Location:' . APP_URL . "/admin/materias");
    }
} catch (Exception $exception) {
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo eliminar en la base de datos, porque este registro existe en otras tablas";
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL . "/admin/materias");
}
