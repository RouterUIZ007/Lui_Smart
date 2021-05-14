<?php

require_once "conexion.php";

class ModeloVehiculos{

	/*=============================================
	REGISTRO DE VEHICULOS 
	=============================================*/

	public static function mdlIngresarVehiculo($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(
            id_c,matricula, marca, modelo, color, observaciones) 
            VALUES 
            (:id_c, :matricula, :marca, :modelo, :color, :observaciones)");

		$stmt -> bindParam(":id_c", $datos["id_c"], PDO::PARAM_STR);
		$stmt -> bindParam(":matricula", $datos["matricula"], PDO::PARAM_STR);
		$stmt -> bindParam(":marca", $datos["marca"], PDO::PARAM_STR);
		$stmt -> bindParam(":modelo", $datos["modelo"], PDO::PARAM_STR);
		$stmt -> bindParam(":color", $datos["color"], PDO::PARAM_STR);
		$stmt -> bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}
		
		$stmt -> close(); 
		$stmt = null; 

	}
}
