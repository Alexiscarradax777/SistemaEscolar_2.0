<?php
include('../../../app/config.php');

$id_asignacion = $_POST['id_asignacion'];



$sentencia = $pdo->prepare("DELETE FROM asignaciones WHERE id_asignacion = :id_asignacion");

$sentencia->bindParam('id_asignacion', $id_asignacion);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se elimino los datos de la Asignacion Correctamente";
    $_SESSION['icono'] = "success";
?><script>
        window.history.back();
    </script> <?php

            } else {
                session_start();
                $_SESSION['mensaje'] = "Error no se pudo eliminar los datos de la Asignacion, Por Favor comuniquese con el Administrador";
                $_SESSION['icono'] = "error";
                ?><script>
        window.history.back();
    </script> <?php
            }
