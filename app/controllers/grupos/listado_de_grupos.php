<?php

$sql_grupos = "SELECT * FROM grupos WHERE estado = '1'"; //para llamara las tablas relacionales
$sql_grupos = $pdo->prepare($sql_grupos);
$sql_grupos->execute();
$grupos = $sql_grupos->fetchAll(PDO::FETCH_ASSOC);
