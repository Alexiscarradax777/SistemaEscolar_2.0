<?php
include('../../../app/config.php');

$id_grado = $_POST['id_grado'];
$nivel_id = $_POST['nivel_id'];



$curso = $_POST['curso'];
$grupo = $_POST['grupo'];

$sentencia = $pdo->prepare('UPDATE grados
SET 
nivel_id=:nivel_id,
curso=:curso,
grupo=:grupo,
fyh_actualizacion=:fyh_actualizacion
WHERE id_grado=:id_grado');

$sentencia->bindParam(':nivel_id', $nivel_id);
$sentencia->bindParam(':curso', $curso);
$sentencia->bindParam(':grupo', $grupo);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam('id_grado', $id_grado);


if ($sentencia->execute()) {
    //echo 'success';
    session_start();
    $_SESSION['mensaje'] = "Se Actualizo el Grado correctamente";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . "/admin/grados");
    //header('Location:' .$URL.'/');
} else {
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo Actualizar el Grado";
    $_SESSION['icono'] = "error";
?><script>
        window.history.back();
    </script> <?php
            }
