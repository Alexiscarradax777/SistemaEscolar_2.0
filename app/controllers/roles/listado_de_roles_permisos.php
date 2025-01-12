<?php

$sql_roles_permisos = "SELECT * FROM roles_permisos as rolper
                       INNER JOIN permisos as per ON per.id_permiso = rolper.permiso_id
                       INNER JOIN roles as rol ON rol.id_rol = rolper.rol_id
                      WHERE rolper.estado = '1'ORDER BY per.nombre_url asc";
$sql_roles_permisos = $pdo->prepare($sql_roles_permisos);
$sql_roles_permisos->execute();
$roles_permisos = $sql_roles_permisos->fetchAll(PDO::FETCH_ASSOC);
