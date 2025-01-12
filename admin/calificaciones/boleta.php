<?php
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 * @group header
 * @group footer
 * @group page
 * @group pdf
 */

// Include the main TCPDF library (search for installation path).
$id_estudiante = $_GET['id'];
$id_estudiante_get = $_GET['id'];


include('../../app/config.php');
require_once('../../public/TCPDF-main/tcpdf.php');
include_once('../../app/controllers/configuraciones/institucion/listado_de_instituciones.php');
include_once('../../app/controllers/calificaciones/listado_de_calificaciones.php');
include_once('../../app/controllers/estudiantes/datos_del_estudiante.php');

/////////////// Trayendo los datos de la institucion
foreach ($instituciones as $institucione) {
    $nombre_institucion = $institucione['nombre_institucion'];
    $direccion = $institucione['direccion'];
    $telefono = $institucione['telefono'];
    $celular = $institucione['celular'];
    $correo = $institucione['correo'];
    $logo = $institucione['logo'];
}

$curso = "";
$grupo = "";

foreach ($estudiantes as $estudiante) {
    if ($id_estudiante_get == $estudiante['id_estudiante']) {
        $nombres = $estudiante['nombres'];
        $apellidos = $estudiante['apellidos'];
        $curso = $estudiante['curso'];
        $grupo = $estudiante['grupo'];
        $num_control = $estudiante['num_control'];
        $nivel = $estudiante['nivel'];
        $sistema = $estudiante['sistema'];
    }
}


////////////////////// Trayendo los datos de la institucion






// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(216, 280), true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor(APP_NAME);
$pdf->setTitle(APP_NAME);
$pdf->setSubject(APP_NAME);
$pdf->setKeywords(APP_NAME);

// set default header data
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 001', PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
$pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(10, 5, 10);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

$pdf->setPrintHeader(false);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->setFont('helvetica', '', 11);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
//$pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));






// Set some content to print
$html = '

<table border="0">
    <tr>
        <td width="150px" style="text-align:center"><img src="../../public/images/configuracion/' . $logo . '" width="80px" alt=""></td>
        <td width="400px"></td>
    </tr>


    <tr>
        <td style="text-align:center"><b>' . $nombre_institucion . '</b><br>
            <small>' . $direccion . '</small><br>
            <small>' . "Tel:" . '' . $telefono . ' ' . "Cel:" . ' ' . $celular . '</small>
        </td>

        <td  style="text-align:center">
            <h1><b>COLEGIO DE ESTUDIOS PROFESIONALES DEL PACIFICO A.C.</b></h1>
        </td>


        <td style="text-align:center"><b>FECHA</b>
            <h4><b>' . $dia_actual . '/' . $mes_actual . '/' . $ano_actual . '</b></h4>
        </td>
    </tr>


</table>
<br>
<br>
<br>
<table>
    <tr>
        <td style="text-align:center">
            <h2><b>BOLETAS DE CALIFICACIONES</b></h2>
        </td>
    </tr>
</table>

<br>
<br>
<br>


