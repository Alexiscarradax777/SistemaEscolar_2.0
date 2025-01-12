<?php
include('../../../app/config.php');

$nombre_grupo = $_POST['nombre_grupo'];


$sentencia = $pdo->prepare('INSERT INTO grupos
(nombre_grupo, fyh_creacion, estado)
VALUES (:nombre_grupo,:fyh_creacion,:estado)');

$sentencia->bindParam(':nombre_grupo', $nombre_grupo);
$sentencia->bindParam('fyh_creacion', $fechaHora);
$sentencia->bindParam('estado', $estado_de_registro);

if ($sentencia->execute()) {
    //echo 'success';
    session_start();
    $_SESSION['mensaje'] = "Se regitro el grupo correctamente";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . "/admin/grupos");
    //header('Location:' .$URL.'/');
} else {
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar el grupo";
    $_SESSION['icono'] = "error";
?><script>
        window.history.back();
    </script> <?php
            }
