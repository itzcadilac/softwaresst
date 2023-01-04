<?php
require_once "./conf.php";
$tpl = new Plantilla();

$pagina = $_GET['pagina'];
session_start();
$tpl->assign('tipo',$_SESSION['tipo']);
$tpl->assign('acceso',$_SESSION['acceso']);

//controlar el tiempo de sesion
$se= new ValidacionDAO();
$vari=$se->TiempoSesion();

//para mostrar los datos en la parte superior
$tpl->assign('area',$_SESSION['nomarea']);
$tpl->assign('usuario',$_SESSION['nombre']);
$tpl->assign('cabefecha',$_SESSION['mostrarfecha']);

//$daoexp= new ExpedienteDAO();
//$dtoadj = $daoexp->Verificardatosadjuntos();
//$dtoban = $daoexp->Verificardatosbandeja();

//$tpl->assign('dtoadj',$dtoadj);
//$tpl->assign('dtoban',$dtoban);


if ($vari==true){//si sesion no caduca continua

if ($_SESSION['tipo']==20){

    switch ($pagina){
     
     case 0:
       // $tpl->display('cabecerareporte.tpl.php');

        //$tpl->display('AdmReport.tpl.php');
      //  $tpl->display('TabsParte2.tpl.php');
        header ("Location: principalc.php");
        break;
     case 1://lista busqueda
        $tpl->display('cabecerareporte.tpl.php');     

        //$daoexp= new ExpedienteDAO();
        $daousu = new UsuarioDAO();
         
        $tpl->assign('area',$_SESSION['nomarea']);
        $tpl->assign('usuario',$_SESSION['nombre']);
        $tpl->assign('idarea',$_SESSION['idarea']);
         
        $lista = $daousu->BuscarExpediente($_POST['busqueda']);
        $tpl->assign('lista', $lista);
        $tpl->assign('cadebus',$_POST['busqueda']);
        $tpl->display('lista_busqueda_reporte.tpl.php');
        break;
    case 2://lista historial
         $tpl->display('cabecerareporte.tpl.php');

         //$daoexp = new ExpedienteDAO();
         
         $tpl->assign('idexpediente',$_GET['idexpediente']);
         
         $listadatos=$daoexp->ListarDatos($_GET['idexpediente']);
         
         $listadoadj=$daoexp->ListarAdjuntos($_GET['idexpediente']);
         $listaatendidos=$daoexp->ListarAtencion($_GET['idexpediente']);
         $listarecorrido = $daoexp->ListarHistorial($_GET['idexpediente']);

         $tpl->assign('listadatos',$listadatos);
                    
         $tpl->assign('listaadj',$listadoadj);
         $tpl->assign('listaate',$listaatendidos);

         $tpl->assign('listarecorrido',$listarecorrido);
         
         $rept = new Fecha();

         

         $tpl->display('lista_historia_grafica.tpl.php');
//         $rept->Graficaposesion($_GET['idexpediente']);

         break;
    case 3:
        $rept = new Fecha();
        $rept->Graficaposesion($_GET['idexpediente']);
        //echo $_GET['idexpediente'];
        break;
    case 4:
        $rept = new Fecha();
        //''echo "<img src='";
        
        $datos=$rept->Graficaingresoporarea($_POST['mes'],$_POST['ano']);
        //echo "hola";
        break;
    case 5:
        $rept = new Fecha();
        $rept->Graficaingresotramite($_POST['mes'],$_POST['ano']);
        break;      
    case 6: //llama al formulario reportes generales
        $tpl->display('2.tpl.php');
        break;
    case 7:
        //$daoexp= new ExpedienteDAO();
         
        $area=$daoexp->ListarAreas();

        $tpl->assign('areas',$area);
         
        $tpl->display('areas_rpt.tpl.php');
         
        break;
    case 8:
        $rept = new Fecha();
        $rept->Graficadocxmesareas($_GET['idarea'],$_GET['nomarea']);
        break;
        case 9:    //Lista la Busqueda de Expediente
            
        // $tpl->display('cabeceratramite.tpl.php');     

         //$daoexp= new ExpedienteDAO();
         $daousu = new UsuarioDAO();
         
         $tpl->assign('area',$_SESSION['nomarea']);
         $tpl->assign('usuario',$_SESSION['nombre']);
         $tpl->assign('idarea',$_SESSION['idarea']);

         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);
         $tpl->assign('cadebus',$_POST['busqueda']);
         

         $lista = $daousu->BuscarExpediente($_POST['busqueda']);
		  $_SESSION['busqueda'] = $_POST['busqueda'];
         $tpl->assign('lista', $lista);
         //$tpl->display('lista_busqueda_Tramite.tpl.php');
		 header("Location: formulario_buscar_administrador.php");
         
		 break;
     case 10:    //listar historia
         
         //$tpl->display('cabeceratramite.tpl.php');

//         $daoexp = new ExpedienteDAO();
         
         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);
        
         $tpl->assign('idexpediente',$_GET['idexpediente']);
         
         $listadatos=$daoexp->ListarDatos($_GET['idexpediente']);
         
         $listadoadj=$daoexp->ListarAdjuntos($_GET['idexpediente']);
         $listaatendidos=$daoexp->ListarAtencion($_GET['idexpediente']);
         $listarecorrido = $daoexp->ListarHistorial($_GET['idexpediente']);

         $tpl->assign('listadatos',$listadatos);
                    
         $tpl->assign('listaadj',$listadoadj);
         $tpl->assign('listaate',$listaatendidos);

         $tpl->assign('listarecorrido',$listarecorrido);
		$_SESSION['idexpediente'] = $_GET['idexpediente'];
        // $tpl->display('lista_historia.tpl.php');
		header("Location: formulario_historial_administrador.php");

         break;

    case 11:    //muestra el formulario adjuntar documentos
         
       //  $tpl->display('cabeceratramite.tpl.php');

//         $daoexp = new ExpedienteDAO();
       //  $cmb = new GeneraCombos();
         
         $lista = $daoexp->ListarDatos($_GET['idexpediente']);
         $tpl->assign('datosexpediente',$lista);
         
         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);
         
         $tpl->assign('cajaidexpediente',$datos->idexpediente);
        


         //$listadoc = $cmb->ComboDocumentos("2");
         //$tpl->assign('llenardocumento',$listadoc);
		  $_SESSION['idexpediente']= $_GET['idexpediente'];
      //   $tpl->display('formulario_adjuntar.tpl.php');
		header("Location: formulario_adjuntar_documento_administrador.php");
         break;

		case 12:    //lista los Expedientes Derivados
         
         
             //   $tpl->display('cabeceracliente.tpl.php');
         
//         $daoexp = new ExpedienteDAO();
         $fec=new Fecha();  
         
         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);
         
          if (isset($_POST['date'])){
            $cadefec =explode("-",$_POST['date']);
            $dia=$cadefec[2];
			$mes=$cadefec[1];
			$ano=$cadefec[0];
            $fecha=$_POST['date'];
            $tpl->assign('dias',$dia);
			$tpl->assign('mes',$mes);
			$tpl->assign('ano',$ano);   
			$_SESSION['fechabus'] = $_POST['date'];
            }else
			{                  
            $dia = date("d");
			$mes=date("m");
			$ano = date("Y");                             
            $fecha = date("Y-m-d");
            $tpl->assign('dias',$dia);
			$tpl->assign('mes',$mes);
			$tpl->assign('ano',$ano);
            $_SESSION['fechabus'] = $_POST['date'];
            }
			
            $tpl->assign('tipoc',$_GET['tipo']);            
            $tpl->assign('fecha',$fecha);
            $_SESSION['fechabus'] = $_POST['date'];
            if (isset($_POST['tconsulta'])){
                $ordconsulta=$_POST['tconsulta'];
            }else{
                $ordconsulta=1;
            }
            $tpl->assign('orden',$ordconsulta);
         
         if (isset($_POST['ckmes'])){//Si se seleccion por mes          
           $meslet = $fec->DarMes($mes);
           $tpl->assign('fechader',"Mes -".$meslet);
           $lista = $daoexp->ListarDerivados($mes,$ano,true,$ordconsulta);
           $tpl->assign('lista', $lista);
          // $tpl->display('lista_derivados.tpl.php'); 
		  $_SESSION['fechabus'] = $_POST['date'];
           header("Location: formulario_historial_derivados_administrador.php");
         }else{//Si no usa una fecha especifica           
           $tpl->assign('fechader',$dia."-".$mes."-".$ano);
           $lista = $daoexp->ListarDerivados($fecha,"",false,$ordconsulta);
           $tpl->assign('lista', $lista);
		   $_SESSION['fechabus'] = $_POST['date'];
           header("Location: formulario_historial_derivados_administrador.php");           
		   
      //     $tpl->display('lista_derivados.tpl.php');
         }

         /***************************************************/
 
            
         break;		 
	case 13:    //lista los Expedientes Derivados
         
         
             //   $tpl->display('cabeceracliente.tpl.php');
         
//         $daoexp = new ExpedienteDAO();
         $fec=new Fecha();  
         $areabus = $_POST['idareabus'];
		 
         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);
         
          if (isset($_POST['date'])){
            $cadefec =explode("-",$_POST['date']);
            $dia=$cadefec[2];
			$mes=$cadefec[1];
			$ano=$cadefec[0];
            $fecha=$_POST['date'];
            $tpl->assign('dias',$dia);
			$tpl->assign('mes',$mes);
			$tpl->assign('ano',$ano);   
			$_SESSION['fechabus'] = $_POST['date'];
            }else
			{                  
            $dia = date("d");
			$mes=date("m");
			$ano = date("Y");                             
            $fecha = date("Y-m-d");
            $tpl->assign('dias',$dia);
			$tpl->assign('mes',$mes);
			$tpl->assign('ano',$ano);
            $_SESSION['fechabus'] = $_POST['date'];
            }
			
            $tpl->assign('tipoc',$_GET['tipo']);            
            $tpl->assign('fecha',$fecha);
            $_SESSION['fechabus'] = $_POST['date'];
            if (isset($_POST['tconsulta'])){
                $ordconsulta=$_POST['tconsulta'];
            }else{
                $ordconsulta=1;
            }
            $tpl->assign('orden',$ordconsulta);
         
         if (isset($_POST['ckmes'])){//Si se seleccion por mes          
           $meslet = $fec->DarMes($mes);
           $tpl->assign('fechader',"Mes -".$meslet);
           $lista = $daoexp->ListarDerivados($mes,$ano,true,$ordconsulta);
           $tpl->assign('lista', $lista);
          // $tpl->display('lista_derivados.tpl.php'); 
		  $_SESSION['fechabus'] = $_POST['date'];
		  $_SESSION['idareabus'] = $areabus;
           header("Location: formulario_historial_derivados_x_area_administrador.php");
         }else{//Si no usa una fecha especifica           
           $tpl->assign('fechader',$dia."-".$mes."-".$ano);
           $lista = $daoexp->ListarDerivados($fecha,"",false,$ordconsulta);
           $tpl->assign('lista', $lista);
		   $_SESSION['fechabus'] = $_POST['date'];
           $_SESSION['idareabus'] = $areabus;
		   header("Location: formulario_historial_derivados_x_area_administrador.php");           
		   
      //     $tpl->display('lista_derivados.tpl.php');
         }

         /***************************************************/
 
            
         break;		 
case 14:    //lista los Expedientes Derivados
         
         
             //   $tpl->display('cabeceracliente.tpl.php');
         
//         $daoexp = new ExpedienteDAO();
         $fec=new Fecha();  
         
         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);
         
          if (isset($_POST['dateini'])){
            $cadefec =explode("-",$_POST['dateini']);
            $dia=$cadefec[2];
			$mes=$cadefec[1];
			$ano=$cadefec[0];
            $fecha=$_POST['date'];
            $tpl->assign('dias',$dia);
			$tpl->assign('mes',$mes);
			$tpl->assign('ano',$ano);   
			$_SESSION['fechabus'] = $_POST['dateini'];
            }else
			{                  
            $dia = date("d");
			$mes=date("m");
			$ano = date("Y");                             
            $fecha = date("Y-m-d");
            $tpl->assign('dias',$dia);
			$tpl->assign('mes',$mes);
			$tpl->assign('ano',$ano);
            $_SESSION['fechabus'] = $_POST['dateini'];
            }
			if (isset($_POST['datefin'])){
            $cadefec =explode("-",$_POST['datefin']);
            $dia=$cadefec[2];
			$mes=$cadefec[1];
			$ano=$cadefec[0];
            $fecha=$_POST['date'];
            $tpl->assign('dias',$dia);
			$tpl->assign('mes',$mes);
			$tpl->assign('ano',$ano);   
			$_SESSION['fechabusfin'] = $_POST['datefin'];
            }else
			{                  
            $dia = date("d");
			$mes=date("m");
			$ano = date("Y");                             
            $fecha = date("Y-m-d");
            $tpl->assign('dias',$dia);
			$tpl->assign('mes',$mes);
			$tpl->assign('ano',$ano);
            $_SESSION['fechabusfin'] = $_POST['datefin'];
            }
			
            $tpl->assign('tipoc',$_GET['tipo']);            
            $tpl->assign('fecha',$fecha);
            $_SESSION['fechabus'] = $_POST['dateini'];
			$_SESSION['fechabusfin'] = $_POST['datefin'];
            if (isset($_POST['tconsulta'])){
                $ordconsulta=$_POST['tconsulta'];
            }else{
                $ordconsulta=1;
            }
            $tpl->assign('orden',$ordconsulta);
         
         if (isset($_POST['ckmes'])){//Si se seleccion por mes          
           $meslet = $fec->DarMes($mes);
           $tpl->assign('fechader',"Mes -".$meslet);
           $lista = $daoexp->ListarDerivados($mes,$ano,true,$ordconsulta);
           $tpl->assign('lista', $lista);
          // $tpl->display('lista_derivados.tpl.php'); 
		  $_SESSION['fechabus'] = $_POST['dateini'];
		  $_SESSION['fechabusfin'] = $_POST['datefin'];
           header("Location: formulario_historial_derivados_x_fechas_administrador.php");
         }
		 else
		 {//Si no usa una fecha especifica           
           $tpl->assign('fechader',$dia."-".$mes."-".$ano);
           $lista = $daoexp->ListarDerivados($fecha,"",false,$ordconsulta);
           $tpl->assign('lista', $lista);
		   $_SESSION['fechabus'] = $_POST['dateini'];
		   $_SESSION['fechabusfin'] = $_POST['datefin'];
           header("Location: formulario_historial_derivados_x_fechas_administrador.php");           
		   
      //     $tpl->display('lista_derivados.tpl.php');
         }
		
         /***************************************************/
 
            
         break;		 
	case 15:    //listar imprirmi de derivados
        

		if($_GET['fecha']==''){
		$fec = new Fecha();
		$dia = date("d");
        $mes=date("m");
        $ano = date("Y");                              
        $fecha = date("Y-m-d");
		$lista = $daoexp->ListarDerivados($fecha,0,false,$_GET['orden']);
		}
		else {
		 $fec = new Fecha();
         $fechalet = $fec->fechalet($_GET['fecha'],false,$_GET['orden']);

         $tpl->assign('fechalet',$fechalet);
         
         $lista = $daoexp->ListarDerivados($_GET['fecha'],0,false,$_GET['orden']);

         $tpl->assign('fecha',$_GET['fecha']);
         $tpl->assign('lista', $lista);
		}
