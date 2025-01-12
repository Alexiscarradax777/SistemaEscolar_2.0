<?php
include('../../../app/config.php');

$id_rol = $_POST['id_rol'];
$nombre_rol = $_POST['nombre_rol'];
$nombre_rol = mb_strtoupper($nombre_rol, 'UTF-8');  //Convierte a mayúsc


if ($nombre_rol == '') {
    session_start();
    $_SESSION['mensaje'] = "El nombre del rol no puede estar vacio";
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL . "/admin/roles/edit.php?id=" . $id_rol);
} else {
    $sentencia = $pdo->prepare("UPDATE roles SET nombre_rol = :nombre_rol,
     fyh_actualizacion = :fyh_actualizacion WHERE  id_rol=:id_rol");

    $sentencia->bindParam('nombre_rol', $nombre_rol);
    $sentencia->bindParam('fyh_actualizacion', $fechaHora);
    $sentencia->bindParam('id_rol', $id_rol);

    try {


        if ($sentencia->execute()) {
            session_start();
            $_SESSION['mensaje'] = "Se Actualizo el Rol Correctamente";
            $_SESSION['icono'] = "success";
            header('Location:' . APP_URL . "/admin/roles");
        } else {
            session_start();
            $_SESSION['mensaje'] = "Error no se pudo Actualizar el Rol, Por Favor comuniquese con el Administrador";
            $_SESSION['icono'] = "error";
            header('Location:' . APP_URL . "/admin/roles/edit.php?id=" . $id_rol);
        }
    } catch (Exception $exception) {
        session_start();
        $_SESSION['mensaje'] = "Este Rol ya existe, Por Favor ingrese otro";
        $_SESSION['icono'] = "error";
        header('Location:' . APP_URL . "/admin/roles/edit.php?id=" . $id_rol);
        //echo $exception;
    }
}
