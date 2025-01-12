<?php

$sql_gestiones = "SELECT * FROM gestiones ";
$sql_gestiones = $pdo->prepare($sql_gestiones);
$sql_gestiones->execute();
$gestiones = $sql_gestiones->fetchAll(PDO::FETCH_ASSOC);
