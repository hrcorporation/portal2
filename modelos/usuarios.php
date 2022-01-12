<?php

class usuarios extends conexionPDO
{

    public $con;
    public function __construct()
    {
        $this->PDO = new conexionPDO();
        $this->con = $this->PDO->connect();
    }

    public static function crear_tercero_has_tipo($con,$id_user,$id_tipo_tercero)
    {
        $sql="INSERT INTO `tercero_as_tipo`( `id_tercero`, `id_tipo`) VALUES (:id_user,:id_tipo_tercero)";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $stmt->bindParam(':id_tipo_tercero', $id_tipo_tercero, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return intval($con->lastInsertId());
        } else {
            return false;
        }
    }

    public static function crear_tercero_has_cli_ob($con,$id_user,$id_cliente,$id_obra)
    {
        $sql="INSERT INTO `tercero_has_obra`(`id_tercero`, `id_cliente`, `id_obra`) VALUES (:id_user,:id_cliente,:id_obra)";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
        $stmt->bindParam(':id_obra', $id_obra, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return intval($con->lastInsertId());
        } else {
            return false;
        }
    }

    public static function crear_tercero_rol($con,$id_user,$id_rol,$id_cliente,$id_obra)
    {
        
        $sql="INSERT INTO `tercero_has_rol`(`id_tercero`, `id_rol`, `id_cliente`, `id_obra`) VALUES (:id_user,:id_rol,:id_cliente,:id_obra)";
        //Preparar SQL
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $stmt->bindParam(':id_rol', $id_rol, PDO::PARAM_INT);
        $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
        $stmt->bindParam(':id_obra', $id_obra, PDO::PARAM_INT);
   
        if ($stmt->execute()) {
            return intval($con->lastInsertId());
        } else {
            return false;
        }

    }
}