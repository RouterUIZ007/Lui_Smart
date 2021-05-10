<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/presupuesto.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/vehiculos.controlador.php";
require_once "controladores/ventas.controlador.php";

require_once "modelos/clientes.modelo.php";
require_once "modelos/presupuesto.modelo.php";
require_once "modelos/usuarios.modelo.php";
require_once "modelos/vehiculos.modelo.php";
require_once "modelos/ventas.modelo.php";



$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();