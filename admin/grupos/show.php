<?php
$id_grupo = $_GET['id'];


include('../../app/config.php');
include('../../admin/layout/parte1.php');
include('../../app/controllers/grupos/datos_grupo.php'); // cuando esta relacinadas las tablas


?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row justify-content-md-center">
                <h1>Grupo: <?= $nombre_grupo; ?></h1>

            </div>

            <br>



            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">Datos Registrados</h3>
                        </div>
                        <div class="card-body">
                            <!-- enctype multipart/form-data permite mandar fotos, archivos atraves de formularios-->
                            <div class="row ">
                                <div class="col-md-8 ">
                                    <div class="form-group">
                                        <label for="">Grupo</label>
                                        <p><?= $nombre_grupo; ?></p>

                                    </div>
                                </div>

                            </div>

                            <div class="row ">
                                <div class="col-md-8 ">
                                    <div class="form-group">
                                        <label for="">Fecha y Hora de Creacion</label>
                                        <p><?= $fyh_creacion; ?></p>

                                    </div>
                                </div>

                            </div>

                            <div class="row ">
                                <div class="col-md-8 ">
                                    <div class="form-group">
                                        <label for="">Estado</label>
                                        <p><?php
                                            if ($estado == 1) print "ACTIVO";
                                            else print "INACTIVO";

                                            ?></p>

                                    </div>
                                </div>

                            </div>



                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="<?= APP_URL; ?>/admin/grupos" class="btn btn-secondary">Volver</a>
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
include('../../admin/layout/parte2.php');
include('../../layout/mensajes.php');

?>