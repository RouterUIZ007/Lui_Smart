<?php

require_once "conexion.php";

class ModeloPresupuesto
{

	/*=============================================
	REGISTRO DE CLIENTES
	=============================================*/

	public static function mdlIngresarPresupuesto($tabla, $datos)
	{

		$v = Conexion::conectar()->prepare("SELECT MAX(id_v) FROM vehiculo");
		$v->execute();
		$aux = $v->fetch();

		$t = Conexion::conectar()->prepare(
			"SELECT SUM(costo) FROM servicio as s 
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

	public static function MdlMostrarPresupuestoS($tabla, $item, $valor)
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

	public static function MdlMostrarPresupuestoVenta($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE folio_p = :folio");

			$stmt->bindParam(":folio", $item, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();

			
		}
		else if ($item == null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE folio_p = 1");

			$stmt->execute();

			return $stmt->fetch();
		} 

		$stmt->close();

		$stmt = null;
	}

	/*=============================================
	EDITAR PRESUPUESTOS
	=============================================*/
	public static function MdlEditarPresupuesto($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET fecha = :fecha, precio = :precio WHERE nombre = :nombre");

		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
		$stmt->bindParam(":calle", $datos["calle"], PDO::PARAM_STR);
		$stmt->bindParam(":inter", $datos["inter"], PDO::PARAM_STR);
		$stmt->bindParam(":exter", $datos["exter"], PDO::PARAM_STR);
		$stmt->bindParam(":colonia", $datos["colonia"], PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "ok";
		} else {
			return "error";
		}

		$stmt->close();
		$stmt = null;
	}


	/*=============================================
	ELIMINAR PRESUPUESTOS
	=============================================*/

	public static function mdlBorrarPresupuesto($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE folio_p = :folio_p");

		$stmt->bindParam(":folio_p", $datos, PDO::PARAM_INT);

		if ($stmt->execute()) {
			return "ok";
		} else {
			return "error";
		}

		$stmt->close();
		$stmt = null;
	}
}
