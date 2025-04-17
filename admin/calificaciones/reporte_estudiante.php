<?php

$id_estudiante_get = $_GET['id_estudiante']; // Estamos Recibiendo la variable id_grado por GET y almacenando en una nueva variable


include('../../app/config.php');
include('../../admin/layout/parte1.php');

include('../../app/controllers/estudiantes/listado_de_estudiantes.php');
include('../../app/controllers/calificaciones/listado_de_calificaciones.php');



$curso = "";
$grupo = "";

foreach ($estudiantes as $estudiante) {
    if ($id_estudiante_get == $estudiante['id_estudiante']) {
        $nombres = $estudiante['nombres'];
        $apellidos = $estudiante['apellidos'];
        $curso = $estudiante['curso'];
        $grupo = $estudiante['grupo'];
        $num_control = $estudiante['num_control'];
        $nivel = $estudiante['nivel'];
        $sistema = $estudiante['sistema'];
    }
}

?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <h5><b>Alumno:</b> <?= $apellidos . " " . $nombres; ?></h5>
                    <h5><b>Num.Control:</b> <?= $num_control; ?> </h5>
                    <h5><b>Carrera:</b> <?= $nivel; ?> Sistema: <?= $sistema; ?></h5>
                    <h5><b>Curso:</b> <?= $curso; ?> Grupo: <?= $grupo; ?></h5>
                </div>
            </div>
            <br>



            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Calificaciones Registradas</h3>
                        </div>

                        <div class="card-body">

                            <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                                <thead>
                                    <tr>

                                        <th>
                                            <center>Materia</center>
                                        </th>

                                        <th>
                                            <center> 1 Calif.</center>
                                        </th>

                                        <th>
                                            <center> 2 Calif.</center>
                                        </th>

                                        <th>
                                            <center>Promedio</center>
                                        </th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador_calificaciones = 0;
                                    $nota1 = "";
                                    $nota2 = "";
                                    $promedio = "";



                                    foreach ($calificaciones as $calificacione) {
                                        // Se hace una condicion if para mostrar a los calificaciones que se encuentran en el grado correspondiente
                                        if ($id_estudiante_get == $calificacione['estudiante_id']) {
                                            $contador_calificaciones = $contador_calificaciones + 1; ?>

                                            <tr>

                                                <td>
                                                    <center><?= $calificacione['nombre_materia']; ?></center>
                                                </td>
                                                <td>
                                                    <center><?= $calificacione['nota1']; ?></center>
                                                </td>
                                                <td>
                                                    <center><?= $calificacione['nota2']; ?></center>
                                                </td>
                                                <td>
                                                    <center><?= $calificacione['promedio']; ?></center>
                                                </td>
                                            </tr>


                                    <?php
                                        }
                                    }
                                    ?>

                                </tbody>

                            </table>


                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    <div class="card card-outline card-primary">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="boleta.php?id=<?= $id_estudiante_get; ?>" type="button" class="btn btn-warning btn-sm"><i class="bi bi-printer"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


</div>


<!-- /.content-wrapper -->

<?php
include('../../admin/layout/parte2.php');
include('../../layout/mensajes.php');

?>




<script>
    $(function() {
        $("#example1").DataTable({
            "pageLength": 2,
            "language": {
                "emptyTable": "No hay datos disponibles en la tabla",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Calificaciones",
                "infoEmpty": "Mostrando 0 to 0 of 0 Calificaciones",
                "infoFiltered": "(Filtrado de _MAX_ total Calificaciones)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Calificaciones",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "No se encontraron resultados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,


        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>