<?php

$sql_cuatrimestres = "SELECT * FROM cuatrimestres WHERE estado = '1'"; //para llamara las tablas relacionales
$sql_cuatrimestres = $pdo->prepare($sql_cuatrimestres);
$sql_cuatrimestres->execute();
$cuatrimestres = $sql_cuatrimestres->fetchAll(PDO::FETCH_ASSOC);
