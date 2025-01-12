<?php
include('../../app/config.php');
include('../../admin/layout/parte1.php');
include('../../app/controllers/grupos/listado_de_grupos.php') // cambiar 


?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <h1>Listado de Grupos</h1>
                </div>
            </div>
            <br>





            <div class="row">
                <br>
                <div class="col-md-12 mx-auto">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Grupos Registrados</h3>
                            <div class="card-tools">
                                <a href="create.php" class="btn btn-primary"><i class="bi bi-plus-square"></i> Crear Nuevo Grupo</a>
                            </div>

                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th>
                                            <center>Nro</center>
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
                                    $contador_grupos = 0;
                                    foreach ($grupos as $grupo) {
                                        $id_grupo = $grupo['id_grupo'];
                                        $contador_grupos = $contador_grupos + 1; ?>

                                        <tr>
                                            <td style="text-align: center"><?= $contador_grupos; ?></td>
                                            <td style="text-align: center"><?= $grupo['nombre_grupo']; ?></td>
                                            <td style="text-align: center"><?php
                                                                            if ($grupo['estado'] == '1') print "ACTIVO";
                                                                            else
                                                                                print "NEGATIVO";
                                                                            ?>
                                            </td>

                                            <td style=" text-align: center">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="show.php?id=<?= $id_grupo; ?>" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                                    <a href="edit.php?id=<?= $id_grupo; ?>" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                                                    <form action="<?= APP_URL; ?>/app/controllers/grupos/delete.php" onclick="preguntar<?= $id_grupo; ?>(event)" method="post" id="miFormulario<?= $id_grupo; ?>">
                                                        <input type="text" name="id_grupo" value="<?= $id_grupo; ?>" hidden>
                                                        <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px;"><i class="bi bi-trash"></i></button>

                                                    </form>
                                                    <script>
                                                        function preguntar<?= $id_grupo; ?>(event) {
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
                                                                    var form = $('#miFormulario<?= $id_grupo; ?>');
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ grupos",
                "infoEmpty": "Mostrando 0 to 0 of 0 grupos",
                "infoFiltered": "(Filtrado de _MAX_ total grupos)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ grupos",
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