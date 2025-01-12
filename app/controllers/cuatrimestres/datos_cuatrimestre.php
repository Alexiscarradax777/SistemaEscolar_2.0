<?php
$sql_cuatrimestres = "SELECT * FROM cuatrimestres WHERE estado = '1' and id_cuatrimestre= '$id_cuatrimestre' ";
$sql_cuatrimestres = $pdo->prepare($sql_cuatrimestres);
$sql_cuatrimestres->execute();
$cuatrimestres = $sql_cuatrimestres->fetchAll(PDO::FETCH_ASSOC);

foreach ($cuatrimestres as $cuatrimestre) {
    $nombre_cuatrimestre = $cuatrimestre['nombre_cuatrimestre'];
    $fyh_creacion = $cuatrimestre['fyh_creacion'];
    $estado = $cuatrimestre['estado'];
}
