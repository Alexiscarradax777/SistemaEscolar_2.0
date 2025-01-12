<?php

$sql_grados = "SELECT * FROM grados as gra 
INNER JOIN niveles as niv ON gra.nivel_id = niv.id_nivel

WHERE gra.estado = '1' AND id_grado = '$id_grado'"; //para llamara las tablas relacionales
$sql_grados = $pdo->prepare($sql_grados);
$sql_grados->execute();
$grados = $sql_grados->fetchAll(PDO::FETCH_ASSOC);

foreach ($grados as $grado) {
    $id_grado = $grado['id_grado'];
    $nivel_id = $grado['nivel_id'];



    $curso = $grado['curso'];


    $nivel = $grado['nivel'];
    $turno = $grado['turno'];
    $sistema = $grado['sistema'];
    $grupo = $grado['grupo'];


    $fyh_creacion = $grado['fyh_creacion'];
    $estado = $grado['estado'];
}
