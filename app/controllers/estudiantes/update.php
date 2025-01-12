<?php

include('../../../app/config.php');
$id_estudiante = $_POST['id_estudiante'];
$rol_id = $_POST['rol_id'];
$id_usuario = $_POST['id_usuario'];
$id_persona = $_POST['id_persona'];

$id_ppffs = $_POST['id_ppffs'];

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

$sentencia = $pdo->prepare('UPDATE usuarios 
SET rol_id=:rol_id,
email=:email,
password=:password,
fyh_actualizacion=:fyh_actualizacion,
estado=:estado
WHERE id_usuario=:id_usuario');

$sentencia->bindParam(':rol_id', $rol_id);
$sentencia->bindParam(':email', $email);
$sentencia->bindParam(':password', $password);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam('estado', $estado_de_registro);
$sentencia->bindParam(':id_usuario', $id_usuario);
$sentencia->execute();




////// Insertar a la tabla personas


$sentencia = $pdo->prepare('UPDATE personas
SET nombres=:nombres,
apellidos=:apellidos,
ci=:ci,
fecha_nacimiento=:fecha_nacimiento,
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


////////// Hacemos la consulta para insertar la tabla Estudiantes

$sentencia = $pdo->prepare('UPDATE estudiantes
SET nivel_id=:nivel_id,
grado_id=:grado_id,
num_control=:num_control,
meses=:meses,
anio=:anio,

fyh_actualizacion=:fyh_actualizacion

WHERE id_estudiante=:id_estudiante');

$sentencia->bindParam(':nivel_id', $nivel_id);
$sentencia->bindParam(':grado_id', $grado_id);
$sentencia->bindParam(':num_control', $num_control);
$sentencia->bindParam(':meses', $meses);
$sentencia->bindParam(':anio', $anio);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam('id_estudiante', $id_estudiante);

$sentencia->execute();

////////// Hacemos la consulta para insertar la tabla PPFFS

$sentencia = $pdo->prepare('UPDATE ppffs
SET nombre_apellidos_ppff=:nombre_apellidos_ppff,
ci_ppff=:ci_ppff,
celular_ppff=:celular_ppff,
ocupacion_ppff=:ocupacion_ppff,
ref_nombre=:ref_nombre,
ref_parentesco=:ref_parentesco,
ref_celular=:ref_celular,
fyh_actualizacion=:fyh_actualizacion
 WHERE id_ppffs=:id_ppffs');



$sentencia->bindParam(':nombre_apellidos_ppff', $nombre_apellidos_ppff);
$sentencia->bindParam(':ci_ppff', $ci_ppff);
$sentencia->bindParam(':celular_ppff', $celular_ppff);
$sentencia->bindParam(':ocupacion_ppff', $ocupacion_ppff);
$sentencia->bindParam(':ref_nombre', $ref_nombre);
$sentencia->bindParam(':ref_parentesco', $ref_parentesco);
$sentencia->bindParam(':ref_celular', $ref_celular);

$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam('id_ppffs', $id_ppffs);




if ($sentencia->execute()) {
    echo 'success';
    $pdo->commit();
    session_start();
    $_SESSION['mensaje'] = "Se Actualizo el Estudiante correctamente";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . "/admin/estudiantes");

    //header('Location:' .$URL.'/');
} else {
    echo 'error al registrar a la base de datos';
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo Actualizar el Estudiante";
    $_SESSION['icono'] = "error";
?><script>
        window.history.back();
    </script> <?php
            }
