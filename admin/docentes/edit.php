<?php

$id_docente = $_GET['id'];

include('../../app/config.php');
include('../../admin/layout/parte1.php');
include('../../app/controllers/docentes/datos_del_docente.php'); // incluye los datos de la tabla roles para el formulario que sea dezpegable un select Opcion
include('../../app/controllers/roles/listado_de_roles.php');

?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <h1>Modificacion del Docente: <?= $nombres . " " . $apellidos; ?></h1>
                </div>
            </div>



            <div class="row">
                <br>
                <div class="col-md-12 mx-auto">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Llene los datos</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?= APP_URL; ?>/app/controllers/docentes/update.php" method="post">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <!--- Si vamos a actualizar docentes a una tabla persona y de esta tambien actualizara la tabla usuarios -->
                                            <input type="text" name="id_docente" value="<?= $id_docente; ?>" hidden>
                                            <input type="text" name="id_usuario" value="<?= $id_usuario; ?>" hidden> <!--id_usuarios de la tabla usuarios -->
                                            <input type="text" name="id_persona" value="<?= $id_persona; ?>" hidden> <!--id_persona de la tabla personas -->
                                            <label for="">Nombre del Rol</label>
                                            <div class="form-inline">
                                                <select name="rol_id" id="" class="form-control">
                                                    <!-- Para imprimir se utiliza un foreach -->
                                                    <?php foreach ($roles as $role) { ?>
                                                        <option value="<?= $role['id_rol']; ?>" <?= $role['nombre_rol'] == "DOCENTE" ? 'selected' : '' ?>><?= $role['nombre_rol']; ?></option>

                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                <a href="<?= APP_URL; ?>/admin/roles/create.php" style="margin-left: 5px" class="btn btn-primary btn-sm "><i class="bi bi-file-plus"></i></a>
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
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Fecha de Nacimiento</label>
                                            <input type="date" value="<?= $fecha_nacimiento; ?>" name="fecha_nacimiento" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Celular</label>
                                            <input type="number" value="<?= $celular; ?>" name="celular" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Profesion</label>
                                            <input type="text" value="<?= $profesion; ?>" name="profesion" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Correo</label>
                                            <input type="email" value="<?= $email; ?>" name="email" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Especialidad</label>
                                            <input type="text" value="<?= $especialidad; ?>" name="especialidad" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Antigüedad</label>
                                            <input type="text" value="<?= $antiguedad; ?>" name="antiguedad" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Direccion</label>
                                            <input type="address" value="<?= $direccion; ?>" name="direccion" class="form-control" required>
                                        </div>
                                    </div>

                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Actualizar</button>
                                            <a href="<?= APP_URL; ?>/admin/docentes" class="btn btn-secondary">Cancelar</a>
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