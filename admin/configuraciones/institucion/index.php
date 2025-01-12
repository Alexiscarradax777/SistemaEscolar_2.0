<?php
include('../../../app/config.php');
include('../../../admin/layout/parte1.php');
include('../../../app/controllers/configuraciones/institucion/listado_de_instituciones.php')


?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <h1>Listado de Instituciones</h1>
                </div>
            </div>





            <div class="row">
                <br>
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Instituciones Registradas</h3>
                            <div class="card-tools">
                                <a href="create.php" class="btn btn-primary"><i class="bi bi-plus-square"></i> Crear Nueva Institucion</a>
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
                                            <center>Nombres de la Institucion</center>
                                        </th>
                                        <th>
                                            <center>Logo</center>
                                        </th>
                                        <th>
                                            <center>Direccion</center>
                                        </th>
                                        <th>
                                            <center>Telefono</center>
                                        </th>
                                        <th>
                                            <center>Celular</center>
                                        </th>
                                        <th>
                                            <center>Correo electronico</center>
                                        </th>
                                        <th>
                                            <center>Fecha de Creacion</center>
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
                                    $contador_instituciones = 0;
                                    foreach ($instituciones as $institucione) {
                                        $id_config_institucion = $institucione['id_config_institucion'];
                                        $contador_instituciones = $contador_instituciones + 1; ?>

                                        <tr>
                                            <td style="text-align: center"><?= $contador_instituciones; ?></td>
                                            <td><?= $institucione['nombre_institucion']; ?></td>
                                            <td>
                                                <img src="<?= APP_URL . "/public/images/configuracion/" . $institucione['logo']; ?>" width="100px" alt="">
                                            </td>
                                            <td><?= $institucione['direccion']; ?></td>
                                            <td><?= $institucione['telefono']; ?></td>
                                            <td><?= $institucione['celular']; ?></td>
                                            <td><?= $institucione['correo']; ?></td>
                                            <td><?= $institucione['fyh_creacion']; ?></td>
                                            <td><?php if ($institucione['estado'] == 1) {
                                                    print "Activo";
                                                } else {
                                                    print "Inactivo";
                                                } ?></td>

                                            <td style=" text-align: center">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="show.php?id=<?= $id_config_institucion; ?>" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                                    <a href="edit.php?id=<?= $id_config_institucion; ?>" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                                                    <form action="<?= APP_URL; ?>/app/controllers/configuraciones/institucion/delete.php" onclick="preguntar<?= $id_config_institucion; ?>(event)" method="post" id="miFormulario<?= $id_config_institucion; ?>">
                                                        <input type="text" name="id_config_institucion" value="<?= $id_config_institucion; ?>" hidden>
                                                        <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px;"><i class="bi bi-trash"></i></button>

                                                    </form>
                                                    <script>
                                                        function preguntar<?= $id_config_institucion; ?>(event) {
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
                                                                    var form = $('#miFormulario<?= $id_config_institucion; ?>');
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
include('../../../admin/layout/parte2.php');
include('../../../layout/mensajes.php');

?>




<script>
    $(function() {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay datos disponibles en la tabla",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Instituciones",
                "infoEmpty": "Mostrando 0 to 0 of 0 Instituciones",
                "infoFiltered": "(Filtrado de _MAX_ total Instituciones)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Instituciones",
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