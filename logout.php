<?php
require_once "./conf.php";
session_start();
	 
	    $BD = new ConexionDB();
        $query="update usuario set conectado = 0 where idusuario like '".$_SESSION['idusuario']."'";
        $result = $BD->ejecutar($query);
		
session_destroy();
header("Location: index.php");

?>