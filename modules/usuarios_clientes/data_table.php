<?php

session_start();
header('Content-Type: application/json');

require '../../librerias/autoload.php';
require '../../modelos/autoload.php';
require '../../vendor/autoload.php';


$t1_terceros = new t1_terceros();

$data = $t1_terceros->select_user_cliente2();



//print json_encode($datos, JSON_FORCE_OBJECT);
print json_encode($data, JSON_UNESCAPED_UNICODE);