<?php
/*******************************************************/
/*************** Inicializacion de la Fecha ************/
/*******************************************************/

$ameses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
$adias = array("01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31");
$aanos=array("2007","2008");

$dia = date("d");
$mes=date("m")-1;
$ano = date("Y");

$tpl->assign('ameses',$ameses);
$tpl->assign('adias',$adias);
$tpl->assign('aanos',$aanos);
         
$tpl->assign('d',$dia);
$tpl->assign('m',$mes);
$tpl->assign('a',$ano);

if (isset($_POST['dia'])){//Si se usa las Fechas del combo
         
   $fecha= $_POST['ano']."-".$_POST['mes']."-".$_POST['dia'];

   $tpl->assign('dias',$_POST['dia']);
   $tpl->assign('mes',$_POST['mes']-1);
   $tpl->assign('ano',$_POST['ano']);

   $fechalet=$fec->fechalet($fecha,false);

   $tpl->assign('fechalet',$fechalet);
             
   }else{//si no usa la fecha actual
            
   $tpl->assign('dias',$dia);
   $tpl->assign('mes',$mes);
   $tpl->assign('ano',$ano);
   $fecha = date("Y-m-d H:i:s");

   $fechalet=$fec->fechalet($fecha,false);
   
   $tpl->assign('fechalet',$fechalet);
             
   }

/*   if (isset($_POST['ckmes'])){ // Si se seleccion por mes
          
     //$lista = $daoexp->ListarDerivados($_POST['mes'],$_POST['ano'],true,$_GET['orden']);
          
     $tpl->assign('fecha',$fecha);
     $tpl->assign('lista', $lista);
           
     //$tpl->display('lista_derivados.tpl.php'); 
           
     }else{//Si no usa una fecha especifica

//     $lista = $daoexp->ListarDerivados($fecha,"",false,$_GET['orden']);
     $tpl->assign('fecha',$fecha);
     $tpl->assign('lista', $lista);
           
     //$tpl->display('lista_derivados.tpl.php');
  }*/

?>