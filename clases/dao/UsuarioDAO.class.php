<?php
//clase UsuarioDAO

class UsuarioDAO{

  function RegistrarExpediente($expVO,$adjVO){// registrar expediente
    session_start();
    $BD = new ConexionDB();
	
	$BD->ejecutar("BEGIN");

    if ($expVO->idtupa == '00.00'){
      $asunto = $expVO->asuntonotupa;
    }
    else{
      $asunto = $expVO->asuntonotupa;
    }
    
    $Gencodigo = new GeneraCodigos();
    $codigoexp= $Gencodigo->CodigoExpediente();
    $codigoadj= $Gencodigo->CodigoAdjuntos();
	  $_SESSION['idexpediente'] = $codigoexp;
    
    $query = "INSERT INTO documentosadjuntos (idadjuntos,idexpediente,iddocumentos,numdoc,folios,referenciadocumentos,estadoadj,correlativo) VALUES (".$codigoadj.",".$codigoexp.",".$adjVO->iddocumentos.",'".$adjVO->numdoc."',".$adjVO->folios.",'".$adjVO->referenciadocumentos."',".$adjVO->estadoadjunto.",0)";
    $ret2 = $BD->ejecutar($query);

    $query1 = "INSERT INTO expediente (idexpediente,idtupa,remitente,asuntonotupa,fecha_reg,idusuario_reg,derivado,tipo) VALUES ('".$codigoexp."','".$expVO->idtupa."','".strtoupper($expVO->remitente)."','".$asunto."','".strtoupper($expVO->fecha_reg)."','".$expVO->usuario."',$expVO->derivado,0)";
    $ret = $BD->ejecutar($query1);
    //echo $query."<br>";
    //echo $query1;
    if (!$ret2 || !$ret){
        $this->error=mysql_error();
            $BD->ejecutar("ROLLBACK");
            mysql_close();
            return 0;
    }

    if ($expVO->idtupa == '00.00'){
       header ("Location: controlador.php?pagina=6");
    }else{
       header ("Location: principal_tramite.php");
    }
		$BD->ejecutar("COMMIT");
        mysql_close();//echo 1;
       return 1;
  }

  
  function RegistrarInternos($expVO,$histVO,$adjVO,$detenv){// registrar expedientes pasados
    session_start();
    $BD = new ConexionDB();
    $BD->ejecutar("BEGIN");
    $Gencodigo = new GeneraCodigos();
    $codexpi = $Gencodigo->CodigoRegInterno();
	$_SESSION['idexpediente'] = $codexpi;
	
    if ($expVO->idtupa == '00.00'){
      $asunto = $expVO->asuntonotupa;
    }
    else{
      $asunto = "";
    }
    $fecreg = explode("/",$expVO->fecha_reg);
    $fecmov = explode("/",$histVO->fecha_mov);
    $fechareg = $fecreg[2]."-".$fecreg[1]."-".$fecreg[0];
    $fechamov = $fecmov[2]."".$fecmov[1]."".$fecmov[0];

    $query = "INSERT INTO expediente (idexpediente,idtupa,remitente,asuntonotupa,fecha_reg,idusuario_reg,derivado,tipo,estados,estadodr,idadjunto,idareaenvia,idarearecibe,fecha_mov,idusuario_mov,idenvio,idcarpeta,seguimiento) VALUES ('".$codexpi."','".$expVO->idtupa."','".strtoupper($expVO->remitente)."','".strtoupper($asunto)."','".date("Y-m-d H:i:s")."','".$expVO->usuario."',0,1,10,3,".$adjVO->idadjunto.",'$histVO->idareaenvia','".$histVO->idarearecibe."','".date("Y-m-d H:i:s")."','".$histVO->idusuario."',".$adjVO->idadjunto.",1,".$expVO->seguimiento.")";
   
    $ret = $BD->ejecutar($query);
  
    $query = "INSERT INTO documentosadjuntos (idadjuntos,idexpediente,iddocumentos,numdoc,folios,referenciadocumentos,estadoadj,correlativo) VALUES (".$adjVO->idadjunto.",'".$codexpi."',".$adjVO->iddocumentos.",'".$adjVO->numdoc."',".$adjVO->folios.",'".$adjVO->referenciadocumentos."',".$adjVO->estadoadjunto.",0)";
    $ret1 = $BD->ejecutar($query);
    //echo $query."<br>";

    $query = "INSERT INTO estadosexp (idexpediente,fechaatencion,estado,usuario,iddocumento,idarea) VALUES ('".$codexpi."','".date("Y-m-d H:i:s")."',10,'".$histVO->idusuario."',0,'".$histVO->idareaenvia."')";
   $ret2 = $BD->ejecutar($query);
	
//echo $query."<br>";
    if (!$ret || !$ret1 || !$ret2){
        $this->error=mysql_error();
            $BD->ejecutar("ROLLBACK");
            mysql_close();
            return 0;
    }

	header ("Location: controlador.php?pagina=38");
		$BD->ejecutar("COMMIT");
        mysql_close();//echo 1;
        return 1;
	   
  }
  
  function DerivarExpedienteTramite($histVO,$detaVO){

   $BD = new ConexionDB();
   $BD->ejecutar("BEGIN");
   
   $query = "UPDATE expediente SET derivado=1, idenvio=".$detaVO->idenvio.", estadodr=".$histVO->estadoexp.", idareaenvia='".$histVO->idareaenvia."', idarearecibe='".$histVO->idarearecibe."', fecha_mov='".$histVO->fecha_mov."', idusuario_mov='".$histVO->idusuario."', idcarpeta=1, estados=10  where idexpediente='".$histVO->idexpediente."'";
   $ret = $BD->ejecutar($query);

//   $query = "UPDATE expediente SET derivado=1 where idexpediente=".$histVO->idexpediente;
   //$recordSet = $BD->ejecutar($query);
   
   $query = "INSERT INTO detalleenvio (idenvio,iddocumento,numerodoc,referenciaenvio) VALUES (".$detaVO->idenvio.",6,".$detaVO->numerodoc.",'".$detaVO->referenciaenvio."')";
   
   $ret1 = $BD->ejecutar($query);

   $query = "INSERT INTO historial (idhistorial,idexpediente,estadoexp,idadjunto,idareaenvia,idarearecibe, fecha_mov, idusuario, actual,idenvio,recepcionado) VALUES (".$histVO->idhistorial.",".$histVO->idexpediente.",".$histVO->estadoexp.",".$histVO->idenvio.",'".$histVO->idareaenvia."','".$histVO->idarearecibe."','".$histVO->fecha_mov."','".$histVO->idusuario."',".$histVO->actual.",".$detaVO->idenvio.",0)";
   
   $ret2 = $BD->ejecutar($query);   
//$query = "INSERT INTO ubicacion (idhistorial,idexpediente,estadoexp,idadjunto,idareaenvia,idarearecibe, fecha_mov, idusuario, actual,idenvio,carpeta,atendido) VALUES (".$histVO->idhistorial.",".$histVO->idexpediente.",".$histVO->estadoexp.",".$histVO->idenvio.",'".$histVO->idareaenvia."','".$histVO->idarearecibe."','".$histVO->fecha_mov."','".$histVO->idusuario."',".$histVO->actual.",".$detaVO->idenvio.",1,10)";
   //$recordSet = $BD->ejecutar($query);
   
   $query = "INSERT INTO estadosexp (idexpediente,fechaatencion,estado,usuario,iddocumento) VALUES (".$histVO->idexpediente.",'".$histVO->fecha_mov."',10,'".$histVO->idusuario."',0)";
   
   $ret3 = $BD->ejecutar($query);
   
    if (!$ret || !$ret1 || !$ret2 || !$ret3){
        $this->error=mysql_error();
            $BD->ejecutar("ROLLBACK");
            mysql_close();
            return 0;
    }
   		
		$BD->ejecutar("COMMIT");
        mysql_close();//echo 1;
        return 1;
   
}
  
  

