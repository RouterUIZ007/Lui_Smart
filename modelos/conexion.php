<?php

/**
 * conexion a base de datos
 */
class Conexion{
	
	 public static function conectar(){

		/*Conexion por PDO recibe conexion por servidor, usuario, contraseña y caracteres latinos*/
		$link = new PDO("mysql:host=localhost;dbname=luismart",
			            "root",
			            "");

		/*poder utilizar tildes ñ*/
		$link -> exec("set names utf8");

		return $link;

	}
	
}