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
                <h1>Registro Educativo: <?= $gestion; ?></h1>

            </div>

            <br>



            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Datos Registrados</h3>
                        </div>
                        <div class="card-body">
                            <!-- enctype multipart/form-data permite mandar fotos, archivos atraves de formularios-->
                            <div class="row justify-content-md-center">
                                <div class="col-md-8 ">
                                    <div class="form-group">
                                        <label for="">Gestion Educativa</label>
                                        <p><?= $gestion; ?></p>

                                    </div>
                                </div>

                            </div>
                            <div class="row justify-content-md-center">
                                <div class="col-md-8 ">
                                    <div class="form-group">
                                        <label for="">Fecha y Hora de Creacion</label>
                                        <p><?= $fyh_creacion; ?></p>

                                    </div>
                                </div>

                            </div>

                            <div class="row justify-content-md-center">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="">Estado</label>
                                        <p>
                                            <?php
                                            if ($estado == '1') print "ACTIVO";
                                            else print "INACTIVO";
                                            ?>
                                        </p>
                                    </div>
                                </div>

                            </div>

                            <br>
                            <br>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Registrar</button>
                                        <a href="<?= APP_URL; ?>/admin/configuraciones/gestion" class="btn btn-secondary">Volver</a>
                                    </div>
                                </div>
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
include('../../../admin/layout/parte2.php');
include('../../../layout/mensajes.php');

?>