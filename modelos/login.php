<?php
class login extends conexionPDO
{
    public $con;

    public function __construct()
    {
        $this->PDO = new conexionPDO();
        $this->con = $this->PDO->connect();
        date_default_timezone_set('America/Bogota');
    }


    /**
     * Funcion para Obtener el Rol del Usuario
     */
    public function get_rol_tercero($id_user)
    {
        $sql = "SELECT `id_rol` FROM `tercero_has_rol` WHERE `id_tercero` = :id_user";
        $stmt = $this->con->prepare($sql); // Preparar la conexion
        // Asignando Datos  SQL
        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_STR);

        if ($result = $stmt->execute()) { // Ejecutar
            $num_reg =  $stmt->rowCount(); // Get Numero de Registros
            if ($num_reg > 0) { // Validar el numero de Registros
                while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) { // Obtener los datos de los valores
                    $datos['id_rol'] = $fila['id_rol'];
                    $datosf[] = $datos;
                }
                return $datosf;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Funcion Para obtener el tipo de tercero
     */
    public static function get_tipo_tercero($con, $id_user)
    {
        $sql = "SELECT `id_tipo` FROM `tercero_as_tipo` WHERE `id_tercero`= :id_user";
        $stmt = $con->prepare($sql); // Preparar la conexion
        // Asignando Datos  SQL
        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_STR);

        if ($result = $stmt->execute()) { // Ejecutar
            $num_reg =  $stmt->rowCount(); // Get Numero de Registros
            if ($num_reg > 0) { // Validar el numero de Registros
                while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) { // Obtener los datos de los valores
                    $datos['id_tipo'] = $fila['id_tipo'];
                    $datosf[] = $datos;
                }
                return $datosf;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    /**
     * Funcion para Validad la autenticacion de los usuarios 
     */
    public function login_auth($usuario, $pass)
    {
        if (is_array($array_datos_user = SELF::auth_num_identificacion($this->con, $usuario, $pass))) {
            return $array_datos_user;
        } else {
            return false;
        }
    }

    /**
     * Autenticar usuario por Numero de Identificacion 
     */
    public static function auth_num_identificacion($con, $user, $pass)
    {

        $user_table = array('ct1_NumeroIdentificacion', 'ct1_usuario', 'ct1_CorreoElectronico');

        foreach ($user_table as $key) {
            $sql = "SELECT `ct1_IdTerceros`,ct1_Estado,`ct1_RazonSocial` FROM `ct1_terceros` WHERE " . $key . " = :user AND `ct1_pass` = :pass LIMIT 1";
            $stmt = $con->prepare($sql); // Preparar la conexion
            // Asignando Datos  SQL
            $stmt->bindParam(':user', $user, PDO::PARAM_STR);
            $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);

            if ($result = $stmt->execute()) { // Ejecutar
                $num_reg =  $stmt->rowCount(); // Get Numero de Registros
                if ($num_reg > 0) { // Validar el numero de Registros
                    while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) { // Obtener los datos de los valores
                        $datos['id'] = $fila['ct1_IdTerceros'];
                        $datos['nombre_completo'] = $fila['ct1_RazonSocial'];
                        $datos['estado'] = $fila['ct1_Estado'];

                        $datosf[] = $datos;
                    }
                    return $datosf;
                } else {
                    //return false;
                }
            } else {
                //return false;
            }
        }
    }
}
