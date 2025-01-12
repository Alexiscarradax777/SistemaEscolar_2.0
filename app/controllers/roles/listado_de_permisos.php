<?php

$sql_permisos = "SELECT * FROM permisos WHERE estado = '1'ORDER BY nombre_url asc";
$sql_permisos = $pdo->prepare($sql_permisos);
$sql_permisos->execute();
$permisos = $sql_permisos->fetchAll(PDO::FETCH_ASSOC);
