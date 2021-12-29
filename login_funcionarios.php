<?php
session_start();
header('Content-Type: application/json');
require 'librerias/autoload.php';
require 'modelos/autoload.php';
require 'vendor/autoload.php';

$login = new login();


$t1_terceros = new t1_terceros();
$t11_usuarios = new t11_usuarios();
$php_clases = new php_clases();

$php_estado = false;
$php_msg = "";
$php_codigo = "#";




if (!empty($_POST['usuario']) && !empty($_POST['contrasenia'])) {
    $php_usuario = htmlspecialchars($_POST['usuario']);
    $php_password = htmlspecialchars(md5($_POST['contrasenia']));
    $hoy = date("d-m-Y H:i:s");
    $php_msg = "paso 1";

    /**
     * Se Valida El Usuario y la Contraseña
     */
    if (is_array($user_array = $login->login_auth($php_usuario, $php_password))) {
        foreach ($user_array as $key) {
            $php_msg = "paso 2";

            /**
             * Valida el Estado del Usuario
             */
            if (intval($key['estado']) == 1) {
                $php_msg = "paso 3";

                /**
                 * Se crea y se definen las variables de sesion
                 */
                $_SESSION['id_usuario'] = $php_clases->HR_Crypt($key['id'], 1);
                $_SESSION['nombre_usuario'] = $key['nombre_completo'];
                $_SESSION['session_key'] = base64_encode($hoy);


                if (is_array($array_rol = $login->get_rol_tercero(intval($key['id'])))) {
                    $php_msg = "paso 4";

                    foreach ($array_rol as $rol_user) {
                        switch (intval($rol_user)) {
                            case 25:
                                $php_codigo = "modules/datos_remisiones/";
                                $php_estado = true;
                                $php_msg = "Logeado Correctamente";

                                break;
                            case ($rol_user > 0):
                            case ($rol_user < 90):
                                $php_codigo = "menu/dashboard.php";
                                $php_estado = true;
                                $php_msg = "Logeado Correctamente";

                                break;
                            default:
                                $php_codigo = "cerrar.php";
                                $php_estado = false;
                                $php_msg = "No tiene Permisos ";
                                break;
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
);


echo json_encode($datos, JSON_FORCE_OBJECT);
