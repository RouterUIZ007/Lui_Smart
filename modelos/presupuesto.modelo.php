<?php

require_once "conexion.php";

class ModeloPresupuesto
{

    /*=============================================
	REGISTRO DE CLIENTES
	=============================================*/

    public static function mdlIngresarPresupuesto($tabla, $datos, $v)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(
            total,fecha,Id_v) 
            VALUES 
            (:total,NOW(),:Id_v)");
            

        $stmt->bindParam(":total", $datos["costo"], PDO::PARAM_STR);
        $stmt->bindParam(":Id_v", $v, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }
}
