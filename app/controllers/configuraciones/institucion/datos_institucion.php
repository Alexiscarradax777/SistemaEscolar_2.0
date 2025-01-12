<?php


$sql_instituciones = "SELECT * FROM configuraciones_instituciones  WHERE id_config_institucion = '$id_config_institucion' and estado = '1'";
$query_instituciones = $pdo->prepare($sql_instituciones);
$query_instituciones->execute();
$instituciones = $query_instituciones->fetchAll(PDO::FETCH_ASSOC);

foreach ($instituciones as $institucione) {
    $nombre_institucion = $institucione['nombre_institucion'];
    $direccion = $institucione['direccion'];
    $telefono = $institucione['telefono'];                        // Actualiza los valores de las variables con los valores de la base de datos
    $celular = $institucione['celular'];                          // Lo encontramos en el create, copiamos y pegamos y cambiamos el Post a instituciones 
    $correo = $institucione['correo'];
    $logo = $institucione['logo'];
}
