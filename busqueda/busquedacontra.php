<?php
// require 'conexion.php';
require_once "../conf.php";
$busqueda=$_POST['busquedacontra'];
echo "si llegue: " . $busqueda;

if ($busqueda != ''){
	
	$trozos=explode(" ",$busqueda);
	$numero=count($trozos);
		
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL, 'https://api.sunat.cloud/ruc/'.$numero);
	//curl_setopt($ch,CURLOPT_HEADER, FALSE);
	curl_setopt($ch,CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
	curl_setopt($ch,CURLOPT_RETURNTRANSFER, TRUE);
	$result = curl_exec($ch);
	$code = curl_getinfo ($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);
	echo "CODIGO: " . $code;
	echo "RESULTADO: " . $result;

	//$data = json_decode($result);
	$name = $result->razon_social;
	echo "NAME: " . $name;
	//if ($numero==1) {

	//$cadbusca="SELECT idecontratista, razonsocial FROM contratista WHERE ruc = '$busqueda';";
	
	//}
	/*function limitarPalabras($cadena, $longitud, $elipsis = "..."){
		$palabras = explode(' ', $cadena);
		if (count($palabras) > $longitud)
			return implode(' ', array_slice($palabras, 0, $longitud)) . $elipsis;
		else
			return $cadena;
	}*/
?>
<div>
<?php
	//$conexion = @new mysqli($servid, $user, $passw, $bdsist);

	//$result=$conexion->query($cadbusca);
	//$i=1;
	//while ($row = $result->fetch_array(MYSQLI_ASSOC)){
		//$_SESSION['idecontratista'] = $row[idecontratista];
		echo "
		<label class='col-sm-3 control-label no-padding-right' for='form-field-1'> Nombre de la Empresa: </label>
		<div class=col-sm-9>
		<input readonly='true' id='form-input-readonly' type='text' name='razons' id='form-field-1' class='col-xs-10 col-sm-5' value='" .$name. "'/>
		
		</div>
		";
	//	$i++;
	//}
}
else{
	echo "Ingrese un RUC existente.";
}	
?>
</div>