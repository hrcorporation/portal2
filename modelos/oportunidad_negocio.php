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

    public function dt_oportunidad_negocio()
    {
        $sql = "SELECT `id`, `fecha`, `nidentificacion`, `nombrescompletos`, `apellidoscompletos`, `resultado`, `observacion`, `status_op` FROM `ct63_oportuniodad_negocio`  LIMIT 1000";
        $stmt = $this->con->prepare($sql);
        //  $stmt-> (':id_cliente', $this->id, PDO::PARAM_INT);
        if ($result = $stmt->execute()) {
            $num_reg =  $stmt->rowCount();
            if ($num_reg > 0) {
                while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) { // Obtener los datos de los valores
                    $datos['id'] = $fila['id'];
                    $datos['nidentificacion'] = $fila['nidentificacion'];
                    $datos['nombrescompletos'] = $fila['nombrescompletos'];
                    $datos['apellidoscompletos'] = $fila['apellidoscompletos'];
                    $datos['resultado'] = $fila['resultado'];
                    $datos['observacion'] = $fila['observacion'];
                    $datos['status_op'] = $fila['status_op'];
                    $datosf[] = $datos;
                }
                return $datosf;
            } else {
                return false;
            }
        } else {
            return false;
        }
        //Cerrar Conexion
        $this->PDO->closePDO();
    }




}
