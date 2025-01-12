<?php

$id_gestion = $_GET['id'];

include('../../../app/config.php');
include('../../../admin/layout/parte1.php');
include('../../../app/controllers/configuraciones/gestion/datos_gestion.php'); // el id_config_institucion entra en esta direccion en este controlador 

?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row justify-content-md-center">
                <h1>Modificacion de Gestion Educativa: <?= $gestion; ?></h1>

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
                            <form action="<?= APP_URL; ?>/app/controllers/configuraciones/gestion/update.php" method="post">
                                <div class="row justify-content-md-center">
                                    <div class="col-md-8 ">
                                        <div class="form-group">
                                            <input type="text" name="id_gestion" value="<?= $id_gestion; ?>" hidden> <!-- se pone un id para mandarlo a update actualizar   -->
                                            <label for="">Gestion Educativa</label>
                                            <input type="text" value="<?= $gestion; ?>" name="gestion" class="form-control" required>
                                        </div>
                                    </div>

                                </div>

                                <div class="row justify-content-md-center">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Estado</label>
                                            <select name="estado" id="" class="form-control">
                                                <?php
                                                if ($estado == '1') { ?>

                                                    <option value="ACTIVO">ACTIVO</option>
                                                    <option value="INACTIVO">INACTIVO</option>
                                                <?php

                                                } else { ?>

                                                    <option value="ACTIVO">ACTIVO</option>
                                                    <option value="INACTIVO" selected="selected"> INACTIVO</option>
                                                <?php } ?>
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
                                            <a href="<?= APP_URL; ?>/admin/configuraciones/gestion" class="btn btn-secondary">Cancelar</a>
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
include('../../../admin/layout/parte2.php');
include('../../../layout/mensajes.php');

?>