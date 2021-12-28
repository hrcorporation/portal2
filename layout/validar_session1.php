<?php

/**
 * Inicio de sesion
 */
session_start();
//ob_start();

/**
 * Condicional para Validar Sesion
 */
if (
    isset($_SESSION['session_key'])         && !empty($_SESSION['session_key']) &&
    isset($_SESSION['id_usuario'])          && !empty($_SESSION['id_usuario'])
) {

    
    /**
     * Cargar Los Autoload de los Modulos
     */
    require '../librerias/autoload.php';
    include '../modelos/autoload.php';
    include '../vendor/autoload.php';

    /**
     * ====================================================
     * Inicializar Clases
     */
    $php_clases = new php_clases();
    /**
     * FirePHP Sirve para salida del mensaje en la consola del navegador log.
     *$firephp->fb('Hello World');
     *$firephp->fb('Log message'  ,FirePHP::LOG);
     *$firephp->fb('Info message' ,FirePHP::INFO);
     *$firephp->fb('Warn message' ,FirePHP::WARN);
     *$firephp->fb('Error message',FirePHP::ERROR);
     */
    $firephp = FirePHP::getInstance(true);
    /**
     * ====================================================
     * Fin Clases
     */

    /**
     * Definir variables de sesion para el uso de menu nav, y el Registro de Acciones en el portal;
     */
    $id_usuario = intval($_SESSION['id_usuario']);
    $nombre_usuario = $_SESSION['nombre_usuario'];
} else {
    header('location: ../cerrar.php');
}
