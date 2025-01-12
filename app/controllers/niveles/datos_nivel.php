<?php

$sql_niveles = "SELECT * FROM niveles as niv INNER JOIN gestiones as ges 
ON niv.gestion_id = ges.id_gestion WHERE niv.estado = '1' and niv.id_nivel = '$id_nivel'";
$sql_niveles = $pdo->prepare($sql_niveles);
$sql_niveles->execute();
$niveles = $sql_niveles->fetchAll(PDO::FETCH_ASSOC);

foreach ($niveles as $nivele) {
    $gestion_id = $nivele['gestion_id'];
    $gestion = $nivele['gestion'];
    $nivel = $nivele['nivel'];
    $turno = $nivele['turno'];
    $sistema = $nivele['sistema'];
    $fyh_creacion = $nivele['fyh_creacion'];
    $estado = $nivele['estado'];
}
