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
                <div class="col-md-12 mx-auto">
                    <h1>Listado de Estudiantes</h1>
                </div>
            </div>



            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Estudiantes <br> Registrados</h3>
                            <div class="card-tools">
                                <a href="../inscripciones/create.php" class="btn btn-primary"><i class="bi bi-plus-square"></i> Crear Nuevo Estudiante</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered table-hover table-sm" style="margin: auto;">
                                <thead>
                                    <tr>
                                        <th>
                                            <center>Nro</center>
                                        </th>
                                        <th>
                                            <center>Nombres y Apellidos</center>
                                        </th>
                                        <th>
                                            <center>C.I</center>
                                        </th>

                                        <th>
                                            <center>Fecha de Nacimiento</center>
                                        </th>

                                        <th>
                                            <center>Email y Celular</center>
                                        </th>

                                        <th>
                                            <center>Carrera</center>
                                        </th>

                                        <th>
                                            <center>Turno</center>
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
                                            <td><?= $estudiante['ci']; ?></td>
                                            <td style="text-align: center;"><?= $estudiante['fecha_nacimiento']; ?></td>
                                            <td style="text-align: center;"><?= $estudiante['email'] . " - " . $estudiante['celular']; ?></td>
                                            <td style="text-align:center"><?= $estudiante['nivel'] . " - " . $estudiante['sistema'] . " - " . $estudiante['curso'] . " - " . $estudiante['grupo']; ?></td>
                                            <td><?= $estudiante['turno']; ?></td>

                                            <td><?php
                                                if ($estudiante['estado'] == '1') print "ACTIVO";
                                                else print "INACTIVO";
                                                ?>
                                            </td>

                                            <td style="text-align: center">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="show.php?id=<?= $id_estudiante; ?>" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                                    <a href="edit.php?id=<?= $id_estudiante; ?>" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                                                    <form action="<?= APP_URL; ?>/app/controllers/estudiantes/delete.php" onclick="preguntar<?= $id_estudiante; ?>(event)" method="post" id="miFormulario<?= $id_estudiante; ?>">
                                                        <input type="text" name="id_estudiante" value="<?= $id_estudiante; ?>" hidden>
                                                        <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px;"><i class="bi bi-trash"></i></button>

                                                    </form>
                                                    <script>
                                                        function preguntar<?= $id_estudiante; ?>(event) {
                                                            event.preventDefault();
                                                            Swal.fire({
                                                                title: 'Eliminar registro',
                                                                text: '¿Estas seguro de eliminar este registro?',
                                                                icon: 'question',
                                                                showDenyButton: true,
                                                                confirmButtonText: 'Eliminar',
                                                                confirmButtonColor: "#a5161d",
                                                                denyButtonColor: `#270a0a`,
                                                                denyButtonText: `Cancelar`,
                                                            }).then((result) => {
                                                                if (result.isConfirmed) {
                                                                    var form = $('#miFormulario<?= $id_estudiante; ?>');
                                                                    form.submit();
                                                                    //Swal.fire('Eliminado', 'Se elimino el registro', 'success');
                                                                }
                                                            });
                                                        }
                                                    </script>
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