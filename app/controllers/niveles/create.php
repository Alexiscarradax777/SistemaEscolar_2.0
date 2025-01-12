<?php

include('../../../app/config.php');

$gestion_id = $_POST['gestion_id'];
$nivel = $_POST['nivel'];
$turno = $_POST['turno'];
$sistema = $_POST['sistema'];

$sentencia = $pdo->prepare('INSERT INTO niveles
(gestion_id,nivel,turno,sistema, fyh_creacion, estado)
VALUES ( :gestion_id,:nivel,:turno,:sistema,:fyh_creacion,:estado)');

$sentencia->bindParam(':gestion_id', $gestion_id);
$sentencia->bindParam(':nivel', $nivel);
$sentencia->bindParam(':turno', $turno);
$sentencia->bindParam(':sistema', $sistema);
$sentencia->bindParam('fyh_creacion', $fechaHora);
$sentencia->bindParam('estado', $estado_de_registro);

if ($sentencia->execute()) {
    //echo 'success';
    session_start();
    $_SESSION['mensaje'] = "Se regitro el Nivel correctamente";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . "/admin/niveles");
    //header('Location:' .$URL.'/');
} else {
    //echo 'error al registrar a la base de datos';
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar";
    $_SESSION['icono'] = "error";
?><script>
        window.history.back();
    </script> <?php
            }
