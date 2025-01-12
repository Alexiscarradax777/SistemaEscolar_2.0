<?php

$sql_calificaciones = "SELECT * FROM calificaciones as cal
                        INNER JOIN materias as mat ON mat.id_materia = cal.materia_id
                        WHERE  cal.estado = '1'";

$sql_calificaciones = $pdo->prepare($sql_calificaciones);
$sql_calificaciones->execute();
$calificaciones = $sql_calificaciones->fetchAll(PDO::FETCH_ASSOC);
