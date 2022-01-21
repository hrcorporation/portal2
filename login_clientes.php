<?php

session_start();
header('Content-Type: application/json');
require 'librerias/autoload.php';
require 'modelos/autoload.php';
require 'vendor/autoload.php';

$login = new login();

$t1_terceros = new t1_terceros();
$php_clases = new php_clases();

$php_estado = false;
$php_msg = "";
$php_codigo = "#";

if (!empty($_POST['usuario']) && !empty($_POST['contrasenia'])) {
    $php_usuario = htmlspecialchars($_POST['usuario']);
    $php_password = htmlspecialchars(md5($_POST['contrasenia']));
    $hoy = date("d-m-Y H:i:s");
    if($_POST['usuario'] == $_POST['contrasenia']){
        $cambio_pass = true;
    }else{
        $cambio_pass = false;
    }

    /**
     * Se Valida El Usuario y la Contraseña
     */
    if (is_array($user_array = $login->login_auth($php_usuario, $php_password))) {
        foreach ($user_array as $key) {
           

            /**
             * Valida el Estado del Usuario
             */
            if (intval($key['estado']) == 1) {
                $php_msg = "paso 3";

                /**
                 * Se crea y se definen las variables de sesion
                 */
                $_SESSION['id_usuario'] = $key['id'];
                $_SESSION['nombre_usuario'] = $key['nombre_completo'];
                $_SESSION['session_key'] = $hoy;


                if (is_array($array_rol = $login->get_rol_tercero($key['id']))) {
                    $php_msg = "paso 4";

                    foreach ($array_rol as $rol_user) {

                       

                        switch (intval($rol_user)) {
                            case 101:
                            case '101':
                                break;
                            case 102:
                                if($cambio_pass){
                                    $php_codigo = "portalcliente/modulos/profile/passnew.php";
                                }else{
                                    $php_codigo = "portalcliente/modulos/remisiones/index.php";
                                }    
                            break;
                            case 103:
                                if($cambio_pass){
                                    $php_codigo = "portalcliente/modulos/profile/passnew.php";
                                }else{
                                    $php_codigo = "portalcliente/modulos/remisiones_cliente/index.php";
                                }
                                break;
                            default:
                                $php_codigo = "cerrar.php";
                                $php_estado = false;
                                $php_msg = "No tiene Permisos ";
                                break;
                        }

                        if(intval($rol_user) == 101 ){
                            $php_codigo = "portalcliente/modulos/facturacione/index.php";
                            $php_estado = true;
                            $php_msg = "Logeado Correctamente";
                        }else{

                        }
                    }
                }
            } else {
                $php_msg = "El Usuario se Encuentra desabilitado";
            }
        }
    } else {
        $php_msg = "Usuario y/o Constraseña Incorrecta";
    }
} else {
    $php_msg = "faltan llenar Campos Requeridos";
}

$datos = array(
    'estado' => $php_estado,
    'codigo' => $php_codigo,
    'errores' => $php_msg,
    'post' => $_POST,
    'key' => $key,
    'result' => $rol_user,

);


echo json_encode($datos, JSON_FORCE_OBJECT);



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

