<?php

session_start();
header('Content-Type: application/json');

require '../../librerias/autoload.php';
require '../../modelos/autoload.php';
require '../../vendor/autoload.php';

$php_clases = new php_clases();
$t29_batch = new t29_batch();
$login = new login();
$t26_remisiones  = new t26_remisiones();

/**
 * Validacion de Usuario
 */
if (is_array($array_rol_user =  $login->get_rol_tercero($_SESSION['id_usuario']))) {
  
    if ($login->validar_rol_user([25], $array_rol_user)) { // Validacion para habilitar el usuario
        $data = $t26_remisiones->get_datos_for_conductor($_SESSION['id_usuario']);
    }elseif($login->validar_rol_user([1,8,9,10,11,15,16,19,20,22,26,27,29], $array_rol_user))
    {
        $data = $t26_remisiones->get_datos_for_admin();
    }

}
  
        


     
        



//print json_encode($datos, JSON_FORCE_OBJECT);
print json_encode($data, JSON_UNESCAPED_UNICODE);