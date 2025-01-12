<?php

$id_administrativo = $_GET['id'];

include('../../app/config.php');
include('../../admin/layout/parte1.php');
include('../../app/controllers/administrativos/datos_administrativos.php'); // incluye los datos de la tabla roles para el formulario que sea dezpegable un select Opcion
include('../../app/controllers/roles/listado_de_roles.php');

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
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Llene los datos</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?= APP_URL; ?>/app/controllers/administrativos/update.php" method="post">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" name="id_administrativo" value="<?= $id_administrativo; ?>" hidden> <!--id_administrativo de la tabla administrativos -->
                                            <input type="text" name="id_usuario" value="<?= $id_usuario; ?>" hidden> <!--id_usuarios de la tabla usuarios -->
                                            <input type="text" name="id_persona" value="<?= $id_persona; ?>" hidden> <!--id_persona de la tabla personas -->


                                            <label for="">Nombre del Rol</label>
                                            <div class="form-inline">
                                                <select name="rol_id" id="" class="form-control">
                                                    <!-- Para imprimir se utiliza un foreach -->
                                                    <?php foreach ($roles as $role) { ?>
                                                        <option value="<?= $role['id_rol']; ?>" <?= $nombre_rol == $role['nombre_rol'] ? 'selected' : '' ?>><?= $role['nombre_rol']; ?></option>

                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                <a href="<?= APP_URL; ?>/admin/roles/create.php" style="margin-left: 5px" class="btn btn-primary "><i class="bi bi-file-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nombres</label>
                                            <input type="text" name="nombres" value="<?= $nombres; ?>" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Apellidos</label>
                                            <input type="text" name="apellidos" value="<?= $apellidos; ?>" class="form-control" required>
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Carnet de Identidad</label>
                                            <input type="number" name="ci" value="<?= $ci; ?>" class="form-control" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Fecha de Nacimiento</label>
                                            <input type="date" name="fecha_nacimiento" value="<?= $fecha_nacimiento; ?>" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Celular</label>
                                            <input type="number" name="celular" value="<?= $celular; ?>" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Profesion</label>
                                            <input type="text" name="profesion" value="<?= $profesion; ?>" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Correo</label>
                                            <input type="email" name="email" value="<?= $email; ?>" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="">Direccion</label>
                                            <input type="address" name="direccion" value="<?= $direccion; ?>" class="form-control" required>
                                        </div>
                                    </div>

                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Actualizar</button>
                                            <a href="<?= APP_URL; ?>/admin/administrativos" class="btn btn-secondary">Cancelar</a>
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