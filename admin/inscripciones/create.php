<?php


include('../../app/config.php');
include('../../admin/layout/parte1.php');
include('../../app/controllers/roles/listado_de_roles.php'); // incluye los datos de la tabla roles para el formulario que sea dezpegable un select Opcion
include('../../app/controllers/niveles/listado_de_niveles.php');
include('../../app/controllers/grados/listado_de_grados.php');



?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <h1>Creacion de un Nuevo Estudiante</h1>
                </div>
            </div>
            <br>

            <form action="<?= APP_URL; ?>/app/controllers/inscripciones/create.php" method="post">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><b>Llene los datos del estudiante</b></h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nombre del Rol</label>
                                            <div class="form-inline">
                                                <select name="rol_id" id="" class="form-control">
                                                    <!-- Para imprimir se utiliza un foreach -->
                                                    <?php foreach ($roles as $role) { ?>
                                                        <option value="<?= $role['id_rol']; ?>" <?= $role['nombre_rol'] == "ESTUDIANTE" ? 'selected' : '' ?>><?= $role['nombre_rol']; ?></option>

                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                <!-- <a href="<?= APP_URL; ?>/admin/roles/create.php" style="margin-left: 2px" class="btn btn-primary "><i class="bi bi-file-plus"></i></a> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nombres</label>
                                            <input type="text" name="nombres" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Apellidos</label>
                                            <input type="text" name="apellidos" class="form-control" required>
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Carnet de Identidad</label>
                                            <input type="number" name="ci" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Fecha de Nacimiento</label>
                                            <input type="date" name="fecha_nacimiento" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Celular</label>
                                            <input type="number" name="celular" class="form-control" required>
                                        </div>
                                    </div>



                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Correo</label>
                                            <input type="email" name="email" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="">Direccion</label>
                                            <input type="address" name="direccion" class="form-control" required>
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
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <h3 class="card-title"><b>Llene los datos Academicos</b></h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Nivel</label>
                                            <select name="nivel_id" id="" class="form-control">
                                                <!-- Para imprimir se utiliza un foreach -->
                                                <?php foreach ($niveles as $nivele) { ?>
                                                    <option value="<?= $nivele['id_nivel']; ?>"><?= $nivele['nivel'] . " - " . $nivele['sistema'] . " - " . $nivele['turno']; ?></option>

                                                <?php
                                                }
                                                ?>
                                            </select>

                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Grado</label>
                                            <select name="grado_id" id="" class="form-control">
                                                <?php foreach ($grados as $grado) {
                                                ?>
                                                    <option value="<?= $grado['id_grado']; ?>"><?= $grado['nivel'] . " - " . $grado['sistema'] . " - " . $grado['curso'] . " - " . $grado['grupo']; ?></option>

                                                <?php
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>



                                </div>

                                <div class="row">


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Num. Control</label>
                                            <input type="text" name="num_control" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Meses</label>
                                            <select name="meses" id="" class="form-control">
                                                <option value="ENERO - ABRIL">ENE - ABRIL</option>
                                                <option value="MAYO - AGOSTO">MAYO - AGOSTO</option>
                                                <option value="SEPTIEMBRE - DICIEMBRE">SEPTIEMBRE - DICIEMBRE</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Año</label>
                                            <select name="anio" id="" class="form-control">
                                                <?php for ($i = 2024; $i <= 2030; $i++) { ?>
                                                    <option value="<?= $i; ?>"><?= $i; ?></option>
                                                <?php
                                                }
                                                ?>

                                            </select>

                                        </div>
                                    </div>




                                </div>







                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="card card-outline card-danger">
                            <div class="card-header">
                                <h3 class="card-title"><b>Llene los datos del Padre de familia</b></h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Apellidos y Nombres</label>
                                            <input type="text" name="nombre_apellidos_ppff" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Carnet de Identidad</label>
                                            <input type="text" name="ci_ppff" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Celular</label>
                                            <input type="number" name="celular_ppff" class="form-control" required>
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Ocupacion</label>
                                            <input type="text" name="ocupacion_ppff" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Apellidos y Nombres de referencia</label>
                                            <input type="text" name="ref_nombre" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Parentesco de la referencia</label>
                                            <input type="text" name="ref_parentesco" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Celular de la referencia</label>
                                            <input type="number" name="ref_celular" class="form-control" required>
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
                            <button type="submit" class="btn btn-primary btn-lg">Registrar</button>
                            <a href="<?= APP_URL; ?>/admin/estudiantes" class="btn btn-secondary btn-lg">Cancelar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>


</div>


<!-- /.content-wrapper -->

<?php
include('../../admin/layout/parte2.php');
include('../../layout/mensajes.php');

?>