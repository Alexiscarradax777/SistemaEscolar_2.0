<?php

$id_grado_get = $_GET['id_grado']; // Estamos Recibiendo la variable id_grado por GET y almacenando en una nueva variable
$id_docente_get = $_GET['id_docente']; // Estamos Recibiendo la variable id_docente por GET y almacenando en una nueva variable
$id_materia_get = $_GET['id_materia']; // Estamos Recibiendo la variable id_materia por GET y almacenando en una nueva variable
// Estamos Recibiendo la variable id_materia por GET y almacenando en una nueva variable


include('../../app/config.php');
include('../../admin/layout/parte1.php');

include('../../app/controllers/estudiantes/listado_de_estudiantes.php');
include('../../app/controllers/calificaciones/listado_de_calificaciones.php');



$curso = "";
$grupo = "";

foreach ($estudiantes as $estudiante) {
    if ($id_grado_get == $estudiante['id_grado']) {
        $curso = $estudiante['curso'];
        $grupo = $estudiante['grupo'];
    }
}

?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <h3>Listado de Estudiantes del Grado: <?= $curso; ?> del grupo <?= $grupo; ?></h3>
                </div>
            </div>
            <br>



            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Estudiantes Registrados</h3>

                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered table-hover table-sm mx-auto" style="width: 900px;">
                                <thead>
                                    <tr>
                                        <th>
                                            <center>Nro</center>
                                        </th>
                                        <th>
                                            <center>Nombres y Apellidos</center>
                                        </th>
                                        <th>
                                            <center>Nivel</center>
                                        </th>
                                        <th>
                                            <center>Sistema</center>
                                        </th>
                                        <th>
                                            <center>Turno</center>
                                        </th>
                                        <th>
                                            <center>Grado</center>
                                        </th>
                                        <th>
                                            <center>Grupo</center>
                                        </th>
                                        <th>
                                            <center> 1 Calif.</center>
                                        </th>
                                        <th>
                                            <center> 2 Calif.</center>
                                        </th>

                                        <th>
                                            <center> Promedio </center>
                                        </th>




                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador_estudiantes = 0;

                                    foreach ($estudiantes as $estudiante) {
                                        // Se hace una condicion if para mostrar a los estudiantes que se encuentran en el grado correspondiente
                                        if ($id_grado_get == $estudiante['id_grado']) { /* aqui llaomo al estudiante de acuerdo a su id grado */

                                            $id_estudiante = $estudiante['id_estudiante'];
                                            $contador_estudiantes = $contador_estudiantes + 1; ?>

                                            <tr>
                                                <td style="text-align: center">
                                                    <input type="text" id="estudiante_<?= $contador_estudiantes; ?>" value="<?= $id_estudiante; ?>" hidden> <!--Aqui pusimos un input que nos servira para el script   -->
                                                    <?= $contador_estudiantes; ?>
                                                </td>
                                                <td><?= $estudiante['apellidos'] . " " . $estudiante['nombres']; ?></td> <!-- concatenamos -->
                                                <td style="text-align: center"><?= $estudiante['nivel']; ?></td>
                                                <td style="text-align: center"><?= $estudiante['sistema']; ?></td>
                                                <td style="text-align: center"><?= $estudiante['turno']; ?></td>
                                                <td style="text-align: center"><?= $estudiante['curso']; ?></td>
                                                <td style="text-align: center"><?= $estudiante['grupo']; ?></td>
                                                <?php
                                                $nota1 = "";
                                                $nota2 = "";
                                                $promedio = "";

                                                foreach ($calificaciones as $calificacione) {
                                                    if (($calificacione['docente_id'] == $id_docente_get)
                                                        && ($calificacione['estudiante_id'] == $id_estudiante)  // (())  && se llama "i" estas variables se utilizan para ser mas especificos 
                                                        && ($calificacione['materia_id'] == $id_materia_get)
                                                    ) {
                                                        $nota1 = $calificacione['nota1'];
                                                        $nota2 = $calificacione['nota2'];
                                                        $promedio = $calificacione['promedio'];
                                                        /*$promedio = round((intval($nota1) + intval($nota2)) / 2, 2);*/
                                                        /*                                                         break;
 */
                                                    }
                                                }

                                                /*                                                 // Calcular el promedio
                                                if ($nota1 !== "" && $nota2 !== "") {
                                                    // Si ambas notas están disponibles, calculamos el promedio
                                                    $promedio = round((intval($nota1) + intval($nota2)) / 2, 2);
                                                } elseif ($nota1 !== "") {
                                                    // Si solo nota1 está disponible, el promedio es nota1
                                                    $promedio = $nota1;
                                                } elseif ($nota2 !== "") {
                                                    // Si solo nota2 está disponible, el promedio es nota2
                                                    $promedio = $nota2;
                                                } */


                                                ?>


                                                <td>
                                                    <input style="text-align:center" value="<?= $nota1; ?>" id="nota1_<?= $contador_estudiantes; ?>" type="number" class="form-control"> <!--Agregamos el contador_estudiantes -->
                                                </td>
                                                <td>
                                                    <input style="text-align:center" value="<?= $nota2; ?>" id="nota2_<?= $contador_estudiantes; ?>" type="number" class="form-control">
                                                </td>
                                                <td>
                                                    <input style="text-align:center" value="<?= $promedio; ?>" id="promedio_<?= $contador_estudiantes; ?>" type="number" class="form-control" readonly>
                                                </td>





                                            </tr>
                                    <?php
                                        }
                                    }
                                    $contador_estudiantes = $contador_estudiantes; // aqui lo saque del foreach de arriba para el script de abajo
                                    ?>

                                </tbody>

                            </table>
                            <hr>
                            <button class="btn btn-primary btn-lg" id="btn_guardar">Guardar Notas</button>
                            <script>
                                $('#btn_guardar').click(function() {
                                    var n = '<?= $contador_estudiantes; ?>';
                                    var i = 1;
                                    var id_docente = '<?= $id_docente_get; ?>';
                                    var id_materia = '<?= $id_materia_get; ?>';



                                    for (i = 1; i <= n; i++) {

                                        var a = '#nota1_' + i;
                                        var nota1 = parseFloat($(a).val()) || 0; // concatenamos y val me trae el valor puesto en nota 1

                                        var b = '#nota2_' + i;
                                        var nota2 = parseFloat($(b).val()) || 0;

                                        var promedio;

                                        if (nota1 && nota2) {
                                            // Si ambas notas están disponibles, calcular el promedio
                                            promedio = (nota1 + nota2) / 2;

                                        } else if (nota1) {
                                            // Si solo la nota 1 está disponible, usar esa como promedio
                                            promedio = nota1;
                                        } else {
                                            // Si no hay notas, establecer el promedio como 0
                                            promedio = 0;

                                        }



                                        var p = '#promedio_' + i;
                                        $(p).val(promedio.toFixed(1)); // Guardar el promedio con 2 decimales

                                        var c = '#estudiante_' + i;
                                        var id_estudiante = $(c).val();






                                        // alert("id_docente:" + id_docente + "-id_estudiante:" + id_estudiante + " -id_materia:" + id_materia);

                                        var url = "../../app/controllers/calificaciones/create.php ";
                                        // Get es enviar mediante una funcion los datos
                                        $.get(url, {
                                            id_docente: id_docente,
                                            id_estudiante: id_estudiante,
                                            id_materia: id_materia,
                                            nota1: nota1,
                                            nota2: nota2,
                                            promedio: promedio



                                        }, function(datos) {
                                            $('#respuesta').html(datos);
                                            // alert("mando los datos");

                                        });
                                    }
                                    Swal.fire({
                                        position: "top-end",
                                        icon: "success",
                                        title: "Se actualizo las notas",
                                        showConfirmButton: false,
                                        timer: 5000
                                    });
                                });
                            </script>
                            <div id="respuesta" hidden></div>

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




<script>
    $(function() {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay datos disponibles en la tabla",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Estudiantes",
                "infoEmpty": "Mostrando 0 to 0 of 0 Estudiantes",
                "infoFiltered": "(Filtrado de _MAX_ total Estudiantes)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Estudiantes",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "No se encontraron resultados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": [{
                    extend: 'colvis',
                    text: 'Visor de columnas',
                    collectionLayout: 'fixed three-column'
                }


            ],

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>