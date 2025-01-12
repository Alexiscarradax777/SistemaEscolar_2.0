<?php
$sql_grupos = "SELECT * FROM grupos WHERE estado = '1' and id_grupo= '$id_grupo' ";
$sql_grupos = $pdo->prepare($sql_grupos);
$sql_grupos->execute();
$grupos = $sql_grupos->fetchAll(PDO::FETCH_ASSOC);

foreach ($grupos as $grupo) {
    $nombre_grupo = $grupo['nombre_grupo'];
    $fyh_creacion = $grupo['fyh_creacion'];
    $estado = $grupo['estado'];
}
