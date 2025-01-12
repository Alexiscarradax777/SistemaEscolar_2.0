<?php
include('../../../app/config.php');


$id_grupo = $_POST['id_grupo'];
$nombre_grupo = $_POST['nombre_grupo'];


$sentencia = $pdo->prepare('UPDATE grupos
 SET nombre_grupo=:nombre_grupo, 
 fyh_actualizacion=:fyh_actualizacion
 WHERE id_grupo=:id_grupo');

$sentencia->bindParam(':nombre_grupo', $nombre_grupo);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam(':id_grupo', $id_grupo);


if ($sentencia->execute()) {
    //echo 'success';
    session_start();
    $_SESSION['mensaje'] = "Se Actualizo el Grupo correctamente";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . "/admin/grupos");
    //header('Location:' .$URL.'/');
} else {
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo actualizar el Grupo";
    $_SESSION['icono'] = "error";
?><script>
        window.history.back();
    </script> <?php
            }