  function DerivarExpedienteTramitenotupa($histVO,$detaVO){// derivar expediente tramite documentario
   $BD = new ConexionDB();
   $BD->ejecutar("BEGIN");
   
   $query = "UPDATE expediente SET derivado=1, idenvio=".$detaVO->idenvio.", estadodr=".$histVO->estadoexp.", idareaenvia='".$histVO->idareaenvia."', idarearecibe='".$histVO->idarearecibe."', fecha_mov='".$histVO->fecha_mov."', idusuario_mov='".$histVO->idusuario."', idcarpeta=1, estados=10  where idexpediente='".$histVO->idexpediente."'";
   $ret = $BD->ejecutar($query);
//  echo $query."<br>";
   $query = "INSERT INTO detalleenvio (idenvio,iddocumento,numerodoc,referenciaenvio,folios) VALUES (".$detaVO->idenvio.",'".$detaVO->iddocumento."','".$detaVO->numerodoc."','".$detaVO->referenciaenvio."',".$detaVO->folios.")";
   $ret1 = $BD->ejecutar($query);
   

//  echo $query."<br>";
   $query2 = "INSERT INTO historial (idhistorial,idexpediente,estadoexp,idadjunto,idareaenvia,idarearecibe, fecha_mov, idusuario, actual,idenvio,recepcionado,acciones) VALUES (".$histVO->idhistorial.",".$histVO->idexpediente.",".$histVO->estadoexp.",".$histVO->idenvio.",'".$histVO->idareaenvia."','".$histVO->idarearecibe."','".$histVO->fecha_mov."','".$histVO->idusuario."',".$histVO->actual.",".$detaVO->idenvio.",0,'')";
   $ret2 = $BD->ejecutar($query2);
   
//  echo $query."<br>";
//   $query = "INSERT INTO ubicacion (idhistorial,idexpediente,estadoexp,idadjunto,idareaenvia,idarearecibe, fecha_mov, idusuario, actual,idenvio,carpeta,atendido) VALUES (".$histVO->idhistorial.",".$histVO->idexpediente.",".$histVO->estadoexp.",".$histVO->idenvio.",'".$histVO->idareaenvia."','".$histVO->idarearecibe."','".$histVO->fecha_mov."','".$histVO->idusuario."',".$histVO->actual.",".$detaVO->idenvio.",1,10)";
//   $recordSet = $BD->ejecutar($query);
//      echo $query."<br>";
   $query3 = "INSERT INTO estadosexp (idexpediente,fechaatencion,estado,usuario,iddocumento,idarea) VALUES ('".$histVO->idexpediente."','".$histVO->fecha_mov."',10,'".$histVO->idusuario."',0,'".$histVO->idareaenvia."')";
   $ret3 = $BD->ejecutar($query3);
//  echo $query."<br>";
	
	if (!$ret || !$ret1 || !$ret2 || !$ret3){
        $this->error=mysql_error();
            $BD->ejecutar("ROLLBACK");
            mysql_close();
            return 0;
    }
   		
		$BD->ejecutar("COMMIT");
        mysql_close();//echo 1;
        return 1;
		
  }
  
    function DerivarExpedienteregistrados($histVO,$detaVO){// derivar expediente tramite documentario
   $BD = new ConexionDB();
   $BD->ejecutar("BEGIN");

   $det=$_POST['det'];
   
   if($det!='TLA'){
   $query = "UPDATE expediente SET derivado=1, idenvio=".$detaVO->idenvio.", estadodr=".$histVO->estadoexp.", idareaenvia='".$histVO->idareaenvia."', idarearecibe='".$histVO->idarearecibe."', fecha_mov='".$histVO->fecha_mov."', idusuario_mov='".$histVO->idusuario."', idcarpeta=1, estados=10  where idexpediente='".$histVO->idexpediente."'";
   }
   else{
   $query = "UPDATE expediente SET derivado=1, idenvio=".$detaVO->idenvio.", estadodr=".$histVO->estadoexp.", idareaenvia='".$histVO->idareaenvia."', idarearecibe='".$histVO->idarearecibe."', fecha_mov='".$histVO->fecha_mov."', idusuario_mov='".$histVO->idusuario."', idcarpeta=1, estados=50  where idexpediente='".$histVO->idexpediente."'";   
	}
	
   $ret = $BD->ejecutar($query);
   
   //echo $query."<br>";
   
 //  $query1 = "INSERT INTO detalleenvio VALUES(".$detaVO->idenvio.",".$detaVO->iddocumento.",'".$detaVO->numerodoc."','".$detaVO->referenciaenvio."',".$detaVO->folios.")";
 //  $ret1 = $BD->ejecutar($query1);

   $query10 = "INSERT INTO detalleenvio VALUES(".$detaVO->idenvio.",".$detaVO->iddocumento.",'".$detaVO->numerodoc."','".$detaVO->referenciaenvio."',".$detaVO->folios.",'')";
   $ret10 = $BD->ejecutar($query10);

   
  //echo $query."<br>";
   $query2 = "INSERT INTO historial (idhistorial,idexpediente,estadoexp,idadjunto,idareaenvia,idarearecibe, fecha_mov, idusuario, actual,idenvio,recepcionado) VALUES (".$histVO->idhistorial.",'".$histVO->idexpediente."',".$histVO->estadoexp.",".$histVO->idenvio.",'".$histVO->idareaenvia."','".$histVO->idarearecibe."','".$histVO->fecha_mov."','".$histVO->idusuario."',".$histVO->actual.",".$detaVO->idenvio.",0)";
   $ret2 = $BD->ejecutar($query2);
   
    //echo $query."<br>";
//   $query = "INSERT INTO ubicacion (idhistorial,idexpediente,estadoexp,idadjunto,idareaenvia,idarearecibe, fecha_mov, idusuario, actual,idenvio,carpeta,atendido) VALUES (".$histVO->idhistorial.",".$histVO->idexpediente.",".$histVO->estadoexp.",".$histVO->idenvio.",'".$histVO->idareaenvia."','".$histVO->idarearecibe."','".$histVO->fecha_mov."','".$histVO->idusuario."',".$histVO->actual.",".$detaVO->idenvio.",1,10)";
//   $recordSet = $BD->ejecutar($query);
//      echo $query."<br>";

   $query3 = "INSERT INTO estadosexp (idexpediente,fechaatencion,estado,usuario,iddocumento,idarea) VALUES ('".$histVO->idexpediente."','".$histVO->fecha_mov."',10,'".$histVO->idusuario."',0,'".$histVO->idareaenvia."')";
   $ret3 = $BD->ejecutar($query3);
    //echo $query."<br>";

	if (!$ret || !$ret10 || !$ret2 || !$ret3){
        $this->error=mysql_error();
            $BD->ejecutar("ROLLBACK");
            mysql_close();
            return 0;
    }
   		else{
		$BD->ejecutar("COMMIT");
        mysql_close();//echo 1;
        return 1;
		}
  }

