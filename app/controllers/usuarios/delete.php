<?php
include('../../../app/config.php');

$id_usuario = $_POST['id_usuario'];



$sentencia = $pdo->prepare("DELETE FROM usuarios WHERE id_usuario = :id_usuario");

$sentencia->bindParam('id_usuario', $id_usuario);

try {
    if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje'] = "Se elimino el Usuario Correctamente";
        $_SESSION['icono'] = "success";
        header('Location:' . APP_URL . "/admin/usuarios");
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error no se pudo eliminar el Usuario, Por Favor comuniquese con el Administrador";
        $_SESSION['icono'] = "error";
?><script>
            window.history.back();
        </script> <?php
                }
            } catch (Exception $exception) {
                session_start();
                $_SESSION['mensaje'] = "Error no se pudo eliminar en la base de datos, por que este registro esta en otra tablas";
                $_SESSION['icono'] = "error";
                    ?><script>
        window.history.back();
    </script> <?php

            }
