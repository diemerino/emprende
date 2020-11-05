<?php 
	
	$hostname = 'localhost';
	$database = 'proyectofrank';
	$username = 'root';
	$password = '';

	$conexion = mysqli_connect($hostname,$username,$password,$database);
	if(empty($conexion)){
		echo "lo sentimos, se encuentra un error al acceder a la base de datos";
	}

	mysqli_set_charset($conexion,"utf8");
?>