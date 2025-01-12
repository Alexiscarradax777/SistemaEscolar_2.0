<?php

// el update de aqui sera igual al create de aqui 

include('../../../../app/config.php');


$logo = $_POST['logo'];
$nombre_institucion = $_POST['nombre_institucion'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$celular = $_POST['celular'];
$correo = $_POST['correo'];
$id_config_institucion = $_POST['id_config_institucion']; // id del formulario en el archivo edit.php

// Los if son para preguntar 


if ($_FILES['file']['name'] != null) {
    //print "existe una imagen";
    $nombre_del_archivo = date('Y-m-d-H-i-s') . $_FILES['file']['name'];
    $location = "../../../../public/images/configuracion/" . $nombre_del_archivo;
    move_uploaded_file($_FILES['file']['tmp_name'], $location); // mover o subir el archivo
    $logo = $nombre_del_archivo;
} else {
    //print "no existe una imagen";
    if ($logo == "") {     // se pregunta si logo es igual a vacio
        $logo = "";        // que se guarde vacio
    } else {                // pero si viene con imagen(datos) se guarde esa misma variable
        $logo = $_POST['logo'];
    }
}

$sentencia = $pdo->prepare('UPDATE configuraciones_instituciones
 SET nombre_institucion=:nombre_institucion,logo=:logo,direccion=:direccion,telefono=:telefono,celular=:celular,correo=:correo,
 fyh_actualizacion=:fyh_actualizacion WHERE id_config_institucion = :id_config_institucion');

$sentencia->bindParam(':nombre_institucion', $nombre_institucion);
$sentencia->bindParam(':logo', $logo);
$sentencia->bindParam(':direccion', $direccion);
$sentencia->bindParam(':telefono', $telefono);
$sentencia->bindParam(':celular', $celular);
$sentencia->bindParam(':correo', $correo);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam(':id_config_institucion', $id_config_institucion);

if ($sentencia->execute()) {
    //echo 'success';
    //header('Location:' .$URL.'/');
    session_start();
    $_SESSION['mensaje'] = "Se Actualizo los datos de la institucion correctamente";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . "/admin/configuraciones/institucion");
} else {
    //echo 'error al registrar a la base de datos';
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar";
    $_SESSION['icono'] = "error";
?><script>
        window.history.back();
    </script> <?php
            }
