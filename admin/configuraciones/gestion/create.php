<?php


include('../../../app/config.php');
include('../../../admin/layout/parte1.php');

?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row justify-content-md-center">
                <h1>Registro de Nueva Gestion Educativa</h1>

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
                            <form action="<?= APP_URL; ?>/app/controllers/configuraciones/gestion/create.php" method="post">
                                <div class="row justify-content-md-center">
                                    <div class="col-md-8 ">
                                        <div class="form-group">
                                            <label for="">Gestion Educativa</label>
                                            <input type="text" name="gestion" class="form-control" required>
                                        </div>
                                    </div>

                                </div>

                                <div class="row justify-content-md-center">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Estado</label>
                                            <select name="estado" id="" class="form-control">
                                                <option value="ACTIVO">ACTIVO</option>
                                                <option value="INACTIVO">INACTIVO</option>
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