<table>

    <table border="0" cellspacing="2" cellpadding="4" bordercolor="#000080">
        <tr>
            <th align="center" bgcolor="#000080" color="#FFFFFF"><b>MATRICULA</b></th>
            <th align="center" bgcolor="#000080" color="#FFFFFF"><b>NOMBRE</b></th>
            <th align="center" bgcolor="#000080" color="#FFFFFF"><b>PERIODO</b></th>
        </tr>
        <tr>
            <td align="center"><b>' . $num_control . '</b></td>
            <td align="center"><b> ' . $apellidos . ' ' . $nombres . '</b></td>
            <td align="center"><b>' . $meses . '</b></td>
        </tr>

        <tr>
            <th align="center" bgcolor="#000080" color="#FFFFFF"><b>CARRERA</b></th>
            <th align="center" bgcolor="#000080" color="#FFFFFF"><b>SISTEMA</b></th>
            <th align="center" bgcolor="#000080" color="#FFFFFF"><b>TURNO</b></th>
        </tr>
        <tr>
            <td align="center"><b>' . $nivel . '</b></td>
            <td align="center"><b> ' . $sistema . '</b></td>
            <td align="center"><b>' . $turno . '</b></td>
        </tr>

        <tr>
            <th align="center" width="337px" bgcolor="#000080" color="#FFFFFF"><b>CUATRIMESTRE</b></th>
            <th align="center" width="337px" bgcolor="#000080" color="#FFFFFF"><b>GRUPO</b></th>
        </tr>
        <tr>
            <td align="center"><b>' . $curso . '</b></td>
            <td align="center"><b> ' . $grupo . '</b></td>

        </tr>

        <tr>
            <th align="center" width="676px" bgcolor="#000080" color="#FFFFFF"><b>EVALUACIONES</b></th>
        </tr>
        <tr>
            <th align="center" width="154px" bgcolor="#000080" color="#FFFFFF"><b>Nro</b></th>
            <th align="center" width="154px" bgcolor="#000080" color="#FFFFFF"><b>ASIGNATURAS</b></th>
            <th align="center" width="120px" bgcolor="#000080" color="#FFFFFF"><b>PRIMERA</b></th>
            <th align="center" width="120px" bgcolor="#000080" color="#FFFFFF"><b>SEGUNDA</b></th>
            <th align="center" width="120px" bgcolor="#000080" color="#FFFFFF"><b>PROMEDIO FINAL</b></th>
        </tr>
    ';

$contador_calificaciones = 0;
$suma_promedios = 0; // Variable para almacenar la suma de los promedios

$nota1 = "";
$nota2 = "";
$promedio = "";



foreach ($calificaciones as $calificacione) {
    // Se hace una condicion if para mostrar a los calificaciones que se encuentran en el grado correspondiente
    if ($id_estudiante_get == $calificacione['estudiante_id']) {
        $contador_calificaciones = $contador_calificaciones + 1;

        $suma_promedios += $calificacione['promedio']; // Sumar el promedio de cada materia


        $materia = $calificacione['nombre_materia'];
        $nota1 = $calificacione['nota1'];
        $nota2 = $calificacione['nota2'];
        $promedio = $calificacione['promedio'];

        $html .= '
<tr>
<td align="center" width="154px" bgcolor="#FFFFFF" color="#000000"><b>' . $contador_calificaciones . '</b></td>
<td align="center" width="154px" bgcolor="#FFFFFF" color="#000000"><b>' . $materia . '</b></td>
<td align="center" width="120px" bgcolor="#FFFFFF" color="#000000"><b>' . $nota1 . '</b></td>
<td align="center" width="120px" bgcolor="#FFFFFF" color="#000000"><b>' . $nota2 . '</b></td>
<td align="center" width="120px" bgcolor="#FFFFFF" color="#000000"><b>' . $promedio . '</b></td>
</tr>


';
    }
}


$html .= '
<tr>
<tH align="center" width="554px" bgcolor="#000080" color="#FFFFFF"><b>PROMEDIO GENERAL CUATRIMESTRAL</b></tH>
<td align="center" width="120px" bgcolor="#FFFFFF" color="#000000"><b>' . $suma_promedios / $contador_calificaciones . '</b></td>
</tr>

<tr>
<td align="center" width="237px" bgcolor="#FFFFFF" color="#000000">
<small>NRD: NO REPORTO CALIFICACION EL DOCENTE</small></td>
<td align="center" width="237px" bgcolor="#000080" color="#FFFFFF"><b>PSIC. MANUEL ORLANDO REYES MORALES</b></td>
<td align="center" width="200px" bgcolor="#FFFFFF" color="#000000"><b>SELLO</b></td>
</tr>

<tr>
<td align="left" width="237px" bgcolor="#FFFFFF" color="#000000"><br><br><br><br></td>
<td align="center" width="237px" bgcolor="#000080" color="#FFFFFF"><b>DIRECTOR</b></td>
<td align="center"  width="200px" bgcolor="#FFFFFF" color="#000000"></td>
</tr>

</table> 

';


$html .= '



<p align="right"><small>SIN FIRMA Y SELLO OFICIAL NO TIENE VALIDEZ</small></p>
';













// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('Contrato.pdf', 'I');

    //============================================================+
    // END OF FILE
    //============================================================+