<?php
	include('../modelo/conexion_admin.php');
	$bd = new ADMIN();
	$nombre = $_POST['nombre'];

	$modulos=$bd->modulo($nombre);
	
	$bd->cerrar();
?>