  function DerivarExpediente($histVO,$detaVO){// derivar expediente cliente
   $BD = new ConexionDB();
   $BD->ejecutar("BEGIN");
   $query="select *from historial where idexpediente='".$histVO->idexpediente."' and actual=(select max(actual) from historial where idexpediente='".$histVO->idexpediente."')";
    //echo $query."<br>";
   $recordSet = $BD->ejecutar($query);
   if (isset($recordSet)){
      $fila=$recordSet->fetch_assoc();
      $actual=$fila['actual'] + 1;
   }

   $query = "INSERT INTO detalleenvio (idenvio,iddocumento,numerodoc,referenciaenvio,folios,acciones) VALUES (".$detaVO->idenvio.",".$detaVO->iddocumento.",'".$detaVO->numerodoc."','".$detaVO->referenciaenvio."',".$detaVO->folios.",'".$histVO->acciones."')";
   $ret = $BD->ejecutar($query);
    //echo $query."<br>";
   $query = "INSERT INTO historial (idhistorial,idexpediente,estadoexp,idadjunto,idareaenvia,idarearecibe, fecha_mov, idusuario, actual,idenvio,recepcionado,acciones) VALUES(".$histVO->idhistorial.",'".$histVO->idexpediente."',".$histVO->estadoexp.",".$histVO->idenvio.",'".$histVO->idareaenvia."','".$histVO->idarearecibe."','".$histVO->fecha_mov."','".$histVO->idusuario."',".$actual.",".$detaVO->idenvio.",0,'".$histVO->acciones."')";
   $ret1 = $BD->ejecutar($query);
    //echo $query."<br>";
   $query="UPDATE expediente SET estadodr=6, idenvio=".$detaVO->idenvio.", fecha_mov='".date("Y-m-d H:i:s")."', idusuario_mov='".$_SESSION['usuario']."', idareaenvia='".$histVO->idareaenvia."', idarearecibe='".$histVO->idarearecibe."', idcarpeta=1, estados=10 WHERE idexpediente='".$histVO->idexpediente."'";
   $ret2 = $BD->ejecutar($query);
   // echo $query."<br>";
    
   $query="SELECT idexpediente FROM documentosadjuntos WHERE idexpediente='".$histVO->idexpediente."' and recepcionadoadj=0";
    
   $recordSet = $BD->ejecutar($query);
    
    
    //echo $recordSet.RecordCount();
    /*if (){
        
    }*/
        
   header("Location: controlador.php?pagina=6");
if (!$ret || !$ret1 || !$ret2){
        $this->error=mysql_error();
            $BD->ejecutar("ROLLBACK");
            mysql_close();
            return 0;
    }
   		
		$BD->ejecutar("COMMIT");
        mysql_close();//echo 1;
        return 1;
	
  }

  function RecepcionarExpediente($idexpediente){// recepcionar expediente
    session_start();
    $BD = new ConexionDB();
	  //$BD->ejecutar("BEGIN");
  /*
    $query="UPDATE documentosadjuntos SET arearecibe='".$_SESSION['idarea']."' WHERE idexpediente='".$idexpediente."'  and recepcionadoadj=0 and (estadoadj=0 or estadoadj=2)";
    $ret = $BD->ejecutar($query);
    //echo $query."<br>";

    $query="SELECT actual FROM historial WHERE idexpediente='".$idexpediente."' and actual=(select max(actual) from historial where idexpediente='".$idexpediente."')";
    //echo $query;
    $recordSet = $BD->ejecutar($query);
    $fila=$recordSet->fetch_assoc();
    $act=$fila['actual'];
   //echo $query."<br>";

   if (isset($recordSet)){
      $actual=$fila['actual'] + 1;
   }

    $Gencodigo = new GeneraCodigos();
    $codigohistorial = $Gencodigo->CodigoHistorial();

    $query="SELECT idexpediente, estadoexp, idadjunto, idareaenvia, idarearecibe, fecha_mov, idusuario, actual,idenvio FROM historial WHERE idexpediente='".$idexpediente."' and actual=(select max(actual) from historial where idexpediente='".$idexpediente."') and estadoexp=6";
    //echo $query."<br>";
    $recordSet = $BD->ejecutar($query);
    $fila=$recordSet->fetch_assoc();

    $query = "UPDATE historial SET recepcionado=1 WHERE idexpediente='".$idexpediente."' and actual=$act and estadoexp=6";
//    echo $query."<br>";
    $ret1 = $BD->ejecutar($query);
       // echo $query."<br>";

    $query = "INSERT INTO historial (idhistorial,idexpediente, estadoexp, idadjunto, idareaenvia, idarearecibe, fecha_mov, idusuario, actual,idenvio,recepcionado) VALUE (".$codigohistorial.",'".$fila['idexpediente']."',2,".$fila['idadjunto'].",'".$fila['idareaenvia']."','".$fila['idarearecibe']."','".date("Y-m-d H:i:s")."','".$_SESSION['usuario']."',".$actual.",".$fila['idenvio'].",2)";
    $ret2 = $BD->ejecutar($query);
   // echo $query."<br>";
*/
    //$query = "UPDATE expediente SET estadodr=2, fecha_mov='".date("Y-m-d H:i:s")."', idcarpeta=1, estados=10  WHERE idexpediente='".$idexpediente."'";
    $query = "UPDATE solicitudcapac SET estadosolic=3  WHERE idesolicitud='".$idexpediente."'";
    //echo $query;
    $ret3 = $BD->ejecutar($query);
	
	if (!$ret3){
        $this->error=mysql_error();
           // $BD->ejecutar("ROLLBACK");
            mysqli_close();
            return 0;
    }
   		
		//$BD->ejecutar("COMMIT");
        mysqli_close();//echo 1;
        return 1;
	
	
  }

