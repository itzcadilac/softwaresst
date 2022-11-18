<?php
class ValidacionDAO{
   function login($u, $p, $t) {
        session_start();
        if($t==1)
        {
        $query = "select u.idusuario, u.usuario, u.nomape, u.tipo from usuario u where u.usuario = '".$u."' AND u.pssword = '".md5($p)."'";
//		$query1 = "update usuario set conectado = 1, ultima_conexion = '".date("Y-m-d H:i:s")."' where usuario like '".$u."'";
        $BD = new ConexionDB();
        $recordSet = $BD->ejecutar($query);
        if (!$recordSet){
           Debug::println("UsuarioDAO: login: Usuario y/o Clave incorrectos. ".$query);
		    return false;
        }
        $usuario = "";
        if($fila=$recordSet->fetch_assoc()) {
            $usuario = new UsuarioVO($fila['idusuario'], $fila['usuario'], "", $fila['nomape'], $fila['tipo'],"","","","","");
            setcookie("id_usuario", $usuario->idUsuario, time()+60*60*24*31,"/","",0);
		//$result = $BD->ejecutar($query1);
		}
       // return $usuario;
    }
    else if($t==2) {
        $query = "select c.idecontratista, c.ruc, c.razonsocial, c.tipo from contratista c where c.ruc = '".$u."' AND c.pssword = '".md5($p)."'";
//		$query1 = "update usuario set conectado = 1, ultima_conexion = '".date("Y-m-d H:i:s")."' where usuario like '".$u."'";
        $BD = new ConexionDB();
        $recordSet = $BD->ejecutar($query);
        if (!$recordSet){
           Debug::println("UsuarioDAO: login: Usuario y/o Clave incorrectos. ".$query);
		    return false;
        }
        $usuario = "";
        if($fila=$recordSet->fetch_assoc()) {
            $usuario = new UsuarioVO($fila['idecontratista'], $fila['ruc'], "", $fila['razonsocial'], $fila['tipo'], $fila['razonsocial'],$fila['ruc'],"","","");
            setcookie("id_usuario", $usuario->idUsuario, time()+60*60*24*31,"/","",0);
		//$result = $BD->ejecutar($query1);
		}
        //return $usuario;
    } 

    else if($t==3) {
        $query = "select c.id_autorizador, c.nro_personal, c.nombres, c.tipo from autorizadores c where c.nro_personal = '".$u."' AND c.password = '".md5($p)."'";
//		$query1 = "update usuario set conectado = 1, ultima_conexion = '".date("Y-m-d H:i:s")."' where usuario like '".$u."'";
        $BD = new ConexionDB();
        $recordSet = $BD->ejecutar($query);
        if (!$recordSet){
           Debug::println("UsuarioDAO: login: Usuario y/o Clave incorrectos. ".$query);
		    return false;
        }
        $usuario = "";
        if($fila=$recordSet->fetch_assoc()) {
            $usuario = new UsuarioVO("","","","",$fila['tipo'],"","",$fila['nro_personal'], $fila['id_autorizador'], $fila['nombres']);
            setcookie("id_usuario", $usuario->idUsuario, time()+60*60*24*31,"/","",0);
		//$result = $BD->ejecutar($query1);
		}
        //return $usuario;
    }   
    return $usuario;     
   }
	/*
      function loginc($u, $p) {
        session_start();
		echo "entre loginc </br>";
        $query = "select u.ruc, u.razonsocial, u.tipo from contratista u 
		where u.ruc = '".$u."' AND u.pssword = '".md5($p)."'";
        $BD = new ConexionDB();
        $recordSet = $BD->ejecutar($query);
		
		echo "recordset: " .$recordSet;
        if (!$recordSet){
		echo "entre al if loginc </br>";	
           Debug::println("UsuarioDAO: login: Usuario y/o Clave incorrectos. ".$query);
           return false;
        }
		else{
			echo "entre al else loginc ";	
        $usuario = "";
        if($fila=$recordSet->fetch_assoc()) {
            $usuario = new UsuarioVO("", "", "", "", $fila['tipo'], $fila['razonsocial'],$fila['ruc']);
            //setcookie("id_usuario", $usuario->ruc, time()+60*60*24*31,"/","",0);
		$result = $BD->ejecutar($query);
		}
		echo " usuario: " .$usuario;
        return $usuario;
		}
   }
   */
   function TiempoSesion(){
     $fechaGuardada = $_SESSION["ultimoAcceso"];
     $ahora = date("Y-n-j H:i:s");
     $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));
     //echo $tiempo_transcurrido;
     //comparamos el tiempo transcurrido 600
     if($tiempo_transcurrido >= 2000) {
       //si pasaron 10 minutos o m�s
       session_start();
       session_unset();//destruye variables de sesion
	    $BD = new ConexionDB();
        //$query="update usuario set conectado = 0 where idusuario like '".$_SESSION['idusuario']."'";
        //$result = $BD->ejecutar($query);
       session_destroy(); // destruyo la sesi�n
       header("Location: index.php"); //env�o al usuario a la pag. de autenticaci�n
       //sino, actualizo la fecha de la sesi�n
       return false;
       }else {
       $_SESSION["ultimoAcceso"] = $ahora;
       return true;
       }
   }
}
?>