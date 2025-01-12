<?php
include('../../../app/config.php');


$id_cuatrimestre = $_POST['id_cuatrimestre'];
$nombre_cuatrimestre = $_POST['nombre_cuatrimestre'];


$sentencia = $pdo->prepare('UPDATE cuatrimestres
 SET nombre_cuatrimestre=:nombre_cuatrimestre, 
 fyh_actualizacion=:fyh_actualizacion
 WHERE id_cuatrimestre=:id_cuatrimestre');

$sentencia->bindParam(':nombre_cuatrimestre', $nombre_cuatrimestre);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam(':id_cuatrimestre', $id_cuatrimestre);


if ($sentencia->execute()) {
    //echo 'success';
    session_start();
    $_SESSION['mensaje'] = "Se Actualizo el Cuatrimestre correctamente";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . "/admin/cuatrimestre");
    //header('Location:' .$URL.'/');
} else {
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo actualizar el Cuatrimestre";
    $_SESSION['icono'] = "error";
?><script>
        window.history.back();
    </script> <?php
            }
