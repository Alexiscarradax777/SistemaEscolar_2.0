<?php
include('../../../app/config.php');


$id_carrera = $_POST['id_carrera'];
$nombre_carrera = $_POST['nombre_carrera'];


$sentencia = $pdo->prepare('UPDATE carreras
 SET nombre_carrera=:nombre_carrera, 
 fyh_actualizacion=:fyh_actualizacion
 WHERE id_carrera=:id_carrera');

$sentencia->bindParam(':nombre_carrera', $nombre_carrera);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam(':id_carrera', $id_carrera);


if ($sentencia->execute()) {
    //echo 'success';
    session_start();
    $_SESSION['mensaje'] = "Se Actualizo la Carrera correctamente";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . "/admin/carreras");
    //header('Location:' .$URL.'/');
} else {
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo actualizar la Materia";
    $_SESSION['icono'] = "error";
?><script>
        window.history.back();
    </script> <?php
            }
