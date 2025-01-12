<?php

$sql_administrativos = "SELECT * FROM usuarios as usu INNER JOIN roles as rol 
ON rol.id_rol = usu.rol_id INNER JOIN personas as per ON per.usuario_id = usu.id_usuario
INNER JOIN administrativos as adm ON adm.persona_id = per.id_persona where adm.estado = '1'";

$sql_administrativos = $pdo->prepare($sql_administrativos);
$sql_administrativos->execute();
$administrativos = $sql_administrativos->fetchAll(PDO::FETCH_ASSOC);
