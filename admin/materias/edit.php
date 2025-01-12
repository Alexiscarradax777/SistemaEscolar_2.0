<?php
$id_materia = $_GET['id'];


include('../../app/config.php');
include('../../admin/layout/parte1.php');
include('../../app/controllers/materias/datos_materia.php'); // cuando esta relacinadas las tablas
include('../../app/controllers/carreras/listado_de_carreras.php');
include('../../app/controllers/cuatrimestres/listado_de_cuatrimestres.php'); // cuando hay select se trae el listado



?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row justify-content-md-center">
                <h1>Modificar Materia: <?= $nombre_materia; ?></h1>

            </div>

            <br>



            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Llene los datos</h3>
                        </div>
                        <div class="card-body">
                            <!-- enctype multipart/form-data permite mandar fotos, archivos atraves de formularios-->
                            <form action="<?= APP_URL; ?>/app/controllers/materias/update.php" method="post">

                                <div class="row justify-content-md-center">
                                    <div class="col-md-8 ">
                                        <div class="form-group">
                                            <label for="">Carrera</label>
                                            <input type="text" name="id_carrera" value="<?= $id_carrera; ?>" hidden>
                                            <select name="carrera_id" id="" class="form-control">
                                                <?php
                                                foreach ($carreras as $carrera) {
                                                    if ($carrera['estado'] == '1') { ?>
                                                        <option value="<?= $carrera['id_carrera']; ?>" <?php if ($carrera_id == $carrera['id_carrera']) { ?> selected="selected" <?php } ?>>
                                                            <?= $carrera['nombre_carrera']; ?>
                                                        </option>

                                                    <?php

                                                    }
                                                    ?>


                                                <?php
                                                } ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row justify-content-md-center">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Cuatrimestre</label>
                                            <input type="text" name="id_cuatrimestre" value="<?= $id_cuatrimestre; ?>" hidden>
                                            <select name="cuatrimestre_id" id="" class="form-control">
                                                <?php
                                                foreach ($cuatrimestres as $cuatrimestre) {
                                                    if ($cuatrimestre['estado'] == '1') { ?>
                                                        <option value="<?= $cuatrimestre['id_cuatrimestre']; ?>" <?php if ($cuatrimestre_id == $cuatrimestre['id_cuatrimestre']) { ?> selected="selected" <?php } ?>>
                                                            <?= $cuatrimestre['nombre_cuatrimestre']; ?>
                                                        </option>

                                                    <?php

                                                    }
                                                    ?>


                                                <?php
                                                } ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>


                                <div class="row justify-content-md-center">
                                    <div class="col-md-8 ">
                                        <div class="form-group">
                                            <input type="text" name="id_materia" value="<?= $id_materia; ?>" hidden>
                                            <label for="">Materia</label>
                                            <input type="text" value="<?= $nombre_materia; ?>" name="nombre_materia" class="form-control" required>

                                        </div>
                                    </div>

                                </div>



                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Actualizar</button>
                                            <a href="<?= APP_URL; ?>/admin/materias" class="btn btn-secondary">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
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