<?php


class ModeloReportes
{
	public static function MdlReportes($tabla, $item, $valor)
	{

		if ($valor != null) {

			/* $consulta = "SELECT * FROM $tabla WHERE $item BETWEEN '2021/6/1' AND '2021/6/21'"; */
			$consulta = "SELECT * FROM $tabla WHERE $item BETWEEN '$valor[0]' AND '$valor[1]'";

			$stmt = Conexion::conectar()->prepare($consulta);

			$stmt->execute();

			return $stmt->fetchAll();
		}
	}
}
