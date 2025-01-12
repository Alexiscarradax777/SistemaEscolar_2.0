<?php

$id_config_institucion = $_GET['id']; // el id esta vieniendo de la ruta  del controlador, es decir, si se va a editar un registro, esta variable va a tener el id del registro

include('../../../app/config.php');
include('../../../admin/layout/parte1.php');
include('../../../app/controllers/configuraciones/institucion/datos_institucion.php'); // el id_config_institucion entra en esta direccion en este controlador 


?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row justify-content-md-center">
                <h1>Modificar los datos de la Institucion: <?= $nombre_institucion; ?></h1>

            </div>



            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Llene los datos</h3>
                        </div>
                        <div class="card-body">
                            <!-- enctype multipart/form-data permite mandar fotos, archivos atraves de formularios-->
                            <form action="<?= APP_URL; ?>/app/controllers/configuraciones/institucion/update.php" method="post" enctype="multipart/form-data"> <!--Aqui se manda a un archivo update -->
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name="logo" value="<?= $logo; ?>" hidden>
                                                    <input type="text" name="id_config_institucion" value="<?= $id_config_institucion; ?>" hidden>
                                                    <label for="">Nombre de la Institucion <b>*</b></label>
                                                    <input type="text" name="nombre_institucion" value="<?= $nombre_institucion; ?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Correo de la Institucion</label>
                                                    <input type="email" name="correo" value="<?= $correo; ?>" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Telefono</label>
                                                    <input type="number" name="telefono" value="<?= $telefono; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Celular<b>*</b></label>
                                                    <input type="number" name="celular" value="<?= $celular; ?>" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Direccion<b>*</b></label>
                                                    <input type="text" name="direccion" value="<?= $direccion; ?>" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Logo de la Institucion</label>
                                                    <input type="file" name="file" id="file" class="form-control">
                                                    <br>
                                                    <center>
                                                        <output id="list">
                                                            <img src="<?= APP_URL . "/public/images/configuracion/" . $logo; ?>" width="200px" alt="">

                                                        </output>
                                                    </center>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-info">Actualizar</button>
                                            <a href="<?= APP_URL; ?>/admin/configuraciones/institucion" class="btn btn-secondary">Cancelar</a>
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

<script>
    function archivo(evt) {
        var files = evt.target.files; // FileList object
        // Obtenemos la imagen del campo "file".
        for (var i = 0, f; f = files[i]; i++) {
            //Solo admitimos imágenes.
            if (!f.type.match('image.*')) {
                continue;
            }
            var reader = new FileReader();
            reader.onload = (function(theFile) {
                return function(e) {
                    // Insertamos la imagen
                    document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e.target.result, '" width="300px" title="', escape(theFile.name), '"/>'].join('');
                };
            })(f);
            reader.readAsDataURL(f);
        }
    }
    document.getElementById('file').addEventListener('change', archivo, false);
</script>