  function RecepcionarExpedienteA($idesolicitud){// recepcionar expediente
    session_start();
    $BD = new ConexionDB();
	  //$BD->ejecutar("BEGIN");

    $query1="SELECT aut.correo_autorizador, aut.nombres as nombre_aut, sl.razons, sl.numparticipantes, sl.correo as correo_contacto, sl.numcontacto, sl.ruc, cal.hora, tip.desccapacitacion
    FROM autorizadores aut, solicitudcapac sl, calendcapacitaciones cal, tipcapacitaciones tip
    WHERE sl.id_autorizador = aut.id_autorizador
    AND sl.idecalendcapacitaciones = cal.idecalendcapacitaciones
    AND cal.idecapacitacion = tip.idecapacitacion
    AND sl.idesolicitud='$idesolicitud'";

    $recordSet1 = $BD->ejecutar($query1);
    $fila1=$recordSet1->fetch_assoc();
    
    $correo_autorizador=$fila1['correo_autorizador'];
    $nombre_aut=$fila1['nombre_aut'];
    $razons=$fila1['razons'];
    $numparticipantes=$fila1['numparticipantes'];
    $correo_contacto=$fila1['correo_contacto'];
    $numcontacto=$fila1['numcontacto'];
    $ruc=$fila1['ruc'];
    $hora=$fila1['hora'];
    $desccapacitacion=$fila1['desccapacitacion'];
    $nombres=$fila1['nombres'];

    $_SESSION['correo_autorizador']=$correo_autorizador;
    $_SESSION['nombre_aut']=$nombre_aut;
    $_SESSION['razons']=$razons;
    $_SESSION['numparticipantes']=$numparticipantes;
    $_SESSION['correo_contacto']=$correo_contacto;
    $_SESSION['numcontacto']=$numcontacto;
    $_SESSION['ruc']=$ruc;
    $_SESSION['hora']=$hora;
    $_SESSION['desccapacitacion']=$desccapacitacion;
    $_SESSION['nombres']=$nombres;
    $_SESSION['idesolicitud']=$idesolicitud;
        
    $query = "UPDATE solicitudcapac SET estadosolic=6, fechoraautorizacion='".date("Y-m-d H:i:s")."'  WHERE idesolicitud='".$idesolicitud."'";
    //echo $query;
    $ret3 = $BD->ejecutar($query);
	
	if (!$ret3){
        $this->error=mysql_error();
            //$BD->ejecutar("ROLLBACK");
            mysqli_close();
            return 0;
    }
    
    include  './contactos/contactsst_nestle_aut.php';
    
		//$BD->ejecutar("COMMIT");
        mysqli_close();//echo 1;
        return 1;
    
	
  }

function RecepcionarExpediente1($idexpediente){// recepcionar expediente
    session_start();
    $BD = new ConexionDB();
	  //$BD->ejecutar("BEGIN");
    $query="UPDATE documentosadjuntos SET arearecibe='".$_SESSION['idarea']."' WHERE idexpediente='".$idexpediente."'  and recepcionadoadj=0 and (estadoadj=0 or estadoadj=2)";
    $ret = $BD->ejecutar($query);
    //echo $query."<br>";

    $query="SELECT actual FROM historial WHERE idexpediente='".$idexpediente."' and actual=(select max(actual) from historial where idexpediente='".$idexpediente."')";
    //echo $query;
    $recordSet = $BD->ejecutar($query);
    $fila=$recordSet->fetch_assoc();
    $act=$fila['actual'];
   //echo $query."<br>";

   if (isset($recordSet)){
      $actual=$fila['actual'] + 1;
   }

    $Gencodigo = new GeneraCodigos();
    $codigohistorial = $Gencodigo->CodigoHistorial();

    $query="SELECT idexpediente, estadoexp, idadjunto, idareaenvia, idarearecibe, fecha_mov, idusuario, actual,idenvio FROM historial WHERE idexpediente='".$idexpediente."' and actual=(select max(actual) from historial where idexpediente='".$idexpediente."') and estadoexp=6";
    //echo $query."<br>";
    $recordSet = $BD->ejecutar($query);
    $fila=$recordSet->fetch_assoc();

    $query = "UPDATE historial SET recepcionado=1 WHERE idexpediente='".$idexpediente."' and actual=$act and estadoexp=6";
//    echo $query."<br>";
    $ret1 = $BD->ejecutar($query);
       // echo $query."<br>";

    $query = "INSERT INTO historial (idhistorial,idexpediente, estadoexp, idadjunto, idareaenvia, idarearecibe, fecha_mov, idusuario, actual,idenvio,recepcionado) VALUE (".$codigohistorial.",'".$fila['idexpediente']."',2,".$fila['idadjunto'].",'".$fila['idareaenvia']."','".$fila['idarearecibe']."','".date("Y-m-d H:i:s")."','".$_SESSION['usuario']."',".$actual.",".$fila['idenvio'].",2)";
    $ret2 = $BD->ejecutar($query);
   // echo $query."<br>";

    $query = "UPDATE expediente SET estadodr=2, fecha_mov='".date("Y-m-d H:i:s")."', idcarpeta=1, estados=50  WHERE idexpediente='".$idexpediente."'";
   // echo $query;
    $ret3 = $BD->ejecutar($query);
	
	if (!$ret || !$ret1 || !$ret2 || !$ret3){
        $this->error=mysql_error();
            //$BD->ejecutar("ROLLBACK");
            mysqli_close();
            return 0;
    }
   		
		    //$BD->ejecutar("COMMIT");
        mysqli_close();//echo 1;
        return 1;
	
	
  }
  
function CacelarEnvioCliente($idesolicitud){
    $BD = new ConexionDB();
    //$BD->ejecutar("BEGIN");
    
    $query="SELECT idesolicitud, numparticipantes, idecalendcapacitaciones from solicitudcapac where idesolicitud='$idesolicitud'";
    $recordSet = $BD->ejecutar($query);
    $fila=$recordSet->fetch_assoc();
    //$idesolicitud=$fila['idesolicitud'];
    $numparticipantes=$fila['numparticipantes'];
    $idecalendcapacitaciones=$fila['idecalendcapacitaciones'];

    //echo "idecalendcapacitaciones: ".$idecalendcapacitaciones;
    //echo "numparticipantes: ".$numparticipantes;
    
    $querysolic = "UPDATE solicitudcapac SET estadosolic= 4 WHERE idesolicitud='$idesolicitud'";
    $ret3 = $BD->ejecutar($querysolic);
    

    $query1="SELECT cuposdispo, idecalendcapacitaciones from calendcapacitaciones where idecalendcapacitaciones= '$idecalendcapacitaciones'";
    $recordSet1 = $BD->ejecutar($query1);
    $fila1=$recordSet1->fetch_assoc();
    $cuposdispo=$fila1['cuposdispo'];

    
    $sumcups = intval($cuposdispo) + intval($numparticipantes);
    
    //echo $sumcups;
    //echo $cuposdispo;
    //echo $numparticipantes;
    
    //echo $idesolicitud;

    $querycup = "UPDATE calendcapacitaciones SET cuposdispo= $sumcups WHERE idecalendcapacitaciones = '$idecalendcapacitaciones'";
    $ret4 = $BD->ejecutar($querycup);

    if (!$recordSet1 || !$recordSet || !$ret3 || !$ret4){
        $this->error=mysql_error();
            //$BD->ejecutar("ROLLBACK");
            mysqli_close();
            return 0;
    }
   		
		   //$BD->ejecutar("COMMIT");
        mysqli_close();//echo 1;
        return 1;
    
    /*

  */
}


  function CacelarEnvioTramite($idexpediente){
    $BD = new ConexionDB();
	$BD->ejecutar("BEGIN");
    $query="SELECT idenvio,actual FROM historial WHERE idexpediente='".$idexpediente."' and actual=(select max(actual) from historial where idexpediente='".$idexpediente."')";
    $recordSet = $BD->ejecutar($query);
    $fila=$recordSet->fetch_assoc();
    $idenvio=$fila['idenvio'];
    $mayor=$fila['actual'];
    //echo $query."<br>";
    //echo $idenvio;
    //echo $mayor;

    $query="DELETE FROM detalleenvio WHERE idenvio=".$idenvio;
    $ret = $BD->ejecutar($query);
    //echo $query."<br>";

    $query = "DELETE FROM historial WHERE idexpediente='".$idexpediente."' and actual=".$mayor;
    $ret1 = $BD->ejecutar($query);
    //echo $query."<br>";


  //  $query="DELETE FROM ubicacion WHERE idexpediente=".$idexpediente;
   // $recordSet = $BD->ejecutar($query);
    //$query = "UPDATE ubicacion SET estadoexp=2 WHERE idexpediente=".$idexpediente;
    //$recordSet = $BD->ejecutar($query);
    //echo $query."<br>";

    $query = "UPDATE expediente SET derivado=0, idadjunto=0,idenvio=0, estadodr=0, idareaenvia='', idarearecibe='',fecha_mov='0000-00-00 00:00:00',idusuario_mov='',idcarpeta=0,estados=0 where idexpediente='".$idexpediente."'";
    $ret2 = $BD->ejecutar($query);
   // echo $query."<br>";
	
	     if (!$ret || !$ret1 || !$ret2){
        $this->error=mysql_error();
            $BD->ejecutar("ROLLBACK");
            mysql_close();
            return 0;
    }
   		
		$BD->ejecutar("COMMIT");
        mysql_close();//echo 1;
        return 1;  

  }

