<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/presupuesto.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/vehiculos.controlador.php";
require_once "controladores/venta.controlador.php";
require_once "controladores/servicio.controlador.php";
require_once "controladores/reportes.controlador.php";

require_once "modelos/clientes.modelo.php";
require_once "modelos/presupuesto.modelo.php";
require_once "modelos/usuarios.modelo.php";
require_once "modelos/vehiculos.modelo.php";
require_once "modelos/venta.modelo.php";
require_once "modelos/servicio.modelo.php";
require_once "modelos/reportes.modelo.php";


$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();