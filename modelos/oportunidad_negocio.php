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

  
    public function editar_oportunidad($id,$num_ident,$nombre_completos, $apellidos_completos, $result)
    {
        $razon_social = $nombre_completos . " " .$apellidos_completos;
        $sql="UPDATE `ct63_oportuniodad_negocio` SET `nidentificacion`=:num_ident ,`razon_social`= :razon_social ,`nombrescompletos`= :nombre_completos,`apellidoscompletos`= :apellidos_completos,`resultado`= :resultado, `status_op`=:estatus WHERE `id` = :id";
        // Preparar la conexion del sentencia SQL
        $stmt = $this->con->prepare($sql);
        // Marcadores
        $stmt->bindParam(':estatus', $result, PDO::PARAM_STR);
        $stmt->bindParam(':resultado', $result, PDO::PARAM_STR);
        $stmt->bindParam(':apellidos_completos', $apellidos_completos, PDO::PARAM_STR);
        $stmt->bindParam(':nombre_completos', $nombre_completos, PDO::PARAM_STR);
        $stmt->bindParam(':razon_social', $razon_social, PDO::PARAM_STR);
        $stmt->bindParam(':num_ident', $num_ident, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      
        //$stmt->bindParam(':var', $var, PDO::PARAM_STR);
        // Ejecuta SQL
        if ($stmt->execute()) {
            return true;
        }else{
            return false; // Error en la sentencia sql
        }
    }


    public function actualizar_resultado_op($id,$resultado){
        $sql="UPDATE `ct63_oportuniodad_negocio` SET `status_op`= :resultado WHERE `id` = :id";
        // Preparar la conexion del sentencia SQL
        $stmt = $this->con->prepare($sql);
        // Marcadores
        $stmt->bindParam(':resultado', $resultado, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      
        //$stmt->bindParam(':var', $var, PDO::PARAM_STR);
        // Ejecuta SQL
        if ($stmt->execute()) {
            return true;
        }else{
            return false; // Error en la sentencia sql
        }
    }

    public function select_resultado_op($id_select = null)
    {

        $option = "<option  selected='true' value='0'> Seleccione </option>";
        $sql = "SELECT `id`, `descripcion` FROM `resultado_op`";
        //Preparar Conexion
        $stmt = $this->con->prepare($sql);

        // Asignando Datos ARRAY => SQL
        // Ejecutar 
        $result = $stmt->execute();


        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if ($id_select == $fila['id']) {
                $selection = "selected='true'";
            } else {
                $selection = "";
            }
            $option .= '<option value="' . $fila['id'] . '" ' . $selection . ' >' . $fila['descripcion'] . ' </option>';
        }

        //Cerrar Conexion
        $this->PDO->closePDO();

        //resultado
        return $option;
    
    }

    public function edit_visita($id,$fecha,$resultado,$observacion)
    {
        $sql="UPDATE `cliente_has_visitas` SET `fecha`= :fecha,`resultado`=:resultado,`obs`=:observacion WHERE `id` = :id";
        // Preparar la conexion del sentencia SQL
        $stmt = $this->con->prepare($sql);
        // Marcadores
        $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
        $stmt->bindParam(':resultado', $resultado, PDO::PARAM_STR);
        $stmt->bindParam(':observacion', $observacion, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      
        //$stmt->bindParam(':var', $var, PDO::PARAM_STR);
        // Ejecuta SQL
        if ($stmt->execute()) {
            return true;
        }else{
            return false; // Error en la sentencia sql
        }
    }

    public function getdate_for_id($id_cliente){
        $sql="SELECT id, `fecha` FROM `cliente_has_visitas`  WHERE id_cliente = :id_cliente ORDER BY `cliente_has_visitas`.`fecha` DESC  LIMIT 1";
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
                    $data_array['fecha'] = $fila['fecha'];                    
                    $datosf[] = $data_array;
                }
                return $datosf;
            }else{
                return false; // El resultado de la sentencia SQL es igual a 0
            }
        }else{
            return false; // Error en la sentencia sql
        }
    }

    public function getdata_oportunidad_negocio_for_id($id)
    {
        $sql = "SELECT `id`, `fecha`, `nidentificacion`, `razon_social`, `nombrescompletos`, `apellidoscompletos`, `resultado`, `observacion`, `status_op` FROM `ct63_oportuniodad_negocio` WHERE `id` = :id";
        // Preparar la conexion del sentencia SQL
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        //$stmt->bindParam(':var', $var, PDO::PARAM_STR);
        // Ejecuta SQL
        if ($stmt->execute()) {
            $num_reg =  $stmt->rowCount(); // Cuenta los numero de registros de sql
            // Valida si hay registros
            if ($num_reg > 0) {
                // Recorrer limpieza de datos obtenidos en la consulta
                while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $data_array['id'] = $fila['id'];
                    $data_array['fecha'] = $fila['fecha'];
                    $data_array['nidentificacion'] = $fila['nidentificacion'];
                    $data_array['razon_social'] = $fila['razon_social'];
                    $data_array['nombrescompletos'] = $fila['nombrescompletos'];
                    $data_array['apellidoscompletos'] = $fila['apellidoscompletos'];
                    $data_array['resultado'] = $fila['resultado'];
                    $data_array['observacion'] = $fila['observacion'];
                    $data_array['status_op'] = $fila['status_op'];
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

    public function datatable_visita($id_cliente)
    {
        $sql="SELECT cliente_has_visitas.id, `id_cliente`, `fecha`, `resultado`,resultado_op.descripcion as resultado_visita, `obs` FROM `cliente_has_visitas` INNER JOIN resultado_op ON cliente_has_visitas.resultado = resultado_op.id  WHERE id_cliente = :id_cliente";
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
                    $data_array['resultado'] = $fila['resultado_visita'];
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
        $stmt->bindParam(':resultado', $resultado, PDO::PARAM_INT);
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
        $sql = "SELECT ct63_oportuniodad_negocio.id , `fecha`, `nidentificacion`,razon_social, `nombrescompletos`, `apellidoscompletos`, `resultado`, `observacion`, `status_op`,resultado_op.descripcion as estado_op FROM `ct63_oportuniodad_negocio`  INNER JOIN resultado_op ON ct63_oportuniodad_negocio.status_op = resultado_op.id; LIMIT 1000";
        $stmt = $this->con->prepare($sql);
        //  $stmt-> (':id_cliente', $this->id, PDO::PARAM_INT);
        if ($result = $stmt->execute()) {
            $num_reg =  $stmt->rowCount();
            if ($num_reg >= 0) {
                while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) { // Obtener los datos de los valores
                    $datos['id'] = $fila['id'];
                    $datos['fecha'] = $fila['fecha'];
                    $datos['nidentificacion'] = $fila['nidentificacion'];
                    $datos['razon_social'] = $fila['razon_social'];
                    $datos['resultado'] = $fila['resultado'];
                    $datos['observacion'] = $fila['observacion'];
                    $datos['status_op'] = $fila['estado_op'];
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