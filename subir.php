<?php 
	$nombre_temporal = $_FILES['archivo']['tmp_name'];
	$fecha = date(Ymd);
	$aleatorio = rand(10, 99);
	$nombre = $_FILES['archivo']['name'];
	$formato =$fecha.$aleatorio;
	move_uploaded_file($nombre_temporal, 'archivos/'.$formato.'.csv');
?>