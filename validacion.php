<?php

header('Content-Type: application/json');
require 'librerias/autoload.php';
require 'modelos/autoload.php';
require 'vendor/autoload.php';


$conexionPDO = new conexionPDO();


fb($conexionPDO->connect()  ,FirePHP::LOG);
//fb('Info message' ,FirePHP::INFO);
//fb('Warn message' ,FirePHP::WARN);
//fb('Error message',FirePHP::ERROR);