<?php
class SolicitudDAO{
   
    function ListarSolicitudes(){
        session_start();
        $BD = new ConexionDB();
        $fec = new Fecha();
        $query="SELECT * from solicitudcapac order by idesolicitud ASC";	 
        $recordSet = $BD->ejecutar($query);
        $bandeja = array();
        while($fila=$recordSet->fetch_assoc()) {    
          $bandeja[] = new SolicitudVO($fila['idesolicitud'],$fila['idecontratista'],$fila['numparticipantes'],$fila['numcontacto'],"",$fila['correo'],$fila['idetipopago'],$fila['estadosolic'],$fila['numoperpago'],$fila['fechapago'],$fila['horapago']);
        }
          return $bandeja;
   }

    function RegistrarSolicitud($solVO, $capacitaciones){
        session_start();
        /*
        print "INICIANDO REGISTRO SOLICITUD";
        print " ";
        print " ";
        */
        $BD = new ConexionDB();        
        if($_SESSION['idAutorizador'] == null || $_SESSION['idAutorizador'] == 0){
          $query = 'INSERT INTO solicitudcapac (idecontratista,numparticipantes,numcontacto,correo,idetipopago,estadosolic, ideempresa, ruc, razons, id_autorizador, idecalendcapacitaciones) 
          VALUES ("'.$solVO->idecontratista.'", "'.$solVO->numparticipantes.'", "'.$solVO->numcontacto.'", "'.$solVO->correo.'", "'.$solVO->idetipopago.'", 6, '.$solVO->ideempresa.', "'.$solVO->ruc.'", "'.$solVO->razons.'", 0, '.$solVO->horario_r.')';
          $queryback = 'INSERT INTO solicitudcapac_back (idecontratista,numparticipantes,numcontacto,correo,idetipopago,estadosolic, ideempresa, ruc, razons, id_autorizador, idecalendcapacitaciones) 
          VALUES ("'.$solVO->idecontratista.'", "'.$solVO->numparticipantes.'", "'.$solVO->numcontacto.'", "'.$solVO->correo.'", "'.$solVO->idetipopago.'", 6, '.$solVO->ideempresa.', "'.$solVO->ruc.'", "'.$solVO->razons.'", 0, '.$solVO->horario_r.')';
        }
        else{
          $query = 'INSERT INTO solicitudcapac (idecontratista,numparticipantes,numcontacto,correo,idetipopago,estadosolic, ideempresa, ruc, razons, id_autorizador, idecalendcapacitaciones) 
          VALUES ("'.$solVO->idecontratista.'", "'.$solVO->numparticipantes.'", "'.$solVO->numcontacto.'", "'.$solVO->correo.'", "'.$solVO->idetipopago.'", 5, '.$solVO->ideempresa.', "'.$solVO->ruc.'", "'.$solVO->razons.'", '.$solVO->idAutorizador.', '.$solVO->horario_r.')';  
          $queryback = 'INSERT INTO solicitudcapac_back (idecontratista,numparticipantes,numcontacto,correo,idetipopago,estadosolic, ideempresa, ruc, razons, id_autorizador, idecalendcapacitaciones) 
          VALUES ("'.$solVO->idecontratista.'", "'.$solVO->numparticipantes.'", "'.$solVO->numcontacto.'", "'.$solVO->correo.'", "'.$solVO->idetipopago.'", 5, '.$solVO->ideempresa.', "'.$solVO->ruc.'", "'.$solVO->razons.'", '.$solVO->idAutorizador.', '.$solVO->horario_r.')';  
        } 
        $response = $BD->ejecutar($query);
        $response_back = $BD->ejecutar($queryback);
        //print "ANTES DEL INSERT ID";
        $id =  $BD->dbLink->insert_id;
        //print "DESPUES DEL INSERT ID 1: $id";
        //print "DESPUES DEL INSERT ID 2: mysqli_insert_id($link)";
        $id1 = mysqli_insert_id($BD->dbLink);
        $_SESSION['idesolicitud_correo'] = $id1;
        foreach($capacitaciones as $tag){
          $values[] = '("'.$id1.'", "'.$tag.'")' ;
        }
        /*
        print "DESPUES DEL FOR EACH";
        print "values: ";
        print $values;
        print "ID: ";
        print $id;
        print "ID2: ";
        print $id1;
        */
        $queryCap = 'INSERT INTO soliccapac (idesolicitud, idecapacitacion) VALUES ' .implode(',', $values);
        $responseCapacitation = $BD->ejecutar($queryCap);        
        $numpart = $solVO->numparticipantes;
        $cupsdisp = $solVO->cuposdispo;        
        $varcups =  $cupsdisp - $numpart;        
        $querycup = "UPDATE calendcapacitaciones SET cuposdispo= $varcups WHERE idecalendcapacitaciones = '$solVO->horario_r'";
        $ret3 = $BD->ejecutar($querycup);
        if (!$response){
            $this->error=mysql_error();
                mysqli_close();
                return 0;
        }
        return 1;
  } 

  function ConsultaCupos($numpart){
    session_start();
    $BD = new ConexionDB();
    $fec = new Fecha();
    $query="SELECT cuposdispo FROM calendcapacitaciones WHERE idecalendcapacitaciones = '$numpart';";	 
    $recordSet = $BD->ejecutar($query);
    $bandeja = array();
    while($fila=$recordSet->fetch_assoc()) {    
      $bandeja[] = new SolicitudVO($fila['cuposdispo']);
    }
      return $bandeja;
}
}
?>