  function BuscarExpediente($cadena_busqueda){
   
    $cade1 = substr($cadena_busqueda, 0, 1);    
    $cade2 = substr($cadena_busqueda, 1);   
    //echo $cade1." - ".$cade2;
    
     if (is_numeric($cade2)){
        $query="SELECT e.idexpediente, e.seguimiento,e.fecha_mov,e.remitente, e.asuntonotupa, t.denominacion,ae.abreviatura_area as 'abrevareaenvia', a.abreviatura_area as 'abrevarearecibe',e.estadodr,e.idareaenvia,e.idarearecibe, e.fecha_mov, e.idusuario_mov,t.idtupa,e.idcarpeta,ca.nombrecarpeta, ae.descripcion_area as 'descripcionareaenvia',a.descripcion_area as 'descripcionarearecibe',est.detalleestado,e.estados,esex.fechaatencion,e.tipo FROM expediente e, areas a, tupa t,  areas ae, carpetas ca, estados est,estadosexp esex  WHERE est.idestado=e.estados and e.idtupa=t.idtupa and e.idarearecibe=a.idarea and ca.idcarpeta=e.idcarpeta and ae.idarea=e.idareaenvia and esex.idatencion=(select max(idatencion) from estadosexp where idexpediente=e.idexpediente) and e.idexpediente='".$cadena_busqueda."'";
        //echo $query;
     }else{
        $query="SELECT e.idexpediente, e.seguimiento,e.fecha_mov,e.remitente, e.asuntonotupa, t.denominacion,ae.abreviatura_area as 'abrevareaenvia', a.abreviatura_area as 'abrevarearecibe',e.estadodr,e.idareaenvia,e.idarearecibe, e.fecha_mov, e.idusuario_mov,e.idcarpeta,t.idtupa,ca.nombrecarpeta,e.estados,est.detalleestado,ae.descripcion_area as 'descripcionareaenvia',esex.fechaatencion,a.descripcion_area as 'descripcionarearecibe',e.tipo, MATCH ( e.remitente,e.asuntonotupa ) AGAINST ( '".$cadena_busqueda."') AS Score FROM expediente e, areas a, tupa t, areas ae, carpetas ca, estados est,estadosexp esex  WHERE esex.idatencion=(select max(idatencion) from estadosexp where idexpediente=e.idexpediente) and est.idestado=e.estados and e.idtupa=t.idtupa and e.idarearecibe=a.idarea and ca.idcarpeta=e.idcarpeta and ae.idarea=e.idareaenvia and MATCH (e.remitente,e.asuntonotupa ) AGAINST ( '".$cadena_busqueda."' ) ORDER BY Score DESC limit 0,20";
     }
//  echo $query;
     $BD = new ConexionDB();
     $fec = new Fecha();
     $recordSet = $BD->ejecutar($query);

     $busqueda = array();

     while($fila=$recordSet->fetch_assoc()) {
                    /*loica para mostrar el numero de expediente con - a�o*/
       $fecha=$fec->Fechalet($fila['fecha_mov'],true);
       $cantc1 = strlen($fila['idexpediente']);
       $exp1 = substr($fila['idexpediente'], 0, $cantc1-2);
       $exp2 = substr($fila['idexpediente'], -2);
       $expshow = $exp1." <br> ".$exp2;
       /*********************************************************/
        $busqueda[] = new ContenedorAtributosVO($fila['idexpediente'],$fila['remitente'],$fila['denominacion'],$fila['asuntonotupa'],"",$fila['abrevareaenvia'],$fila['abrevarearecibe'],$fila['descripcionareaenvia'],$fila['estadodr'],$fila['descripcionarearecibe'],$fecha,"","","",$fila['idtupa'],$fila['idareaenvia'],$fila['idarearecibe'],"","","","","","","","",$fila['idcarpeta'],$fila['nombrecarpeta'],$fila['atendido'],$fila['descripcionareaenvia'],$fila['descripcionarearecibe'],"",$expshow,"","","",$fila['fechaatencion'],$fila['detalleestado'],$fila['estados'],"",$fila['tipo'],"","",$fila['idcarpeta'],$fila['fecha_mov'],$fila['seguimiento'],"");
     }

     return $busqueda;

  }


    function BuscarExpedienteMod($cadena_busqueda){
    //echo $cadena_busqueda;
    //if (isset($cadena_busqueda)){
     if (is_numeric($cadena_busqueda)){
        //$query="SELECT e.idexpediente, e.remitente, e.asuntonotupa, t.denominacion,ae.abrevareaenvia, a.abrevarearecibe,h.estadoexp, h.fecha_mov, h.idusuario,t.idtupa FROM expediente e, arearecibe a, tupa t, ubicacion h, areaenvia ae  WHERE e.idexpediente=h.idexpediente and e.idtupa=t.idtupa and h.idarearecibe=a.idarearecibe and ae.idareaenvia=h.idareaenvia and h.actual=1 and e.idexpediente=".$cadena_busqueda;
        $query="SELECT e.idexpediente,e.idtupa, e.remitente, e.asuntonotupa, t.denominacion FROM expediente e, tupa t WHERE e.idtupa=t.idtupa and e.idexpediente='".$cadena_busqueda."'";
        //echo $query;
     }else{

//           $query = "SELECT e.idexpediente, e.remitente,e.idtupa, e.asuntonotupa, t.denominacion,ae.abreviatura_area as 'abrevareaenvia', a.ABREVIATURA_AREA AS 'abrevarearecibe',h.estadoexp,h.idareaenvia,h.idarearecibe, h.fecha_mov, h.idusuario,h.carpeta,t.idtupa,ca.nombrecarpeta,h.atendido, MATCH ( e.remitente ) AGAINST ( '".$cadena_busqueda."' ) AS Score FROM expediente e, areas a, tupa t, ubicacion h, areas ae, carpetas ca  WHERE e.idexpediente=h.idexpediente and e.idtupa=t.idtupa and h.idarearecibe=a.idarea and ca.idcarpeta=h.carpeta and ae.idarea=h.idareaenvia and MATCH (e.remitente ) AGAINST ( '".$cadena_busqueda."' )ORDER BY Score DESC limit 0,20";
        $query="SELECT e.idexpediente, e.seguimiento,e.fecha_mov,e.remitente, e.asuntonotupa, t.denominacion,ae.abreviatura_area as 'abrevareaenvia', a.abreviatura_area as 'abrevarearecibe',e.estadodr,e.idareaenvia,e.idarearecibe, e.fecha_mov, e.idusuario_mov,e.idcarpeta,t.idtupa,ca.nombrecarpeta,e.estados,est.detalleestado,ae.descripcion_area as 'descripcionareaenvia',esex.fechaatencion,a.descripcion_area as 'descripcionarearecibe',e.tipo, MATCH ( e.remitente,e.asuntonotupa ) AGAINST ( '".$cadena_busqueda."') AS Score FROM expediente e, areas a, tupa t, areas ae, carpetas ca, estados est,estadosexp esex  WHERE esex.idatencion=(select max(idatencion) from estadosexp where idexpediente=e.idexpediente) and est.idestado=e.estados and e.idtupa=t.idtupa and e.idarearecibe=a.idarea and ca.idcarpeta=e.idcarpeta and ae.idarea=e.idareaenvia and MATCH (e.remitente,e.asuntonotupa ) AGAINST ( '".$cadena_busqueda."' ) ORDER BY Score DESC limit 0,20";
           //echo $query;
           //}
     }
                         //echo $query;
     $BD = new ConexionDB();
     $recordSet = $BD->ejecutar($query);

     $busqueda = array();

     while($fila=$recordSet->fetch_assoc()) {
                    /*loica para mostrar el numero de expediente con - a�o*/
       $cantc1 = strlen($fila['idexpediente']);
       $exp1 = substr($fila['idexpediente'], 0, $cantc1-2);
       $exp2 = substr($fila['idexpediente'], -2);
       $expshow = $exp1." - ".$exp2;
       /*********************************************************/
        $busqueda[] = new ContenedorAtributosVO($fila['idexpediente'],$fila['remitente'],$fila['denominacion'],$fila['asuntonotupa'],"",$fila['abrevareaenvia'],$fila['abrevarearecibe'],"",$fila['estadoexp'],"",$fila['fecha_mov'],"","","",$fila['idtupa'],"",$fila['idarearecibe'],"","","","","","","","",$fila['carpeta'],$fila['nombrecarpeta'],$fila['atendido'],"","","",$expshow,"","","","","","","","","","","","","","");
     }

     return $busqueda;
     //}
  }

