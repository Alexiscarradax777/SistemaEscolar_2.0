<?php

$sql_carreras = "SELECT * FROM carreras WHERE estado = '1'"; //para llamara las tablas relacionales
$sql_carreras = $pdo->prepare($sql_carreras);
$sql_carreras->execute();
$carreras = $sql_carreras->fetchAll(PDO::FETCH_ASSOC);
