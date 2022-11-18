<?php
require_once "./conf.php";
header("Content-Type: text/html;charset=utf-8");
?>
<!DOCTYPE html>


<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="UTF-8" />
		<title>SST Asesores - Registro de Reclamaciones</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="assets/css/chosen.min.css" />
		<script src="assets/js/jquery.min.js"></script>
		<!--<script type="text/javascript" src="busqueda/funciones.js"></script>-->
		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->

		<script type="text/javascript">
  			if (window.navigator.userAgent.indexOf("Trident/") > 0) {
    			window.location.replace("./ie/nosupport.php")
  			}
			if (navigator.userAgent.toLowerCase().indexOf('firefox') > 0) {
    			window.location.replace("./ie/nosupport.php")
  			}
			if (navigator.userAgent.toLowerCase().indexOf('opera') > 0) {
    			window.location.replace("./ie/nosupport.php")
  			} 
		</script>
		<script src="assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->

		<style>
		.twitter-typeahead, .tt-hint, .tt-input, .tt-menu { width: 100%; }

		</style>
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">

				<div class="navbar-header pull-left">
					<a href="" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							SST Asesores SAC <br>
						</small>
					</a>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
				<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
   						<div class="ace-settings-box clearfix" id="ace-settings-box">

							</div>	<!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								LIBRO DE RECLAMACIONES
								<small>
								<!--	<i class="ace-icon fa fa-angle-double-right"></i>-->
								
								</small>
							</h1>
							<h6 style="color: red;">
							Conforme a lo establecido en el Código de Protección y Defensa del Consumidor esta institución cuenta con un Libro de Reclamaciones a tu disposición. Por favor llene todos los campos requeridos.
							</h6>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">

<div class="alert alert-success" role="alert" style="display: none" id="div_success">
  <h4 class="alert-heading">Felicitaciones!!</h4>
  <p>Tu Solicitud se ha registrado exitosamente</p>
</div>

<div class="alert alert-danger" role="alert" style="display: none" id="div_danger">
  <h4 class="alert-heading">No exitoso!!</h4>
  <p>Tu El registro de la solicitud no se pudo realizar, intentar nuevamente.</p>
</div>


<form class="form-horizontal" role="form" id="frm" name="formregistrarrec" action="registrorec.php" method="post" onsubmit="return validar(this);">

<script language="javascript">

function validar(){
  // if (confirm('¿Estás seguro de ingresar esta solicitud?')){
/*
	if (document.formregistrar.razons.value==""){
    			  alert("No ha ingresado ninguna Razón Social.");
    			  document.formregistrar.razons.focus();
    			  return false;
    }
	if (document.formregistrar.contratista.value == 0||
		document.formregistrar.contratista.value== ""){
    			  alert("No ha Seleccionado Ningún Cliente.");
    			  document.formregistrar.contratista.focus();
    			  return false;
    }
	if (document.formregistrar.autorizador.value == 0||
		document.formregistrar.autorizador.value== ""){
    			  alert("No ha Seleccionado Ningún Autorizador.");
    			  document.formregistrar.autorizador.focus();
    			  return false;
    }
	if (document.formregistrar.idAutorizador.value==""){
    			  alert("No ha Seleccionado Ningún Autorizador Registrado.");
    			  document.formregistrar.autorizador.focus();
    			  return false;
    }
	if (document.formregistrar.tipcapacitaciones.value == 0||
		document.formregistrar.tipcapacitaciones.value== ""){
    			  alert("No ha Seleccionado Ninguna Capacitación.");
    			  document.formregistrar.tipcapacitaciones.focus();
    			  return false;
    }
	if (document.formregistrar.horario_r.value == 0||
		document.formregistrar.horario_r.value== ""){
    			  alert("No ha Seleccionado Ningún Horario.");
    			  document.formregistrar.horario_r.focus();
    			  return false;
    }
	if (document.formregistrar.cuposdispo.value==""){
    			  alert("No ha Seleccionado Ningún Horario.");
    			  document.formregistrar.cuposdispo.focus();
    			  return false;
    }
	if (document.formregistrar.numpart.value=="" || document.formregistrar.numpart.value < 1 ){
    			  alert("No ha ingresado sus participantes.");
    			  document.formregistrar.numpart.focus();
    			  return false;
    }
	if (document.formregistrar.email.value==""){
    			  alert("No ha ingresado su correo de contacto.");
    			  document.formregistrar.email.focus();
    			  return false;
    }
	if (document.formregistrar.numcontac.value==""){
    			  alert("No ha ingresado su número de contacto.");
    			  document.formregistrar.numcontac.focus();
    			  return false;
    }
	*/
   //}
   //else{
	if(!document.formregistrarrec.submit())
	{
		$("#div_success").show();
	}
	else {
		$("#div_danger").show();
	}

   //}
   }
   function solonumero(e){
var keynum = window.event ? window.event.keyCode : e.which;
if((keynum==8) || (keynum==46))
return true;

return /\d/.test(String.fromCharCode(keynum));
}

function btn_onclick() {
var a = new Array();
var c = new Array();
var b = maxOption2.length;
for (var i=0;i<maxOption2.length;i++){
if(maxOption2.options[i].selected){
a = a + maxOption2.options[i].value+",";
c = a.substring(0, a.length-1);
}
}
//alert(c);
//document.getElementById('acc').value = c;
window.parent.document.formenvia.acc.value =c;
}

</script>

<?php