  function AdjuntarDocumentos($datos){
     session_start();
     
	 $BD = new ConexionDB();
     $BD->ejecutar("BEGIN");
     $gencod = new GeneraCodigos();
     $codigoadjcargo = $gencod->CodigoCargoAdjunto();
     $query="SELECT idexpediente,idarearecibe,idareaenvia,estadodr FROM expediente WHERE idexpediente='".$datos->idexpediente."' and (estadodr=2 or estadodr=6)";
    // echo $query;
     $recordSet = $BD->ejecutar($query);
     $fila=$recordSet->fetch_assoc();
     if ($fila['estadodr']==2){
       $act=$fila['idarearecibe'];
     }
	 else if($fila['estadodr']==6){
       $act=$fila['idarearecibe'];
	   //$act=$fila['idareaenvia'];
     }
     
     $queryco = "SELECT max(correlativo) as 'corre' FROM documentosadjuntos WHERE idexpediente='".$datos->idexpediente."'";
   //  echo $queryco;
     $ret = $BD->ejecutar($queryco);
     $dat=$ret->fetch_assoc();
     $corre = $dat['corre'] + 1;     
     
     $query1="INSERT INTO documentosadjuntos (idadjuntos,idexpediente,iddocumentos,numdoc,folios,referenciadocumentos,estadoadj,fechaadj,usuarioregistra,arearecibe,recepcionadoadj,correlativo,numcargo) 
	 VALUES (".$datos->idadjunto.",".$datos->idexpediente.",".$datos->iddocumentos.",'".$datos->numdoc."',".$datos->folios.",'".$datos->referenciadocumentos."',2,'".date("Y-m-d H:i:s")."','".$_SESSION['usuario']."','".$act."',0,".$corre.",".$codigoadjcargo.")";
   //  echo $query1;
	 $recordSet1 = $BD->ejecutar($query1);
     
	 
	  if (!$ret || !$recordSet1 || !$recordSet){
        $this->error=mysql_error();
            $BD->ejecutar("ROLLBACK");
            mysql_close();
            return 0;
    }
		$BD->ejecutar("COMMIT");
        mysql_close();//echo 1;
        return 1;

  }

  function DerivarAdjuntos($idexpediente){
     session_start();
     $BD= new ConexionDB();
     $query="UPDATE documentosadjuntos SET fechaderiv='".date("Y-m-d H:i:s")."', recepcionadoadj=2,usuarioenvia='".$_SESSION['usuario']."' WHERE idexpediente='".$idexpediente."' and recepcionadoadj=0";
     $ret=$BD->ejecutar($query);
     //echo $query;
     header("Location: controlador.php?pagina=13");
  }

  function RecepcionarAdjuntos($idexpediente){
     session_start();
     $BD = new ConexionDB();
     $query="UPDATE documentosadjuntos SET fecharecep='".date("Y-m-d H:i:s")."', usuariorecibe='".$_SESSION['usuario']."', recepcionadoadj=1 WHERE idexpediente='".$idexpediente."' and estadoadj=2 and recepcionadoadj=2";
     //echo $query;
     $recordSet = $BD->ejecutar($query);
  }

  function CrearCarpeta($nombre,$area){
     $BD = new ConexionDB();
     $query="INSERT INTO carpetas (nombrecarpeta,idarea) VALUE ('".strtoupper($nombre)."','".$area."')";
     //echo $query;
     $recordSet = $BD->ejecutar($query);
  }

  function EnviarCarpeta($idexpediente,$carpeta){
    $BD = new ConexionDB();
    /*if ($carpeta==1){
       exit;
    } */
    $query="UPDATE expediente SET idcarpeta=".$carpeta." WHERE idexpediente='".$idexpediente."'";
    $recordSet = $BD->ejecutar($query);
    //echo $query;
    
  }

  function ModificarCarpeta($nomcarpeta,$idcarpeta){
    $BD = new ConexionDB();
    $query="UPDATE carpetas SET nombrecarpeta='".$nomcarpeta."' WHERE idcarpeta=".$idcarpeta;
    //echo $query;
    $recordSet = $BD->ejecutar($query);
  }

  function EliminarCarpeta($idcarpeta){
    $BD = new ConexionDB();
    //$query="SELECT idexpediente FROM ubicacion WHERE idarearecibe='GE007' and estadoexp=2 and carpeta=".$idcarpeta;
    $query="UPDATE expediente SET idcarpeta=1 WHERE idcarpeta=".$idcarpeta;
    //echo $query."<br>";
    $recod=$BD->ejecutar($query);

    $query="DELETE FROM carpetas WHERE idcarpeta=".$idcarpeta;
    $recod=$BD->ejecutar($query);
    //echo $query."<br>";
  }

  function ModificarExpediente($expediente,$adjuntos){
   
    $BD = new ConexionDB();
    $query1="UPDATE expediente SET idtupa='".$expediente->idtupa."', remitente='".$expediente->remitente."', asuntonotupa='".$expediente->asuntonotupa."' WHERE idexpediente='".$expediente->idexpediente."'";
	
    $recod1=$BD->ejecutar($query1);	
    if (!$recod1){
         Debug::println("No se pudo ejecutar la consulta listar: " . $query1);
         return false;
    }       
    
    $query2="UPDATE documentosadjuntos SET iddocumentos=".$adjuntos->iddocumentos.", numdoc='".$adjuntos->numdoc."', folios=".$adjuntos->folios.", referenciadocumentos='".$adjuntos->referenciadocumentos."' WHERE idexpediente='".$expediente->idexpediente."' and correlativo=0";
	
    $recod2=$BD->ejecutar($query2);      
    if (!$recod2){
         Debug::println("No se pudo ejecutar la consulta listar: " . $query2);
         return false;
    }       

    
}

