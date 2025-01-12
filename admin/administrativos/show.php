<?php

$id_administrativo = $_GET['id'];

include('../../app/config.php');
include('../../admin/layout/parte1.php');
include('../../app/controllers/administrativos/datos_administrativos.php'); // incluye los datos de la tabla roles para el formulario que sea dezpegable un select Opcion

?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <h1>Personal Administrativo: <?= $nombres . " " . $apellidos; ?></h1>
                </div>
            </div>



            <div class="row">
                <br>
                <div class="col-md-12 mx-auto">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">Datos Registrados</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Nombre del Rol</label>
                                        <div class="form-inline">
                                            <p><?= $nombre_rol; ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Nombres</label>
                                        <p><?= $nombres; ?></p>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Apellidos</label>
                                        <p><?= $apellidos; ?></p>
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Carnet de Identidad</label>
                                        <p><?= $ci; ?></p>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Fecha de Nacimiento</label>
                                        <p><?= $fecha_nacimiento; ?></p>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Celular</label>
                                        <p><?= $celular; ?></p>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Profesion</label>
                                        <p><?= $profesion; ?></p>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Correo</label>
                                        <p><?= $email; ?></p>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Direccion</label>
                                        <p><?= $direccion; ?></p>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Fecha y Hora de Creacion</label>
                                        <p><?= $fyh_creacion; ?></p>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Estado</label>
                                        <p><?php
                                            if ($estado == '1') print "ACTIVO";
                                            else print "INACTIVO";

                                            ?>
                                        </p>
                                    </div>
                                </div>



                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <a href="<?= APP_URL; ?>/admin/administrativos" class="btn btn-secondary">Volver</a>
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