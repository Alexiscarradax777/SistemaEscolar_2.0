<?php

$id_nivel = $_GET['id'];
include('../../app/config.php');
include('../../admin/layout/parte1.php');
include('../../app/controllers/niveles/datos_nivel.php'); // cuando esta relacinadas las tablas
include('../../app/controllers/configuraciones/gestion/listado_de_gestiones.php')

?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row justify-content-md-center">
                <h1>Modificar Nivel: <?= $nivel; ?></h1>

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
                            <form action="<?= APP_URL; ?>/app/controllers/niveles/update.php" method="post">
                                <div class="row justify-content-md-center">
                                    <div class="col-md-8 ">
                                        <div class="form-group">
                                            <label for="">Gestion Educativa</label>
                                            <input type="text" name="id_nivel" value="<?= $id_nivel; ?>" hidden>
                                            <select name="gestion_id" id="" class="form-control">
                                                <?php
                                                foreach ($gestiones as $gestione) {
                                                    if ($gestione['estado'] == '1') { ?>
                                                        <option value="<?= $gestione['id_gestion']; ?>" <?php if ($gestion_id == $gestione['id_gestion']) { ?> selected="selected" <?php } ?>>
                                                            <?= $gestione['gestion']; ?>
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
                                            <label for="">Carrera</label>
                                            <select name="nivel" id="" class="form-control">
                                                <option value="INFORMATICA" <?php if ($nivel == 'INFORMATICA') { ?> selected="selected" <?php } ?>>INFORMATICA</option> <!-- para traer las opciones Universidad,Prepa,etc -->
                                                <option value="SISTEMAS" <?php if ($nivel == 'SISTEMAS') { ?> selected="selected" <?php } ?>>SISTEMAS</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row justify-content-md-center">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Sistema</label>
                                            <select name="sistema" id="" class="form-control">
                                                <option value="ESCOLARIZADO" <?php if ($nivel == 'ESCOLARIZADO') { ?> selected="selected" <?php } ?>>ESCOLARIZADO</option> <!-- para traer las opciones Universidad,Prepa,etc -->
                                                <option value="SEMIESCOLARIZADO" <?php if ($nivel == 'SEMIESCOLARIZADO') { ?> selected="selected" <?php } ?>>SEMIESCOLARIZADO</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row justify-content-md-center">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Turno</label>
                                            <select name="turno" id="" class="form-control">
                                                <option value="MATUTINO" <?php if ($nivel == 'MATUTINO') { ?> selected="selected" <?php } ?>>MATUTINO</option> <!-- para traer las opciones Universidad,Prepa,etc -->
                                            </select>
                                        </div>
                                    </div>

                                </div>







                                <br>
                                <br>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Actualizar</button>
                                            <a href="<?= APP_URL; ?>/admin/niveles" class="btn btn-secondary">Cancelar</a>
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