<?php

$sql_materias = "SELECT * FROM materias as mat
                INNER JOIN carreras as car ON mat.carrera_id = car.id_carrera
                INNER JOIN cuatrimestres as cua ON mat.cuatrimestre_id = cua.id_cuatrimestre

                WHERE mat.estado = '1'";                                      //para llamara las tablas relacionales
$sql_materias = $pdo->prepare($sql_materias);
$sql_materias->execute();
$materias = $sql_materias->fetchAll(PDO::FETCH_ASSOC);
