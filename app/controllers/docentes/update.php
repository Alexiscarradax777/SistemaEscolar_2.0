<?php

include('../../../app/config.php');

$id_docente = $_POST['id_docente'];
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
$especialidad = $_POST['especialidad'];
$antiguedad = $_POST['antiguedad'];




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

////////// Actualizar la tabla Docentes

$sentencia = $pdo->prepare('UPDATE docentes
SET especialidad=:especialidad,
antiguedad=:antiguedad,
fyh_actualizacion=:fyh_actualizacion
WHERE id_docente=:id_docente');

$sentencia->bindParam(':especialidad', $especialidad);
$sentencia->bindParam(':antiguedad', $antiguedad);
$sentencia->bindParam(':id_docente', $id_docente);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);



if ($sentencia->execute()) {
    echo 'success';
    $pdo->commit();
    session_start();
    $_SESSION['mensaje'] = "Se Actualizo los datos de el Docente correctamente";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . "/admin/docentes");

    //header('Location:' .$URL.'/');
} else {
    echo 'error al registrar a la base de datos';
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar los datos de el Docente";
    $_SESSION['icono'] = "error";
?><script>
        window.history.back();
    </script> <?php
            }
