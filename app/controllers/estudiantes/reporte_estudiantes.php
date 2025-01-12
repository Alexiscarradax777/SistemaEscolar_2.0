<?php

$sql_estudiantes = "SELECT * FROM estudiantes where estado = '1'";
$sql_estudiantes = $pdo->prepare($sql_estudiantes);
$sql_estudiantes->execute();
$reportes_estudiantes = $sql_estudiantes->fetchAll(PDO::FETCH_ASSOC);