//       $daoexp = new ExpedienteDAO();
        
         if ($_GET['tip']==1){
            header ("Location: formulario_historial_derivados_x_fechas_imprimir_administrador.php");
			// $tpl->display('lista_derivados_impresion_cargo.tpl.php'); 
         }else{
            header ("Location: formulario_historial_derivados_x_fechas_imprimir_administrador.php");
        }
          
         break; 
     }
}

if ($_SESSION['tipo']==10){
 
   switch ($pagina){
     case 0://para crear usuarios
        //$tpl->display('Administrando.tpl.php');
        header("Location: principal_administrador.php");
		break;
     case 1:
        //$dao= new GeneraCombos();
        //$areas = $dao->ComboArea("");
        //$tpl->assign('areas',$areas);
        $tpl->display('formulario_crea_usuario.tpl.php');
        break;
    case 2:
        $dao = new UsuarioDAO();
        $pass=md5($_POST['contrasena']);
		$tip=$_POST['tipusu'];
        $dao->IngresarUsuario($_POST['usuario'],$pass,$_POST['nomapeusu'],$_POST['areas'],$tip);
        break;
    case 3:
        $dao = new UsuarioDAO();
        $usuarios = $dao->ListarUsuarios();
        $tpl->assign('usuarios',$usuarios);
        $tpl->display('lista_usuarios.tpl.php');
        break;
    case 4:
        echo "<a href='controlador.php?pagina=0'>Regresar al menu</a>";
        $dao = new UsuarioDAO();
        $ar= new GeneraCombos();
        $areas = $ar->ComboArea("");
        $tpl->assign('areas',$areas);
        $usuario = $dao->ListaUsuario($_GET['usuario']);

        
        $det_tipo = array ("Usuario Cliente", "Usuario Tramite", "Administrador", "Usuario Reportes");
        $cod_tipo = array ("0","1","10","20");

        $tpl->assign('idusuario',$usuario->idusuario);
        $tpl->assign('usuario',$usuario->usuario);
        $tpl->assign('nombres',$usuario->nomape);
        $tpl->assign('idarea',$usuario->idarea);

        $tpl->assign('det_tipo',$det_tipo);
        $tpl->assign('cod_tipo',$cod_tipo);

        $tpl->display('formulario_modifica_usuario.tpl.php');
        break;
    case 5:
        $dao = new UsuarioDAO();
        if (isset($_POST['check'])){
           $pass=true;
        }else{
           $pass=false;
        }
        $dao->ModificaUsuario($_POST['codigousuario'],$_POST['contrasena'],$_POST['nomapeusu'],$_POST['areas'],$pass);
        echo "<h1>Realizado cambio correctamente</h1><br><a href='controlador.php?pagina=0'>Regresar al Menu</a>";
        break;
	case 6:
		 $tpl->display('areascrear.tpl.php');
        break;
	
	case 7:
		 $tpl->display('mantarea.tpl.php');
        break;
	case 8:
        $dao = new UsuarioDAO();
        $dao->IngresarArea($_POST['idarea'],$_POST['nombarea'],$_POST['abrearea']);
        break;

   }

}

if ($_SESSION['tipo']==1){//si tipo de tramite
 switch ($pagina) {
     case 0:    //muestra Formulario de Registro
        
       //  $tpl->display('cabeceratramite.tpl.php');
         
         //$daoexp=new ExpedienteDAO();
        

        // $tpl->display('formulario_registrar.tpl.php');
		header("Location: principal_tramite.php");
         break;
     case 1:    //lista los Expedientes para derivar que son del TUPA
         
         $tpl->display('cabeceratramite.tpl.php');

         //$daoexp = new ExpedienteDAO();

         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);
                  
         $lista = $daoexp->ListarBandejaEnvio();
         $tpl->assign('lista', $lista);
         
         $tpl->display('lista_registro_tupa.tpl.php');
         
         break;
         
     case 2:    //Accion Deriva Expedientes del TUPA         
         
         $Gencodigo = new GeneraCodigos();
         $daousu = new UsuarioDAO();

         if (isset($_POST['expediente'])){
          foreach ($_POST['expediente'] as $exp){
            $codigoderiv= $Gencodigo->CodigoDerivar();
            $codigohistorial = $Gencodigo->CodigoHistorial();

            $parte = explode("/",$exp);
            $expd=$parte[0];
            $area=$parte[1];

            $detaVO = new DetalleEnvioVO($codigoderiv,1,0,'ATIENDASE',"");
            $histVO = new HistorialVO($codigohistorial,$expd,6,$codigoderiv,'SG001',$area,date("Y-m-d H:i:s"),$_SESSION['usuario'],1);

            $daousu->DerivarExpedienteTramite($histVO,$detaVO);
          } 
         }

         header("Location: controlador.php?pagina=1");
         break;
     case 3:    //Accion Registrar Expediente         

         $daousu = new UsuarioDAO();
                  
         $idtupa = explode("*",$_POST['tupa']);
         
         $documentoadjuntoVO = new DocumentosAdjuntosVO("","",$_POST['documento'],$_POST['numdoc'],$_POST['folios'],$_POST['referenciadocumentos'],1,"","","","","","","");
         $expedienteVO = new ExpedienteVO("",$_POST['tupa'],$_POST['remitente'],$_POST['asuntonotupa'],date("Y-m-d H:i:s"),$_SESSION['usuario'],0,0,"",1);


         $daousu->RegistrarExpediente($expedienteVO,$documentoadjuntoVO);
		 $daousu1 = new UsuarioDAO();
        
        $idexpediente=$_SESSION['idexpediente'];
        $daousu1->SubirDocumentosScan1($_SESSION['idexpediente'],"archivos");
        $_SESSION['idexpediente'] = $_SESSION['idexpediente'];
		 
         break;

     case 4:    //lista los Expedientes Derivados
         
         
             //   $tpl->display('cabeceracliente.tpl.php');
         
//         $daoexp = new ExpedienteDAO();
         $fec=new Fecha();  
         
         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);
         
          if (isset($_POST['date'])){
            $cadefec =explode("-",$_POST['date']);
            $dia=$cadefec[2];
			$mes=$cadefec[1];
			$ano=$cadefec[0];
            $fecha=$_POST['date'];
            $tpl->assign('dias',$dia);
			$tpl->assign('mes',$mes);
			$tpl->assign('ano',$ano);   
			$_SESSION['fechabus'] = $_POST['date'];
            }else
			{                  
            $dia = date("d");
			$mes=date("m");
			$ano = date("Y");                             
            $fecha = date("Y-m-d");
            $tpl->assign('dias',$dia);
			$tpl->assign('mes',$mes);
			$tpl->assign('ano',$ano);
            $_SESSION['fechabus'] = $_POST['date'];
            }
			
            $tpl->assign('tipoc',$_GET['tipo']);            
            $tpl->assign('fecha',$fecha);
            $_SESSION['fechabus'] = $_POST['date'];
            if (isset($_POST['tconsulta'])){
                $ordconsulta=$_POST['tconsulta'];
            }else{
                $ordconsulta=1;
            }
            $tpl->assign('orden',$ordconsulta);
         
         if (isset($_POST['ckmes'])){//Si se seleccion por mes          
           $meslet = $fec->DarMes($mes);
           $tpl->assign('fechader',"Mes -".$meslet);
           $lista = $daoexp->ListarDerivados($mes,$ano,true,$ordconsulta);
           $tpl->assign('lista', $lista);
          // $tpl->display('lista_derivados.tpl.php'); 
		  $_SESSION['fechabus'] = $_POST['date'];
           header("Location: formulario_historial_derivados_tramite.php");
         }else{//Si no usa una fecha especifica           
           $tpl->assign('fechader',$dia."-".$mes."-".$ano);
           $lista = $daoexp->ListarDerivados($fecha,"",false,$ordconsulta);
           $tpl->assign('lista', $lista);
		   $_SESSION['fechabus'] = $_POST['date'];
           header("Location: formulario_historial_derivados_tramite.php");           
		   
      //     $tpl->display('lista_derivados.tpl.php');
         }

         /***************************************************/
 
            
         break;

     case 5:    //Lista la Busqueda de Expediente
            
        // $tpl->display('cabeceratramite.tpl.php');     

         //$daoexp= new ExpedienteDAO();
         $daousu = new UsuarioDAO();
         
         $tpl->assign('area',$_SESSION['nomarea']);
         $tpl->assign('usuario',$_SESSION['nombre']);
         $tpl->assign('idarea',$_SESSION['idarea']);

         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);
         $tpl->assign('cadebus',$_POST['busqueda']);
         

         $lista = $daousu->BuscarExpediente($_POST['busqueda']);
		  $_SESSION['busqueda'] = $_POST['busqueda'];
         $tpl->assign('lista', $lista);
         //$tpl->display('lista_busqueda_Tramite.tpl.php');
		 header("Location: formulario_buscar_tramite.php");
         
		 break;

     case 6:    //Lista expedientes NO TUPA

         
        // $tpl->display('cabeceratramite.tpl.php');

//         $daoexp = new ExpedienteDAO();
        
		 header("Location: formulario_derivar_tramite.php");
     //   $tpl->display('lista_registro_no_tupa.tpl.php');

         break;
     case 7:    //Accion derivar Expedientes de NO TUPA
         
         $Gencodigo = new GeneraCodigos();
         $daousu = new UsuarioDAO();

         if (isset($_POST['expediente'])){
            foreach ($_POST['expediente'] as $exp){
			$datos = explode("*",$exp);
            $codigoderiv= $Gencodigo->CodigoDerivar();
            $codigohistorial = $Gencodigo->CodigoHistorial();

            $detaVO = new DetalleEnvioVO($codigoderiv,$datos[2],$datos[3],'ATIENDASE',$datos[1]);
            $histVO = new HistorialVO($codigohistorial,$datos[0],6,$codigoderiv,'SG003',$_POST['areas'],date("Y-m-d H:i:s"),$_SESSION['usuario'],1,"");
 
            $daousu->DerivarExpedienteTramitenotupa($histVO,$detaVO);
          } 
         }
         
         header("Location: controlador.php?pagina=6");
         break;
     case 8:    //Cancelar envio tramite
         
         $daousu = new UsuarioDAO();
         $daousu->CacelarEnvioTramite($_GET['idexpediente']);
		 
		 header("Location: formulario_historial_norecep_tramite.php");
      /*   if ($_GET['pag']==1)
           {header("Location: controlador.php?pagina=18");}
         else
           {header("Location: controlador.php?pagina=4");}*/
         break; 
         
     case 9:    //listar historia
         
         //$tpl->display('cabeceratramite.tpl.php');

//         $daoexp = new ExpedienteDAO();
         
         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);
        
         $tpl->assign('idexpediente',$_GET['idexpediente']);
         
         $listadatos=$daoexp->ListarDatos($_GET['idexpediente']);
         
         $listadoadj=$daoexp->ListarAdjuntos($_GET['idexpediente']);
         $listaatendidos=$daoexp->ListarAtencion($_GET['idexpediente']);
         $listarecorrido = $daoexp->ListarHistorial($_GET['idexpediente']);

         $tpl->assign('listadatos',$listadatos);
                    
         $tpl->assign('listaadj',$listadoadj);
         $tpl->assign('listaate',$listaatendidos);

         $tpl->assign('listarecorrido',$listarecorrido);
		$_SESSION['idexpediente'] = $_GET['idexpediente'];
        // $tpl->display('lista_historia.tpl.php');
		header("Location: formulario_historial_tramite.php");

         break;

    case 10:    //muestra el formulario adjuntar documentos
         
       //  $tpl->display('cabeceratramite.tpl.php');

