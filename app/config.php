<?php
define('SERVIDOR', 'localhost');
define('USUARIO', 'root');
define('PASSWORD', 'root');
define('BD', 'gestionescolar');
define('PUERTO', 3306); // Puerto del servidor de la base de datos


define('APP_NAME', 'SISTEMA DE GESTION  ESCOLAR');
define('APP_URL', 'http://localhost/gestionescolar/');
define('kEY_API_MAPS', '');

$SERVIDOR = "mysql:dbname=" . BD . ";host=" . SERVIDOR . ";port=" . PUERTO; // quitar puerto

try {
    $pdo = new PDO($SERVIDOR, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    //echo "Conexion exitosa";
} catch (PDOException $e) {
    echo "Error de conexion: " . $e->getMessage();
}

date_default_timezone_set('America/Mexico_City');
$fechaHora = date("Y-m-d H:i:s");
$fecha_actual = date("Y-m-d");
$dia_actual = date("d");
$mes_actual = date("m");
$ano_actual = date("Y");

$estado_de_registro = '1';//Activo
