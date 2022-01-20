<?php

session_start();
header('Content-Type: application/json');

require '../../../librerias/autoload.php';
require '../../../modelos/autoload.php';
require '../../../vendor/autoload.php'; 

$php_clases = new php_clases();
$t1_terceros = new t1_terceros();


$php_estado = false;
if(isset($_POST['id_usuario']) && !empty($_POST['id_usuario'])){
    
    $id_usuario = intval(htmlspecialchars($_POST['id_usuario']));
    $id_cliente = intval(htmlspecialchars($_POST['C_IdTerceros']));
    $id_obra = intval(htmlspecialchars($_POST['C_Obras']));
    
   $rest =  $t1_terceros->add_cliente_obra($id_usuario,$id_cliente, $id_obra);
    
    $php_estado = true;
    
}else {
    $php_estado = false;
}


$msg =  $rest;


$datos = array(
    'estado' => $php_estado,
    'msg' => $msg,
);


echo json_encode($datos, JSON_FORCE_OBJECT);
