<?php
class oportunidad_negocio extends conexionPDO
{
    protected $con;

    public function __construct()
    {
        $this->PDO = new conexionPDO();
        $this->con = $this->PDO->connect();
        date_default_timezone_set('America/Bogota');
    }

    public function datatable_visita($id_cliente)
    {
        $sql="SELECT `id`, `id_cliente`, `fecha`, `resultado`, `obs` FROM `cliente_has_visitas` WHERE id_cliente = :id_cliente";
        // Preparar la conexion del sentencia SQL
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);

//$stmt->bindParam(':var', $var, PDO::PARAM_STR);
// Ejecuta SQL
if ($stmt->execute()) {
    $num_reg =  $stmt->rowCount(); // Cuenta los numero de registros de sql
    // Valida si hay registros
    if ($num_reg > 0) {
        // Recorrer limpieza de datos obtenidos en la consulta
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data_array['id'] = $fila['id'];
            $data_array['id_cliente'] = $fila['id_cliente'];
            $data_array['fecha'] = $fila['fecha'];
            $data_array['resultado'] = $fila['resultado'];
            $data_array['obs'] = $fila['obs'];
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

    public function crear_visita($id_cliente,$fecha,$resultado,$observacion)
    {
        $sql="INSERT INTO `cliente_has_visitas`(`id_cliente`, `fecha`, `resultado`, `obs`) VALUES (:id_cliente, :fecha, :resultado,:observacion)";
        // Preparar la conexion del sentencia SQL
        $stmt = $this->con->prepare($sql);
        // Marcadores
        $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
        $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
        $stmt->bindParam(':resultado', $resultado, PDO::PARAM_STR);
        $stmt->bindParam(':observacion', $observacion, PDO::PARAM_STR);
      
        //$stmt->bindParam(':var', $var, PDO::PARAM_STR);
        // Ejecuta SQL
        if ($stmt->execute()) {
            return $this->con->lastInsertId(); 
        }else{
            return false; // Error en la sentencia sql
        }

    }

    public function crear_oportunidad_negocio($fecha,$nit,$nombres, $apellidos,$status)
    {
        $razon_social= $nombres. " ".$apellidos;
        $sql="INSERT INTO `ct63_oportuniodad_negocio`( `fecha`, `nidentificacion`, `razon_social`, `nombrescompletos`, `apellidoscompletos`, `status_op`) VALUES (:fecha,:nit,:razon_social, :nombres, :apellidos,:estatus)";
      
        // Preparar la conexion del sentencia SQL
        $stmt = $this->con->prepare($sql);
        // Marcadores
        $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
        $stmt->bindParam(':nit', $nit, PDO::PARAM_INT);
        $stmt->bindParam(':razon_social', $razon_social, PDO::PARAM_STR);
        $stmt->bindParam(':nombres', $nombres, PDO::PARAM_STR);
        $stmt->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
        $stmt->bindParam(':estatus', $status, PDO::PARAM_INT);
        //$stmt->bindParam(':var', $var, PDO::PARAM_STR);
        // Ejecuta SQL
        if ($stmt->execute()) {
            return $this->con->lastInsertId(); 
        }else{
            return false; // Error en la sentencia sql
        }
    }


    public function dt_oportunidad_negocio()
    {
        $sql = "SELECT `id`, `fecha`, `nidentificacion`,razon_social, `nombrescompletos`, `apellidoscompletos`, `resultado`, `observacion`, `status_op` FROM `ct63_oportuniodad_negocio`  LIMIT 1000";
        $stmt = $this->con->prepare($sql);
        //  $stmt-> (':id_cliente', $this->id, PDO::PARAM_INT);
        if ($result = $stmt->execute()) {
            $num_reg =  $stmt->rowCount();
            if ($num_reg > 0) {
                while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) { // Obtener los datos de los valores
                    $datos['id'] = $fila['id'];
                    $datos['nidentificacion'] = $fila['nidentificacion'];
                    $datos['razon_social'] = $fila['razon_social'];
                    $datos['resultado'] = $fila['resultado'];
                    $datos['observacion'] = $fila['observacion'];
                    $datos['status_op'] = $fila['status_op'];
                    $datosf[] = $datos;
                }
                return $datosf;
            } else {
                return "Resultado de registros es Cero";
            }
        } else {
            return false;
        }
        //Cerrar Conexion
        $this->PDO->closePDO();
    }




}