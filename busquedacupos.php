<?php
// require 'conexion.php';
require_once "conf.php";
$busqueda=$_POST['horario'];

if ($busqueda != ''){
	
	$conexion = @new mysqli($servid, $user, $passw, $bdsist);
	mysqli_set_charset($conexion, 'utf8');

	$sqlautorizador = "SELECT cuposdispo FROM calendcapacitaciones WHERE idecalendcapacitaciones = '$busqueda';";
	$resultautorizador = $conexion->query($sqlautorizador);
	$myArray = $resultautorizador->fetch_all(MYSQLI_ASSOC);
	
	//$myArray = json_encode($myArray);
	$data = array(
		"status" => 200,
		"data" => $myArray
	);
	echo json_encode($data);
}
else{
	echo "No se envío tipo de capacitación 1";
}	
?>
