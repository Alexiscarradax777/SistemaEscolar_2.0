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

            <td></td>

            <table>
                <tr>
                    <td>
                        <b></b>

                    </td>
                </tr>
            </table>

            <br>
            <small></small>
            <h3><b>CONTRATO DE MATRICULA ESCOLAR PARA ESTUDIANTE DE UNIVERSIDAD</b></h3>
            <b>Partes Contratantes:</b>