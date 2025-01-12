<?php


include('../../app/config.php');
include('../../admin/layout/parte1.php');
include('../../app/controllers/configuraciones/gestion/listado_de_gestiones.php'); // cuando esta relacinadas las tablas


?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row justify-content-md-center">
                <h1>Registro de un Nuevo Nivel</h1>

            </div>

            <br>



            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Llene los datos</h3>
                        </div>
                        <div class="card-body">
                            <!-- enctype multipart/form-data permite mandar fotos, archivos atraves de formularios-->
                            <form action="<?= APP_URL; ?>/app/controllers/niveles/create.php" method="post">
                                <div class="row justify-content-md-center">
                                    <div class="col-md-8 ">
                                        <div class="form-group">
                                            <label for="">Gestion Educativa</label>
                                            <select name="gestion_id" id="" class="form-control">
                                                <?php
                                                foreach ($gestiones as $gestione) {
                                                    if ($gestione['estado'] == '1') { ?>
                                                        <option value="<?= $gestione['id_gestion']; ?>">
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
                                            <label for="">Carreras</label>
                                            <select name="nivel" id="" class="form-control">
                                                <option value="INFORMATICA">INFORMATICA</option>
                                                <option value="SISTEMAS">SISTEMAS</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row justify-content-md-center">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Sistema</label>
                                            <select name="sistema" id="" class="form-control">
                                                <option value="ESCOLARIZADO">ESCOLARIZADO</option>
                                                <option value="SEMIESCOLARIZADO">SEMIESCOLARIZADO</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row justify-content-md-center">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Turno</label>
                                            <select name="turno" id="" class="form-control">
                                                <option value="MATUTINO">MATUTINO</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <br>
                                <br>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Registrar</button>
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