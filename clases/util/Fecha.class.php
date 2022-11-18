<?php
class Fecha {

  var $fecha;

  /***************************************************************************/
  /* public:      Constructor.
   * fecha:       Valor de la fecha; puede estar en texto SQL o en milisegundos
   */
  function Fecha($fecha = -1) {
    if (is_integer($fecha)) {
      if ($fecha == -1)
        $this->fecha= getDate(time());
      else
        $this->fecha = getDate($fecha);
    }
    else {
      $dia = substr($fecha,8,2);
      $mes = substr($fecha,5,2);
      $anyo = substr($fecha,0,4);
      if (strlen($fecha)>17) {
        $segundo = substr($fecha,17,2);
        $minuto = substr($fecha,14,2);
        $hora = substr($fecha,11,2);
      }
      else {
        $segundo = "00";
        $minuto = "00";
        $hora = "00";
      }
      $this->fecha = getDate(mktime($hora, $minuto, $segundo, $mes, $dia, $anyo));
    }
  }


  /***************************************************************************/
  /* public:      escribirSQL
   * sin_hora:    Verdadero si queremos la fecha sin datos de hora
   * Devuelve la fecha en el formato adecuado para insertarla en la BD
   */
  function escribirSQL($sin_hora = false) {
    $fecha = strval($this->fecha["year"])."-".
        strval($this->fecha["mon"])."-".
        strval($this->fecha["mday"]);
    if (!$sin_hora)
      $fecha .= " ".strval($this->fecha["hours"]).":".
        strval($this->fecha["minutes"]).":".
        strval($this->fecha["seconds"]);
    return $fecha;
  }
  
  
   	function DarMes($mes) {
		switch ($mes) {
	      case 1: return "Enero";
	      case 2: return "Febrero";
    	  case 3: return "mMrzo";
	      case 4: return "abril";
	      case 5: return "Mayo";	
    	  case 6: return "Junio";
	      case 7: return "Julio";
	      case 8: return "Agosto";
	      case 9: return "Septiembre";
	      case 10: return "Octubre";
	      case 11: return "Noviembre";
	      case 12: return "Diciembre";

	    }
	}
  
  

  /***************************************************************************/
  /* public:      escribirTexto
   * Devuelve la fecha (sin hora) en formato comprensible para el ser humano
   */
  function escribirTexto() {
    return strval($this->fecha["mday"])." de ".
      $this->mesTexto($this->fecha["mon"])." de ".
      strval($this->fecha["year"]);
  }

  /***************************************************************************
 
  /* public:      mesTexto
   * mes:         mes en forma numérica
   * Devuelve el mes en formato texto (y en español, claro)
   */
  function mesTexto($mes) {
    switch ($mes) {
      case 1: return "enero";
      case 2: return "febrero";
      case 3: return "marzo";
      case 4: return "abril";
      case 5: return "mayo";
      case 6: return "junio";
      case 7: return "julio";
      case 8: return "agosto";
      case 9: return "septiembre";
      case 10: return "octubre";
      case 11: return "noviembre";
      case 12: return "diciembre";
      default: return -1;
    }
  }


  /* Funciones que devuelven desglosado el valor de la fecha */
  function dia() {
    return $this->fecha["mday"];
  }
  function mes() {
    return $this->fecha["mon"];
  }
  function anyo() {
    return $this->fecha["year"];
  }
  function hora() {
    return $this->fecha["hours"];
  }
  function minuto() {
    return $this->fecha["minutes"];
  }
  function segundo() {
    return $this->fecha["seconds"];
  }

  /***************************************************************************/
  /* public:      operar
   * segundos:    segundos que se añadirán a la fecha
   * Cambia el valor de una fecha.
   */
  function operar($segundos) {
    $timestamp=mktime($this->hora(), $this->minuto(), $this->segundo,
      $this->mes(), $this->dia(), $this->anyo);
    $timestamp += $segundos;
    $this->fecha = getDate($timestamp);
  }

  /***************************************************************************/
  /* public:      comparar
   * fecha:       objeto Fecha con el que se compara
   * Devuelve -1 si la fecha suministrada es menor, 0 si es igual y 1 si es mayor
   */
  function comparar($fecha) {
    $timestamp=mktime($this->hora(), $this->minuto(), $this->segundo,
      $this->mes(), $this->dia(), $this->anyo);
    $timestamp2 = mktime($fecha->hora(), $fecha->minuto(), $fecha->segundo,
      $fecha->mes(), $fecha->dia(), $this->fecha);
    return $timestamp == $timestamp2 ? 0 : ( $timestamp > $timestamp2 ? -1 : 1);
  }

