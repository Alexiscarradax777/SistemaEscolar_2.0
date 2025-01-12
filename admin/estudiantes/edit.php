<?php

$id_estudiante = $_GET['id'];

include('../../app/config.php');
include('../../admin/layout/parte1.php');
include('../../app/controllers/estudiantes/datos_del_estudiante.php');
include('../../app/controllers/roles/listado_de_roles.php');
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
                    <h1>Modificacion del Estudiante: <?= $nombres . " " . $apellidos; ?></h1>
                </div>
            </div>
            <br>

            <form action="<?= APP_URL; ?>/app/controllers/estudiantes/update.php" method="post">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="card card-outline card-success">
                            <div class="card-header">
                                <h3 class="card-title"><b>Llene los datos del estudiante</b></h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" name="id_estudiante" value="<?= $id_estudiante; ?>" hidden>
                                            <input type="text" name="id_usuario" value="<?= $id_usuario; ?>" hidden>
                                            <input type="text" name="id_persona" value="<?= $id_persona; ?>" hidden>
                                            <input type="text" name="id_ppffs" value="<?= $id_ppffs; ?>" hidden>


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
                                                <a href="<?= APP_URL; ?>/admin/roles/create.php" style="margin-left: 2px" class="btn btn-primary "><i class="bi bi-file-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nombres</label>
                                            <input type="text" value="<?= $nombres; ?>" name="nombres" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Apellidos</label>
                                            <input type="text" value="<?= $apellidos; ?>" name="apellidos" class="form-control" required>
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Carnet de Identidad</label>
                                            <input type="number" value="<?= $ci; ?>" name="ci" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Fecha de Nacimiento</label>
                                            <input type="date" value="<?= $fecha_nacimiento; ?>" name="fecha_nacimiento" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Celular</label>
                                            <input type="number" value="<?= $celular; ?>" name="celular" class="form-control" required>
                                        </div>
                                    </div>



                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Correo</label>
                                            <input type="email" value="<?= $email; ?>" name="email" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="">Direccion</label>
                                            <input type="address" value="<?= $direccion; ?>" name="direccion" class="form-control" required>
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
                                                <?php foreach ($niveles as $nivele) {
                                                ?>
                                                    <option value="<?= $nivele['id_nivel']; ?>" <?= $nivele['id_nivel'] == $nivel_id ? 'selected' : '' ?>><?= $nivele['nivel'] . " - " . $nivele['sistema'] . " - " . $nivele['turno']; ?></option>

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
                                                    <option value="<?= $grado['id_grado']; ?>" <?= $grado['id_grado'] == $grado_id ? 'selected' : '' ?>><?= $grado['nivel'] . " - " . $grado['sistema'] . " - " . $grado['curso'] . " - " . $grado['grupo']; ?></option>

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
                                            <input type="text" value="<?= $num_control; ?>" name="num_control" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Meses</label>
                                            <select name="meses" id="" class="form-control">
                                                <option value="ENERO - ABRIL" <?php if ($meses == 'ENERO - ABRIL') { ?> selected="selected" <?php } ?>>ENERO - ABRIL</option>
                                                <option value="MAYO - AGOSTO" <?php if ($meses == 'MAYO - AGOSTO') { ?> selected="selected" <?php } ?>>MAYO - AGOSTO</option>
                                                <option value="SEPTIEMBRE - DICIEMBRE" <?php if ($meses == 'SEPTIEMBRE - DICIEMBRE') { ?> selected="selected" <?php } ?>>SEPTIEMBRE - DICIEMBRE</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Años</label>
                                            <select name="anio" id="" class="form-control">
                                                <option value="2024" <?php if ($anio == '2024') { ?> selected="selected" <?php } ?>>2024</option>
                                                <option value="2025" <?php if ($anio == '2025') { ?> selected="selected" <?php } ?>>2025</option>
                                                <option value="2026" <?php if ($anio == '2026') { ?> selected="selected" <?php } ?>>2026</option>
                                                <option value="2027" <?php if ($anio == '2027') { ?> selected="selected" <?php } ?>>2027</option>
                                                <option value="2028" <?php if ($anio == '2028') { ?> selected="selected" <?php } ?>>2028</option>
                                                <option value="2029" <?php if ($anio == '2029') { ?> selected="selected" <?php } ?>>2029</option>
                                                <option value="2030" <?php if ($anio == '2030') { ?> selected="selected" <?php } ?>>2030</option>
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
                                            <input type="text" value="<?= $nombre_apellidos_ppff; ?>" name="nombre_apellidos_ppff" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Carnet de Identidad</label>
                                            <input type="text" value="<?= $ci_ppff; ?>" name="ci_ppff" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Celular</label>
                                            <input type="number" value="<?= $celular_ppff; ?>" name="celular_ppff" class="form-control" required>
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Ocupacion</label>
                                            <input type="text" value="<?= $ocupacion_ppff; ?>" name="ocupacion_ppff" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Apellidos y Nombres de referencia</label>
                                            <input type="text" value="<?= $ref_nombre; ?>" name="ref_nombre" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Parentesco de la referencia</label>
                                            <input type="text" value="<?= $ref_parentesco; ?>" name="ref_parentesco" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Celular de la referencia</label>
                                            <input type="number" value="<?= $ref_celular; ?>" name="ref_celular" class="form-control" required>
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
                            <button type="submit" class="btn btn-success btn-lg">Actualizar</button>
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