//         $daoexp = new ExpedienteDAO();
       //  $cmb = new GeneraCombos();
         
         $lista = $daoexp->ListarDatos($_GET['idexpediente']);
         $tpl->assign('datosexpediente',$lista);
         
         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);
         
         $tpl->assign('cajaidexpediente',$datos->idexpediente);
        


         //$listadoc = $cmb->ComboDocumentos("2");
         //$tpl->assign('llenardocumento',$listadoc);
		  $_SESSION['idexpediente']= $_GET['idexpediente'];
      //   $tpl->display('formulario_adjuntar.tpl.php');
		header("Location: formulario_adjuntar_documento_tramite.php");
         break;
    case 11:
         //accion adjuntar documentos al expediente
         
         $Gencodigo = new GeneraCodigos();
         $codigoadj= $Gencodigo->CodigoAdjuntos();
         
         $documentoadjuntoVO = new DocumentosAdjuntosVO($codigoadj,$_POST['idexpediente'],$_POST['documento'],$_POST['numdoc'],$_POST['folios'],$_POST['referenciadocumentos'],0,"","","","","","","");

         $daousu = new UsuarioDAO();
         $daousu->AdjuntarDocumentos($documentoadjuntoVO);

         header("Location: controlador.php?pagina=13");
         break;
         
     case 12:   //listar expedientes derivados para imprimir         
         
//         $daoexp = new ExpedienteDAO();

         $lista = $daoexp->ListarDerivados($_GET['fecha']);
         
         $tpl->assign('fecha',$fecha);
         $tpl->assign('lista', $lista);
         
         $tpl->display('lista_derivados_impresion.tpl.php');
         break;

    case 13:    //listar documentos adjuntos para derivar
         
//         $daoexp = new ExpedienteDAO();

         $tpl->assign('area',$_SESSION['nomarea']);
         $tpl->assign('usuario',$_SESSION['nombre']);

    //     $tpl->display('cabeceratramite.tpl.php');

         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);

         $lista = $daoexp->ListaAdjuntosxDerivar();         
         $tpl->assign('listaadj', $lista);
       //  $tpl->display('lista_adj_derivar.tpl.php');
         header("Location: formulario_derivaradjuntos_tramite.php");
         break;

    case 14:    //accion derivar documentos adjuntos
         
         $daousu = new UsuarioDAO();

         foreach ($_POST['expediente'] as $exp){
            $daousu->DerivarAdjuntos($exp);
         }
         
         break;

    case 15:    //listar documentos adjuntos derivados

         $tpl->display('cabeceratramite.tpl.php');

//         $daoexp = new ExpedienteDAO();
         
         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);

         if (isset($_POST['date'])){
            $fechabus=$_POST['date'];
        }else{
            $fechabus=date("Y-m-d H:i:s");
        }
        
        //echo $fechabus;
         $tpl->assign('fechaderiv',$fechabus);
         $lista = $daoexp->ListaAdjuntosDerivados($fechabus);
         $tpl->assign('listaadj', $lista);
         $tpl->display('lista_adj_derivados.tpl.php');

         break;

    case 16:    //listar busqueda modificacion
        
         $tpl->display('cabeceratramite.tpl.php');

//       $daoexp = new ExpedienteDAO();         
         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);
         
         $daousu = new UsuarioDAO();
         $lista = $daousu->BuscarExpedienteMod($_POST['busmod']);
         $tpl->assign('lista', $lista);
         $tpl->display('lista_busqueda_modif.tpl.php');
         break;
    case 17:   //listar adjuntos derivados para imprimir

//         $daoexp = new ExpedienteDAO();
         
         $fechabus=$_GET['date'];

        //echo $fechabus;
    
         $lista = $daoexp->ListaAdjuntosDerivados($fechabus);
         $tpl->assign('listaadj', $lista);
         $tpl->display('lista_adj_derivados_print.tpl.php');

         break;
         
    case 18:    //listar no recepcionados todos
         
         $tpl->display('cabeceratramite.tpl.php');

//         $daoexp = new ExpedienteDAO();
         
         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);
         
         $lista = $daoexp->ListarNoRecepcionados();
         $tpl->assign("lista",$lista);

         $tpl->display("lista_norecepcionados_todos.tpl.php");
         
         break;
    case 19:    //muestra formulario de sugerencias  se uso el 22 para compatibilidad con cliente
         
         $tpl->display('cabeceratramite.tpl.php');
         $tpl->display('formulario_quejas.tpl.php');
         
         break;
    case 20:    //enviar sugerencias ya no usar el 23
         $daousu=new UsuarioDAO();
         
         $daousu->TerminarExpediente($_POST['idexpediente'],$_POST['documento'],$_POST['numero'],$_POST['referencia'],$_SESSION['usuario'],$_SESSION['idarea'],$_POST['terminado']);

         header("Location: formulario_recepcionados_carpetas_tramite.php");
		 
		 /*
         $daousu = new UsuarioDAO();
         $daousu->enviarquejas($_POST['asunto'],$_POST['descripcion']);
         $_SESSION['idexpediente'] = $_GET['idexpediente'];
		header("Location: formulario_terminar_tramite.php");
//         $tpl->display('cabeceratramite.tpl.php');
//         $tpl->display('agradecimientoquejas.tpl.php');
         */
         break;
    case 21:    //listar imprirmi de derivados
        

		if($_GET['fecha']==''){
		$fec = new Fecha();
		$dia = date("d");
        $mes=date("m");
        $ano = date("Y");                              
        $fecha = date("Y-m-d");
		$lista = $daoexp->ListarDerivados($fecha,0,false,$_GET['orden']);
		}
		else {
		 $fec = new Fecha();
         $fechalet = $fec->fechalet($_GET['fecha'],false,$_GET['orden']);

         $tpl->assign('fechalet',$fechalet);
         
         $lista = $daoexp->ListarDerivados($_GET['fecha'],0,false,$_GET['orden']);

         $tpl->assign('fecha',$_GET['fecha']);
         $tpl->assign('lista', $lista);
		}
//       $daoexp = new ExpedienteDAO();
        
         if ($_GET['tip']==1){
            header ("Location: formulario_historial_derivados_imprimir_tramite.php");
			// $tpl->display('lista_derivados_impresion_cargo.tpl.php'); 
         }else{
             header ("Location: formulario_historial_derivados_imprimir_tramite.php");
        }
          
         break; 
    case 22:    //listar historia imporimir
        
//         $daoexp = new ExpedienteDAO();
         $fec = new Fecha();
         
         $tpl->assign('idexpediente',$_GET['idexpediente']);
         
         $fechalet = $fec->fechalet(date("Y-m-d H:i:s"),false);
         $tpl->assign('fechalethoy',$fechalet);
         $tpl->assign('idexpediente',$_GET['idexpediente']);
         
         $listadatos=$daoexp->ListarDatos($_GET['idexpediente']);
         
         $listadoadj=$daoexp->ListarAdjuntos($_GET['idexpediente']);
         $listaatendidos=$daoexp->ListarAtencion($_GET['idexpediente']);
         $listarecorrido = $daoexp->ListarHistorial($_GET['idexpediente']);

         $tpl->assign('listadatos',$listadatos);
                    
         $tpl->assign('listaadj',$listadoadj);
         $tpl->assign('listaate',$listaatendidos);

         $tpl->assign('listarecorrido',$listarecorrido);

        // $tpl->display('lista_historia_impresion.tpl.php');
		header ("Location: formulario_historial_imprimir_tramite.php");
         break;
         
    case 23:    //formulario modificar expediente
        
    //    $tpl->display('cabeceratramite.tpl.php');
        
//      $daoexp = new ExpedienteDAO();
       // $cmb = new GeneraCombos();
        
        $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
        $tpl->assign('carpetas',$carpetas);
        
        
        //$listadoc = $cmb->ComboDocumentos("2-4");
        //$tpl->assign('llenardocumento',$listadoc);
        
        $datos = $daoexp->ListarDatosmodificar($_GET['idexpediente']);
        
        $tpl->assign('cajaidexpediente',$datos->idexpediente);
        $tpl->assign('cajatupa',$datos->denominacion." * ".$datos->idtupa);
        $tpl->assign('cajaremitente',$datos->remitente);
        $tpl->assign('cajadocumento',$datos->documento);
        $tpl->assign('cajanumdoc',$datos->numerodoc);
        $tpl->assign('cajafolios',$datos->folios);
        $tpl->assign('cajanotupa',$datos->asuntonotupa);
        $tpl->assign('cajareferencia',$datos->referenciaenvio);
		
        $_SESSION['idexpediente'] = $_GET['idexpediente'];
		$_SESSION['cajaarearecibe'] = $datos->id_area_recibe;
		header('Location: modificar_expediente_tramite.php');
		
      //  $tpl->display('formulario_modificar.tpl.php');
                                
        break;
    Case 24:// acion modificar
    
        $daousu = new UsuarioDAO();
        
        $idtupa = explode("*",$_POST['tupa']); 
         
        $documentoadjuntoVO = new 
		DocumentosAdjuntosVO("","",$_POST['documento'],$_POST['numdoc'],$_POST['folios'],$_POST['referenciadocumentos'],1,"","","","","","","");
        $expedienteVO = new ExpedienteVO($_POST['idexpediente'],$_POST['tupa'],$_POST['remitente'],$_POST['asuntonotupa'],date("Y-m-d H:i:s"),"",0,"","",1);
		
        $daousu->ModificarExpediente($expedienteVO,$documentoadjuntoVO);
         
        header('Location: controlador.php?pagina=6');
        
        break;
    case 25:    //listar menu no recepcionados
        
         $tpl->display('cabeceratramite.tpl.php');

//         $daoexp = new ExpedienteDAO();
         
         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);
         
         $lista = $daoexp->ListarNoRecepcionados();
         $tpl->assign("lista",$lista);

         $tpl->display("menu_norecepcionados.tpl.php");
         break;
    case 26:    //listar grupo no recepcionado
        
         $tpl->display('cabeceratramite.tpl.php');

//         $daoexp = new ExpedienteDAO();
         
         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);
         
         $lista = $daoexp->ListarGruposnoderivados();
         $tpl->assign("lista",$lista);

         $tpl->display("lista_grupo_no_recepcionado.tpl.php");
         
         break;
    case 27:    //listar area no recepcionado
        
         $tpl->display('cabeceratramite.tpl.php');

//         $daoexp = new ExpedienteDAO();
         
         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);
         
         $lista = $daoexp->ListarAreasnorecepcionados($_GET['idarea']);
         $tpl->assign("lista",$lista);

         $tpl->display("lista_norecepcionados_filtro.tpl.php");
         break;
    case 28:    //listar bandeja
         

         $tpl->display('cabeceratramite.tpl.php');

//         $daoexp = new ExpedienteDAO();

         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);

         $lista = $daoexp->ListarBandeja();
         $tpl->assign('lista', $lista);
         
         $tpl->display('lista_bandeja.tpl.php');
         
         break;
    case 29:    //listar recepcionados
         
      //   $tpl->display('cabeceratramite.tpl.php');

//         $daoexp =  new ExpedienteDAO();
       //  $cmb=new GeneraCombos();         

         $tpl->assign('nomcarp',$_GET['nomcarp']);

         //$cbcarpetas = $cmb->ComboCarpeta($_SESSION['idarea']);
         //$tpl->assign('cbcarpetas',$cbcarpetas);

         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);

         $lista = $daoexp->ListarRecepcionados();
         
         $tpl->assign('lista',$lista);
        // $tpl->display('lista_recepcionados.tpl.php');
         header("Location: formulario_recepcionados_tramite.php");
         break;
    case 30:    //accion recepcionar expediente
         
         $daousu = new UsuarioDAO();

         if (isset($_POST['expediente'])){
          foreach ($_POST['expediente'] as $exp){
            $daousu->RecepcionarExpediente($exp);
          }
         }

         header("Location: controlador.php?pagina=29");
         
         break;
    case 31:    //formulario derivar

        // $tpl->display('cabeceratramite.tpl.php');

//         $daoexp = new ExpedienteDAO();
        // $cmb = new GeneraCombos();

         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);


         $lista = $daoexp->ListarDatos($_GET['idexpediente']);
         $tpl->assign('listadatos',$lista);


         //$listadoc = $cmb->ComboDocumentos("1");
         $tpl->assign('llenardocumento',$listadoc);

         //$listaarea = $cmb->ComboArea($_SESSION['idarea']);
         $tpl->assign('listaarea',$listaarea);

         //$tpl->display('formulario_derivar.tpl.php');
		 $_SESSION['idexpediente'] = $_GET['idexpediente'];
		header("Location: formulario_derivar_recepcionado_tramite.php");
         break;
    case 32:    //accion derivar expediente recepcionados
         
         $Gencodigo = new GeneraCodigos();
         $daousu = new UsuarioDAO();

         $codigoderiv= $Gencodigo->CodigoDerivar();
         $codigohistorial = $Gencodigo->CodigoHistorial();

         $idexpediente=$_POST['idexpediente'];

         $detaVO = new DetalleEnvioVO($codigoderiv,$_POST['documento'],$_POST['numdoc'],$_POST['referencias'],$_POST['folios']);
         $histVO = new HistorialVO($codigohistorial,$idexpediente,6,$codigoderiv,$_SESSION['idarea'],$_POST['areas'],date("Y-m-d H:i:s"),$_SESSION['usuario'],1);
         
         $daousu->DerivarExpediente($histVO,$detaVO);
         
         break;
    case 33:    //Muestra el formulario para subir archivos
         