  // devuelve una fache an eletras
  function fechalet($fecha,$complet){
    //$dias = array("Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo");
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    
    $separa = explode("-",$fecha);
    $fecha2 = mktime(0,0,0,$separa[1],substr($separa[2],0,2),$separa[0]);
    
    $diat = date("D",$fecha2);
    $dia = date("d",$fecha2);
    $mes = date("m",$fecha2);
    $ano = date("Y",$fecha2);

    $separa2=explode(" ",$fecha);
    $hora=$separa2[1];
    
    switch ($diat){
      case "Mon":
        $tdia="Lun";
        break;
      case "Tue":
        $tdia="Mar";
        break;
      case "Wed":
        $tdia="Mie";
        break;
      case "Thu":
        $tdia="Jue";
        break;
      case "Fri":
        $tdia="Vie";
        break;
      case "Sat":
        $tdia="Sab";
        break;
      case "Sun":
        $tdia="Dom";
        break;
    }
    
    switch ($mes){
      case 1:
        $tmes="Ene";
        break;
      case 2:
        $tmes="Feb";
        break;
      case 3:
        $tmes="Mar";
        break;
      case 4:
        $tmes="Abr";
        break;
      case 5:
        $tmes="May";
        break;
      case 6:
        $tmes="Jun";
        break;
      case 7:
        $tmes="Jul";
        break;
      case 8:
        $tmes="Ago";
        break;
      case 9:
        $tmes="Set";
        break;
      case 10:
        $tmes="Oct";
        break;
      case 11:
        $tmes="Nov";
        break;
      case 12:
        $tmes="Dic";
        break;
    }
    
    if ($complet==true){
        //return $tdia." ".$dia." de ".$tmes." del ".$ano." - ".$hora;
        return $dia."-".$tmes."-".$ano." - ".$hora;
    }else{
        //return $tdia." ".$dia." de ".$tmes." del ".$ano;
        return $dia."-".$tmes."-".$ano;
    }
    
  }

  function FechaCombo(){
    $dia = aray("01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31");
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    $ano=array(2007,2008);

    $diaactual=date("d");
    $mesactual=date("m");
    $anoactual=date("Y");

  }
  
