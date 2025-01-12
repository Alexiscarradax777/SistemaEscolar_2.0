<?php

$sql_instituciones = "SELECT * FROM configuraciones_instituciones WHERE estado = '1'";
$sql_instituciones = $pdo->prepare($sql_instituciones);
$sql_instituciones->execute();
$instituciones = $sql_instituciones->fetchAll(PDO::FETCH_ASSOC);
