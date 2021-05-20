<?php

require_once "conexion.php";

class ModeloPresupuesto
{

    /*=============================================
	REGISTRO DE CLIENTES
	=============================================*/

    public static function mdlIngresarPresupuesto($tabla, $datos){
        
        $v = Conexion::conectar()->prepare("SELECT MAX(id_v) FROM vehiculo");
        $v->execute();
        $aux = $v->fetch();

        $t = Conexion::conectar()->prepare("SELECT SUM(costo) FROM servicio as s 
        inner join vehiculo as v 
        on v.id_v = s.Id_v 
        where s.Id_v = (SELECT max(id_v) from vehiculo);"
        );
        $t->execute();
        $aux2 = $t->fetch();


        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(
            total,fecha,id_v) 
            VALUES
            (:total,NOW(),:id_v)");
        $stmt->bindParam(":id_v", $aux[0], PDO::PARAM_STR);
        $stmt->bindParam(":total", $aux2[0], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }
}
