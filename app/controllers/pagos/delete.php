<?php
include('../../../app/config.php');

$id_pago = $_POST['id_pago'];



$sentencia = $pdo->prepare("DELETE FROM pagos WHERE id_pago = :id_pago");

$sentencia->bindParam('id_pago', $id_pago);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se elimino los datos del Pago Correctamente";
    $_SESSION['icono'] = "success";
?><script>
        window.history.back();
    </script> <?php
            } else {
                session_start();
                $_SESSION['mensaje'] = "Error no se pudo eliminar los datos del Pago, Por Favor comuniquese con el Administrador";
                $_SESSION['icono'] = "error";
                ?><script>
        window.history.back();
    </script> <?php
            }
