<?php

//next example will recieve all messages for specific conversation
$ruc = $_POST['ruc'];
$service_url = 'https://dniruc.apisperu.com/api/v1/ruc/'. $ruc . '?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImppY2FzdGlsbG90MTZAZ21haWwuY29tIn0.MvYuANnYbDg7uarM_yu9pSZSujRl0EjPnN-NnxawBp4';
$curl = curl_init($service_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$curl_response = curl_exec($curl);
if ($curl_response === false) {
    $info = curl_getinfo($curl);
    curl_close($curl);
    die('error occured during curl exec. Additioanl info: ' . var_export($info));
}
curl_close($curl);
$decoded = json_decode($curl_response,true);
if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
    die('error occured: ' . $decoded->response->errormessage);
}

$datos = array(
	//0 => $info['ruc'], 
	0 => $decoded['razonSocial'],
	1 => $decoded['ruc']
);
	echo json_encode($datos);

/*
echo $curl_response;
echo '-----------------';
echo json_encode($decoded);
echo 'response ok!';
*/

/*
$token = 'rqPgnEHDOJS519P1DMx1ZdWM2yAKsg5NzUpnoeEnWMTKsBSzMt998upUtcaZ';
$arrContextOptions=array(
    "http"=>array(
    	'header' => 'Authorization: Bearer '.$token
    ),
);  
$ruc = $_POST['ruc'];
//$data = json_decode(file_get_contents("https://api.peruapis.com/v1/ruc?document=".$ruc, false, stream_context_create($arrContextOptions)),true);


$data = file_get_contents("https://dniruc.apisperu.com/api/v1/ruc/". $ruc . "?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImppY2FzdGlsbG90MTZAZ21haWwuY29tIn0.MvYuANnYbDg7uarM_yu9pSZSujRl0EjPnN-NnxawBp4");
$info = $data['data'];

echo json_encode($info);
/*
if($data==='[]'){
	$datos = array(0 => 'nada');

	echo json_encode($datos);
}else{

$datos = array(
	//0 => $info['ruc'], 
	0 => $info['razonSocial'],
	1 => $info['ruc'] 

);
	echo json_encode($datos);
}*/
?>