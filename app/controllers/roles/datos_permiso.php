<?php

$sql_permisos = "SELECT * FROM permisos WHERE estado = '1' AND id_permiso = '$id_permiso'";
$sql_permisos = $pdo->prepare($sql_permisos);
$sql_permisos->execute();
$permisos = $sql_permisos->fetchAll(PDO::FETCH_ASSOC);

foreach ($permisos as $permiso) {
    $nombre_url = $permiso['nombre_url'];
    $url = $permiso['url'];
}
