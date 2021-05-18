<?php

require_once "conexion.php";

class ModeloServicio{

	/*=============================================
	REGISTRO DE VEHICULOS 
	=============================================*/

	public static function mdlIngresarServicio($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(
            Id_v,concepto, costo, tipo) 
            VALUES 
            (:Id_v, :concepto, :costo, :tipo)");

		$stmt -> bindParam(":Id_v", $datos["Id_v"], PDO::PARAM_STR);
		$stmt -> bindParam(":concepto", $datos["concepto"], PDO::PARAM_STR);
		$stmt -> bindParam(":costo", $datos["costo"], PDO::PARAM_STR);
		$stmt -> bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);

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

	public static function MdlMostrarServicio($tabla, $item, $valor){

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