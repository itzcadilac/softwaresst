<?php
// require 'conexion.php';
require_once "conf.php";

$passact=$_POST['passact'];
$newpass=$_POST['newpass'];
$repass=$_POST['repass'];

$passenc=md5($repass);

$nro_p = $_POST['nro_personal'];
/*
echo "nro_p: " .$nro_p;
echo "newpass: " .$newpass;
echo "repass: " .$repass;
echo "passenc: " .$passenc;
echo "nro_personal: " .$nro_p;
echo "nro_personal: " .$_SESSION['nro_personal'];
*/
if ($newpass != ''){
	
	$conexion = @new mysqli($servid, $user, $passw, $bdsist);
	mysqli_set_charset($conexion, 'utf8');
	
	$querycup = "UPDATE autorizadores aut SET aut.password= '$passenc' WHERE aut.nro_personal = '$nro_p';";
	$ret4 = $conexion->query($querycup);
		/*
	if (!$ret4){
        $this->error=mysql_error();
            $BD->dbLink->Execute("ROLLBACK");
            //mysql_close();
            return 0;
    }
   		
		$BD->dbLink->Execute("COMMIT");*/
        //mysql_close();//echo 1;
		header ("Location: changepass.php");  
		//return 1;
		
}
else{
	echo "No se envío la contraseña Actual.";
}	
?>
