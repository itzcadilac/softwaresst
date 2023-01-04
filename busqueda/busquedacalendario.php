<?php
require 'conexion.php';

$busqueda = $_POST['idecapacitacion'];

if ($busqueda != '') {

    $trozos = explode(" ", $busqueda);
    $numero = count($trozos);

    $cadbusca = "SELECT idecalendcapacitaciones, fecha, hora, cupos FROM calendcapacitaciones where idecapacitacion = '$busqueda';";
    // $cadbusca = "SELECT idecontratista, razonsocial FROM contratista WHERE ruc = '$busqueda';";

    $result = mysql_query($cadbusca, $con);
    $i = 1;
    while ($row = mysql_fetch_array($result)) {
		  $dbdata[]=$row;
	  }
	
	echo json_encode($dbdata);
} else {
	echo "no existe";
}
