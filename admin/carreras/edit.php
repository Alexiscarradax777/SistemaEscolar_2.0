<?php
$id_carrera = $_GET['id'];


include('../../app/config.php');
include('../../admin/layout/parte1.php');
include('../../app/controllers/carreras/datos_carrera.php'); // cuando esta relacinadas las tablas


?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row justify-content-md-center">
                <h1>Modificar Carrera: <?= $nombre_carrera; ?></h1>

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
                            <form action="<?= APP_URL; ?>/app/controllers/carreras/update.php" method="post">
                                <div class="row justify-content-md-center">
                                    <div class="col-md-8 ">
                                        <div class="form-group">
                                            <input type="text" name="id_carrera" value="<?= $id_carrera; ?>" hidden>
                                            <label for="">Carrera</label>
                                            <input type="text" value="<?= $nombre_carrera; ?>" name="nombre_carrera" class="form-control" required>

                                        </div>
                                    </div>

                                </div>



                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Actualizar</button>
                                            <a href="<?= APP_URL; ?>/admin/carreras" class="btn btn-secondary">Cancelar</a>
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