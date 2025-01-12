<?php

$id_estudiante = $_GET['id'];
include('../../app/config.php');
include('../../admin/layout/parte1.php');
include('../../app/controllers/estudiantes/datos_del_estudiante.php');




?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <h1>Datos del Estudiante: <?= $apellidos . " " . $nombres; ?></h1>
                </div>
            </div>
            <br>

            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title"><b>Datos del Estudiantes</b></h3>
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
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Fecha de Nacimiento</label>
                                        <p><?= $fecha_nacimiento; ?></p>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Celular</label>
                                        <p><?= $celular; ?></p>
                                    </div>
                                </div>


                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Correo</label>
                                        <p><?= $email; ?></p>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Direccion</label>
                                        <p><?= $direccion; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Fecha y Hora de Creacion</label>
                                        <p><?= $fyh_creacion; ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Estado</label>
                                        <p><?php if ($estado == 1) print "ACTIVO";
                                            else print "INACTIVO";
                                            ?>
                                        </p>
                                    </div>
                                </div>

                            </div>






                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <br>
                <div class="col-md-12 mx-auto">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title"><b>Datos Academicos</b></h3>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nivel</label>
                                        <p><?= $nivel . " - " . $sistema . " - " . $turno; ?></p>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Grado</label>
                                        <p><?= $nivel . " - " . $sistema . " - " . $curso . " - " . $grupo; ?></p>
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Num. Control</label>
                                        <p><?= $num_control; ?></p>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Meses</label>
                                        <p><?= $meses; ?></p>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Año</label>
                                        <p><?= $anio; ?></p>

                                    </div>
                                </div>


                            </div>




                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title"><b>Datos del Padre de familia</b></h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Apellidos y Nombres</label>
                                        <p><?= $nombre_apellidos_ppff; ?></p>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Carnet de Identidad</label>
                                        <p><?= $ci_ppff; ?></p>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Celular</label>
                                        <p><?= $celular_ppff; ?></p>

                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Ocupacion</label>
                                        <p><?= $ocupacion_ppff; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Apellidos y Nombres de referencia</label>
                                        <p><?= $ref_nombre; ?></p>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Parentesco de la referencia</label>
                                        <p><?= $ref_parentesco; ?></p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Celular de la referencia</label>
                                        <p><?= $ref_celular; ?></p>
                                    </div>
                                </div>

                            </div>




                        </div>

                    </div>
                </div>
            </div>
            <br>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <a href="<?= APP_URL; ?>/admin/estudiantes" class="btn btn-secondary btn-lg">Volver</a>
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