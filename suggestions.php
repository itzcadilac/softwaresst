<?php
    //cabecera texto plano
    header("Content-Type: text/plain; charset=iso-8859-1");
    
    //informaci�n base datos
    $sDBServer = "localhost";
    $sDBName = "stdmph";
    $sDBUsername = "root";
    $sDBPassword = "copytoserver";

    //incluye JSON-PHP e instancia el objeto
    require_once("JSON.php");
    $oJSON = new JSON();
    
    //obtiene los datos que fueron enviados
    $oData = $oJSON->decode($HTTP_RAW_POST_DATA);
    $aSuggestions = array();

    //se asegura que hay texto
    if (strlen($oData->text) > 0) {

        //crea el string de la consulta SQL
        
        //$sQuery = "Select denominacion from tupa where denominacion like '%".$oData->text."%' order by denominacion ASC limit 0,9";
        
        
        //$sQuery = "Select denominacion from ".$oData->requesting." where denominacion like '".$oData->text."%' order by denominacion ASC limit 0,9";
        
       $sQuery="SELECT idtupa,denominacion, MATCH(denominacion) AGAINST('".$oData->text."') AS coincidencia FROM tupa WHERE MATCH(denominacion) AGAINST ('".$oData->text."') ORDER BY coincidencia DESC limit 0,12";
              
        //hace la conexi�n a la base de datos
        $oLink = mysql_connect($sDBServer,$sDBUsername,$sDBPassword);
        @mysql_select_db($sDBName) or die("Unable to open database");
        
        if($oResult = mysql_query($sQuery)) {
            while ($aValues = mysql_fetch_array($oResult,MYSQL_ASSOC)) {            
                array_push($aSuggestions, $aValues['denominacion']." * ".$aValues['idtupa']);
            }
        }
    
        mysql_free_result($oResult);
        mysql_close($oLink);
        
    }
    
   $sSalida= ($oJSON->encode($aSuggestions));
    
  /*  $sSalida=str_replace("Alava","�lava",$sSalida);
    $sSalida=str_replace("Almeria","Almer�a",$sSalida);
	$sSalida=str_replace("Avila","�vila",$sSalida);
	$sSalida=str_replace("Caceres","C�ceres",$sSalida);
	$sSalida=str_replace("Cadiz","C�diz",$sSalida);
	$sSalida=str_replace("Castellon","Castell�n",$sSalida);
	$sSalida=str_replace("Cordoba","C�rdoba",$sSalida);
	$sSalida=str_replace("Guipuzcoa","Guip�zcoa",$sSalida);
	$sSalida=str_replace("La Coruna","La Coru�a",$sSalida);
	$sSalida=str_replace("Leon","Le�n",$sSalida);
	$sSalida=str_replace("Malaga","M�laga",$sSalida);*/
	
	
	
   echo  $sSalida;
?>