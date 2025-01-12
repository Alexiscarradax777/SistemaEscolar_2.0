<?php

include('../../../app/config.php');

$rol_id = $_POST['rol_id'];

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$ci = $_POST['ci'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$celular = $_POST['celular'];
$email = $_POST['email'];
$direccion = $_POST['direccion'];

$nivel_id = $_POST['nivel_id'];
$grado_id = $_POST['grado_id'];
$num_control = $_POST['num_control'];
$meses = $_POST['meses'];
$anio = $_POST['anio'];


$nombre_apellidos_ppff = $_POST['nombre_apellidos_ppff'];
$ci_ppff = $_POST['ci_ppff'];
$celular_ppff = $_POST['celular_ppff'];
$ocupacion_ppff = $_POST['ocupacion_ppff'];
$ref_nombre = $_POST['ref_nombre'];
$ref_parentesco = $_POST['ref_parentesco'];
$ref_celular = $_POST['ref_celular'];

$profesion = 'ESTUDIANTE';



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


////// Insertar a la tabla Personas


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

////////// Hacemos la consulta para insertar la tabla Estudiantes

$sentencia = $pdo->prepare('INSERT INTO estudiantes
(persona_id, nivel_id,grado_id,num_control,meses,anio,fyh_creacion, estado)
VALUES (:persona_id, :nivel_id,:grado_id,:num_control,:meses,:anio,:fyh_creacion,:estado)');

$sentencia->bindParam(':persona_id', $id_persona);
$sentencia->bindParam(':nivel_id', $nivel_id);
$sentencia->bindParam(':grado_id', $grado_id);

$sentencia->bindParam(':num_control', $num_control);
$sentencia->bindParam(':meses', $meses);
$sentencia->bindParam(':anio', $anio);
$sentencia->bindParam('fyh_creacion', $fechaHora);
$sentencia->bindParam('estado', $estado_de_registro);
$sentencia->execute();
$id_estudiante = $pdo->lastInsertId();

////////// Hacemos la consulta para insertar la tabla PPFFS

$sentencia = $pdo->prepare('INSERT INTO ppffs
(estudiante_id,nombre_apellidos_ppff, ci_ppff,celular_ppff,ocupacion_ppff,ref_nombre,ref_parentesco,ref_celular,fyh_creacion,estado)
VALUES (:estudiante_id,:nombre_apellidos_ppff,:ci_ppff,:celular_ppff,:ocupacion_ppff,:ref_nombre,:ref_parentesco,:ref_celular,:fyh_creacion,:estado)');

$sentencia->bindParam(':estudiante_id', $id_estudiante);
$sentencia->bindParam(':nombre_apellidos_ppff', $nombre_apellidos_ppff);
$sentencia->bindParam(':ci_ppff', $ci_ppff);
$sentencia->bindParam(':celular_ppff', $celular_ppff);
$sentencia->bindParam(':ocupacion_ppff', $ocupacion_ppff);
$sentencia->bindParam(':ref_nombre', $ref_nombre);
$sentencia->bindParam(':ref_parentesco', $ref_parentesco);
$sentencia->bindParam(':ref_celular', $ref_celular);

$sentencia->bindParam('fyh_creacion', $fechaHora);
$sentencia->bindParam('estado', $estado_de_registro);



if ($sentencia->execute()) {
    echo 'success';
    $pdo->commit();
    session_start();
    $_SESSION['mensaje'] = "Se regitro el Estudiante correctamente";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . "/admin/estudiantes");

    //header('Location:' .$URL.'/');
} else {
    echo 'error al registrar a la base de datos';
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar el Estudiante";
    $_SESSION['icono'] = "error";
?><script>
        window.history.back();
    </script> <?php
            }
