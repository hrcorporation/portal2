<?php

/**
 * 
 */
class parametrizar extends conexionPDO
{
    protected $con;

    public function __construct()
    {
        $this->PDO = new conexionPDO();
        $this->con = $this->PDO->connect();
    }

    /**
     * Esta Funcion Selecciona los Terceros que Tenemos y dependiendo el Rol lo Agregamos al la Tala Tercero as tipo
     */
    function param_terceros_for_login()
    {
        if (is_array($array_tercero = SELF::select_terceros($this->con))) {


            /**
             * Eliminar Tablas
             */
            $arraytablas = array('tercero_as_tipo', 'tercero_has_rol', 'tercero_has_obra');

            if (true) {
                //SELF::eliminar_registos_tablas($this->con, $arraytablas);
            }


            foreach ($array_tercero as $key) {
                $key['id'];
                $key['tipo_tercero'];
                $key['num_identificacion'];
                $key['nombrecompleto'];
                $key['rol'];
                $key['id_cliente'];
                $key['id_obra'];


                if (intval($key['rol']) > 100) {
                    $tipocliente = 1; // EXTERNO
                } elseif ($key['rol'] < 100) {
                    $tipocliente = 2; // INTERNO
                } else {
                    $tipocliente = null;
                }

                /**
                 * Insertar Tipo de Tercero
                 */
                if (SELF::insert_tercero_as_tipo($this->con, $key['id'], $tipocliente)) {
                    $result[] = 'tercero_has_tipo Creado Exitosamente';
                } else {
                    $result[] = 'Hubo un Error Al Crear tercero_has_tipo';
                }

                /**
                 * Insertar Terceros con Roles
                 */
                if (SELF::insertar_tercero_has_rol($this->con, $key['id'], $key['rol'])) {
                    $result[] = 'tercero_has_rol Creado Exitosamente';
                } else {
                    $result[] = 'Hubo un Error Al Crear tercero_has_rol';
                }

                /**
                 * Insertar Terceros CLiente Obra
                 */
                if (SELF::insertar_tercero_has_obra($this->con, $key['id'], $key['id_cliente'], $key['id_obra'])) {
                    $result[] = 'tercero_has_obra Creado Exitosamente';
                } else {
                    $result[] = 'Hubo un Error Al Crear tercero_has_obra';
                }
            }
            return $result;
        } else {
            return false;
        }
    }



    public static function insertar_tercero_has_obra($con, $id_tercero, $cliente, $obra)
    {
        /**
         * Consulta SQL
         */
        $sql = "INSERT INTO `tercero_has_obra`( `id_tercero`, `id_cliente`, `id_obra`) VALUES (:id_tercero,:cliente,:obra)";
        /**
         * Preparar la Conexion en la Base de Datos
         */
        $stmt = $con->prepare($sql);
        /**
         * Marcador Para ejecutar consulta 
         */
        $stmt->bindParam(':id_tercero', $id_tercero, PDO::PARAM_INT);
        $stmt->bindParam(':cliente', $cliente, PDO::PARAM_INT);
        $stmt->bindParam(':obra', $obra, PDO::PARAM_INT);
        //$stmt->bindParam(':a', $a, PDO::PARAM_INT);
        /**
         * condicional para Ejecular el script SQL
         */
        if ($stmt->execute()) {
            return intval($con->lastInsertId()); // Retorna el ultimo valor insertado
        } else {
            // No Se ejecuto correctamente el script SQL
            return false;
        }
    }

    public static function insertar_tercero_has_rol($con, $id_tercero, $rol)
    {
        /**
         * Consulta SQL
         */
        $sql = "INSERT INTO `tercero_has_rol`(`id_tercero`, `id_rol`) VALUES (:id_tercero , :id_rol)";
        /**
         * Preparar la Conexion en la Base de Datos
         */
        $stmt = $con->prepare($sql);
        /**
         * Marcador Para ejecutar consulta 
         */
        $stmt->bindParam(':id_tercero', $id_tercero, PDO::PARAM_INT);
        $stmt->bindParam(':id_rol', $rol, PDO::PARAM_INT);
        //$stmt->bindParam(':a', $a, PDO::PARAM_INT);
        /**
         * condicional para Ejecular el script SQL
         */
        if ($stmt->execute()) {
            return intval($con->lastInsertId()); // Retorna el ultimo valor insertado
        } else {
            // No Se ejecuto correctamente el script SQL
            return false;
        }
    }

    public static function eliminar_registos_tablas($con, $arraytablas)
    {

        if (is_array($arraytablas)) {
            foreach ($arraytablas as $key) {
                $sql = "TRUNCATE " . $key;
                $stmt = $con->prepare($sql);
                $stmt->execute();
            }
        }
    }

    public static function insert_tercero_as_tipo($con, $id_tercero, $id_tipo)
    {
        /**
         * Consulta SQL
         */
        $sql = "INSERT INTO `tercero_as_tipo`(`id_tercero`, `id_tipo`) VALUES (:id_tercero, :id_tipo) ";
        /**
         * Preparar la Conexion en la Base de Datos
         */
        $stmt = $con->prepare($sql);
        /**
         * Marcador Para ejecutar consulta 
         */
        $stmt->bindParam(':id_tercero', $id_tercero, PDO::PARAM_INT);
        $stmt->bindParam(':id_tipo', $id_tipo, PDO::PARAM_INT);
        //$stmt->bindParam(':a', $a, PDO::PARAM_INT);
        /**
         * condicional para Ejecular el script SQL
         */
        if ($stmt->execute()) {
            return intval($con->lastInsertId()); // Retorna el ultimo valor insertado
        } else {
            // No Se ejecuto correctamente el script SQL
            return false;
        }
    }

    public static function select_terceros($con)
    {
        /**
         * Consulta SQL
         */
        $sql = "SELECT `ct1_IdTerceros`, `ct1_TipoTercero`, `ct1_NumeroIdentificacion`, `ct1_RazonSocial`, `ct1_id_cliente1`, `ct1_obra_id`,`ct1_rol` FROM `ct1_terceros` ";
        /**
         * Preparar la Conexion en la Base de Datos
         */
        $stmt = $con->prepare($sql);
        /**
         * Marcador Para ejecutar consulta where
         */
        //$stmt->bindParam(':a', $a, PDO::PARAM_INT);
        /**
         * condicional para Ejecular el script SQL
         */
        if ($stmt->execute()) {
            if (intval($stmt->rowCount()) > 0) { // Validar el numero de Registros
                while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) { // Ciclo While para Recorrer Guardar datos de la consulta
                    $datos['id'] = $fila['ct1_IdTerceros'];
                    $datos['tipo_tercero'] = $fila['ct1_TipoTercero'];
                    $datos['num_identificacion'] = $fila['ct1_NumeroIdentificacion'];
                    $datos['nombrecompleto'] = $fila['ct1_RazonSocial'];
                    $datos['rol'] = $fila['ct1_rol'];
                    $datos['id_cliente'] = $fila['ct1_id_cliente1'];
                    $datos['id_obra'] = $fila['ct1_obra_id'];
                    $datosf[] = $datos;
                }
                return $datosf;
            } else {
                // La Consulta ejecuto pero el numero de Registros es 0
                return false;
            }
        } else {
            // No Se ejecuto correctamente el script SQL
            return false;
        }
    }
}
