<?php

$sql_docentes = "SELECT * FROM usuarios as usu INNER JOIN roles as rol ON rol.id_rol = usu.rol_id 
INNER JOIN personas as per ON per.usuario_id = usu.id_usuario
INNER JOIN docentes as doc ON doc.persona_id = per.id_persona where doc.estado = '1'";

$sql_docentes = $pdo->prepare($sql_docentes);
$sql_docentes->execute();
$docentes = $sql_docentes->fetchAll(PDO::FETCH_ASSOC);
