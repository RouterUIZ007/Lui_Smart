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
            folio_p,fecha, id_e, total, subtotal, cantidad, cambio) 
            VALUES 
            (:folio_p, NOW(), :id_e, :total, :subtotal, :cantidad, :cambio)");

		$stmt->bindParam(":folio_p", $datos["folio_p"], PDO::PARAM_STR);
		$stmt->bindParam(":id_e", $datos["id_e"], PDO::PARAM_STR);

		$stmt->bindParam(":total", $datos["total"], PDO::PARAM_STR);
		$stmt->bindParam(":subtotal", $datos["subtotal"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_STR);
		$stmt->bindParam(":cambio", $datos["cambio"], PDO::PARAM_STR);

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

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla as pre
			INNER JOIN 
			vehiculo as veh
			WHERE pre.id_v = veh.id_v 
			and
			$item = :folio_p;");

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



	public static function MdlMostrarVentas($tabla, $item, $valor)
	{
		if ($valor != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :folio_v ");

			$stmt->bindParam(":folio_v ", $valor, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetch();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla as ven
			INNER JOIN 
			usuarios as usu
			WHERE ven.id_e = usu.id;
			");

			$stmt->execute();
			return $stmt->fetchAll();
		}
		$stmt->close();
		$stmt = null;
	}
}