     function Calculodias($fechaini,$fechafini){

    if ($fechaini != ""){
    	$separa = explode("-",$fechaini);
    	
	    $fechaini = mktime(0,0,0,$separa[1],substr($separa[2],0,2),$separa[0]);
    	
		$ano1 = date("Y",$fechaini);
//		echo $ano1;
		$mes1 = date("m",$fechaini);
		$dia1 = date("d",$fechaini);


    	$separa2 = explode("-",$fechafini);
	    $fechafini = mktime(0,0,0,$separa2[1],substr($separa2[2],0,2),$separa2[0]);
		
		$ano2 = date("Y",$fechafini);
		$mes2 = date("m",$fechafini);
		$dia2 = date("d",$fechafini);
		
		//calculo timestam de las dos fechas
		$timestamp1 = mktime(0,0,0,$mes1,$dia1,$ano1);
		$timestamp2 = mktime(4,12,0,$mes2,$dia2,$ano2);
		
		//resto a una fecha la otra
		$segundos_diferencia = $timestamp1 - $timestamp2;
		//echo $segundos_diferencia;
		
		//convierto segundos en días
		$dias_diferencia = $segundos_diferencia / (60 * 60 * 24);
		
		//obtengo el valor absoulto de los días (quito el posible signo negativo)
		$dias_diferencia = abs($dias_diferencia);
		
		//quito los decimales a los días de diferencia
		$dias_diferencia = floor($dias_diferencia);
		
		return $dias_diferencia;
		}
   }
   
   
   function Graficaposesion($idexpediente){
    
    /*******************************************/    
	    $BD = new ConexionDB();
	
	   	$query="select h.idexpediente, h.estadoexp,h.idareaenvia, h.idarearecibe, h.fecha_mov, h.actual as 'correlativo', a.abreviatura_area as 'abreareaenvia', a2.abreviatura_area as 'abrearearecibe' from historial h, areas a, areas a2 where a.idarea=h.idareaenvia and a2.idarea=h.idarearecibe and idexpediente='".$idexpediente."' order by correlativo";

     	$recordSet = $BD->dbLink->Execute($query);

     	while($fila=$recordSet->FetchRow()) {
     	 
        	if ($fila['estadoexp']==2){
			  $datay[] = $fila['abrearearecibe'];        
			  $fecharecep[] = $fila['fecha_mov'];
			}
			
			//print_r($fila);
			
			if ($fila['estadoexp']==6){
		  	  $fechaderiv[]=$fila['fecha_mov'];
			}
	   }
	   
	   $count = count($fecharecep);
	   $c=0;
//	   echo $count."<br>";
	   for($x=0; $x<=$count-1; $x++){	 
	    
	    	if ($fecharecep[$x+1]==""){
				$valores[]=$this->Calculodias($fecharecep[$x],date("Y-m-d 00:00:00"));				
//echo $fecharecep[$x]." - ".date("Y-m-d 00:00:00")." Nº Reg:".$c++."<br>";
			}else{
				$valores[]=$this->Calculodias($fecharecep[$x],$fechaderiv[$x+1]);
				//echo $fecharecep[$x]." - ".$fechaderiv[$x+1]." Nº Reg:".$c++."<br>";
			}	
				
	   }	
	   
	   $countval=count($valores);
	   
	   for ($y=0;$y<=$countval-1;$y++){
			
			//echo $datay[$y]." = ".$valores[$y]."<br>";
	}
	   
	   /*********************************************/
	   	include ("jpgraph-1.20.5/src/jpgraph.php");
	   
		include ("jpgraph-1.20.5/src/jpgraph_bar.php");

		$ancho=count($datay)*50;		

		if (count($datay)<6){
			$ancho=400;
		}

		// Create the graph. These two calls are always required
		$graph = new Graph($ancho,300,"auto");    
		$graph->SetScale("textlin");

		// Add a drop shadow
		$graph->SetShadow();

		// Adjust the margin a bit to make more room for titles
		$graph->img->SetMargin(40,30,40,50);
		
		$graph->xaxis->SetTickLabels($datay);
		
		// Create a bar pot
		$bplot = new BarPlot($valores);
		$bplot->SetFillColor("orange");
		$bplot->value->Show();
		$graph->Add($bplot);
		
		// Setup the titles
		$graph->title->Set("GRAFICO DE DEMORA DEL EXPEDIENTE - ".$idexpediente);
		$graph->xaxis->title->Set("AREAS DE RECORRIDO");
		$graph->yaxis->title->Set("DIAS DE POSESION");
		
		$graph->title->SetFont(FF_FONT1,FS_BOLD);
		$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
		$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
		
		// Display the graph
		$graph->Stroke();
    /*******************************************/
}


   function Graficaingresoporarea($mes,$ano){
    
    /*******************************************/    
	    $BD = new ConexionDB();
	
	   	$query="select h.idarearecibe,count(h.idarearecibe) as 'total',arec.abreviatura_area as 'area_recibe' from historial h, areas aenv, areas arec where  h.idareaenvia=aenv.idarea and h.idarearecibe=arec.idarea and estadoexp=2 and month(fecha_mov)=".$mes." and year(fecha_mov)=".$ano." group by idarearecibe order by total desc";

     	$recordSet = $BD->dbLink->Execute($query);

     	while($fila=$recordSet->FetchRow()) {
		  $datay[] = $fila['area_recibe'];        
		  $valores[]=$fila['total'];
	    }
	   	   
	   
	   /*********************************************/
	   	include ("jpgraph-1.20.5/src/jpgraph.php");
	   
		include ("jpgraph-1.20.5/src/jpgraph_bar.php");

		$ancho=count($datay)*50;		

		if (count($datay)<6){
			$ancho=400;
		}

		// Create the graph. These two calls are always required
		$graph = new Graph($ancho,350,"auto");    
		$graph->SetScale("textlin");

		// Add a drop shadow
		$graph->SetShadow();

		// Adjust the margin a bit to make more room for titles
		$graph->img->SetMargin(40,30,40,50);
		
		$graph->xaxis->SetTickLabels($datay);
		
		// Create a bar pot
		$bplot = new BarPlot($valores);
		$bplot->SetFillColor("orange");
		$bplot->value->Show();
		$graph->Add($bplot);
		
		$mestexto=$this->DarMes($mes);
		
		// Setup the titles
		$graph->title->Set("GRAFICO DE INGRESO DE DOCUMENTO DEL MES DE - ".$mestexto);
		$graph->xaxis->title->Set("AREAS");
		$graph->yaxis->title->Set("CANTIDAD DE DOCUMENTOS");
		
		$graph->title->SetFont(FF_FONT1,FS_BOLD);
		$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
		$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
		
		// Display the graph
		$graph->Stroke();
    /*******************************************/
}
 
