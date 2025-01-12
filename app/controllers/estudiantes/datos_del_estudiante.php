<?php

$sql_estudiantes = "SELECT *,  est.nivel_id as nivel_id FROM usuarios as usu 
INNER JOIN roles as rol ON rol.id_rol = usu.rol_id 
INNER JOIN personas as per ON per.usuario_id = usu.id_usuario
INNER JOIN estudiantes as est ON est.persona_id = per.id_persona
INNER JOIN niveles as niv ON niv.id_nivel = est.nivel_id 
INNER JOIN grados as gra ON gra.id_grado = est.grado_id 

INNER JOIN ppffs as ppf ON ppf.estudiante_id = est.id_estudiante




where est.estado = '1' and est.id_estudiante = '$id_estudiante'";

$sql_estudiantes = $pdo->prepare($sql_estudiantes);
$sql_estudiantes->execute();
$estudiantes = $sql_estudiantes->fetchAll(PDO::FETCH_ASSOC);

foreach ($estudiantes as $estudiante) {

    $id_usuario = $estudiante['id_usuario'];
    $id_persona = $estudiante['id_persona'];
    $id_estudiante = $estudiante['id_estudiante'];
    $id_ppffs = $estudiante['id_ppffs'];

    $rol_id = $estudiante['rol_id'];
    $nombre_rol = $estudiante['nombre_rol'];
    $nombres = $estudiante['nombres'];
    $apellidos = $estudiante['apellidos'];
    $ci = $estudiante['ci'];
    $fecha_nacimiento = $estudiante['fecha_nacimiento'];
    $celular = $estudiante['celular'];
    $email = $estudiante['email'];
    $direccion = $estudiante['direccion'];

    $nivel_id = $estudiante['nivel_id'];
    $nivel = $estudiante['nivel'];
    $num_control = $estudiante['num_control'];

    $grado_id = $estudiante['grado_id'];
    $grupo = $estudiante['grupo'];


    $turno = $estudiante['turno'];
    $sistema = $estudiante['sistema'];
    $meses = $estudiante['meses'];
    $anio = $estudiante['anio'];
    $curso = $estudiante['curso'];





    //$cuatrimestre_id = $estudiante['cuatrimestre_id'];
    //$nombre_cuatrimestre = $estudiante['nombre_cuatrimestre'];




    $num_control = $estudiante['num_control'];

    $nombre_apellidos_ppff = $estudiante['nombre_apellidos_ppff'];
    $ci_ppff = $estudiante['ci_ppff'];
    $celular_ppff = $estudiante['celular_ppff'];
    $ocupacion_ppff = $estudiante['ocupacion_ppff'];
    $ref_nombre = $estudiante['ref_nombre'];
    $ref_parentesco = $estudiante['ref_parentesco'];
    $ref_celular = $estudiante['ref_celular'];
    $fyh_creacion = $estudiante['fyh_creacion'];
    $estado = $estudiante['estado'];
}
