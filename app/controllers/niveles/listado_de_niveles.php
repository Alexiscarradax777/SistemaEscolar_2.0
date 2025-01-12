<?php

$sql_niveles = "SELECT * FROM niveles as niv INNER JOIN gestiones as ges ON niv.gestion_id = ges.id_gestion WHERE niv.estado = '1'";
$sql_niveles = $pdo->prepare($sql_niveles);
$sql_niveles->execute();
$niveles = $sql_niveles->fetchAll(PDO::FETCH_ASSOC);
