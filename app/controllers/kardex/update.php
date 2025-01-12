<?php
include('../../../app/config.php');

$id_kardex = $_POST['id_kardex'];
$docente_id = $_POST['docente_id'];
$estudiante_id = $_POST['estudiante_id'];
$fecha = $_POST['fecha'];
$materia_id = $_POST['materia_id'];
$observacion = $_POST['observacion'];
$nota = $_POST['nota'];


$sentencia = $pdo->prepare('UPDATE kardexs
SET 
docente_id=:docente_id,
estudiante_id=:estudiante_id,
materia_id=:materia_id,
fecha=:fecha,
observacion=:observacion,
nota=:nota,
fyh_actualizacion=:fyh_actualizacion
WHERE id_kardex=:id_kardex');

$sentencia->bindParam(':docente_id', $docente_id);
$sentencia->bindParam(':estudiante_id', $estudiante_id);
$sentencia->bindParam(':materia_id', $materia_id);
$sentencia->bindParam(':fecha', $fecha);
$sentencia->bindParam(':observacion', $observacion);
$sentencia->bindParam(':nota', $nota);


$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam('id_kardex', $id_kardex);


if ($sentencia->execute()) {
    //echo 'success';
    session_start();
    $_SESSION['mensaje'] = "Se Actualizo el Reporte de Kardex correctamente";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . "/admin/kardex");
    //header('Location:' .$URL.'/');
} else {
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo Actualizar el Reporte de Kardex";
    $_SESSION['icono'] = "error";
?><script>
        window.history.back();
    </script> <?php
            }