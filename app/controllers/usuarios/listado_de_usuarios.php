<?php

$sql_usuarios = "SELECT * FROM usuarios as usu INNER JOIN roles as rol 
ON rol.id_rol = usu.rol_id WHERE usu.estado = '1'";

$sql_usuarios = $pdo->prepare($sql_usuarios);
$sql_usuarios->execute();
$usuarios = $sql_usuarios->fetchAll(PDO::FETCH_ASSOC);
