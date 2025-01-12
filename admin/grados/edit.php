<?php
$id_grado = $_GET['id'];

include('../../app/config.php');
include('../../admin/layout/parte1.php');
include('../../app/controllers/grados/datos_grados.php'); // cuando esta relacinadas las tablas
include('../../app/controllers/niveles/listado_de_niveles.php');


?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row justify-content-md-center">
                <h2>Modificacion de Grado: <?= $nivel . "-" . $sistema . "-" . $curso; ?></h2>

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
                            <form action="<?= APP_URL; ?>/app/controllers/grados/update.php" method="post">
                                <div class="row justify-content-md-center">
                                    <div class="col-md-8 ">
                                        <div class="form-group">
                                            <label for="">Nivel</label>
                                            <input type="text" name="id_grado" value="<?= $id_grado; ?>" class="form-control" hidden>
                                            <select name="nivel_id" id="" class="form-control">
                                                <?php
                                                foreach ($niveles as $nivele) {
                                                ?>
                                                    <option value="<?= $nivele['id_nivel']; ?>" <?= $nivel_id == $nivele['id_nivel'] ? 'selected' : '' ?>>
                                                        <?= $nivele['nivel'] . "-" . $nivele['sistema']; ?>
                                                    </option>

                                                <?php

                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>

                                </div>



                                <div class="row justify-content-md-center">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Curso</label>
                                            <select name="curso" id="" class="form-control">
                                                <option value="PRIMER CUATRIMESTRE" <?= $curso == 'PRIMER CUATRIMESTRE' ? 'selected' : '' ?>>PRIMER CUATRIMESTRE</option>
                                                <option value="SEGUNDO CUATRIMESTRE" <?= $curso == 'SEGUNDO CUATRIMESTRE' ? 'selected' : '' ?>>SEGUNDO CUATRIMESTRE </option>
                                                <option value="TERCER CUATRIMESTRE" <?= $curso == 'TERCER CUATRIMESTRE' ? 'selected' : '' ?>>TERCER CUATRIMESTRE </option>
                                                <option value="CUARTO CUATRIMESTRE" <?= $curso == 'CUARTO CUATRIMESTRE' ? 'selected' : '' ?>>CUARTO CUATRIMESTRE </option>



                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row justify-content-md-center">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Grupo</label>
                                            <select name="grupo" id="" class="form-control">
                                                <option value="A" <?= $grupo == 'A' ? 'selected' : '' ?>>A</option>
                                                <option value="B" <?= $grupo == 'B' ? 'selected' : '' ?>>B </option>
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
                                            <a href="<?= APP_URL; ?>/admin/grados" class="btn btn-secondary">Cancelar</a>
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