
<?php

$sql_docentes = "SELECT * FROM usuarios as usu INNER JOIN roles as rol 
ON rol.id_rol = usu.rol_id INNER JOIN personas as per ON per.usuario_id = usu.id_usuario
INNER JOIN docentes as doc ON doc.persona_id = per.id_persona 
where doc.estado = '1' and doc.id_docente = '$id_docente'";

$sql_docentes = $pdo->prepare($sql_docentes);
$sql_docentes->execute();
$docentes = $sql_docentes->fetchAll(PDO::FETCH_ASSOC);

foreach ($docentes as $docente) {
    $id_docente = $docente['id_docente'];
    $id_usuario = $docente['id_usuario'];
    $id_persona = $docente['id_persona'];

    $nombre_rol = $docente['nombre_rol'];
    $nombres = $docente['nombres'];
    $apellidos = $docente['apellidos'];
    $ci = $docente['ci'];
    $fecha_nacimiento = $docente['fecha_nacimiento'];
    $celular = $docente['celular'];
    $profesion = $docente['profesion'];
    $especialidad = $docente['especialidad'];
    $antiguedad = $docente['antiguedad'];
    $email = $docente['email'];
    $direccion = $docente['direccion'];
    $fyh_creacion = $docente['fyh_creacion'];
    $estado = $docente['estado'];
}
