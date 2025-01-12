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
$id_pago = $_GET['id'];
$id_estudiante = $_GET['id_estudiante'];


include('../../app/config.php');
require_once('../../public/TCPDF-main/tcpdf.php');
include_once('../../app/controllers/configuraciones/institucion/listado_de_instituciones.php');
include_once('../../app/controllers/estudiantes/datos_del_estudiante.php');
include_once('../../app/controllers/pagos/datos_pago_estudiante.php');


/////////////// Trayendo los datos de la institucion
foreach ($instituciones as $institucione) {
    $nombre_institucion = $institucione['nombre_institucion'];
    $direccion = $institucione['direccion'];
    $telefono = $institucione['telefono'];
    $celular = $institucione['celular'];
    $correo = $institucione['correo'];
    $logo = $institucione['logo'];
}
////////////////////// Trayendo los datos de la institucion



/////////////////// Trayendo los datos del ontrolador del pago del estudiante

foreach ($pagos as $pago) {
    $mes_pagado = $pago['mes_pagado'];
    $monto_pagado = $pago['monto_pagado'];
    $fecha_pagado = $pago['fecha_pagado'];
}

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
$pdf->setMargins(10, 10, 10);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false); // pie de pagina falso lo quitamos

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

$style = array(
    'border' => 0,
    'ypadding' => '3',
    'hpadding' => '3',
    'fgcolor' => array(0, 0, 0),
    'bgcolor' => false, // array (255,255,255)
    'module_width' => 1, // width of a single module in points
    'module_height' => 1 // height of a single module in points

);

$QR = 'Este recibo de caja es  verificado por el sistema de pago de la Unidad Educativa ' . $nombre_institucion . ',
por el pago del mes de ' . $mes_pagado . ' la suma de ' . $monto_pagado . ' en ' . $fechaHora;

$pdf->write2DBarcode($QR, 'QRCODE,L', 173, 40, 30, 30, $style); // eje X, eje Y

$QR2 = 'Este recibo de caja es  verificado por el sistema de pago de la Unidad Educativa ' . $nombre_institucion . ',
por el pago del mes de ' . $mes_pagado . ' la suma de ' . $monto_pagado . ' en ' . $fechaHora;
$pdf->write2DBarcode($QR2, 'QRCODE,L', 173, 175, 30, 30, $style); // eje X, eje Y



// Set some content to print
$html = '

<table  border="0"> 
<tr> 
<td width="150px" style="text-align:center"><img src="../../public/images/configuracion/' . $logo . '" width="80px" alt=""></td>
<td width="400px"></td>
<td width="160px">

<p>
<br/>
<b>Nro: </b>' . $id_pago . ' <br>
<b>Fecha: </b>' . $fecha_pagado . '
</p>
</td>
</tr>

<tr>
<td style="text-align:center"><b>' . $nombre_institucion . '</b><br> 
<small>' . $direccion . '</small><br>
<small>' . "Tel:" . '' . $telefono . ' ' . "Cel:" . '  ' . $celular . '</small>
</td> 
<td style="text-align:center"><h2><b>RECIBO DE CAJA</b></h2></td>
<td style="text-align:center"><b>ORIGINAL</b></td>

</tr>
</table>

<br>
<br>

<table border="0">
<tr>
    <td><b>Estudiante: </b></td> <!--- el tamaño de la fila -->
    <td width="170px">' . $apellidos . ' ' . $nombres . '</td>
</tr>
<tr>
    <td><b>Numero de Control: </b></td> <!--- el tamaño de la fila -->
    <td width="170px">' . $num_control . '</td>
</tr>

<tr>
    <td><b>Carrera: </b></td> <!--- el tamaño de la fila -->
    <td width="170px">' . $nivel . '</td>
</tr>
<tr>
    <td><b>Sistema: </b></td> <!--- el tamaño de la fila -->
    <td width="170px">' . $sistema . '</td>
</tr>
<tr>
    <td><b>Cuatrimestre: </b></td> <!--- el tamaño de la fila -->
    <td width="200px">' . $curso . ' ' . $grupo . ' </td>
</tr> 

<tr>
    <td><b>Mes Cancelado: </b></td> <!--- el tamaño de la fila -->
    <td width="170px">' . $mes_pagado . '</td>
</tr>
<tr>
    <td><b>Monto Cancelado: </b></td> <!--- el tamaño de la fila -->
    <td width="170px">' . $monto_pagado . ' pesos </td>
</tr>
</table>

<br><br><br><br>






<table border="0">
<tr>
    <td style="text-align:center">_____________________________________ <br> 
    <b>Recibi Conforme</b> <br>  
</td>

    <td style= "text-align:center">_____________________________________<br>
    <b>Caja</b> <br>
</td>           
</tr>

</table>
<br>

Fecha:' . $dia_actual . ' de ' . $mes_actual . ' del ' . $ano_actual . '


<p>------------------------------------------------------------------------------------------------------------------------------------------------------</p>
<table  border="0"> 
<tr> 
<td width="150px" style="text-align:center"><img src="../../public/images/configuracion/' . $logo . '" width="80px" alt=""></td>
<td width="400px"></td>
<td width="160px">

<p>
<br/>
<b>Nro: </b>' . $id_pago . ' <br>
<b>Fecha: </b>' . $fecha_pagado . '
</p>
</td>
</tr>

<tr>
<td style="text-align:center"><b>' . $nombre_institucion . '</b><br> 
<small>' . $direccion . '</small><br>
<small>' . "Tel:" . '' . $telefono . ' ' . "Cel:" . '  ' . $celular . '</small>
</td> 
<td style="text-align:center"><h2><b>RECIBO DE CAJA</b></h2></td>
<td style="text-align:center"><b>COPIA</b></td>

</tr>
</table>

<br>
<br>

<table border="0">
<tr>
    <td><b>Estudiante: </b></td> <!--- el tamaño de la fila -->
    <td width="170px">' . $apellidos . ' ' . $nombres . '</td>
</tr>
<tr>
    <td><b>Numero de Control: </b></td> <!--- el tamaño de la fila -->
    <td width="170px">' . $num_control . '</td>
</tr>
<tr>
    <td><b>Carrera: </b></td> <!--- el tamaño de la fila -->
    <td width="170px">' . $nivel . '</td>
</tr>
<tr>
    <td><b>Sistema: </b></td> <!--- el tamaño de la fila -->
    <td width="170px">' . $sistema . '</td>
</tr>

<tr>
    <td><b>Cuatrimestre: </b></td> <!--- el tamaño de la fila -->
    <td width="200px">' . $curso . ' ' . $grupo . '</td>
</tr>

<tr>
    <td><b>Mes Cancelado: </b></td> <!--- el tamaño de la fila -->
    <td width="170px">' . $mes_pagado . '</td>
</tr>
<tr>
    <td><b>Monto Cancelado: </b></td> <!--- el tamaño de la fila -->
    <td width="170px">' . $monto_pagado . ' pesos </td>
</tr>
</table>

<br><br><br> 


<table border="0">
<tr>
    <td style="text-align:center">_____________________________________ <br> 
    <b>Recibi Conforme</b> <br>  
</td>

    <td style= "text-align:center">_____________________________________<br>
    <b>Caja</b> <br>
</td>           
</tr>

</table>

Fecha:' . $dia_actual . ' de ' . $mes_actual . ' del ' . $ano_actual . '
</p> 

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