//       $daoexp = new ExpedienteDAO();
         
        // $tpl->display('cabeceratramite.tpl.php');
         $tpl->assign('idexpediente',$_GET['idexpediente']);         
         $mant = $daoexp->ListaImgMant($_GET['idexpediente']);
         $tpl->assign('mantfot',$mant);
         $_SESSION['idexpediente']=$_GET['idexpediente'];
        // $tpl->display("formulario_subir_archivos.tpl.php");
         header("Location: formulario_imagenes_tramite.php");
         break;
    case 34:    //accion subir fotos
        
        $daousu = new UsuarioDAO();        
        $idexpediente=$_POST['idexpediente'];
        $daousu->SubirDocumentosScan($_POST['idexpediente'],"archivos");
        $_SESSION['idexpediente'] = $_POST['idexpediente'];
        header("Location: controlador.php?pagina=33&idexpediente=".$idexpediente);
        
        break;  
    case 35:    //mostrar fotos
        
//      $daoexp = new ExpedienteDAO();
        
        $img = $daoexp->ListaImagenes($_GET['idexpediente']);
        $listadatos=$daoexp->ListarDatos($_GET['idexpediente']);

        $tpl->assign('imagen',$img);
        $tpl->assign('listadatos',$listadatos);
        
        $tpl->display('lista_fotos.tpl.php');
        
        break;
    case 36:
        //eliminar imagenes
        $daoexp = new UsuarioDAO();

        if (isset($_POST['img'])){
         foreach ($_POST['img'] as $exp){
           $daoexp->EliminarImagenes($exp);
         }
        }
         
         header("Location: controlador.php?pagina=33&idexpediente=".$_POST['idexpediente']);
         
         break;
     case 37:   // formulario crear carpetas
         
         //$tpl->display('cabeceratramite.tpl.php');

//         $daoexp=new ExpedienteDAO();
         
         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);
		 header("Location: formulario_carpetas_tramitess.php");
       //  $tpl->display('crear_carpeta.tpl.php');
         
         break;
     case 38:   //accion crear carpeta
         
         $daousu= new UsuarioDAO();
         $daousu->CrearCarpeta($_POST['nombrecarpeta'],$_SESSION['idarea']);

         header("Location: formulario_mant_carpetas_tramite.php");
         
         break;
     case 39:   //listar tipo de carpetas
         /*
         $tpl->display('cabeceratramite.tpl.php');

         $cmb=new GeneraCombos();
//         $daoexp =  new ExpedienteDAO();
         $fec = new Fecha();
         
         $cbcarpetas = $cmb->ComboCarpeta($_SESSION['idarea']);
         $tpl->assign('cbcarpetas',$cbcarpetas);

         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);

         $tpl->assign('nomcarp',$_GET['nomcarp']);

        
         if (isset($_POST['nomcarp'])){
            $tpl->assign('nomcarp',$_POST['nomcarp']);
         }else{
            $tpl->assign('nomcarp',$_GET['nomcarp']);
        }
         
         $fec=new Fecha();  

          if (isset($_POST['date'])){
            
            $cadefec = explode("-",$_POST['date']);
            
            $dia = $cadefec[2];
            $mes = $cadefec[1];
            $ano = $cadefec[0];
         
            $fecha= $ano."-".$mes."-".$dia;
            
            $tpl->assign('dias',$dia);
            $tpl->assign('mes',$mes);
            $tpl->assign('ano',$ano);
            
            $tpl->assign('inffecha',"Fecha: ".$dia."-".$mes."-".$ano);
            
            if (isset($_POST['ckmes'])){
             
             $lista = $daoexp->ListarCarpetasTipo($mes,$ano,false,$_POST['tipoc'],0);
             
             $tpl->assign('tipoc',$_POST['tipoc']);          
             $tpl->assign('lista',$lista);
             $tpl->assign('fecha',$fecha);
             $fecm = $fec->DarMes($mes);
             $tpl->assign('inffecha',"Mes de ".$fecm);
             
             $tpl->display('lista_recepcionados_carpetas.tpl.php');
             }else{
              
             $lista = $daoexp->ListarCarpetasTipo($fecha,"",true,$_POST['tipoc'],1);
             $tpl->assign('tipoc',$_POST['tipoc']);          
             $tpl->assign('fecha',$fecha);
             $tpl->assign('lista', $lista);
             $tpl->display('lista_recepcionados_carpetas.tpl.php');
         }
            
            }else{                                  
            
            $dia = date("d");
            $mes=date("m");
            $ano = date("Y");
             
            $fecha = date("m");
            $tpl->assign('dias',$dia);
            $tpl->assign('mes',$mes);
            $tpl->assign('ano',$ano);
            $tpl->assign('tipoc',$_GET['tipo']);   
            
            $fecm = $fec->DarMes($mes);
            $tpl->assign('inffecha',"Mes de ".$fecm);
            
            $lista = $daoexp->ListarCarpetasTipo($fecha,$ano,true,$_GET['tipo'],0);
            $tpl->assign('fecha',$fecha);
            $tpl->assign('lista', $lista);
            $tpl->display('lista_recepcionados_carpetas.tpl.php');
            
            }

            //$tpl->assign('tipoc',$_GET['tipo']);
            */
              $_SESSION['codcarpeta']=$_GET['tipo'];			
              header("Location: formulario_expediente_carpeta_tramite.php");
         

         /***************************************************/
         
         break;
     case 40:   //accion pasar a carpetas
         
         $daousu= new UsuarioDAO();

         if (isset($_POST['expediente'])){
          foreach ($_POST['expediente'] as $exp){
            $daousu->EnviarCarpeta($exp,$_POST['carpetas']);
            //echo $exp;
          }
         }
	   header("Location: formulario_recepcionados_carpetas.php");
       //  header("Location: controlador.php?pagina=39&tipo=".$_POST['carpetas']);
         
         break;
     case 41:   //listar carpetas para manteniemito
         
         $tpl->display('cabeceratramite.tpl.php');

//         $daoexp =  new ExpedienteDAO();
         
         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);

         $tpl->display('lista_Mant_carpeta.tpl.php');
         
         break;
     case 42:   //accion modificar carpeta
         
         $daousu= new UsuarioDAO();
         $daousu->ModificarCarpeta($_GET['nomcarpeta'],$_GET['idcarpeta']);

         header("Location: controlador.php?pagina=41");
         
         break;

     case 43:   //accion eliminar carpeta
         
         $daousu= new UsuarioDAO();
         $daousu->EliminarCarpeta($_GET['idcarpeta']);

         header("Location: controlador.php?pagina=41");
         
         break;
     case 44:   //formulario estados
        
        $tpl->display('cabeceratramite.tpl.php');
       
//        $daoexp = new ExpedienteDAO();
        //$cmb = new GeneraCombos();
                
        $listadatos=$daoexp->ListarDatos($_GET['idexpediente']); 
        $tpl->assign('listadatos',$listadatos);
         
        $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
        $tpl->assign('carpetas',$carpetas);
        

        //$estados = $cmb->ComboEstados();
        $tpl->assign('idexpediente',$_GET['idexpediente']);
        //$tpl->assign('estados',$estados);
        
        $tpl->display('formulario_estado.tpl.php');
        
        break;
    case 45:    //accion cambiar de estado
        
        $daousu = new UsuarioDAO();     
        $insertestado = new InsertEstadosVO($_POST['idexpediente'],0,"",$_POST['referencia'],date("Y-m-d H:i:s"),$_POST['estado'],$_SESSION['usuario'],$_SESSION['idarea']);
		
        $daousu->CambiarEstado($insertestado);
        
        header ("Location: formulario_expediente_carpeta_tramite.php");
        
        break;
    case 46:
        $tpl->display('cabeceratramite.tpl.php');

      //   $cmb=new GeneraCombos();
//         $daoexp =  new ExpedienteDAO();
         
        // $cbcarpetas = $cmb->ComboCarpeta($_SESSION['idarea']);
        // $tpl->assign('cbcarpetas',$cbcarpetas);

         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);
         
         $fec=new Fecha();  

         
            $fecha= $_GET['fecha'];
            
              
             $lista = $daoexp->ListarCarpetasTipo($fecha,"",true,$_GET['tipo'],1);
             $tpl->assign('tipoc',$_GET['tipo']);          
             $tpl->assign('fecha',$fecha);
             $tpl->assign('lista', $lista);
             $tpl->display('lista_recepcionados_carpetas.tpl.php');

         /***************************************************/
         
         break;
     case 47: //listar expedientes registrados del dia

                  //   $tpl->display('cabeceracliente.tpl.php');
         
//         $daoexp = new ExpedienteDAO();
         $fec=new Fecha();  
         
         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);
         
          if (isset($_POST['date'])){
            $cadefec =explode("-",$_POST['date']);
            $dia=$cadefec[2];
			$mes=$cadefec[1];
			$ano=$cadefec[0];
            $fecha=$_POST['date'];
            $tpl->assign('dias',$dia);
			$tpl->assign('mes',$mes);
			$tpl->assign('ano',$ano);   
			$_SESSION['fechabus'] = $_POST['date'];
            }else
			{                  
            $dia = date("d");
			$mes=date("m");
			$ano = date("Y");                             
            $fecha = date("Y-m-d");
            $tpl->assign('dias',$dia);
			$tpl->assign('mes',$mes);
			$tpl->assign('ano',$ano);
            $_SESSION['fechabus'] = $_POST['date'];
            }
			
            $tpl->assign('tipoc',$_GET['tipo']);            
            $tpl->assign('fecha',$fecha);
            $_SESSION['fechabus'] = $_POST['date'];
            if (isset($_POST['tconsulta'])){
                $ordconsulta=$_POST['tconsulta'];
            }else{
                $ordconsulta=1;
            }
            $tpl->assign('orden',$ordconsulta);
         
         if (isset($_POST['ckmes'])){//Si se seleccion por mes          
           $meslet = $fec->DarMes($mes);
           $tpl->assign('fechader',"Mes -".$meslet);
           $lista = $daoexp->ListarDerivados($mes,$ano,true,$ordconsulta);
           $tpl->assign('lista', $lista);
          // $tpl->display('lista_derivados.tpl.php'); 
		  $_SESSION['fechabus'] = $_POST['date'];
           header("Location: formulario_historial_norecep_tramite.php");
         }else{//Si no usa una fecha especifica           
           $tpl->assign('fechader',$dia."-".$mes."-".$ano);
           $lista = $daoexp->ListarDerivados($fecha,"",false,$ordconsulta);
           $tpl->assign('lista', $lista);
		   $_SESSION['fechabus'] = $_POST['date'];
           header("Location: formulario_historial_norecep_tramite.php");           
		   
      //     $tpl->display('lista_derivados.tpl.php');
         }
 
            
         break;
    case 48:    //listar imprirmi de registro dia
        

//         $daoexp = new ExpedienteDAO();
         $fec = new Fecha();         

         $fechalet = $fec->fechalet($_GET['fecha'],false);

         $tpl->assign('fechalet',$fechalet);
         
         $lista = $daoexp->ListarRegDiario($_GET['fecha'],0,false,$_GET['orden']);

         $tpl->assign('fecha',$_GET['fecha']);
         $tpl->assign('lista', $lista);

         $tpl->display('lista_reg_diario_impresion.tpl.php');

          
         break; 
	case 49:   //lista formulario terminar
         
       //  $tpl->display('cabeceracliente.tpl.php');

         $listadatos=$daoexp->ListarDatos($_GET['idexpediente']);
         $tpl->assign('listadatos',$listadatos);

         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);

/*         $cmb = new GeneraCombos();
         

         $tipo=$cmb->ComboDocumentos("3");

         $tpl->assign('cmbtipo',$tipo);       */
         $tpl->assign('idexpediente',$_GET['idexpediente']);
		$_SESSION['idexpediente'] = $_GET['idexpediente'];
		header("Location: formulario_terminar_tramite.php");
       //  $tpl->display("formulario_terminar.tpl.php");
//         echo "ingreso";
         
         break;
		
		case 50:   //lista formulario link archivo
         
       //  $tpl->display('cabeceracliente.tpl.php');
		
         $listadatos=$daoexp->ListarDatos($_GET['idexpediente']);
         $tpl->assign('listadatos',$listadatos);

         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);

/*         $cmb = new GeneraCombos();
         

         $tipo=$cmb->ComboDocumentos("3");

         $tpl->assign('cmbtipo',$tipo);       */
		 $dato = $_GET['nomfoto'];
		 $idexpediente = $_SESSION['idexpediente'];
		//$_SESSION['nomfoto']=$_GET['nomfoto'];		
       // header("Location: formulario_expediente_carpeta_tramite.php");
        //$tpl->assign('idexpediente',$_GET['idexpediente']);
		//$_SESSION['idexpediente'] = $_GET['idexpediente'];
		
		header("Location: imgdocumentos/$idexpediente/".utf8_encode($dato)."");
       
	   //  $tpl->display("formulario_terminar.tpl.php");
//         echo "ingreso";
         
         break;
		case 51:
