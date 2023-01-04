<?php
  
  require_once "./conf.php";

  $BD = new ConexionDB();
  $query="SELECT fecha_mov,idexpediente FROM ubicacion WHERE atendido <> 1";
  $ret = $BD->dbLink->Execute($query);

  $cont=0;
  while($fila=$ret->FetchRow()) {
	$query="INSERT INTO estadosexp(idexpediente,iddocumento,numerodocu,fechaatencion,estado,usuario,idarea) VALUES(".$fila['idexpediente'].",0,'0','".$fila['fecha_mov']."',10,'mgomero','SG001')";
    $result = $BD->dbLink->Execute($query);	   
	echo $query."<br>";   	
   }
   
   
  $query="update estadosexp set estado=30 where estado is null";
  $ret = $BD->dbLink->Execute($query);
  
  	echo $query."<br>";   	

/*	$cont=0;
  while($fila=$ret->FetchRow()) {
	$query="INSERT INTO estadosexp(idexpediente,iddocumento,numerodocu,fechaatencion,estado,usuario,idarea) VALUES(".$fila['idexpediente'].",0,'0','".$fila['fecha_mov']."',10,'mgomero','SG001')";
    $result = $BD->dbLink->Execute($query);	   
	echo $query."<br>";   	
   }*/

   
	$query="update ubicacion set atendido=10 where atendido=0";
    $result = $BD->dbLink->Execute($query);	   

	echo $query."<br>"; 
	
	$query="update ubicacion set atendido=30 where atendido=1";
    $result = $BD->dbLink->Execute($query);	   

	echo $query."<br>";  	   
  
  

?>