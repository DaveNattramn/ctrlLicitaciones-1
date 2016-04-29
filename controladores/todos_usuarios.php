<?php
	include('modelo/conexion.php');
	$bd = new SQLBD();
	echo $bd->todos_usuarios();
?>