//      $daoexp = new ExpedienteDAO();
		
        $fec=new Fecha();
		 if($_GET['fecha']==''){
			$dia = date("d");
            $mes=date("m");
            $ano = date("Y");              
            $fecha = date("Y-m-d");
			$_SESSION['fechabus'] = $fecha;
			header("Location: formulario_historial_norecep_imprimir_tramite.php");
		 }
		 else{
			 $_SESSION['fechabus'] = $_GET['fecha'];
			 header("Location: formulario_historial_norecep_imprimir_tramite.php");
		 }
        $fecha_show = $fec->fechalet($_GET['fecha'],false);            

        $tpl->assign('fechashow',$fecha_show);
           
     //   $lista = $daoexp->ListarRecepcionadosreporte($_GET['fecha'],"",false,$_GET['orden']);
      
        $tpl->assign('lista', $lista);
		
        
       // $tpl->display('lista_recepcionados_reporte_imp.tpl.php');
        break;
		
		case 52: //listar expedientes registrados del dia

                  //   $tpl->display('cabeceracliente.tpl.php');
         
//         $daoexp = new ExpedienteDAO();
         $fec=new Fecha();  
         
         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);
         
          if (isset($_POST['date'])){
            $cadefec =explode("-",$_POST['date']);
            $dia=$cadefec[2];
			$mes=$cadefec[1];
			$ano=$cadefec[0];
            $fecha=$_POST['date'];
            $tpl->assign('dias',$dia);
			$tpl->assign('mes',$mes);
			$tpl->assign('ano',$ano);   
			$_SESSION['fechabus'] = $_POST['date'];
            }else
			{                  
            $dia = date("d");
			$mes=date("m");
			$ano = date("Y");                             
            $fecha = date("Y-m-d");
            $tpl->assign('dias',$dia);
			$tpl->assign('mes',$mes);
			$tpl->assign('ano',$ano);
            $_SESSION['fechabus'] = $_POST['date'];
            }
			
            $tpl->assign('tipoc',$_GET['tipo']);            
            $tpl->assign('fecha',$fecha);
            $_SESSION['fechabus'] = $_POST['date'];
            if (isset($_POST['tconsulta'])){
                $ordconsulta=$_POST['tconsulta'];
            }else{
                $ordconsulta=1;
            }
            $tpl->assign('orden',$ordconsulta);
         
         if (isset($_POST['ckmes'])){//Si se seleccion por mes          
           $meslet = $fec->DarMes($mes);
           $tpl->assign('fechader',"Mes -".$meslet);
           $lista = $daoexp->ListarDerivados($mes,$ano,true,$ordconsulta);
           $tpl->assign('lista', $lista);
          // $tpl->display('lista_derivados.tpl.php'); 
		  $_SESSION['fechabus'] = $_POST['date'];
           header("Location: formulario_historial_recep_tramite.php");
         }else{//Si no usa una fecha especifica           
           $tpl->assign('fechader',$dia."-".$mes."-".$ano);
           $lista = $daoexp->ListarDerivados($fecha,"",false,$ordconsulta);
           $tpl->assign('lista', $lista);
		   $_SESSION['fechabus'] = $_POST['date'];
           header("Location: formulario_historial_recep_tramite.php");           
		   
      //     $tpl->display('lista_derivados.tpl.php');
         }
 
            
         break;
		case 53:
//      $daoexp = new ExpedienteDAO();
		
        $fec=new Fecha();
		 if($_GET['fecha']==''){
			$dia = date("d");
            $mes=date("m");
            $ano = date("Y");              
            $fecha = date("Y-m-d");
			$_SESSION['fechabus'] = $fecha;
			header("Location: formulario_historial_recep_imprimir_tramite.php");
		 }
		 else{
			 $_SESSION['fechabus'] = $_GET['fecha'];
			 header("Location: formulario_historial_recep_imprimir_tramite.php");
		 }
        $fecha_show = $fec->fechalet($_GET['fecha'],false);            

        $tpl->assign('fechashow',$fecha_show);
           
     //   $lista = $daoexp->ListarRecepcionadosreporte($_GET['fecha'],"",false,$_GET['orden']);
      
        $tpl->assign('lista', $lista);
		
        
       // $tpl->display('lista_recepcionados_reporte_imp.tpl.php');
        break;
		
		case 54: //listar expedientes registrados del dia

                  //   $tpl->display('cabeceracliente.tpl.php');
         
//         $daoexp = new ExpedienteDAO();
         $fec=new Fecha();  
         
         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);
         
          if (isset($_POST['date'])){
            $cadefec =explode("-",$_POST['date']);
            $dia=$cadefec[2];
			$mes=$cadefec[1];
			$ano=$cadefec[0];
            $fecha=$_POST['date'];
            $tpl->assign('dias',$dia);
			$tpl->assign('mes',$mes);
			$tpl->assign('ano',$ano);   
			$_SESSION['fechabus'] = $_POST['date'];
            }else
			{                  
            $dia = date("d");
			$mes=date("m");
			$ano = date("Y");                             
            $fecha = date("Y-m-d");
            $tpl->assign('dias',$dia);
			$tpl->assign('mes',$mes);
			$tpl->assign('ano',$ano);
            $_SESSION['fechabus'] = $_POST['date'];
            }
			
            $tpl->assign('tipoc',$_GET['tipo']);            
            $tpl->assign('fecha',$fecha);
            $_SESSION['fechabus'] = $_POST['date'];
            if (isset($_POST['tconsulta'])){
                $ordconsulta=$_POST['tconsulta'];
            }else{
                $ordconsulta=1;
            }
            $tpl->assign('orden',$ordconsulta);
         
         if (isset($_POST['ckmes'])){//Si se seleccion por mes          
           $meslet = $fec->DarMes($mes);
           $tpl->assign('fechader',"Mes -".$meslet);
           $lista = $daoexp->ListarDerivados($mes,$ano,true,$ordconsulta);
           $tpl->assign('lista', $lista);
          // $tpl->display('lista_derivados.tpl.php'); 
		  $_SESSION['fechabus'] = $_POST['date'];
           header("Location: formulario_historial_adjuntosderivados_tramite.php");
         }else{//Si no usa una fecha especifica           
           $tpl->assign('fechader',$dia."-".$mes."-".$ano);
           $lista = $daoexp->ListarDerivados($fecha,"",false,$ordconsulta);
           $tpl->assign('lista', $lista);
		   $_SESSION['fechabus'] = $_POST['date'];
           header("Location: formulario_historial_adjuntosderivados_tramite.php");           
		   
      //     $tpl->display('lista_derivados.tpl.php');
         }
 
            
         break;
		     case 55:    //accion registrar quejas
         
         $daousu = new UsuarioDAO();
         
         $daousu->enviarquejas($_POST['asunto'],$_POST['descripcion']);
         header("Location: agradecsugerencia_tramite.php");
//         $tpl->display('cabeceracliente.tpl.php');
//         $tpl->display('cliagradecimientoquejas.tpl.php');
         
         break;
         case 56:    //formulario modificar expediente
        
    //    $tpl->display('cabeceratramite.tpl.php');
        
//      $daoexp = new ExpedienteDAO();
       // $cmb = new GeneraCombos();
        
        $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
        $tpl->assign('carpetas',$carpetas);
        
        
        //$listadoc = $cmb->ComboDocumentos("2-4");
        //$tpl->assign('llenardocumento',$listadoc);
        
        $datos = $daoexp->ListarDatosmodificar($_GET['idexpediente']);
        
        $tpl->assign('cajaidexpediente',$datos->idexpediente);
        $tpl->assign('cajatupa',$datos->denominacion." * ".$datos->idtupa);
        $tpl->assign('cajaremitente',$datos->remitente);
        $tpl->assign('cajadocumento',$datos->documento);
        $tpl->assign('cajanumdoc',$datos->numerodoc);
        $tpl->assign('cajafolios',$datos->folios);
        $tpl->assign('cajanotupa',$datos->asuntonotupa);
        $tpl->assign('cajareferencia',$datos->referenciaenvio);
		
        $_SESSION['idexpediente'] = $_GET['idexpediente'];
		$_SESSION['cajaarearecibe'] = $datos->id_area_recibe;
		header('Location: modificar_expediente_tramite1.php');
		
      //  $tpl->display('formulario_modificar.tpl.php');
                                
        break;
    Case 57:// acion modificar
    
        $daousu = new UsuarioDAO();
        
        $idtupa = explode("*",$_POST['tupa']); 
         
        $documentoadjuntoVO = new 
		DocumentosAdjuntosVO("","",$_POST['documento'],$_POST['numdoc'],$_POST['folios'],$_POST['referenciadocumentos'],1,"","","","","","","");
        $expedienteVO = new ExpedienteVO($_POST['idexpediente'],$_POST['tupa'],$_POST['remitente'],$_POST['asuntonotupa'],date("Y-m-d H:i:s"),"",0,"","",1);
		
        $daousu->ModificarExpediente($expedienteVO,$documentoadjuntoVO);
         
        header('Location: controlador.php?pagina=6');
        
        break;
		
		case 58:
		 $Gencodigo = new GeneraCodigos();
         $daousu = new UsuarioDAO();
         $codigoderiv= $Gencodigo->CodigoDerivar();
         $codigohistorial = $Gencodigo->CodigoHistorial();
		 if(isset($_REQUEST['acciones'])){
		 $acciones = $_POST['acciones'];
		 $contar = count($acciones);
		 $aux = "";
		 $cadena = "";		 
		 
		  for($i=0;$i<$contar;$i++)
		  {
			  $aux = $aux + $acciones[$i].",";
			  //$fin = $aux.",";
		  }
		 }
         $idexpediente=$_POST['idexpediente'];
		 //echo $codigoderiv,$_POST['documento'],$_POST['numdoc'],$_POST['referencias'],$_POST['folios'];
         $detaVO = new DetalleEnvioVO($codigoderiv,$_POST['documento'],$_POST['numdoc'],$_POST['referencias'],$_POST['folios']);
         $histVO = new HistorialVO($codigohistorial,$idexpediente,6,$codigoderiv,$_SESSION['idarea'],$_POST['areas'],date("Y-m-d H:i:s"),$_SESSION['usuario'],1,$_POST['accion']);

         $daousu->DerivarExpediente($histVO,$detaVO);
         break;
 }
		
 
}

if ($_SESSION['tipo']==0){//si es usuario cliente***************************************************
   switch ($pagina) {
     case 1:    // listar badeja
		 header("Location: principal.php");        
         break;
     case 2:    //accion recepcionar expediente
         
         $daousu = new UsuarioDAO();

         if (isset($_POST['expediente'])){
          foreach ($_POST['expediente'] as $exp){
           $daousu->RecepcionarExpediente($exp);
          }
         }

		 header("Location: principal.php");
         //header("Location: controlador.php?pagina=6");
         
         break;

     case 3:    //accion derivar expediente 
         	 
         $Gencodigo = new GeneraCodigos();
         $daousu = new UsuarioDAO();
         $codigoderiv= $Gencodigo->CodigoDerivar();
         $codigohistorial = $Gencodigo->CodigoHistorial();
		 if(isset($_REQUEST['acciones'])){
		 $acciones = $_REQUEST['acciones'];
		 $contar = count($acciones);
		 $aux = "";
		 $cadena = "";
		 $i = 0;
		foreach ($acciones as $key => $value) 		
		{ 
        $i++;
		$fin = $value;
		}
		
		  // for($i=0;$i<$contar;$i++)
		  // {
			  // $aux = $acciones[$i];
			  // $fin = $aux.",";
			  
		  // }
		  }
		 
         $idexpediente=$_POST['idexpediente'];
		 //echo $codigoderiv,$_POST['documento'],$_POST['numdoc'],$_POST['referencias'],$_POST['folios'];
         $detaVO = new DetalleEnvioVO($codigoderiv,$_POST['documento'],$_POST['numdoc'],$_POST['referencias'],$_POST['folios']);
         $histVO = new HistorialVO($codigohistorial,$idexpediente,6,$codigoderiv,$_SESSION['idarea'],$_POST['areas'],date("Y-m-d H:i:s"),$_SESSION['usuario'],1,$_POST['accion']);

         $daousu->DerivarExpediente($histVO,$detaVO);
         break;
		 
     case 4:    //listar expedientes derivados

      //   $tpl->display('cabeceracliente.tpl.php');
         
//         $daoexp = new ExpedienteDAO();
         $fec=new Fecha();  
         
         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);
         
          if (isset($_POST['date'])){
            $cadefec =explode("-",$_POST['date']);
            $dia=$cadefec[2];
			$mes=$cadefec[1];
			$ano=$cadefec[0];
            $fecha=$_POST['date'];
            $tpl->assign('dias',$dia);
			$tpl->assign('mes',$mes);
			$tpl->assign('ano',$ano);   
			$_SESSION['fechabus'] = $_POST['date'];
            }else
			{                  
            $dia = date("d");
			$mes=date("m");
			$ano = date("Y");                             
            $fecha = date("Y-m-d");
            $tpl->assign('dias',$dia);
			$tpl->assign('mes',$mes);
			$tpl->assign('ano',$ano);
            $_SESSION['fechabus'] = $_POST['date'];
            }
			
            $tpl->assign('tipoc',$_GET['tipo']);            
            $tpl->assign('fecha',$fecha);
            $_SESSION['fechabus'] = $_POST['date'];
            if (isset($_POST['tconsulta'])){
                $ordconsulta=$_POST['tconsulta'];
            }else{
                $ordconsulta=1;
            }
            $tpl->assign('orden',$ordconsulta);
         
         if (isset($_POST['ckmes'])){//Si se seleccion por mes          
           $meslet = $fec->DarMes($mes);
           $tpl->assign('fechader',"Mes -".$meslet);
           $lista = $daoexp->ListarDerivados($mes,$ano,true,$ordconsulta);
           $tpl->assign('lista', $lista);
          // $tpl->display('lista_derivados.tpl.php'); 
		  $_SESSION['fechabus'] = $_POST['date'];
           header("Location: formulario_historial_derivados.php");
         }else{//Si no usa una fecha especifica           
           $tpl->assign('fechader',$dia."-".$mes."-".$ano);
           $lista = $daoexp->ListarDerivados($fecha,"",false,$ordconsulta);
           $tpl->assign('lista', $lista);
		   $_SESSION['fechabus'] = $_POST['date'];
           header("Location: formulario_historial_derivados.php");           
		   
      //     $tpl->display('lista_derivados.tpl.php');
         }

         /***************************************************/  
         break;

     case 5:    //listar busqueda

         //$tpl->display('cabeceracliente.tpl.php');

//         $daoexp=new ExpedienteDAO();
         $daousu = new UsuarioDAO();

         $tpl->assign('idarea',$_SESSION['idarea']);

         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);

         $lista = $daousu->BuscarExpediente($_POST['busqueda']);
         $tpl->assign('lista', $lista);
         $tpl->assign('cadebus',$_POST['busqueda']);        
                  $_SESSION['busqueda'] = $_POST['busqueda'];
         //$tpl->display('formulario_buscar.php');
		 header("Location: formulario_buscar.php");            
      //   $tpl->display('lista_busqueda_Clientes.tpl.php');

         break;

     case 6:    //listar recepcionados
         
       //  $tpl->display('cabeceracliente.tpl.php');

