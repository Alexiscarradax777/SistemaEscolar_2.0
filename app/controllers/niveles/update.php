<?php

include('../../../app/config.php');

$id_nivel = $_POST['id_nivel'];

$gestion_id = $_POST['gestion_id'];
$nivel = $_POST['nivel'];
$turno = $_POST['turno'];
$sistema = $_POST['sistema'];

$sentencia = $pdo->prepare('UPDATE niveles
SET 
gestion_id=:gestion_id,
nivel=:nivel,
turno=:turno, 
sistema=:sistema, 
fyh_actualizacion=:fyh_actualizacion
WHERE id_nivel=:id_nivel');

$sentencia->bindParam(':gestion_id', $gestion_id);
$sentencia->bindParam(':nivel', $nivel);
$sentencia->bindParam(':turno', $turno);
$sentencia->bindParam(':sistema', $sistema);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam('id_nivel', $id_nivel);

if ($sentencia->execute()) {
    //echo 'success';
    session_start();
    $_SESSION['mensaje'] = "Se Actualizo el Nivel correctamente";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . "/admin/niveles");
    //header('Location:' .$URL.'/');
} else {
    //echo 'error al registrar a la base de datos';
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo Actualizar el Nivel";
    $_SESSION['icono'] = "error";
?><script>
        window.history.back();
    </script> <?php
            }
