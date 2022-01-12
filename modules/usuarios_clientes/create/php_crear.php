<?php

session_start();
header('Content-Type: application/json');

require '../../../librerias/autoload.php';
require '../../../modelos/autoload.php';
require '../../../vendor/autoload.php'; 

/**
     * FirePHP Sirve para salida del mensaje en la consola del navegador log.
     *$firephp->fb('Hello World');
     *$firephp->fb('Log message'  ,FirePHP::LOG);
     *$firephp->fb('Info message' ,FirePHP::INFO);
     *$firephp->fb('Warn message' ,FirePHP::WARN);
     *$firephp->fb('Error message',FirePHP::ERROR);
     */
$firephp = FirePHP::getInstance(true);

$php_clases = new php_clases();
$t1_terceros = new t1_terceros();
$usuarios = new usuarios();


$conexionPDO = new conexionPDO();
$con = $conexionPDO->connect();


$php_estado = false;
$php_error[] = "";
$resultado = "";


if(isset($_POST['C_NumeroID'])&&isset($_POST['C_nombres']) &&isset($_POST['C_Apellidos']) ){
    
    
    $C_NumeroID = htmlspecialchars($_POST['C_NumeroID']);
    $C_nombres = htmlspecialchars($_POST['C_nombres']);
    $C_Apellidos = htmlspecialchars($_POST['C_Apellidos']);
    $C_Usuario = $C_NumeroID;
    $id_cliente1 = htmlspecialchars($_POST['C_IdTerceros']);
    $id_obra = htmlspecialchars($_POST['C_Obras']);
    $C_Pass = md5($C_NumeroID);
    $razonSocial = $C_nombres ." ".$C_Apellidos;

    $estado = 1;
    $rol = htmlspecialchars($_POST['txt_rol']);
    $TipoTercero = 3;
    $id_tipo_tercero = 1;
    

    $id_tercero = $t1_terceros->crear_usuario_cliente($C_NumeroID, $C_nombres, $C_Apellidos, $id_cliente1,$id_obra,$rol);

    $usuarios->crear_tercero_rol($con,$id_tercero,$rol,$id_cliente1,$id_obra);
    $usuarios->crear_tercero_has_cli_ob($con,$id_tercero,$id_cliente1,$id_obra);
    $usuarios->crear_tercero_has_tipo($con,$id_tercero,$id_tipo_tercero);


            if ($id_tercero) {
                
                $php_estado= true;
            } else {
                 $php_estado = false;
                 $php_error = "Erro el guardar en la bae de datos";
            }
            
    
    
}else{
    $php_estado = false;
    $php_error = "faltan campos requeridos";
}

$datos = array(
    'estado' => $php_estado,
    'errores' => $php_error,
    'result' => $resultado,
);


echo json_encode($datos, JSON_FORCE_OBJECT);