<?php

require_once "conexion.php";

class ModeloClientes{

	/*=============================================
	REGISTRO DE CLIENTES
	=============================================*/

	public static function mdlIngresarClientes($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(
            nombre, telefono, calle, numero, colonia) 
            VALUES 
            (:nombre, :telefono, :calle, :numero, :colonia)");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt -> bindParam(":calle", $datos["calle"], PDO::PARAM_STR);
		$stmt -> bindParam(":numero", $datos["numero"], PDO::PARAM_STR);
		$stmt -> bindParam(":colonia", $datos["colonia"], PDO::PARAM_STR);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}
		
		$stmt -> close(); 
		$stmt = null; 

	}
}
