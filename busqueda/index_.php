<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>...::: Módulo de Consultas :::...</title>
<script type="text/javascript" src="funciones.js"></script>
<link rel="stylesheet" href="funcionesestilos/login.css" />	
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<!--Codigo de estilos-->
<link href="funcionesestilos/estilo.css" rel="stylesheet" type="text/css" />
</head>


<body>
<script type="text/javascript">
function spacio(e){
	tecla=(document.all) ? e.keyCode : e.which;
	return tecla!=32;
}
</script>
	<div class="main">

		<center><IMG SRC="logoemp_sin_fondo.png" ALT=""></center>

			<div>
	<form name="frmbusqueda" action="" onsubmit="buscarDato(); return false">

  <div align="center">
    <p>Ingresa el Documento a Consultar:
      <input type="text" name="dato" class="caja-busqueda" onkeypress="return spacio(event);"/>
    </p> 
  </div>
</form>
	</div>
	<fieldset style="width: 100%;"><legend>Resultado de Consulta</legend>
	<div id="resultado"></div>
  </fieldset>
	</div>

</html>
