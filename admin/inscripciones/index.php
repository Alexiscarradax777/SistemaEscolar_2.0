<?php
include('../../app/config.php');
include('../../admin/layout/parte1.php');


?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <h1>Inscripciones <?= $ano_actual; ?></h1>
                </div>
            </div>



            <div class="row">

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-primary"><i class="bi bi-person-workspace"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Inscripciones</span>
                            <a href="create.php" class="btn btn-primary btn-ms">Nuevo estudiante</a>
                        </div>

                    </div>

                </div>

                <!--  <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="bi bi-person-plus"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Importar Estudiantes</span>
                            <a href="importar" class="btn btn-primary btn-ms">Importar</a>
                        </div>

                    </div>

                </div> -->


            </div>




        </div>

    </div>


</div>


<!-- /.content-wrapper -->

<?php
include('../../admin/layout/parte2.php');
include('../../layout/mensajes.php');

?>