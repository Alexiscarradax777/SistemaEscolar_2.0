<?php

$sql_grados = "SELECT * FROM grados as gra 
INNER JOIN niveles as niv ON gra.nivel_id = niv.id_nivel

WHERE gra.estado = '1'"; //para llamara las tablas relacionales
$sql_grados = $pdo->prepare($sql_grados);
$sql_grados->execute();
$grados = $sql_grados->fetchAll(PDO::FETCH_ASSOC);
