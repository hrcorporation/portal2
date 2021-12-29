<?php

require '../../../librerias/autoload.php';
require '../../../modelos/autoload.php';
require '../../../vendor/autoload.php';

/**
 * Fire PHP
 */
$firephp = FirePHP::getInstance(true);
/**
 * FirePHP Sirve para salida del mensaje en la consola del navegador log.
 *$firephp->fb('Hello World');
 *$firephp->fb('Log message'  ,FirePHP::LOG);
 *$firephp->fb('Info message' ,FirePHP::INFO);
 *$firephp->fb('Warn message' ,FirePHP::WARN);
 *$firephp->fb('Error message',FirePHP::ERROR);
 */

/**
 * subir Clases
 */
require 'parametrizar.php';
$parametrizar = new parametrizar();



/**
 * Funcion Para Parametrizar Roles Usuarios
 */

if ($result_param = $parametrizar->param_terceros_for_login()) {
    $firephp->fb('Ejecutado Correctamente', FirePHP::INFO);
} else {
    $firephp->fb('Ejecutado Correctamente', FirePHP::INFO);
}
$firephp->fb($result_param, FirePHP::LOG);
