<?php
include('../../../app/config.php');

$nombre_carrera = $_POST['nombre_carrera'];


$sentencia = $pdo->prepare('INSERT INTO carreras
(nombre_carrera, fyh_creacion, estado)
VALUES (:nombre_carrera,:fyh_creacion,:estado)');

$sentencia->bindParam(':nombre_carrera', $nombre_carrera);
$sentencia->bindParam('fyh_creacion', $fechaHora);
$sentencia->bindParam('estado', $estado_de_registro);

if ($sentencia->execute()) {
    //echo 'success';
    session_start();
    $_SESSION['mensaje'] = "Se regitro la Carrera correctamente";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . "/admin/carreras");
    //header('Location:' .$URL.'/');
} else {
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar la carrera";
    $_SESSION['icono'] = "error";
?><script>
        window.history.back();
    </script> <?php
            }
