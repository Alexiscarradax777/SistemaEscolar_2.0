<?php
include('../../../app/config.php');


$id_docente = $_GET['id_docente'];
$id_estudiante = $_GET['id_estudiante'];
$id_materia = $_GET['id_materia'];
$nota1 = $_GET['nota1'];
$nota2 = $_GET['nota2'];
$promedio = $_GET['promedio'];


//print "id_docente: " . $id_docente . " id_estudiante: " . $id_estudiante . " id_materia: " . $id_materia . " - " . $nota1 . " -" . $nota2;

/////////// nota 1

$sql = "SELECT * FROM calificaciones WHERE docente_id = $id_docente and estudiante_id = $id_estudiante and materia_id = $id_materia";
$query = $pdo->prepare($sql);
$query->execute();
$notas = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($notas as $nota) {
    $id_calificacion = $nota['id_calificacion'];
}

if ($notas) {
    print "Si existe registro";

    $sentencia = $pdo->prepare('UPDATE calificaciones
    SET nota1=:nota1,nota2=:nota2,promedio=:promedio,fyh_actualizacion=:fyh_actualizacion WHERE id_calificacion=:id_calificacion');

    $sentencia->bindParam(':nota1', $nota1);
    $sentencia->bindParam(':nota2', $nota2);
    $sentencia->bindParam(':promedio', $promedio);


    $sentencia->bindParam('fyh_actualizacion', $fechaHora);
    $sentencia->bindParam(':id_calificacion', $id_calificacion);
    $sentencia->execute();
} else {
    print "No existe registro";

    // como no existe entonces hay que registrarlo

    $sentencia = $pdo->prepare('INSERT INTO calificaciones
       (docente_id,estudiante_id,materia_id,nota1,nota2,promedio,fyh_creacion,estado)
VALUES (:docente_id,:estudiante_id,:materia_id,:nota1,:nota2,:promedio,:fyh_creacion,:estado)');

    $sentencia->bindParam(':docente_id', $id_docente);
    $sentencia->bindParam(':estudiante_id', $id_estudiante);
    $sentencia->bindParam(':materia_id', $id_materia);
    $sentencia->bindParam(':nota1', $nota1);
    $sentencia->bindParam(':nota2', $nota2);
    $sentencia->bindParam(':promedio', $promedio);

    $sentencia->bindParam('fyh_creacion', $fechaHora);
    $sentencia->bindParam('estado', $estado_de_registro);
    $sentencia->execute();
}


/////////// nota 1