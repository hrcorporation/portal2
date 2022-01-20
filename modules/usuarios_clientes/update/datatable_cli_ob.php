<?php

session_start();
header('Content-Type: application/json');

require '../../../librerias/autoload.php';
require '../../../modelos/autoload.php';
require '../../../vendor/autoload.php'; 

$PDO = new conexionPDO();
$con = $PDO->connect();
$data_tables = new data_tables();

$id_tercero = intval($_POST['id_usuario']);
$data = $data_tables::dt_cliente_obra_for_user($con,$id_tercero);


print json_encode($data, JSON_UNESCAPED_UNICODE);