  function TerminarExpediente($idexpediente,$iddocumento,$numero,$referencias,$usuario,$idarea,$terminado){

    $BD = new ConexionDB();
    $query="INSERT INTO estadosexp (idexpediente,iddocumento,numerodocu,referencia,fechaatencion,usuario,estado,idarea) VALUE ('".$idexpediente."',".$iddocumento.",'".$numero."','".$referencias."','".date("Y-m-d H:i:s")."','".$usuario."',30,'".$idarea."')";
    //echo $query."<br>";
    $recod=$BD->ejecutar($query);

    $query = "UPDATE expediente SET estados=30, terminado=".$terminado." WHERE idexpediente='".$idexpediente."'";
    //echo $query."<br>";
    $recod=$BD->ejecutar($query);
    

 /*   $query="UPDATE expediente SET atendido=1 WHERE idexpediente=".$idexpediente;
    $recod=$BD->ejecutar($query);
    //echo $query;*/
  }

  function IngresarUsuario($usuario,$password,$nomape,$idarea,$tipo){
     $query="INSERT INTO usuario (usuario,pssword,nomape,idarea,tipo,estado) VALUES ('".$usuario."','".$password."','".strtoupper($nomape)."','".$idarea."',".$tipo.",0)";
     //echo $query;
     $BD = new ConexionDB();
     $recordSet = $BD->ejecutar($query);
	 
	 header("Location: controlador.php?pagina=0");
  }

  function IngresarArea($idarea,$nombarea,$abrearea){
     $query="INSERT INTO areas (idarea,descripcion_area,abreviatura_area) VALUES ('".strtoupper($idarea)."','".strtoupper($nombarea)."','".strtoupper($abrearea)."')";
    // echo $query;
     $BD = new ConexionDB();
     $recordSet = $BD->ejecutar($query);
	 header("Location: controlador.php?pagina=0");
  }
  
  function ListarUsuarios(){
     $query="SELECT idusuario,usuario,nomape,a.descripcion_area,u.idarea,tipo FROM usuario u, areas a WHERE a.idarea=u.idarea";
     $BD = new ConexionDB();
     $recordSet = $BD->ejecutar($query);
     $usuarios = array();

     while($fila = $recordSet->fetch_assoc()){
       $usuarios[] = new UsuarioVO($fila['idusuario'],$fila['usuario'],"",$fila['nomape'],$fila['idarea'],$fila['tipo'],$fila['descripcion_area'],"");
     }

     return $usuarios;
  }

    function ListaUsuario($idusuario){
     $query="SELECT idusuario,usuario,nomape,a.descripcion_area,u.idarea,tipo FROM usuario u, areas a WHERE a.idarea=u.idarea and idusuario='".$idusuario."'";
     //echo $query;
     $BD = new ConexionDB();
     $recordSet = $BD->ejecutar($query);
     //$usuario = array();

     while($fila = $recordSet->fetch_assoc()){
       $usuario = new UsuarioVO($fila['idusuario'],$fila['usuario'],"",$fila['nomape'],$fila['idarea'],$fila['tipo'],$fila['descripcion_area'],"");
     }

     return $usuario;
  }

  function ExiExp($exp){
     //verifica si existe el expdeinte
     $query="SELECT idexpediente FROM expediente WHERE idexpediente='".$exp."'";
     //echo $query;
     $BD = new ConexionDB();
     $recordSet = $BD->ejecutar($query);
     //return $recordSet->idexpediente;
     $dato = $recordSet->fetch_assoc();
     return $dato['idexpediente'];

  }

  function login($u, $p) {
        session_start();
        //$query = "SELECT id, usuario,nomape, area,estado, permiso FROM usuarios WHERE usuario = '".$u."' AND pass = '".md5($p)."'";

        $query = "select idusuario, usuario,nomape, idarea, tipo, descripcionareaenvia, estado from usuario, areas where idareaenvia=idarea and usuario = '".$u."' AND pssword = '".md5($p)."'";

        $BD = new ConexionDB();
        $recordSet = $BD->ejecutar($query);

        if (!$recordSet){
           Debug::println("UsuarioDAO: login: Usuario y/o Clave incorrectos. ".$query);
           return false;
        }

        $usuario = "";
        if($fila=$recordSet->fetch_assoc()) {
            $usuario = new UsuarioVO($fila['idusuario'], $fila['usuario'], "", $fila['nomape'], $fila['idarea'], $fila['tipo'],$fila['descripcionareaenvia'],$fila['estado']);
            setcookie("id_usuario", $usuario->idUsuario, time()+60*60*24*31,"/","",0);
        }

        return $usuario;
    }

    function enviarquejas($asunto,$descripcion){
        session_start();
        $BD = new ConexionDB();
        $query="INSERT INTO quejas (asunto,descripcion,idusuario,fecha) VALUES('".$asunto."','".$descripcion."',".$_SESSION['idusuario'].",'".date("Y-m-d H:i:s")."')";
        $result = $BD->ejecutar($query);
        //echo $query;
    }
    
    function SubirDocumentosScan($idexpediente,$archivos){
        //mandar imagenes
        $postback=isset($_POST['postback']) ? true : false;
        $idcarpeta = $_POST['idexpediente'];
		$ruta = "imgdocumentos/". $idcarpeta;
        if ($postback) {
           extract($_POST);
           $archivos = '';
           $msg = "Mensaje Enviado";
           $cout=0;    
           if (isset ($_FILES["archivos"])) {
//              $msg .= "<ul>";
              
              $BD = new ConexionDB();
//              $query2="select ruta from expediente where idexpediente=".$idexpediente;
//              $result2 = $BD->ejecutar($query2);             
//              $fila = $result2->fetch_assoc();
             if(!file_exists($ruta))
				{
				//chmod($ruta,0777); 
				mkdir ($ruta);
				foreach ($_FILES["archivos"]["error"] as $key => $error) {
                if ($error == UPLOAD_ERR_OK) {
                  $tmp_name = $_FILES["archivos"]["tmp_name"][$key];
                  $name = $_FILES["archivos"]["name"][$key];
                  $name = $_POST['idexpediente']."-".$name;
                  $msg .= "<li>$name</li>";
                  move_uploaded_file($tmp_name, "imgdocumentos/$idcarpeta/$name");
                  $query = "INSERT INTO imagenes(idexpediente,nomfoto) VALUES ('".$_POST['idexpediente']."','".$name."')";
                  $result = $BD->ejecutar($query); 
				//echo "Se ha creado el directorio: " . $ruta;
				} 
				}
				}
				
			else {
				//echo "la ruta: " . $ruta . " ya existe ";
			foreach ($_FILES["archivos"]["error"] as $key => $error) {
                if ($error == UPLOAD_ERR_OK) {
                  $tmp_name = $_FILES["archivos"]["tmp_name"][$key];
                  $name = $_FILES["archivos"]["name"][$key];
                  $name = $_POST['idexpediente']."-".$name;
                  $msg .= "<li>$name</li>";
                  move_uploaded_file($tmp_name, "imgdocumentos/$idcarpeta/$name");
                  $query = "INSERT INTO imagenes(idexpediente,nomfoto) VALUES ('".$_POST['idexpediente']."','".$name."')";
                  $result = $BD->ejecutar($query);             
                //  echo $query;                    
                } #if
                
              }
				} 
 # foreach

           } # if
        }
    }
    
