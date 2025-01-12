<?php

$sql_pagos = "SELECT * FROM pagos WHERE estado = '1' AND estudiante_id = '$id_estudiante' ";
$sql_pagos = $pdo->prepare($sql_pagos);
$sql_pagos->execute();
$pagos = $sql_pagos->fetchAll(PDO::FETCH_ASSOC);
