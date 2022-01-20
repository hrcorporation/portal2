<?php
class data_tables extends conexionPDO {

    public $con;

    // Iniciar Conexion
    public function __construct() {
        $this->PDO = new conexionPDO();
        $this->con = $this->PDO->connect();
    }

    /**
    *public static function dt_name($con,$var){
    *    $sql = "";
    *    // Preparar la conexion del sentencia SQL
    *    $stmt = $con->prepare($sql);
    *    // Marcadores
    *    $stmt->bindParam(':var', $var, PDO::PARAM_INT);
    *    $stmt->bindParam(':var', $var, PDO::PARAM_STR);
    *    // Ejecuta SQL
    *    if ($stmt->execute()) {
    *        $num_reg =  $stmt->rowCount(); // Cuenta los numero de registros de sql
    *        // Valida si hay registros
    *        if ($num_reg > 0) {
    *            // Recorrer limpieza de datos obtenidos en la consulta
    *            while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
    *                $data_array = $fila[''];
    *                $datosf[] = $data_array;
    *            }
    *            return $datosf; // Retorna el resultado
    *        }else{
    *            return false; // El resultado de la sentencia SQL es igual a 0
    *        }
    *    }else{
    *        return false; // Error en la sentencia sql
    *    }
    *}
*
    **/
    public static function dt_cliente_obra_for_user($con,$id_tercero){
        $sql = "SELECT `id`, `id_tercero`, `id_cliente`,ct1_terceros.ct1_RazonSocial as nombre_cliente, `id_obra`, ct5_obras.ct5_NombreObra as nombre_obra FROM `tercero_has_obra` INNER JOIN ct1_terceros ON tercero_has_obra.id_cliente = ct1_terceros.ct1_IdTerceros INNER JOIN ct5_obras ON tercero_has_obra.id_obra = ct5_obras.ct5_IdObras WHERE `id_tercero`= :id_tercero";
        // Preparar la conexion del sentencia SQL
        $stmt = $con->prepare($sql);
        // Marcadores
        $stmt->bindParam(':id_tercero', $id_tercero, PDO::PARAM_INT);
        //$stmt->bindParam(':var', $var, PDO::PARAM_STR);
        // Ejecuta SQL
        if ($stmt->execute()) {
            $num_reg =  $stmt->rowCount(); // Cuenta los numero de registros de sql
            // Valida si hay registros
            if ($num_reg > 0) {
                // Recorrer limpieza de datos obtenidos en la consulta
                while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $data_array['id'] = $fila['id'];
                    $data_array['id_tercero'] = $fila['id_tercero'];
                    $data_array['id_cliente'] = $fila['id_cliente'];
                    $data_array['nombre_cliente'] = $fila['nombre_cliente'];
                    $data_array['id_obra'] = $fila['id_obra'];
                    $data_array['nombre_obra'] = $fila['nombre_obra'];
                    $datosf[] = $data_array;
                }
                return $datosf; // Retorna el resultado
            }else{
                return false; // El resultado de la sentencia SQL es igual a 0
            }
        }else{
            return false; // Error en la sentencia sql
        }
    }
}