//         $daoexp =  new ExpedienteDAO();         
        // $cmb=new GeneraCombos();
         
         $tpl->assign('nomcarp',$_GET['nomcarp']);

        // $cbcarpetas = $cmb->ComboCarpeta($_SESSION['idarea']);
         //$tpl->assign('cbcarpetas',$cbcarpetas);

         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);

         $lista = $daoexp->ListarRecepcionados();
         $tpl->assign('lista',$lista);
         header("Location: formulario_recepcionados.php");
         //$tpl->display('lista_recepcionados.tpl.php');
         break;

     case 7:    //formulario derivar

     //    $tpl->display('cabeceracliente.tpl.php');

//         $daoexp = new ExpedienteDAO();
       //  $cmb = new GeneraCombos();
         
         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);


         $listadatos=$daoexp->ListarDatos($_GET['idexpediente']); 
         $tpl->assign('listadatos',$listadatos);


        // $listadoc = $cmb->ComboDocumentos("1");
         //$tpl->assign('llenardocumento',$listadoc);

         //$listaarea = $cmb->ComboArea($_SESSION['idarea']);
         //$tpl->assign('listaarea',$listaarea);
		 
		 $_SESSION['idexpediente'] = $_GET['idexpediente'];
		header("Location: formulario_derivar.php");
       //  $tpl->display('formulario_derivar.tpl.php');

         break;

     case 8:    //cancelar envio cliente
         
         $daousu = new UsuarioDAO();
         $daousu->CacelarEnvioCliente($_GET['idesolicitud']);
         header("Location: principal.php");
         break;

     case 9:    //listar historia
                  
       //  $tpl->display('cabeceratramite.tpl.php');

//         $daoexp = new ExpedienteDAO();
         
         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);
         
         $tpl->assign('idexpediente',$_GET['idexpediente']);
         
         $listadatos=$daoexp->ListarDatos($_GET['idexpediente']);
         
         $listadoadj=$daoexp->ListarAdjuntos($_GET['idexpediente']);
         $listaatendidos=$daoexp->ListarAtencion($_GET['idexpediente']);
         $listarecorrido = $daoexp->ListarHistorial($_GET['idexpediente']);

         $tpl->assign('listadatos',$listadatos);
                    
         $tpl->assign('listaadj',$listadoadj);
         $tpl->assign('listaate',$listaatendidos);
	
         $tpl->assign('listarecorrido',$listarecorrido);
		$_SESSION['idexpediente'] = $_GET['idexpediente'];
        // $tpl->display('lista_historia.tpl.php');
		header("Location: formulario_historial.php");
         break;

     case 10:   //listar documentos adjuntos por recepcionar
         
       //  $tpl->display('cabeceracliente.tpl.php');
         
//         $daoexp = new ExpedienteDAO();

         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);

         $lista = $daoexp->ListaAdjuntosxRecepcionar();
         $tpl->assign('listaadj', $lista);
		 
         header("Location: formulario_recepcionaradjuntos.php");
		 
       //  $tpl->display('lista_Adjunto_xRecepcionar.tpl.php');

         break;

     case 11:   // formulario crear carpetas
         
      //   $tpl->display('cabeceracliente.tpl.php');

//         $daoexp=new ExpedienteDAO();
         
         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);
		  header("Location: formulario_carpetas.php");
        // $tpl->display('crear_carpeta.tpl.php');
         
          break;
     case 12:   //accion crear carpeta
         
         $daousu= new UsuarioDAO();         
         $daousu->CrearCarpeta($_POST['nombrecarpeta'],$_SESSION['idarea']);
         header("Location: formulario_mant_carpetas.php");         
         break;
     case 13:   //listar tipo de carpetas
         
      //  $tpl->display('cabeceracliente.tpl.php');

        // $cmb=new GeneraCombos();
//         $daoexp =  new ExpedienteDAO();
         
         //$cbcarpetas = $cmb->ComboCarpeta($_SESSION['idarea']);
        // $tpl->assign('cbcarpetas',$cbcarpetas);

         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);
/*
         if (isset($_POST['nomcarp'])){
            $tpl->assign('nomcarp',$_POST['nomcarp']);
         }else{
            $tpl->assign('nomcarp',$_GET['nomcarp']);
        }
  */      
        //$tpl->assign("idcarpeta",$_GET['tipo']);
         
         $fec=new Fecha();  
/*
          if (isset($_POST['date'])){
            
            $cadefec = explode("-",$_POST['date']);
            
            $dia = $cadefec[2];
            $mes = $cadefec[1];
            $ano = $cadefec[0];
         
            $fecha= $ano."-".$mes."-".$dia;
            
            $fechalink=$ano."-".$mes."-".$dia;
            
            $tpl->assign('dias',$dia);
            $tpl->assign('mes',$mes);
            $tpl->assign('ano',$ano);
            
            $inffecha= $fec->fechalet($fecha,false);
            
            $tpl->assign('inffecha',$inffecha);
            $tpl->assign('fechalink',$fechalink);
            
            if (isset($_POST['ckmes'])){
             
             $lista = $daoexp->ListarCarpetasTipo($mes,$ano,false,$_POST['tipoc'],0);
             
             $tpl->assign('tipoc',$_POST['tipoc']);
             $tpl->assign('lista',$lista);
             $tpl->assign('fecha',$fecha);
             $fecm = $fec->DarMes($mes);
             $tpl->assign('inffecha',"Mes de ".$fecm);
             $_SESSION['codcarpeta']=$_POST['tipoc'];
			 header("Location: formulario_expediente_carpeta.php");
             //$tpl->display('lista_recepcionados_carpetas.tpl.php');
             }else{
              
             $lista = $daoexp->ListarCarpetasTipo($fecha,"",true,$_POST['tipoc'],1);
             $tpl->assign('tipoc',$_POST['tipoc']);          
             $tpl->assign('fecha',$fecha);
             $tpl->assign('lista', $lista);
			 $_SESSION['codcarpeta']=$_POST['tipoc'];
			 header("Location: formulario_expediente_carpeta.php");
             //$tpl->display('lista_recepcionados_carpetas.tpl.php');
         }
            
            }else{                                  
            
            $dia = date("d");
            $mes=date("m");
            $ano = date("Y");
             
            $fecha = date("m");

            $fechalink=$ano."-".$mes."-".$dia;
            
            $tpl->assign('dias',$dia);
            $tpl->assign('mes',$mes);
            $tpl->assign('ano',$ano);
            $tpl->assign('tipoc',$_GET['tipo']);   
            
            $fecm = $fec->DarMes($mes);
            
            $tpl->assign('inffecha',"Mes de ".$fecm);
            $tpl->assign('fechalink',$fechalink);
            $lista = $daoexp->ListarCarpetasTipo($fecha,$ano,true,$_GET['tipo'],0);
            $tpl->assign('fecha',$fecha);
            $tpl->assign('lista', $lista);*/
			
			$_SESSION['codcarpeta']=$_GET['tipo'];
			
            header("Location: formulario_expediente_carpeta.php");
            
        //    }

            //$tpl->assign('tipoc',$_GET['tipo']);
            
         /***************************************************/
         
         break;
     case 14:   //accion pasar a carpetas
         
         $daousu= new UsuarioDAO();

         if (isset($_POST['expediente'])){
           foreach ($_POST['expediente'] as $exp){
             $daousu->EnviarCarpeta($exp,$_POST['carpetas']);
           }
         }
         
         //echo "Location: controlador.php?pagina=13&tipo=".$_POST['carpetas']."&nomcarp=".$_POST['nomcarp'];
		header("Location: formulario_recepcionados_carpetas.php");
        // header("Location: controlador.php?pagina=13&tipo=".$_POST['carpetas']."");

         break;

     case 15:   //accion recepcionar adjuntos
         
         $daousu = new UsuarioDAO();

         if (isset($_POST['expediente'])){
          foreach ($_POST['expediente'] as $exp){
            $daousu->RecepcionarAdjuntos($exp);
          }
         }

         header("Location: controlador.php?pagina=10");
         
         break;
     case 16:   //listar carpetas para manteniemito

         $tpl->display('cabeceracliente.tpl.php');

//         $daoexp =  new ExpedienteDAO();
         
         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);

         $tpl->display('lista_Mant_carpeta.tpl.php');
         
         break;
     case 17:   //accion modificar carpeta
         
         $daousu= new UsuarioDAO();
         $daousu->ModificarCarpeta($_GET['nomcarpeta'],$_GET['idcarpeta']);

         header("Location: controlador.php?pagina=16");
         
         break;
     case 18:   //accion eliminar carpeta
         
         $daousu= new UsuarioDAO();
         $daousu->EliminarCarpeta($_GET['idcarpeta']);

         header("Location: controlador.php?pagina=16");
         
         break;
     case 19: //listar areas
     
         //$daoexp= new ExpedienteDAO();
         
         $area=$daoexp->ListarAreas();

         $tpl->assign('areas',$area);
         
         $tpl->display('lista_areas.tpl.php');
         
         break;
     case 20:   //lista formulario terminar
         
       //  $tpl->display('cabeceracliente.tpl.php');

         $listadatos=$daoexp->ListarDatos($_GET['idexpediente']);
         $tpl->assign('listadatos',$listadatos);

         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);

/*         $cmb = new GeneraCombos();
         

         $tipo=$cmb->ComboDocumentos("3");

         $tpl->assign('cmbtipo',$tipo);       */
         $tpl->assign('idexpediente',$_GET['idexpediente']);
		$_SESSION['idexpediente'] = $_GET['idexpediente'];
		header("Location: formulario_terminar.php");
       //  $tpl->display("formulario_terminar.tpl.php");
//         echo "ingreso";
         
         break;
    case 21:    //accion registrar terminado

         $daousu=new UsuarioDAO();
         
         $daousu->TerminarExpediente($_POST['idexpediente'],$_POST['documento'],$_POST['numero'],$_POST['referencia'],$_SESSION['usuario'],$_SESSION['idarea'],$_POST['terminado']);

         header("Location: formulario_recepcionados_carpetas.php");
		 //header("Location: controlador.php?pagina=16");
         //echo "ingreso";

         break;
    case 22:    //listar formulario de sugerencias
         
         $tpl->display('cabeceracliente.tpl.php');
         
         $tpl->display('cliformulario_quejas.tpl.php');
         
         break;
    case 23:    //accion registrar quejas
         
         $daousu = new UsuarioDAO();
         
         $daousu->enviarquejas($_POST['asunto'],$_POST['descripcion']);
         header("Location: agradecsugerencia.php");
//         $tpl->display('cabeceracliente.tpl.php');
//         $tpl->display('cliagradecimientoquejas.tpl.php');
         
         break;
         
    case 24:    //listar formulario para registro internos
         