$conexion = @new mysqli($servid, $user, $passw, $bdsist);

//$myArray = array();

if ($conexion->connect_error) //verificamos si hubo un error al conectar, recuerden que pusimos el @ para evitarlo
{
    die('Error de conexión: ' . $conexion->connect_error); //si hay un error termina la aplicación y mostramos el error
}

mysqli_set_charset($conexion, 'utf8');

$sql = "SELECT idtiposervicio, dsctipservicio from tipservicio where ststipservicio = 1";
$result = $conexion->query($sql); //usamos la conexion para dar un resultado a la variable

if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
    $combobit = "";
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $combobit .= " <option value='" . $row['idtiposervicio'] . "'>" . $row['dsctipservicio'] . "</option>"; //concatenamos el los options para luego ser insertado en el HTML
    }
} else {
    echo "";
}

$sql2 = "SELECT codparametro, dscparametro from parametro where idetipparametro = 'TIP_RECLAMO' and stsparametro = 1";
$result2 = $conexion->query($sql2); //usamos la conexion para dar un resultado a la variable

if ($result2->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
    $combobit3 = "";
    while ($row1 = $result2->fetch_array(MYSQLI_ASSOC)) {
        $combobit3 .= " <option value='" . $row1['codparametro'] . "'>" . $row1['dscparametro'] . "</option>"; //concatenamos el los options para luego ser insertado en el HTML
    }
} else {
    echo "";
}

$conexion->close(); //cerramos la conexión
?>

							<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nombre: </label>

										<div class="col-sm-9">
											<input type="text" name="nombre" id="nombre" placeholder="" class="col-xs-10 col-sm-5" required/>
										</div>
							</div>
							<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Apellido: </label>

										<div class="col-sm-9">
											<input type="text" name="apellido" id="apellido" placeholder="" class="col-xs-10 col-sm-5" required/>
										</div>
							</div>
							<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Dirección del Trabajo: </label>

										<div class="col-sm-9">
											<input type="text" name="direccion" id="direccion" placeholder="" class="col-xs-10 col-sm-5" required/>
										</div>
							</div>
							<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Correo Electrónico: </label>

										<div class="col-sm-9">
											<input type="text" name="email" id="email" placeholder="" class="col-xs-10 col-sm-5" required/>
										</div>
							</div>
							<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Teléfono del Trabajo: </label>

										<div class="col-sm-9">
											<input type="text" name="numcontac" id="numcontac" placeholder="" class="col-xs-10 col-sm-5" required/>
										</div>
							</div>
							<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Empresa: </label>

										<div class="col-sm-9">
											<input type="text" name="empresa" id="empresa" placeholder="" class="col-xs-10 col-sm-5" required/>
										</div>
							</div>
							<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> DNI / RUC: </label>

										<div class="col-sm-9">
											<input type="text" name="numdoc" id="numdoc" placeholder="" class="col-xs-10 col-sm-5" required/>
										</div>
							</div>
						<div class="form-group" id="divtippago">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> IDENTIFICACIÓN DE SERVICIO: </label>

							<div class="col-sm-9">
								<select class="chosen-select form-control" name="tipservicio" id="tipservicio" data-placeholder="Escoja un Servicio" required>
								<?php echo $combobit; ?>
								</select>
							</div>
						</div>
						<div class="form-group" id="divtippago">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> QUEJA O RECLAMO:  </label>

							<div class="col-sm-9">
								<select class="chosen-select form-control" name="tipreclamo" id="tipreclamo" data-placeholder="Escoja una opción" required>
								<?php echo $combobit3; ?>
								</select>
							</div>
						</div>
						<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> DESCRIPCIÓN:  </label>

										<div class="col-sm-9">
										<textarea class="form-control limited" name="descripcion" id="descripcion" id="form-field-9" maxlength="255" style="margin: 0px -10.0586px 0px 0px; width: 452px; height: 209px;" required></textarea>
										</div>
						</div>
						</div>
						<div  class="form-group" >
        <dl>
        <dt><label><span style="font-family:verdana"><b>Si los datos ingresados son los correctos, proceda a seleccionar "Registrar Reclamo"</b></span></label>
		<br></dt>
        <dd></dd>
							</div>

									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
										<button class="btn btn-info" type="submit" id="postback" name="postback" accesskey="6">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Registrar Reclamo
										</button>
											&nbsp; &nbsp; &nbsp;
										<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Limpiar
											</button>
										</div>
									</div>
		</dl>
		</form>

								</div>

							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="footer">
			<?php
				include("footer.php");
			?>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery.2.1.1.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
			<script src="assets/js/jquery.1.11.1.min.js"></script>
		<![endif]-->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]> -->
		<script type="text/javascript">
 			window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
		</script>
		<!--[endif] -->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>-->
		  <script src="assets/js/excanvas.min.js"></script>
		<!--[endif]-->
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/jquery.easypiechart.min.js"></script>
		<script src="assets/js/jquery.sparkline.min.js"></script>
		<script src="assets/js/jquery.flot.min.js"></script>
		<script src="assets/js/jquery.flot.pie.min.js"></script>
		<script src="assets/js/jquery.flot.resize.min.js"></script>
		<script src="assets/js/chosen.jquery.min.js"></script>
		<script src="assets/js/typeahead.jquery.min.js"></script>
		<script src="assets/js/jquery.validate.min.js"></script>
		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
		<!-- inline scripts related to this page -->

	</body>
</html>
