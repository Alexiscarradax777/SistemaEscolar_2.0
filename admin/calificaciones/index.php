<?php
include('../../app/config.php');
include('../../admin/layout/parte1.php');

include('../../app/controllers/docentes/listado_de_asignaciones.php');

?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <h1>Grados Asignados para Calificaciones</h1>
                </div>
            </div>



            <div class="row">
                <br>
                <div class="col-md-12 mx-auto">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Asignaciones registradas</h3>


                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover table-sm">
                                    <thead>
                                        <tr>
                                            <th>
                                                <center>Nro</center>
                                            </th>
                                            <th>
                                                <center>Nivel</center>
                                            </th>
                                            <th>
                                                <center>Sistema</center>
                                            </th>
                                            <th>
                                                <center>Turno</center>
                                            </th>

                                            <th>
                                                <center>Grado</center>
                                            </th>
                                            <th>
                                                <center>Grupo</center>
                                            </th>

                                            <th>
                                                <center>Materia</center>
                                            </th>

                                            <th>
                                                <center>Acciones</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contador = 0;
                                        foreach ($asignaciones as $asignacione) {

                                            $id_grado = $asignacione['id_grado'];  // Aqui obtengo el id_grado de la asignacion que se le otorgo al docente y 
                                            // nos mostrara lo que seria Universidad 1 año, 2 año, etc.

                                            if ($sesion_email == $asignacione['email']) {
                                                $contador = $contador + 1; ?>

                                                <tr>
                                                    <td>
                                                        <center><?= $contador; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?= $asignacione['nivel']; ?> </center>
                                                    </td>
                                                    <td>
                                                        <center><?= $asignacione['turno']; ?> </center>
                                                    </td>
                                                    <td>
                                                        <center><?= $asignacione['sistema']; ?> </center>
                                                    </td>
                                                    <td>
                                                        <center><?= $asignacione['curso']; ?> </center>
                                                    </td>
                                                    <td>
                                                        <center><?= $asignacione['grupo']; ?> </center>
                                                    </td>

                                                    <td>
                                                        <center><?= $asignacione['nombre_materia']; ?> </center>
                                                    </td>
                                                    <td style="text-align: center">
                                                        <a href="create.php?id_grado=<?= $id_grado; ?>&&id_docente=<?= $asignacione['docente_id']; ?>&&id_materia=<?= $asignacione['materia_id']; ?>" class="btn btn-primary btn-sm"><i class="bi bi-journal-check"></i>
                                                            Agregar Notas</a>
                                                    </td> <!--En este apartado mandamos el id_grado del docente a otra pagina, estudiar esta parte -->



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
            </div>




        </div>

    </div>


</div>


<!-- /.content-wrapper -->

<?php
include('../../admin/layout/parte2.php');
include('../../layout/mensajes.php');

?>