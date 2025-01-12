<?php
$sql_materias = "SELECT * FROM materias as mat
INNER JOIN carreras as car ON mat.carrera_id = car.id_carrera
INNER JOIN cuatrimestres as cua ON mat.cuatrimestre_id = cua.id_cuatrimestre

WHERE mat.estado = '1' AND mat.id_materia = '$id_materia'";
$sql_materias = $pdo->prepare($sql_materias);
$sql_materias->execute();
$materias = $sql_materias->fetchAll(PDO::FETCH_ASSOC);

foreach ($materias as $materia) {
    $carrera_id = $materia['carrera_id'];
    $cuatrimestre_id = $materia['cuatrimestre_id'];

    $nombre_carrera = $materia['nombre_carrera'];
    $nombre_cuatrimestre = $materia['nombre_cuatrimestre'];

    $nombre_materia = $materia['nombre_materia'];

    $fyh_creacion = $materia['fyh_creacion'];
    $estado = $materia['estado'];
}
