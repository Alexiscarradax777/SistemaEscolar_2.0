<?php
include('../../../app/config.php');


$id_materia = $_POST['id_materia'];

$carrera_id = $_POST['carrera_id'];
$cuatrimestre_id = $_POST['cuatrimestre_id'];
$nombre_materia = $_POST['nombre_materia'];




$sentencia = $pdo->prepare('UPDATE materias
 SET 
 carrera_id=:carrera_id, 
 cuatrimestre_id=:cuatrimestre_id, 
 nombre_materia=:nombre_materia, 
 fyh_actualizacion=:fyh_actualizacion
 WHERE id_materia=:id_materia');

$sentencia->bindParam(':carrera_id', $carrera_id);
$sentencia->bindParam(':cuatrimestre_id', $cuatrimestre_id);
$sentencia->bindParam(':nombre_materia', $nombre_materia);

$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam(':id_materia', $id_materia);


if ($sentencia->execute()) {
    //echo 'success';
    session_start();
    $_SESSION['mensaje'] = "Se Actualizo la Materia correctamente";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . "/admin/materias");
    //header('Location:' .$URL.'/');
} else {
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo actualizar la Materia";
    $_SESSION['icono'] = "error";
?><script>
        window.history.back();
    </script> <?php
            }
