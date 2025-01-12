<?php
include('../../app/config.php');
include('../../admin/layout/parte1.php');

include('../../app/controllers/estudiantes/listado_de_estudiantes.php');

?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <h1>Listado de Estudiantes</h1>
                </div>
            </div>




            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Estudiantes Registrados</h3>

                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th>
                                            <center>Nro</center>
                                        </th>
                                        <th>
                                            <center>Nombres y Apellidos</center>
                                        </th>

                                        <th>
                                            <center>Email</center>
                                        </th>
                                        <th>
                                            <center>Celular</center>
                                        </th>
                                        <th>
                                            <center>Nivel</center>
                                        </th>

                                        <th>
                                            <center>Sistema</center>
                                        </th>
                                        <th>
                                            <center>Grado</center>
                                        </th>
                                        <th>
                                            <center>Grupo</center>
                                        </th>
                                        <th>
                                            <center>Estado</center>
                                        </th>
                                        <th>
                                            <center>Acciones</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador_estudiantes = 0;
                                    foreach ($estudiantes as $estudiante) {
                                        $id_estudiante = $estudiante['id_estudiante'];
                                        $contador_estudiantes = $contador_estudiantes + 1; ?>

                                        <tr>
                                            <td style="text-align: center"><?= $contador_estudiantes; ?></td>
                                            <td><?= $estudiante['apellidos'] . " " . $estudiante['nombres']; ?></td> <!-- concatenamos -->
                                            <td><?= $estudiante['email']; ?></td>
                                            <td><?= $estudiante['celular']; ?></td>
                                            <td><?= $estudiante['nivel']; ?></td>
                                            <td><?= $estudiante['sistema']; ?></td>
                                            <td><?= $estudiante['curso']; ?></td>
                                            <td style="text-align: center"><?= $estudiante['grupo']; ?></td>




                                            <td><?php
                                                if ($estudiante['estado'] == '1') print "ACTIVO";
                                                else print "INACTIVO";
                                                ?>
                                            </td>

                                            <td style="text-align: center">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="contrato.php?id=<?= $id_estudiante; ?>" type="button" class="btn btn-warning btn-sm"><i class="bi bi-printer"></i></a> <!--EN ESTE BOTON LLEVAMOS EL ID DEL ESTUDIANTE  -->

                                                    <a href="create.php?id=<?= $id_estudiante; ?>" type="button" class="btn btn-success btn-sm"><i class="bi bi-cash-coin"></i></a> <!--EN ESTE BOTON LLEVAMOS EL ID DEL ESTUDIANTE  -->

                                                </div>
                                            </td>
                                        </tr>
                                    <?php

                                    }
                                    ?>

                                </tbody>

                            </table>

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
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay datos disponibles en la tabla",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Estudiantes",
                "infoEmpty": "Mostrando 0 to 0 of 0 Estudiantes",
                "infoFiltered": "(Filtrado de _MAX_ total Estudiantes)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Estudiantes",
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
            "buttons": [{

                    extend: 'collection',
                    text: 'Reportes',
                    orientation: 'landscape',
                    buttons: [{
                        text: 'Copiar',
                        extend: 'copy',
                    }, {
                        extend: 'pdf'
                    }, {
                        extend: 'csv'
                    }, {
                        extend: 'excel'
                    }, {
                        text: 'Imprimir',
                        extend: 'print'

                    }]

                },
                {
                    extend: 'colvis',
                    text: 'Visor de columnas',
                    collectionLayout: 'fixed three-column'
                }


            ],

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>