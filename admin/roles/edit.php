<?php
$id_rol = $_GET['id'];

include('../../app/config.php');
include('../../admin/layout/parte1.php');
include('../../app/controllers/roles/datos_del_rol.php');




?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <h1>Editar el Rol:<?= $nombre_rol; ?></h1>
                </div>
            </div>



            <div class="row">
                <br>
                <div class="col-md-6 mx-auto">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Datos Registrados</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?= APP_URL; ?>/app/controllers/roles/uptade.php" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Nombre del Rol</label>
                                            <input type="text" name="id_rol" value="<?= $id_rol; ?>" hidden>
                                            <input type="text" class="form-control" name="nombre_rol" value="<?= $nombre_rol; ?>">
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Actualizar</button>
                                            <a href="<?= APP_URL; ?>/admin/roles" class="btn btn-secondary">Volver</a>
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