<?php
include('../../../app/config.php');

$id_kardex = $_POST['id_kardex'];



$sentencia = $pdo->prepare("DELETE FROM kardexs WHERE id_kardex = :id_kardex");

$sentencia->bindParam('id_kardex', $id_kardex);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se elimino el Reporte de Kardex Correctamente";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . "/admin/kardex");
} else {
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo eliminar el Reporte de Kardex, Por Favor comuniquese con el Administrador";
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL . "/admin/kardex");
}