//         $daoexp = new ExpedienteDAO();
      //   $cmb = new GeneraCombos();
         
         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);

        // $listadoc = $cmb->ComboDocumentos("5");
        // $tpl->assign('llenardocumento',$listadoc);
         
        // $listaarea = $cmb->ComboArea($_SESSION['idarea']);
        // $tpl->assign('listaarea',$listaarea);

        // $listatu = $cmb->ComboTupa();
        // $tpl->assign('llenartupa',$listatu);
         $tpl->display('cabeceracliente.tpl.php');         
         $tpl->display('formulario_registrar_otros.tpl.php');
         
         break;
         
    case 25:    //registrar expediente internos
         
         $daousu = new UsuarioDAO();                   
           $Gencodigo = new GeneraCodigos();

           $codigohistorial= $Gencodigo->CodigoHistorial();
           $codigoadj= $Gencodigo->CodigoAdjuntos();
           $codigoderiv = $Gencodigo->CodigoDerivar();

           $idtupa = explode("-",$_POST['tupa']);
           $fechaing = $_POST['fecing'];
           
           if (isset($_POST['seguimiento'])){
                $seg=1;         
        }else{
                $seg=0;
        }
           $expedienteVO = new ExpedienteVO($_POST['numexp'],"00.00",$_POST['remitente'],$_POST['asuntonotupa'],$_POST['fecreg'],$_SESSION['usuario'],1,1,"",$seg);
           $histVO = new HistorialVO($codigohistorial,$_POST['numexp'],2,$codigoadj,$_SESSION['idarea'],$_POST['areas'],$_POST['fecing'],$_SESSION['usuario'],2,$_POST['accion']);
           $docVO = new DocumentosAdjuntosVO($codigoadj,$_POST['numexp'],$_POST['documento'],$_POST['numdoc'],$_POST['folios'],$_POST['referenciadocumentos'],1,"","","","","","","");
           $detenv = new DetalleEnvioVO($codigoderiv,1,"00","REGISTRADO EN ".$_session['idare'],'');

           $daousu->RegistrarInternos($expedienteVO,$histVO,$docVO,$detenv);
		  //echo $_SESSION['idexpediente'];
		  $daousu1 = new UsuarioDAO();
        
        $idexpediente=$_SESSION['idexpediente'];
        $daousu1->SubirDocumentosScan1($_SESSION['idexpediente'],"archivos");
        $_SESSION['idexpediente'] = $_SESSION['idexpediente'];
			
          header("Location: controlador.php?pagina=38");
           
         
         
         break;
    case 26:    //listar no recepcionados todos
         
         $tpl->display('cabeceracliente.tpl.php');

//         $daoexp = new ExpedienteDAO();


         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);

         $lista = $daoexp->ListarNoRecepcionados();
         $tpl->assign("lista",$lista);

         $tpl->display("lista_norecepcionados_todos.tpl.php");
         
         break;
    case 27:    //formulario registro RI
         
//       $daoexp = new ExpedienteDAO();      
        // $cmb = new GeneraCombos();

       //  $listaarea = $cmb->ComboArea($_SESSION['idarea']);
        // $tpl->assign('listaarea',$listaarea);        

         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);

        // $listadoc = $cmb->ComboDocumentos("2");
        // $tpl->assign('llenardocumento',$listadoc);
         
         $tpl->assign('tipo',$_SESSION['tipo']);

        // $listatu = $cmb->ComboTupa();
        // $tpl->assign('llenartupa',$listatu);
         $tpl->display('cabeceracliente.tpl.php');
         
         $tpl->display('formulario_registrar_ri.tpl.php');
         
         break;
    case 28:    //registrar internos         
         
         $Gencodigo = new GeneraCodigos();
         
         $codigo = $Gencodigo->CodigoRegInterno();
         $fechalet=$fec->fechalet($_GET['fecha'],false);
         
         $regint = new ReginternoVO($codigo,$_POST['remitente'],$_POST['asunto'],$_POST['idarea'],date("Y-m-d H:i:s"),$_SESSION['idarea'],$_POST['documento'],$_POST['numdoc'],$_POST['folios']);
         
         break;     
   case 29:     //listar imprirmi de derivados
		
		if($_GET['fecha']==''){
		$fec = new Fecha();
		$dia = date("d");
        $mes=date("m");
        $ano = date("Y");                              
        $fecha = date("Y-m-d");
		$lista = $daoexp->ListarDerivados($fecha,0,false,$_GET['orden']);
		}
		else {
		 $fec = new Fecha();
         $fechalet = $fec->fechalet($_GET['fecha'],false,$_GET['orden']);

         $tpl->assign('fechalet',$fechalet);
         
         $lista = $daoexp->ListarDerivados($_GET['fecha'],0,false,$_GET['orden']);

         $tpl->assign('fecha',$_GET['fecha']);
         $tpl->assign('lista', $lista);
		}
//       $daoexp = new ExpedienteDAO();
        
         if ($_GET['tip']==1){
            header ("Location: formulario_historial_derivados_imprimir.php");
			// $tpl->display('lista_derivados_impresion_cargo.tpl.php'); 
         }else{
             header ("Location: formulario_historial_derivados_imprimir.php");
        }
         break;
    case 30:    //listar historial de impresion
        
//       $daoexp = new ExpedienteDAO();
         $fec = new Fecha();
         
         $fechalet = $fec->fechalet(date("Y-m-d H:i:s"),false);
         $tpl->assign('fechalethoy',$fechalet);
         
         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);

         $tpl->assign('idexpediente',$_GET['idexpediente']);
         
         $listadatos=$daoexp->ListarDatos($_GET['idexpediente']);
         
         $listadoadj=$daoexp->ListarAdjuntos($_GET['idexpediente']);
         $listaatendidos=$daoexp->ListarAtencion($_GET['idexpediente']);
         $listarecorrido = $daoexp->ListarHistorial($_GET['idexpediente']);

         $tpl->assign('listadatos',$listadatos);
                    
         $tpl->assign('listaadj',$listadoadj);
         $tpl->assign('listaate',$listaatendidos);

         $tpl->assign('listarecorrido',$listarecorrido);
		 
		 header ("Location: formulario_historial_imprimir.php");
		 
         //$tpl->display('lista_historia_impresion.tpl.php');

         break;
    case 31:    //listar menu no recepcionados
        
         $tpl->display('cabeceracliente.tpl.php');

//         $daoexp = new ExpedienteDAO();
         
         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);
         
         $lista = $daoexp->ListarNoRecepcionados();
         $tpl->assign("lista",$lista);

         $tpl->display("menu_norecepcionados.tpl.php");
         
         break;
    case 32:    //listar grupo no recepcionados
         
         $tpl->display('cabeceracliente.tpl.php');

//         $daoexp = new ExpedienteDAO();
         
         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);
         
         $lista = $daoexp->ListarGruposnoderivados();
         $tpl->assign("lista",$lista);

         $tpl->display("lista_grupo_no_recepcionado.tpl.php");
         
         break;
    case 33:    //listar area no recepcionado
        
         $tpl->display('cabeceracliente.tpl.php');

//         $daoexp = new ExpedienteDAO();
         
         $lista = $daoexp->ListarAreasnorecepcionados($_GET['idarea']);
         $tpl->assign("lista",$lista);
         
         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);

         $tpl->display("lista_norecepcionados_filtro.tpl.php");
         
         break;
    case 34:    //mostrar fotos
        
//      $daoexp = new ExpedienteDAO();
        
        $img = $daoexp->ListaImagenes($_GET['idexpediente']);
        $listadatos=$daoexp->ListarDatos($_GET['idexpediente']);
        
        $tpl->assign('imagen',$img);

        $tpl->assign('listadatos',$listadatos);

        $tpl->display('lista_fotos.tpl.php');
        
        break;
    case 35:    //formulario estados
        
        $tpl->display('cabeceracliente.tpl.php');
       
//        $daoexp = new ExpedienteDAO();
      //  $cmb = new GeneraCombos();
                
        $listadatos=$daoexp->ListarDatos($_GET['idexpediente']); 
        $tpl->assign('listadatos',$listadatos);
         
        $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
        $tpl->assign('carpetas',$carpetas);
        

       // $estados = $cmb->ComboEstados();
        $tpl->assign('idexpediente',$_GET['idexpediente']);
        //$tpl->assign('estados',$estados);
        
        $tpl->display('formulario_estado.tpl.php');
        
        break;
    case 36:    //accion cambiar de estado

        $daousu = new UsuarioDAO();     

        $insertestado = new InsertEstadosVO($_POST['idexpediente'],0,"",$_POST['referencia'],date("Y-m-d H:i:s"),$_POST['estado'],$_SESSION['usuario'],$_SESSION['idarea']);
        
        $daousu->CambiarEstado($insertestado);
        
        header ("Location: controlador.php?pagina=6&nomcarp=RECEPCIONADOS");
        
        break;
    case 37: //ver vista impresion recepcionados carpetas

//         $daoexp =  new ExpedienteDAO();
         
         if (isset($_POST['nomcarp'])){
            $tpl->assign('nomcarp',$_POST['nomcarp']);
         }else{
            $tpl->assign('nomcarp',$_GET['nomcarp']);
        }
         
         $fec=new Fecha();  

          
            // echo $_GET['fechalink']." ".$_GET['idcarpeta'];
             
             if (strlen($_GET['fechalink'])>3){
             $lista = $daoexp->ListarCarpetasTipo($_GET['fechalink'],"",true,$_GET['idcarpeta'],1);
             }else{

             $lista = $daoexp->ListarCarpetasTipo($me,$a,true,$_GET['idcarpeta'],1);
//             echo "ListarCarpetasTipo(".$me.",".$a.",false,".$_GET['idcarpeta'].",1);";
    
            }
             
             $tpl->assign('tipoc',$_POST['tipoc']);          
//             $tpl->assign('fecha',$fecha);
             $tpl->assign('inffecha',$_GET['fecha']);
             $tpl->assign('lista', $lista);
             $tpl->display('lista_carpetas_impresion.tpl.php');

            //$tpl->assign('tipoc',$_GET['tipo']);

         /***************************************************/
         
         break;
     case 38:   //listar registrados
         
      //   $tpl->display('cabeceracliente.tpl.php');

//         $daoexp =  new ExpedienteDAO();         
       // $cmb=new GeneraCombos();
         
         $tpl->assign('nomcarp',$_GET['nomcarp']);

      //   $cbcarpetas = $cmb->ComboCarpeta($_SESSION['idarea']);
       //  $tpl->assign('cbcarpetas',$cbcarpetas);

         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);

         $lista = $daoexp->ListarRegistradoxderivar();
         $tpl->assign('lista',$lista);
         
		  header("Location: formulario_derivarinternos.php");		 
     //    $tpl->display('lista_registrados.tpl.php');
         
         break;
    case 39://accion derivar registrados
             
         $Gencodigo = new GeneraCodigos();
         $daousu = new UsuarioDAO();
		 
         if (isset($_POST['expediente'])){
          foreach ($_POST['expediente'] as $exp){
           $datos = explode("*",$exp);
            $_POST['det'] = $datos[3];
            $codigoderiv= $Gencodigo->CodigoDerivar();
            $codigohistorial = $Gencodigo->CodigoHistorial();
            $detaVO = new DetalleEnvioVO($codigoderiv,$datos[1],$datos[2],$datos[4],$datos[5]);
            $histVO = new HistorialVO($codigohistorial,$datos[0],6,$codigoderiv,$_SESSION['idarea'],$datos[3],date("Y-m-d H:i:s"),$_SESSION['usuario'],1,'');
 
            $daousu->DerivarExpedienteregistrados($histVO,$detaVO);
          } 
         }
         
         //echo $datos[5];
         header("Location: controlador.php?pagina=38");
         break;
        
    case 40:
         //$tpl->display('cabeceratramite.tpl.php');

//         $daoexp = new ExpedienteDAO();
         
         //$carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         //$tpl->assign('carpetas',$carpetas);
         
         $tpl->assign('idexpediente',$_GET['idexpediente']);
         
         $listadatos=$daoexp->ListarDatos($_GET['idexpediente']);
         
         $listadoadj=$daoexp->ListarAdjuntos($_GET['idexpediente']);
         $listaatendidos=$daoexp->ListarAtencion($_GET['idexpediente']);
         $listarecorrido = $daoexp->ListarHistorial($_GET['idexpediente']);

         $tpl->assign('listadatos',$listadatos);
                    
         $tpl->assign('listaadj',$listadoadj);
         $tpl->assign('listaate',$listaatendidos);

         $tpl->assign('listarecorrido',$listarecorrido);

         $tpl->display('ImpHojaEnvio.tpl.php');

         break;
         
    case 41:    //mostrar datos para moficar internos
    
       //  $tpl->display('cabeceracliente.tpl.php');
         
             
//         $daoexp = new ExpedienteDAO();
        // $cmb = new GeneraCombos();
         
        $datos = $daoexp->ListarDatosmodificar($_GET['idexpediente']);
        
        $tpl->assign('cajaidexpediente',$datos->idexpediente);
        $tpl->assign('cajaremitente',$datos->remitente);
        $tpl->assign('cajadocumento',$datos->documento);
        $tpl->assign('seguimiento',$datos->seguimiento);
        $tpl->assign('cajanumdoc',$datos->numerodoc);
        $tpl->assign('cajafolios',$datos->folios);
        $tpl->assign('cajanotupa',$datos->asuntonotupa);
        $tpl->assign('cajareferencia',$datos->referenciaenvio);
        $tpl->assign('cajaarearecibe',$datos->id_area_recibe);      
      
         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);
        
		
        
     //    $listadoc = $cmb->ComboDocumentos("5");
      //   $tpl->assign('llenardocumento',$listadoc);
         
      //   $listaarea = $cmb->ComboArea($_SESSION['idarea']);
      //   $tpl->assign('listaarea',$listaarea);
		 
		 $_SESSION['idexpediente'] = $_GET['idexpediente'];
		 $_SESSION['cajaarearecibe'] = $datos->id_area_recibe;
		 header("Location: modificar_expediente_interno.php");	
         
        // $tpl->display('formulario_modificar_otros.tpl.php');
         
         break;
    case 42:
    
        $daousu = new UsuarioDAO();
        
//      $idtupa = explode("*",$_POST['tupa']); 
         
        $documentoadjuntoVO = new DocumentosAdjuntosVO("","",$_POST['documento'],$_POST['numdoc'],$_POST['folios'],$_POST['referenciadocumentos'],1,"","","","","","","");
        if (isset($_POST['seguimiento'])){
            $seg=1;
        }else{
            $seg=0;
        }
        
        $expedienteVO = new ExpedienteVO($_POST['idexpediente'],"",$_POST['remitente'],$_POST['asuntonotupa'],"","","","",$_POST['areas'],$seg);

        $daousu->Modificarinternos($expedienteVO,$documentoadjuntoVO);
         
        header("Location:controlador.php?pagina=38");
        
        break;
    case 43:
      //   $tpl->display('cabeceracliente.tpl.php');
         
