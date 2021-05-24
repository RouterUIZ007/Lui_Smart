<?php

require_once "conexion.php";

class ModeloClientes
{

	/*=============================================
	REGISTRO DE CLIENTES
	=============================================*/

	public static function mdlIngresarClientes($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(
            nombre, telefono, calle, inter, exter, colonia) 
            VALUES 
            (:nombre, :telefono, :calle, :inter, :exter, :colonia)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
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
	MOSTRAR CLIENTES
	=============================================*/

	public static function MdlMostrarClientes($tabla, $item, $valor)
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


	/*=============================================
	MOSTRAR CLIENTES reciente
	=============================================*/

	public static function MdlMostrarClientes2($tabla, $item)	{

		if ($item == null) {

			$stmt = Conexion::conectar()->prepare("SELECT MAX(id_c) FROM $tabla");

			$stmt->execute();

			return $stmt->fetch();
		} 


		$stmt->close();
		$stmt = null;
	}



		/*Editar cliente*/

		public static function mdlEditarCliente($tabla,$datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, telefono = :telefono, calle = :calle, inter = :inter, exter = :exter, colonia = :colonia WHERE nombre = :nombre");
	
			$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
			$stmt -> bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
			$stmt -> bindParam(":calle", $datos["calle"], PDO::PARAM_STR);
			$stmt -> bindParam(":inter", $datos["inter"], PDO::PARAM_STR);
			$stmt -> bindParam(":exter", $datos["exter"], PDO::PARAM_STR);
			$stmt -> bindParam(":colonia", $datos["colonia"], PDO::PARAM_STR);
	
			if($stmt -> execute()){
				return "ok";
			}else{
				return "error";
			}
			
			$stmt -> close(); 
			$stmt = null; 
	
		}
	
		/*Borrar Cliente*/
	
		public static function mdlBorrarCliente($tabla,$datos){
	
			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_c = :id_c");
	
			$stmt -> bindParam(":id_c", $datos, PDO::PARAM_INT);
	
			if($stmt -> execute()){
				return "ok";
			}else{
				return "error";
			}
			
			$stmt -> close(); 
			$stmt = null; 
	
	
		}
}
