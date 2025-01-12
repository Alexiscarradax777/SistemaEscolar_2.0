<?php

$sql_roles = "SELECT * FROM roles WHERE estado = '1'";
$sql_roles = $pdo->prepare($sql_roles);
$sql_roles->execute();
$roles = $sql_roles->fetchAll(PDO::FETCH_ASSOC);
