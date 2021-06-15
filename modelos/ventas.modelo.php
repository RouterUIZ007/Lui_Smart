<?php

require_once "conexion.php";

class ModeloVenta
{

    public static function mdlIngresarVenta($tabla, $datos)
	{


		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(
            fecha) 
            VALUES
            (NOW()
			)");

	/* 	$stmt->bindParam(":id_v", $aux[0], PDO::PARAM_STR);
		$stmt->bindParam(":total", $aux2[0], PDO::PARAM_STR); */

		if ($stmt->execute()) {
			return "ok";
		} else {
			return "error";
		}

		$stmt->close();
		$stmt = null;
	}



    
}