//         $daoexp = new ExpedienteDAO();
         $fec=new Fecha();  
         
         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);
         
          if (isset($_POST['date'])){
            $cadefec =explode("-",$_POST['date']);
            
            $dia=$cadefec[2];
            $mes=$cadefec[1];
            $ano=$cadefec[0];
                        
            $fecha=$_POST['date'];
            
            $tpl->assign('dias',$dia);
            $tpl->assign('mes',$mes);
            $tpl->assign('ano',$ano);
            
           // $fecha_show = $fec->fechalet($fecha,false);
			$_SESSION['fechabus'] = $_POST['date'];
            //echo "entro";
			//header("Location: formulario_historial_recep.php"); 
            }else{     
             
            $dia = date("d");
            $mes=date("m");
            $ano = date("Y");                             
             
            $fecha = date("Y-m-d");
            
            $tpl->assign('dias',$dia);
            $tpl->assign('mes',$mes);
            $tpl->assign('ano',$ano);
            $_SESSION['fechabus'] = $_POST['date'];
           // $fecha_show = $fec->fechalet($fecha,false);
			//header("Location: formulario_historial_recep.php");             
            }
    
        
            $tpl->assign('tipoc',$_GET['tipo']);
                    
           $tpl->assign('fechashow',$fecha_show);
           
           $lista = $daoexp->ListarRecepcionadosreporte($fecha,"",false,$_GET['orden']);
           $tpl->assign('fecha',$fecha);
           $tpl->assign('lista', $lista);
		   $_SESSION['fechabus'] = $_POST['date'];
           header("Location: formulario_historial_recep.php");  
       //    $tpl->display('lista_recepcionados_reporte.tpl.php');
      
         /***************************************************/          
         break;
         
    case 44:
//      $daoexp = new ExpedienteDAO();
        $fec=new Fecha();
		if($_GET['fecha']==''){
			$dia = date("d");
            $mes=date("m");
            $ano = date("Y");              
            $fecha = date("Y-m-d");
			$_SESSION['fechabus'] = $fecha;
			 header("Location: formulario_historial_recep_imprimir.php");
		 }
		 else{
			$_SESSION['fechabus'] = $_GET['fecha'];
			 header("Location: formulario_historial_recep_imprimir.php");
		 }
		
		
        $fecha_show = $fec->fechalet($_GET['fecha'],false);            

        $tpl->assign('fechashow',$fecha_show);
           
        $lista = $daoexp->ListarRecepcionadosreporte($_GET['fecha'],"",false,$_GET['orden']);
      
        $tpl->assign('lista', $lista);
		//$_SESSION['fechabus'] = $_GET['fecha'];
       
       // $tpl->display('lista_recepcionados_reporte_imp.tpl.php');
        break;
    case 45:
        $tpl->display('cabeceracliente.tpl.php');

    //     $cmb=new GeneraCombos();
//         $daoexp =  new ExpedienteDAO();
         
       //  $cbcarpetas = $cmb->ComboCarpeta($_SESSION['idarea']);
       //  $tpl->assign('cbcarpetas',$cbcarpetas);

         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);
         
         $fec=new Fecha();  

         
         $fecha= $_GET['fecha'];
            
              
         $lista = $daoexp->ListarCarpetasTipo($fecha,"",true,$_GET['tipo'],1);
         $tpl->assign('tipoc',$_GET['tipo']);          
         $tpl->assign('fecha',$fecha);
         $tpl->assign('lista', $lista);
         $tpl->display('lista_recepcionados_carpetas.tpl.php');

         /***************************************************/
         
         break;
    case 46:
        $tpl->display('cabeceracliente.tpl.php');
        $tpl->display('menu_produccion.tpl.php');
        break;
	case 47:
      //   $tpl->display('cabeceracliente.tpl.php');
         
//         $daoexp = new ExpedienteDAO();
         $fec=new Fecha();  
         
         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);
         
          if($_GET['fecha']==''){
          /*  $cadefec =explode("-",$_POST['date']);
            
            $dia=$cadefec[2];
            $mes=$cadefec[1];
            $ano=$cadefec[0];
                        
            $fecha=$_POST['date'];
            
            $tpl->assign('dias',$dia);
            $tpl->assign('mes',$mes);
            $tpl->assign('ano',$ano);
            */
			$dia = date("d");
            $mes=date("m");
            $ano = date("Y");                        
             
            $fecha = date("Y-m-d");
           // $fecha_show = $fec->fechalet($fecha,false);
			$_SESSION['fechabus'] = $fecha;
            //echo "entro";
			//header("Location: formulario_historial_recep.php"); 
            }else{     
             
            $dia = date("d");
            $mes=date("m");
            $ano = date("Y");                             
             
            $fecha = date("Y-m-d");
            
            $tpl->assign('dias',$dia);
            $tpl->assign('mes',$mes);
            $tpl->assign('ano',$ano);
            $_SESSION['fechabus'] = $_POST['date'];
           // $fecha_show = $fec->fechalet($fecha,false);
			//header("Location: formulario_historial_recep.php");             
            }
    
        
            $tpl->assign('tipoc',$_GET['tipo']);
                    
           $tpl->assign('fechashow',$fecha_show);
           
          // $lista = $daoexp->ListarRecepcionadosreporte($fecha,"",false,$_GET['orden']);
           $tpl->assign('fecha',$fecha);
           $tpl->assign('lista', $lista);
		   $_SESSION['fechabus'] = $_POST['date'];
           header("Location: formulario_historial_norecep.php");  
       //    $tpl->display('lista_recepcionados_reporte.tpl.php');
      
         /***************************************************/          
         break;
		 
    case 48:
//      $daoexp = new ExpedienteDAO();
		
        $fec=new Fecha();
		 if($_GET['fecha']==''){
			$dia = date("d");
            $mes=date("m");
            $ano = date("Y");              
            $fecha = date("Y-m-d");
			$_SESSION['fechabus'] = $fecha;
			header("Location: formulario_historial_norecep_imprimir.php");
		 }
		 else{
			 $_SESSION['fechabus'] = $_GET['fecha'];
			 header("Location: formulario_historial_norecep_imprimir.php");
		 }
        $fecha_show = $fec->fechalet($_GET['fecha'],false);            

        $tpl->assign('fechashow',$fecha_show);
           
     //   $lista = $daoexp->ListarRecepcionadosreporte($_GET['fecha'],"",false,$_GET['orden']);
      
        $tpl->assign('lista', $lista);
		
        
       // $tpl->display('lista_recepcionados_reporte_imp.tpl.php');
        break;

	case 49:   //accion pasar a carpetas
         
         $daousu= new UsuarioDAO();

         if (isset($_POST['expediente'])){
           foreach ($_POST['expediente'] as $exp){
             $daousu->EnviarCarpeta($exp,$_POST['carpetas']);
           }
         }
         $_SESSION['codcarpeta'] = $_POST['carpetas'];
         //echo "Location: controlador.php?pagina=13&tipo=".$_POST['carpetas']."&nomcarp=".$_POST['nomcarp'];
		header("Location: formulario_expediente_carpeta.php");
        // header("Location: controlador.php?pagina=13&tipo=".$_POST['carpetas']."");

         break;
	case 50:    //Muestra el formulario para subir archivos
         
//       $daoexp = new ExpedienteDAO();
         
        // $tpl->display('cabeceratramite.tpl.php');
         $tpl->assign('idexpediente',$_GET['idexpediente']);         
         $mant = $daoexp->ListaImgMant($_GET['idexpediente']);
         $tpl->assign('mantfot',$mant);
         $_SESSION['idexpediente']=$_GET['idexpediente'];
        // $tpl->display("formulario_subir_archivos.tpl.php");
         header("Location: formulario_imagenes.php");
         break;
    case 51:    //accion subir fotos
        
        $daousu = new UsuarioDAO();
        
        $idexpediente=$_POST['idexpediente'];
        $daousu->SubirDocumentosScan($_POST['idexpediente'],"archivos");
        $_SESSION['idexpediente'] = $_POST['idexpediente'];
        header("Location: controlador.php?pagina=50&idexpediente=".$idexpediente);        
        break; 
	case 52:   //lista formulario link archivo
		 
		 $listadatos=$daoexp->ListarDatos($_GET['idexpediente']);
         $tpl->assign('listadatos',$listadatos);

         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);

		 $dato = $_GET['nomfoto'];
		 $idexpediente = $_SESSION['idexpediente'];
		 header("Location: imgdocumentos/$idexpediente/".utf8_encode($dato)."");

         break;
		      case 53:    //accion recepcionar expediente mult
         
         $daousu = new UsuarioDAO();

         if (isset($_POST['expediente'])){
          foreach ($_POST['expediente'] as $exp){
           $daousu->RecepcionarExpediente1($exp);
          }
         }

		 header("Location: principal1.php");
         //header("Location: controlador.php?pagina=6");
         
         break;
		     case 54:    //registrar expediente internos
         
         $daousu = new UsuarioDAO();                   
           $Gencodigo = new GeneraCodigos();

           $codigohistorial= $Gencodigo->CodigoHistorial();
           $codigoadj= $Gencodigo->CodigoAdjuntos();
           $codigoderiv = $Gencodigo->CodigoDerivar();

           $idtupa = explode("-",$_POST['tupa']);
           $fechaing = $_POST['fecing'];
           
           if (isset($_POST['seguimiento'])){
                $seg=1;         
        }else{
                $seg=0;
        }
           $expedienteVO = new ExpedienteVO($_POST['numexp'],"00.00",$_POST['remitente'],$_POST['asuntonotupa'],$_POST['fecreg'],$_SESSION['usuario'],1,1,"",$seg);
           $histVO = new HistorialVO($codigohistorial,$_POST['numexp'],2,$codigoadj,$_SESSION['idarea'],$_POST['areas'],$_POST['fecing'],$_SESSION['usuario'],2);
           $docVO = new DocumentosAdjuntosVO($codigoadj,$_POST['numexp'],$_POST['documento'],$_POST['numdoc'],$_POST['folios'],$_POST['referenciadocumentos'],1,"","","","","","","");
           $detenv = new DetalleEnvioVO($codigoderiv,1,"00","REGISTRADO EN ".$_session['idare'],'');

          $daousu->RegistrarInternos($expedienteVO,$histVO,$docVO,$detenv);
		  //echo $_SESSION['idexpediente'];
		  $daousu1 = new UsuarioDAO();
        
        $idexpediente=$_SESSION['idexpediente'];
        $daousu1->SubirDocumentosScan1($_SESSION['idexpediente'],"archivos");
        $_SESSION['idexpediente'] = $_SESSION['idexpediente'];
			
          header("Location: controlador.php?pagina=38");         
         break;
	case 55:    //accion subir fotos
        
        $daousu = new UsuarioDAO();
        
        $idusuario=$_POST['idusuario'];
        $daousu->SubirFotoPerfil($_POST['idusuario'],"archivos");
        $_SESSION['idusuario'] = $_POST['idusuario'];
        //header("Location: controlador.php?pagina=50&idexpediente=".$idexpediente);        
        break;
	case 56:    //Ir a Perfil
                  
       //  $tpl->display('cabeceratramite.tpl.php');

//         $daoexp = new ExpedienteDAO();
         
         $carpetas = $daoexp->ListarCarpetas($_SESSION['idarea']);
         $tpl->assign('carpetas',$carpetas);
         
         $tpl->assign('idexpediente',$_GET['idexpediente']);
         
         $listadatos=$daoexp->ListarDatos($_GET['idexpediente']);
         
         $listadoadj=$daoexp->ListarAdjuntos($_GET['idexpediente']);
         $listaatendidos=$daoexp->ListarAtencion($_GET['idexpediente']);
         $listarecorrido = $daoexp->ListarHistorial($_GET['idexpediente']);

         $tpl->assign('listadatos',$listadatos);
                    
         $tpl->assign('listaadj',$listadoadj);
         $tpl->assign('listaate',$listaatendidos);
	
         $tpl->assign('listarecorrido',$listarecorrido);
		$_SESSION['idusumov'] = $_GET['idexpediente'];
        // $tpl->display('lista_historia.tpl.php');
		header("Location: perfil.php");
         break;
		
 }
}

if ($_SESSION['tipo']==15){//si es usuario cliente***************************************************
    switch ($pagina) {
      case 0:    // listar badeja
          header("Location: principala.php");
          break;
      
      case 1:    //accion recepcionar expediente
         
        $daousu = new UsuarioDAO();

        if (isset($_POST['idesolicitud'])){
         foreach ($_POST['idesolicitud'] as $exp){
          $daousu->RecepcionarExpedienteA($exp);
         }
        }

        header("Location: principala.php");
        //header("Location: controlador.php?pagina=6");
        
        break;
        case 8:    //accion recepcionar expediente
         
            $daousu = new UsuarioDAO();
            $daousu->CacelarEnvioCliente($_GET['idesolicitud']);
            header("Location: principala.php");
            break;
    }

}

}else{ //si la sesion ha caducado

$titulo="SESION CADUCADA";

$tpl->assign('titulo',$titulo);

$tpl->display('login.tpl.php?');

}
?>