    function SubirDocumentosScan1($idexpediente,$archivos){
        //mandar imagenes
        $postback=$_POST['postback'];
        $idcarpeta = $_SESSION['idexpediente'];
		$ruta = "imgdocumentos/". $idcarpeta;
        if ($postback) {
           extract($_POST);
           $archivos = '';
           $msg = "Mensaje Enviado";
           $cout=0;    
           if (isset ($_FILES["archivos"])) {
//              $msg .= "<ul>";
              
              $BD = new ConexionDB();
//              $query2="select ruta from expediente where idexpediente=".$idexpediente;
//              $result2 = $BD->ejecutar($query2);             
//              $fila = $result2->fetch_assoc();
             if(!file_exists($ruta))
				{
				//chmod($ruta,0777); 
				mkdir ($ruta);
				foreach ($_FILES["archivos"]["error"] as $key => $error) {
                if ($error == UPLOAD_ERR_OK) {
                  $tmp_name = $_FILES["archivos"]["tmp_name"][$key];
                  $name = $_FILES["archivos"]["name"][$key];
                  $name = $_SESSION['idexpediente']."-".$name;
                  $msg .= "<li>$name</li>";
                  move_uploaded_file($tmp_name, "imgdocumentos/$idcarpeta/$name");
                  $query = "INSERT INTO imagenes(idexpediente,nomfoto) VALUES ('".$_SESSION['idexpediente']."','".$name."')";
                  $result = $BD->ejecutar($query); 
				//echo "Se ha creado el directorio: " . $ruta;
				} 
				}
				}
				
			else {
				//echo "la ruta: " . $ruta . " ya existe ";
			foreach ($_FILES["archivos"]["error"] as $key => $error) {
                if ($error == UPLOAD_ERR_OK) {
                  $tmp_name = $_FILES["archivos"]["tmp_name"][$key];
                  $name = $_FILES["archivos"]["name"][$key];
                  $name = $_SESSION['idexpediente']."-".$name;
                  $msg .= "<li>$name</li>";
                  move_uploaded_file($tmp_name, "imgdocumentos/$idcarpeta/$name");
                  $query = "INSERT INTO imagenes(idexpediente,nomfoto) VALUES ('".$_SESSION['idexpediente']."','".$name."')";
                  $result = $BD->ejecutar($query);             
                //  echo $query;                    
                } #if
                
              }
				} 
 # foreach

           } # if
        }
    }
	
	function SubirFotoPerfil($idusuario,$archivos){
        //mandar imagenes
        $postback=$_POST['postback'];
		$idusuario=$_POST['idusuario'];
        //$idcarpeta = $_SESSION['idexpediente'];
		$ruta = "./imagenes/fotos/";
        if ($postback) {
           extract($_POST);
           $archivos = '';
           $msg = "Mensaje Enviado";
           $cout=0;    
           if (isset ($_FILES["archivos"])) {
//              $msg .= "<ul>";
              
              $BD = new ConexionDB();
//              $query2="select ruta from expediente where idexpediente=".$idexpediente;
//              $result2 = $BD->ejecutar($query2);             
//              $fila = $result2->fetch_assoc();
             if(!file_exists($ruta))
				{
				//chmod($ruta,0777); 
				mkdir ($ruta);
				foreach ($_FILES["archivos"]["error"] as $key => $error) {
                if ($error == UPLOAD_ERR_OK) {
                  $tmp_name = $_FILES["archivos"]["tmp_name"][$key];
                  $name = $_FILES["archivos"]["name"][$key];
                  //$name = $_SESSION['idexpediente']."-".$name;
                  $msg .= "<li>$name</li>";
                  move_uploaded_file($tmp_name, "imagenes/fotos/$name");
                  $query = "Update usuario set foto = '".$name."' where idusuario = '".$idusuario."'";
				 // $query = "INSERT INTO imagenes(idexpediente,nomfoto) VALUES ('".$_SESSION['idexpediente']."','".$name."')";
                  $result = $BD->ejecutar($query); 
				//echo "Se ha creado el directorio: " . $ruta;
				} 
				}
				}
				
			else {
				//echo "la ruta: " . $ruta . " ya existe ";
			foreach ($_FILES["archivos"]["error"] as $key => $error) {
                if ($error == UPLOAD_ERR_OK) {
                  $tmp_name = $_FILES["archivos"]["tmp_name"][$key];
                  $name = $_FILES["archivos"]["name"][$key];
                  $name = $_SESSION['idexpediente']."-".$name;
                  $msg .= "<li>$name</li>";
                  move_uploaded_file($tmp_name, "imgdocumentos/$idcarpeta/$name");
                  $query = "INSERT INTO imagenes(idexpediente,nomfoto) VALUES ('".$_SESSION['idexpediente']."','".$name."')";
                  $result = $BD->ejecutar($query);             
                //  echo $query;                    
                } #if
                
              }
				} 
 # foreach

           } # if
        }
    }
	
  function EliminarImagenes($id){
    session_start();
    $BD = new ConexionDB();

    $query="DELETE FROM imagenes WHERE idfot=".$id;
    //echo $query;
    $recordSet = $BD->ejecutar($query);
  }
  
  function CambiarEstado($datos){
    
    $BD = new ConexionDB();
	$BD->ejecutar("BEGIN");
    $query="UPDATE expediente SET estados=".$datos->estado." WHERE idexpediente='".$datos->idexpediente."'";
    //echo $query."<br>";
    $ret = $BD->ejecutar($query);
    
    $query="INSERT INTO estadosexp (idexpediente,iddocumento,numerodocu,referencia,fechaatencion,estado,usuario,idarea) VALUES ('".$datos->idexpediente."',".$datos->iddocumento.",'".$datos->numerodocu."','".$datos->referencia."','".$datos->fechaatencion."',".$datos->estado.",'".$datos->usuario."','".$datos->idarea."')";
    //echo $query."<br>";
    $ret1 = $BD->ejecutar($query);
	
	 if (!$ret || !$ret1){
        $this->error=mysql_error();
            $BD->ejecutar("ROLLBACK");
            mysql_close();
            return 0;
    }
   		
		$BD->ejecutar("COMMIT");
        mysql_close();//echo 1;
        return 1;  
}

    function Modificarinternos($exp,$doc){
        
        $BD = new ConexionDB();
		$BD->ejecutar("BEGIN");
        //echo $exp->arearecibe;
        $query="UPDATE expediente SET remitente='".$exp->remitente."', asuntonotupa='".$exp->asuntonotupa."', seguimiento=".$exp->seguimiento.", idarearecibe='".$exp->arearecibe."' WHERE idexpediente='".$exp->idexpediente."'";
        
          $ret = $BD->ejecutar($query);
          
          $query="UPDATE documentosadjuntos SET iddocumentos=".$doc->iddocumentos.", numdoc='".$doc->numdoc."', folios=".$doc->folios.", referenciadocumentos='".$doc->referenciadocumentos."' WHERE correlativo=0 and idexpediente='".$exp->idexpediente."'";
          $ret1 = $BD->ejecutar($query);         
          //echo $query;

           if (!$ret || !$ret1){
        $this->error=mysql_error();
            $BD->ejecutar("ROLLBACK");
            mysql_close();
            return 0;
    }
   		
		$BD->ejecutar("COMMIT");
        mysql_close();//echo 1;
        return 1;  
    }


    function ModificaUsuario($id,$pass,$nomape,$area,$cpass){
           $BD = new ConexionDB();
		   
           if ($cpass==true){
                $query = "UPDATE usuario SET pssword='".md5($pass)."', nomape='".$nomape."', idarea='".$area."' where idusuario=".$id;
                echo "se cambia de password";
                }else{
                $query = "UPDATE usuario SET nomape='".$nomape."', idarea='".$area."' where idusuario=".$id;
                echo "no se cambia de password";
                }
           //echo $query;
           $BD->ejecutar($query);

    }
    



}
?>