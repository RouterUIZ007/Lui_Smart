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


	/*=============================================
	MOSTRAR VEHICULOS
	=============================================*/

	public static function MdlMostrarVehiculos($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

		   $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		   $stmt -> execute();

		   return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		   $stmt -> execute();

		   return $stmt -> fetchAll();

		}

	   $stmt -> close();

	   $stmt = null;



   }

}
