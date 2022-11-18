<?php
session_start();
require_once "./conf.php";
if (isset($_POST['validar'])) {
    $usuariodao = new ValidacionDAO();
    $u = $usuariodao->login($_POST['idusuario'], $_POST['clave'], $_POST['tipuser']);
    if($u)
      {
      $_SESSION['nombre'] = $u->nomape;
      $_SESSION['idusuario']=$u->idusuario;
      $_SESSION['usuario'] = $u->usuario;
      $_SESSION['tipo'] = $u->tipo;
      $_SESSION['ultimoAcceso'] = date("Y-n-j H:i:s");
      $_SESSION['acceso']=$u->acceso;
	    $_SESSION['razonsocial']=$u->razonsocial;
      $_SESSION['ruc']=$u->ruc;  
      $_SESSION['nro_personal']=$u->nro_personal;
      $_SESSION['nombres']=$u->nombres;
      $_SESSION['id_autorizador']=$u->id_autorizador;
      $ruc=$u->ruc;
      $tipo=$u->tipo;
      $razonsocial=$u->razonsocial;
      $fec = new Fecha();
      $_SESSION['mostrarfecha'] = $fec->Fechalet(date("Y-n-j H:i:s"),false);
      if ($u->tipo == 1 or $u->tipo==10 or $u->tipo==0){
        header("Location: controlador.php?pagina=1");
        }
      else if ($u->tipo == 20){
        header("Location: controlador.php?pagina=0");
        }
      else if ($u->tipo == 15){
          header("Location: controlador.php?pagina=0");
        }        
        exit(0);
      } 
    else
      {
      $tpl = new Plantilla();
      $tpl->assign('error_msg', "Usuario y/o Clave incorrectos.");
      //$tpl->display("login.tpl.php");
	    header("Location: error.php");
      exit(0);
    }
}
?>