 function Graficaingresotramite($mes,$ano){
    
    /*******************************************/    
	    $BD = new ConexionDB();
	
	   	$query="select h.idareaenvia,h.idarearecibe,count(h.idarearecibe) as 'total',aenv.abreviatura_area as 'areaenvia',arec.abreviatura_area as 'area_recibe' from historial h, areas aenv, areas arec where  h.idareaenvia=aenv.idarea and h.idarearecibe=arec.idarea and h.idareaenvia='SG001' and estadoexp=2 and month(fecha_mov)=".$mes." and year(fecha_mov)=".$ano." group by idareaenvia , idarearecibe order by total desc";

     	$recordSet = $BD->dbLink->Execute($query);

     	while($fila=$recordSet->FetchRow()) {
		  $datay[] = $fila['area_recibe'];        
		  $valores[]=$fila['total'];
		  
	    }
	   	   
	   
	   /*********************************************/
	   	include ("jpgraph-1.20.5/src/jpgraph.php");
	   
		include ("jpgraph-1.20.5/src/jpgraph_bar.php");

		$ancho=count($datay)*50;		

		if (count($datay)<6){
			$ancho=400;
		}

		// Create the graph. These two calls are always required
		$graph = new Graph($ancho,350,"auto");    
		$graph->SetScale("textlin");

		// Add a drop shadow
		$graph->SetShadow();

		// Adjust the margin a bit to make more room for titles
		$graph->img->SetMargin(40,30,40,50);
		
		$graph->xaxis->SetTickLabels($datay);
		
		// Create a bar pot
		$bplot = new BarPlot($valores);
		$bplot->SetFillColor("orange");
		$bplot->value->Show();
		$graph->Add($bplot);
		
		$mestexto=$this->DarMes($mes);
		
		// Setup the titles
		$graph->title->Set("GRAFICO DE INGRESO DE DOCUMENTOS DE TRAMITE DOCUMENTARIO DEL MES DE - ".$mestexto." DEL ");
		$graph->xaxis->title->Set("AREAS");
		$graph->yaxis->title->Set("CANTIDAD DE DOCUMENTOS");
		
		$graph->title->SetFont(FF_FONT1,FS_BOLD);
		$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
		$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
		
		// Display the graph
		$graph->Stroke();
    /*******************************************/
}

function Graficadocxmesareas($area,$nomarea){
    
    /*******************************************/    
	    $BD = new ConexionDB();
	
	   	$query="select a.descripcion_area,count(h.idareaenvia) as total, month(fecha_mov) as mes from historial h, areas a where h.idareaenvia='".$area."' and h.estadoexp=6 and h.idareaenvia=a.idarea group by a.descripcion_area, month(fecha_mov)";

     	$recordSet = $BD->dbLink->Execute($query);

     	while($fila=$recordSet->FetchRow()) {
     	  $mestexto1=$this->DarMes($fila['mes']);	
		  $datay[] = $mestexto1;        
		  $valores[]=$fila['total'];
		  $sumtotal = $sumtotal + $fila['total'];
	    }
	   	   
	   
	   /*********************************************/
	   	include ("jpgraph-1.20.5/src/jpgraph.php");
	   
		include ("jpgraph-1.20.5/src/jpgraph_bar.php");

		/*$ancho=count($datay)*50;		

		if (count($datay)<6){
			$ancho=400;
		}*/

		// Create the graph. These two calls are always required
		$graph = new Graph(650,350,"auto");    
		$graph->SetScale("textlin");

		// Add a drop shadow
		$graph->SetShadow();

		// Adjust the margin a bit to make more room for titles
		$graph->img->SetMargin(40,30,40,50);
		
		$graph->xaxis->SetTickLabels($datay);
		
		// Create a bar pot
		$bplot = new BarPlot($valores);
		$bplot->SetFillColor("orange");
		$bplot->value->Show();
		$graph->Add($bplot);
		
		// Setup the titles
		$graph->title->Set("GRAFICO DE PRODUCCION DE DOCUMENTOS POR MES DE ".$nomarea);
		

		
		$graph->xaxis->title->Set("TOTAL :".$sumtotal);
		$graph->yaxis->title->Set("CANTIDAD DE DOCUMENTOS");
		
		$graph->title->SetFont(FF_FONT1,FS_BOLD);
		$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
		$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
		
		// Display the graph
		$graph->Stroke();
    /*******************************************/
}
    
}
?>