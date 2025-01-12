<?php

$id_estudiante = $_GET['id'];
include('../../app/config.php');
include('../../admin/layout/parte1.php');

include('../../app/controllers/estudiantes/datos_del_estudiante.php');
include('../../app/controllers/pagos/datos_pago_estudiante.php');


?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <h1>PAGOS</h1>
                    <p>
                    <h5>
                        <b>Estudiante: </b><?= $apellidos . " " . $nombres; ?><br>
                        <b>Numero de Control: </b><?= $num_control; ?><br>
                    </h5>
                    </p>
                </div>
            </div>




            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><b>Pagos Registrados</b></h3>
                            <div style="text-align: right;">

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    <i class="bi bi-cash"></i> Registrar Pago
                                </button>
                            </div>

                        </div>

                        <div class="card-body">
                            <table class="table table-striped table-bordered table-sm table-hovers">
                                <tr>
                                    <th style="text-align:center; background-color:#0cd0e6">Nro</th>
                                    <th style="text-align:center; background-color:#0cd0e6">Mes Cancelado</th>
                                    <th style="text-align:center; background-color:#0cd0e6">Monto</th>
                                    <th style="text-align:center; background-color:#0cd0e6">Fecha de Pago</th>
                                    <th style="text-align:center; background-color:#0cd0e6">Acciones</th>
                                </tr>
                                <?php
                                $contador = 0;
                                foreach ($pagos as $pago) {
                                    $estudiante_id = $pago['estudiante_id'];
                                    $id_pago = $pago['id_pago']; ?>
                                    <tr>
                                        <td>
                                            <center><?= $contador = $contador + 1; ?></center>
                                        </td>
                                        <td>
                                            <center><?= $pago['mes_pagado']; ?> </center>
                                        </td>
                                        <td>
                                            <center><?= $pago['monto_pagado']; ?> pesos </center>
                                        </td>
                                        <td>
                                            <center><?= $pago['fecha_pagado']; ?> </center>
                                        </td>
                                        <td style=" text-align: center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a data-toggle="modal" data-target="#Modal_editar<?= $id_pago; ?>" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a> <!-- Modal  -->
                                                <!-- Modal -->
                                                <div class="modal fade" id="Modal_editar<?= $id_pago; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="background-color:#0fbf0c">
                                                                <h5 class="modal-title" id="exampleModalLabel">Editar Pago</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?= APP_URL; ?>/app/controllers/pagos/update.php" method="post">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <input type="text" name="estudiante_id" value="<?= $id_estudiante; ?>" hidden>
                                                                            <input type="text" name="id_pago" value="<?= $id_pago; ?>" hidden>

                                                                            <div class="form-group">
                                                                                <label for="">Estudiante</label>
                                                                                <input type="text" class="form-control" value="<?= $apellidos . " " . $nombres; ?>" disabled>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="">Numero de Control</label>
                                                                                <input type="text" class="form-control" value="<?= $num_control; ?>" disabled>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="">Mes Pagado</label>
                                                                                <select name="mes_pagado" id="" class="form-control">
                                                                                    <option value="ENERO" <?= $pago['mes_pagado'] == "ENERO" ? 'selected' : '' ?>>ENERO</option> <!--Mes Pagado Loooogica Paaa!!! -->
                                                                                    <option value="FEBRERO" <?= $pago['mes_pagado'] == "FEBRERO" ? 'selected' : '' ?>>FEBRERO</option>
                                                                                    <option value="MARZO" <?= $pago['mes_pagado'] == "MARZO" ? 'selected' : '' ?>>MARZO</option>
                                                                                    <option value="ABRIL" <?= $pago['mes_pagado'] == "ABRIL" ? 'selected' : '' ?>>ABRIL</option>
                                                                                    <option value="MAYO" <?= $pago['mes_pagado'] == "MAYO" ? 'selected' : '' ?>>MAYO</option>
                                                                                    <option value="JUNIO" <?= $pago['mes_pagado'] == "JUNIO" ? 'selected' : '' ?>>JUNIO</option>
                                                                                    <option value="JULIO" <?= $pago['mes_pagado'] == "JULIO" ? 'selected' : '' ?>>JULIO</option>
                                                                                    <option value="AGOSTO" <?= $pago['mes_pagado'] == "AGOSTO" ? 'selected' : '' ?>>AGOSTO</option>
                                                                                    <option value="SEPTIEMBRE" <?= $pago['mes_pagado'] == "SEPTIEMBRE" ? 'selected' : '' ?>>SEPTIEMBRE</option>
                                                                                    <option value="OCTUBRE" <?= $pago['mes_pagado'] == "OCTUBRE" ? 'selected' : '' ?>>OCTUBRE</option>
                                                                                    <option value="NOVIEMBRE" <?= $pago['mes_pagado'] == "NOVIEMBRE" ? 'selected' : '' ?>>NOVIEMBRE</option>
                                                                                    <option value="DICIEMBRE" <?= $pago['mes_pagado'] == "DICIEMBRE" ? 'selected' : '' ?>>DICIEMBRE</option>
                                                                                </select>

                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="">Monto Pagado</label>
                                                                                <input type="text" name="monto_pagado" class="form-control" value="<?= $pago['monto_pagado']; ?>">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="">Fecha de Pago</label>
                                                                                <input type="date" name="fecha_pagado" class="form-control" value="<?= $pago['fecha_pagado']; ?>">
                                                                            </div>
                                                                        </div>



                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                        <button type="submit" class="btn btn-success">Actualizar</button>
                                                                    </div>


                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>





                                                <form action="<?= APP_URL; ?>/app/controllers/pagos/delete.php" onclick="preguntar<?= $id_pago; ?>(event)" method="post" id="miFormulario<?= $id_pago; ?>">
                                                    <input type="text" name="id_pago" value="<?= $id_pago; ?>" hidden>
                                                    <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 0px 0px 0px;"><i class="bi bi-trash"></i></button>

                                                </form>
                                                <script>
                                                    function preguntar<?= $id_pago; ?>(event) {
                                                        event.preventDefault();
                                                        Swal.fire({
                                                            title: 'Eliminar registro',
                                                            text: '¿Estas seguro de eliminar este registro?',
                                                            icon: 'question',
                                                            showDenyButton: true,
                                                            confirmButtonText: 'Eliminar',
                                                            confirmButtonColor: "#a5161d",
                                                            denyButtonColor: `#270a0a`,
                                                            denyButtonText: `Cancelar`,
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                var form = $('#miFormulario<?= $id_pago; ?>');
                                                                form.submit();
                                                                //Swal.fire('Eliminado', 'Se elimino el registro', 'success');
                                                            }
                                                        });
                                                    }
                                                </script>
                                                <a href="comprobante_pago.php?id=<?= $id_pago; ?>&&id_estudiante=<?= $estudiante_id; ?>" type="button" class="btn btn-warning btn-sm"><i class="bi bi-printer"></i></a> <!--Ojo -->

                                            </div>
                                        </td>

                                    </tr>
                                <?php

                                }
                                ?>

                            </table>


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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#0cd0e6">
                <h5 class="modal-title" id="exampleModalLabel">Registrar Pago</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= APP_URL; ?>/app/controllers/pagos/create.php" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" name="estudiante_id" value="<?= $id_estudiante; ?>" hidden>
                            <div class="form-group">
                                <label for="">Estudiante</label>
                                <input type="text" class="form-control" value="<?= $apellidos . " " . $nombres; ?>" disabled>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Numero de Control</label>
                                <input type="text" class="form-control" value="<?= $num_control; ?>" disabled>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Mes Pagado</label>
                                <select name="mes_pagado" id="" class="form-control">
                                    <option value="ENERO">ENERO</option>
                                    <option value="FEBRERO">FEBRERO</option>
                                    <option value="MARZO">MARZO</option>
                                    <option value="ABRIL">ABRIL</option>
                                    <option value="MAYO">MAYO</option>
                                    <option value="JUNIO">JUNIO</option>
                                    <option value="JULIO">JULIO</option>
                                    <option value="AGOSTO">AGOSTO</option>
                                    <option value="SEPTIEMBRE">SEPTIEMBRE</option>
                                    <option value="OCTUBRE">OCTUBRE</option>
                                    <option value="NOVIEMBRE">NOVIEMBRE</option>
                                    <option value="DICIEMBRE">DICIEMBRE</option>
                                </select>

                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Monto Pagado</label>
                                <input type="text" name="monto_pagado" class="form-control" value="0">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Fecha de Pago</label>
                                <input type="date" name="fecha_pagado" class="form-control">
                            </div>
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>