<?php

include('../../../app/config.php');

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

/// Insertar en la Tabla usuarios

$password = password_hash($ci, PASSWORD_DEFAULT); // Forma de encriptar contraseña

$sentencia = $pdo->prepare('INSERT INTO usuarios (rol_id,email,password, fyh_creacion, estado)
VALUES (:rol_id,:email,:password,:fyh_creacion,:estado)');

$sentencia->bindParam(':rol_id', $rol_id);
$sentencia->bindParam(':email', $email);
$sentencia->bindParam(':password', $password);
$sentencia->bindParam('fyh_creacion', $fechaHora);
$sentencia->bindParam('estado', $estado_de_registro);

$sentencia->execute();

$id_usuario = $pdo->lastInsertId(); /// Obtener el id del ultimo reg


////// Insertar a la tabla personas


$sentencia = $pdo->prepare('INSERT INTO personas
(usuario_id,nombres,apellidos,ci,fecha_nacimiento,profesion,direccion,celular, fyh_creacion, estado)
VALUES ( :usuario_id,:nombres,:apellidos,:ci,:fecha_nacimiento,:profesion,:direccion,:celular,:fyh_creacion,:estado)');

$sentencia->bindParam(':usuario_id', $id_usuario);
$sentencia->bindParam(':nombres', $nombres);
$sentencia->bindParam(':apellidos', $apellidos);
$sentencia->bindParam(':ci', $ci);
$sentencia->bindParam(':fecha_nacimiento', $fecha_nacimiento);
$sentencia->bindParam(':profesion', $profesion);
$sentencia->bindParam(':direccion', $direccion);
$sentencia->bindParam(':celular', $celular);
$sentencia->bindParam('fyh_creacion', $fechaHora);
$sentencia->bindParam('estado', $estado_de_registro);

$sentencia->execute();
$id_persona = $pdo->lastInsertId(); /// Obtener el id del ultimo reg

////////// Hacemos la consulta para insertar la tabla Docentes

$sentencia = $pdo->prepare('INSERT INTO docentes
(persona_id,especialidad,antiguedad, fyh_creacion, estado)
VALUES (:persona_id,:especialidad,:antiguedad,:fyh_creacion,:estado)');

$sentencia->bindParam(':persona_id', $id_persona);
$sentencia->bindParam(':especialidad', $especialidad);
$sentencia->bindParam(':antiguedad', $antiguedad);
$sentencia->bindParam('fyh_creacion', $fechaHora);
$sentencia->bindParam('estado', $estado_de_registro);



if ($sentencia->execute()) {
    echo 'success';
    $pdo->commit();
    session_start();
    $_SESSION['mensaje'] = "Se regitro el Docente correctamente";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . "/admin/docentes");

    //header('Location:' .$URL.'/');
} else {
    echo 'error al registrar a la base de datos';
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar el Docente";
    $_SESSION['icono'] = "error";
?><script>
        window.history.back();
    </script> <?php
            }
