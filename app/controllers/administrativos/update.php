<?php

include('../../../app/config.php');

$id_administrativo = $_POST['id_administrativo'];
$id_usuario = $_POST['id_usuario'];
$id_persona = $_POST['id_persona'];



$rol_id = $_POST['rol_id'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$ci = $_POST['ci'];
$email = $_POST['email'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$profesion = $_POST['profesion'];
$direccion = $_POST['direccion'];
$celular = $_POST['celular'];



$pdo->beginTransaction();

//// Actualizar en la Tabla usuarios

$password = password_hash($ci, PASSWORD_DEFAULT); // Forma de encriptar contraseña

$sentencia = $pdo->prepare('UPDATE usuarios 
SET rol_id=:rol_id, email=:email, password=:password, fyh_actualizacion=:fyh_actualizacion
WHERE id_usuario=:id_usuario');

$sentencia->bindParam(':rol_id', $rol_id);
$sentencia->bindParam(':email', $email);
$sentencia->bindParam(':password', $password);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam(':id_usuario', $id_usuario);

$sentencia->execute();



////// Actualizar a la tabla personas


$sentencia = $pdo->prepare('UPDATE personas
SET nombres=:nombres, apellidos=:apellidos, 
ci=:ci, fecha_nacimiento=:fecha_nacimiento, 
profesion=:profesion, 
direccion=:direccion, 
celular=:celular,
fyh_actualizacion=:fyh_actualizacion
WHERE id_persona=:id_persona');

$sentencia->bindParam(':nombres', $nombres);
$sentencia->bindParam(':apellidos', $apellidos);
$sentencia->bindParam(':ci', $ci);
$sentencia->bindParam(':fecha_nacimiento', $fecha_nacimiento);
$sentencia->bindParam(':profesion', $profesion);
$sentencia->bindParam(':direccion', $direccion);
$sentencia->bindParam(':celular', $celular);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam('id_persona', $id_persona);

$sentencia->execute();

////////// Actualizar la tabla Administrativos

$sentencia = $pdo->prepare('UPDATE administrativos
SET fyh_actualizacion=:fyh_actualizacion
WHERE id_administrativo=:id_administrativo');

$sentencia->bindParam(':id_administrativo', $id_administrativo);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);



if ($sentencia->execute()) {
    echo 'success';
    $pdo->commit();
    session_start();
    $_SESSION['mensaje'] = "Se Actualizo los datos de el Administrativo correctamente";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . "/admin/administrativos");

    //header('Location:' .$URL.'/');
} else {
    echo 'error al registrar a la base de datos';
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar los datos de el Administrativo";
    $_SESSION['icono'] = "error";
?><script>
        window.history.back();
    </script> <?php
            }
