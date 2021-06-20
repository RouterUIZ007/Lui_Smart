<?php

require_once "conexion.php";

class ModeloVenta
{

	/*=============================================
	REGISTRO DE VEHICULOS 
	=============================================*/

	public static function mdlAgregarVenta($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(
            folio_p,fecha, id_e) 
            VALUES 
            (:folio_p, :fecha, :id_e)");

		$stmt->bindParam(":folio_p", $datos["folio_p"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":id_e", $datos["id_e"], PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "ok";
		} else {
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}
	public static function MdlMostrarPresupuestoVenta($tabla, $item, $valor)
	{


		if ($valor != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :folio_p");

			$stmt->bindParam(":folio_p", $valor, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetch();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt->execute();
			return $stmt->fetchAll();
		}
		$stmt->close();
		$stmt = null;
	}	
	
	
	public static function MdlMostrarV($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt->execute();

			return $stmt->fetchAll();
		}

		$stmt->close();

		$stmt = null;
	}
}
