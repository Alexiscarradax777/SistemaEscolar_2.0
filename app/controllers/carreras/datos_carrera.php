<?php
$sql_carreras = "SELECT * FROM carreras WHERE estado = '1' and id_carrera= '$id_carrera' ";
$sql_carreras = $pdo->prepare($sql_carreras);
$sql_carreras->execute();
$carreras = $sql_carreras->fetchAll(PDO::FETCH_ASSOC);

foreach ($carreras as $carrera) {
    $nombre_carrera = $carrera['nombre_carrera'];
    $fyh_creacion = $carrera['fyh_creacion'];
    $estado = $carrera['estado'];
}
