<?php

class GeneraCombos{

  function ComboDocumentos($tipo){
    $BD = new ConexionDB();
    
    $tip = explode("-",$tipo);
    $conteo = count($tip);
    
    if ($conteo == 1){
        $cadena = $tip[0];
    }else{
        for ($x=0; $x<=$conteo-1; $x++){
            if ($x == 0){
              $cadena = $tip[0];
            }else{
              $cadena = $cadena.",".$tip[$x];

            }
        }   
    }

    $query = "SELECT iddocumento,detalledocumento,tipodoc FROM documentos WHERE tipodoc in (".$cadena.")";
//   $query = "SELECT iddocumento,detalledocumento,tipodoc FROM documentos WHERE tipodoc=".$cadena;
    //echo $query;
    $recordSet = $BD->dbLink->Execute($query);

    $documento = array();

    while($fila=$recordSet->FetchRow()) {
      $documento[] = new DocumentoVO($fila['iddocumento'],$fila['detalledocumento'],$fila['tipodoc']);
    }

    return $documento;
  }

  function ComboTupa(){
    $BD = new ConexionDB();

    $query = "SELECT idtupa,denominacion,atenciones FROM tupa ORDER BY idtupa";
    $recordSet = $BD->dbLink->Execute($query);

    $tupa = array();

    while($fila=$recordSet->FetchRow()) {
      $tupa[] = new TupaVO($fila['idtupa'],$fila['denominacion'],$fila['atenciones'],"");
    }

    return $tupa;
  }

  function ComboArea($area){
    $BD = new ConexionDB();
    if ($area=='SG001'){
    $query = "SELECT idarea,descripcion_area,abreviatura_area FROM areas WHERE idarea<>'GETDO' and idarea <> 'AREAN'";
    }else{
    $query = "SELECT idarea,descripcion_area,abreviatura_area FROM areas WHERE idarea<>'GETDO' and idarea <> 'AREAN' and idarea <> '".$area."'";
    }
    $recordSet = $BD->dbLink->Execute($query);

    $area = array();

    while($fila=$recordSet->FetchRow()) {
      $area[] = new AreaVO($fila['idarea'],$fila['descripcion_area'],$fila['abreviatura_area']);
    }

    //echo $documento[1]->iddocumento;
    return $area;
  }

  function ComboCarpeta($carpeta){
     $BD = new ConexionDB();
     $query="SELECT idcarpeta,nombrecarpeta,idarea FROM carpetas WHERE idarea='".$carpeta."' or idarea='CRP01'";
     //echo $query;
     $ret = $BD->dbLink->Execute($query);
     $carpetas = array();

     while($fila=$ret->FetchRow()) {
       $carpetas[] = new CarpetasVO($fila['idcarpeta'],$fila['nombrecarpeta'],$fila['idarea']);
     }
     return $carpetas;
   }
   
  function ComboEstados(){
     $BD = new ConexionDB();
     $query="SELECT idestado,detalleestado FROM estados WHERE idestado<>30";
     //echo $query;
     $ret = $BD->dbLink->Execute($query);
     $estados = array();

     while($fila=$ret->FetchRow()) {
       $estados[] = new EstadosVO($fila['idestado'],$fila['detalleestado']);
     }
     return $estados;
   }

}

?>