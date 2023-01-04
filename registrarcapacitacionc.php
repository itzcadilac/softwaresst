<?php
require_once "./conf.php";
header("Content-Type: text/html;charset=utf-8");
session_start();
//controlar el tiempo de sesion
$se= new ValidacionDAO();
$vari=$se->TiempoSesion();
?>
<!DOCTYPE html>


<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="UTF-8" />
	<title>Training Soft</title>

	<meta name="description" content="overview &amp; stats" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="assets/css/chosen.min.css" />
	<link rel="stylesheet" href="assets/css/datepicker.min.css" />
	<link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css" />
	<script type="text/javascript" src="busqueda/funciones.js"></script>
	<link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" />
	<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
	<script src="assets/js/jquery.min.js"></script>
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
	<style>
	.twitter-typeahead, .tt-hint, .tt-input, .tt-menu { width: 100%; }
	</style>
</head>

<body class="no-skin">
	<?php
	include "cabecera_generalc.php";
	?>

	<script type="text/javascript">
		window.onload = function() {
		/*
		var myInput = document.getElementById('form-field-1');
		
		myInput.onpaste = function(e) {
			e.preventDefault();
			alert("esta acción está prohibida");
		}
		
		
		myInput.oncopy = function(e) {
			e.preventDefault();
			alert("esta acción está prohibida");
		}
		*/
		}
		
		var numero = 0;

		// Funciones comunes
		c= function (tag) { // Crea un elemento
		return document.createElement(tag);
		}
		d = function (id) { // Retorna un elemento en base al id
		return document.getElementById(id);
		}
		e = function (evt) { // Retorna el evento
		return (!evt) ? event : evt;
		}
		f = function (evt) { // Retorna el objeto que genera el evento
		return evt.srcElement ?  evt.srcElement : evt.target;
		}

		addField = function () {
		container = d('files');

		span = c('SPAN');
		span.className = 'file';
		span.id = 'file' + (++numero);

		field = c('INPUT');
		field.name = 'archivos[]';
		field.type = 'file';

		a = c('A');
		a.name = span.id;
		a.href = '#';
		a.onclick = removeField;
		a.innerHTML = 'Quitar';

		span.appendChild(field);
		span.appendChild(a);
		container.appendChild(span);
		}
		removeField = function (evt) {
		lnk = f(e(evt));
		span = d(lnk.name);
		span.parentNode.removeChild(span);
		}
		</script>
		<script type="text/javascript">
		function spacio(e){
			tecla=(document.all) ? e.keyCode : e.which;
			return tecla!=32;
		}

		function validate(form) {

		if(!valid) {
			alert('Por favor antes de enviar complete su información correctamente.');
			return false;
		}
		else {
			return confirm('¿Confirma que la información registrada es la correcta?');
		}
		}
	</script>

	<div class="main-container" id="main-container">
		<script type="text/javascript">
			try { ace.settings.check('main-container', 'fixed') } catch (e) { }
		</script>
		<?php include "menuc.php"; ?>
		<div class="main-content">
			<div class="main-content-inner">
				<div class="breadcrumbs" id="breadcrumbs">
					<script type="text/javascript">
						try { ace.settings.check('breadcrumbs', 'fixed') } catch (e) { }
					</script>

					<ul class="breadcrumb">
						<li>
							<i class="ace-icon fa fa-home home-icon"></i>
							<a href="principalc.php">Inicio</a>
						</li>
						<li class="active">Registrar Solicitud</li>
					</ul>
				</div>
				<div class="page-content">
					<div class="ace-settings-container" id="ace-settings-container">
						<div class="ace-settings-box clearfix" id="ace-settings-box">

						</div>
					</div>

					<div class="page-header">
						<h1>
							Registrar Solicitud
							<small>

							</small>
						</h1>
					</div>

					<div class="row">							

		<div class="alert alert-success" role="alert" style="display: none" id="div_success">
			<h4 class="alert-heading">Felicitaciones!!</h4>
			<p>Tu Solicitud se ha registrado exitosamente</p>
		</div>
<form class="form-horizontal" method="post">
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="ruc"> Ingrese su RUC:  </label>
		<div class="col-sm-9">
			<input type="text" name="ruc" class="ruc" id="ruc" placeholder="" value ="<?php echo $_SESSION['ruc']; ?>" readonly/>
			<!--<button id="botoncito" class="botoncito">
				<i class="fa fa-search"></i> Buscar
			</button>-->
			<img src="ajax.gif" class="ajaxgif hide">
			</div>
		</div>
	</form>
	<form class="form-horizontal" role="form" id="frm" name="formregistrar" action="registrosolc.php" method="post" enctype="multipart/form-data" onsubmit="return validar(this);">
		<input type="hidden" id="idAutorizador"  name="idAutorizador" />
		<input type="hidden" id="numruc" name="numruc" value="<?php echo $_SESSION['ruc']; ?>"  />
	
	<script language="javascript">
		
		function validate(form) 
		{

			if(!valid) {
				alert('Por favor antes de enviar complete su información correctamente.');
				return false;
			}
			else {
				return confirm('¿Confirma que la información registrada es la correcta?');
			}
		}

		function validar()
		{
			if (confirm('¿Estás seguro de ingresar esta solicitud?')){

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
			}
			else{
				if(!document.formregistrar.submit())
				{
					//$("#divautoriza").show();
				}
				else {
					$("#div_success").show();
				}

			}
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
			for (var i=0;i
						<maxOption2.length;i++){
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
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nombre de empresa: </label>
				<div class="col-sm-9">
					<input type="text" name="razons" id="razons" placeholder="" readonly='true' value = "<?php echo $_SESSION['razonsocial']; ?>" class="form-control col-xs-10 col-sm-5" required/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Seleccione su Cliente: </label>
				<?php
$conexion = @new mysqli($servid, $user, $passw, $bdsist);

//$myArray = array();

if ($conexion->connect_error) //verificamos si hubo un error al conectar, recuerden que pusimos el @ para evitarlo
{
    die('Error de conexión: ' . $conexion->connect_error); //si hay un error termina la aplicación y mostramos el error
}

mysqli_set_charset($conexion, 'utf8');

$sqlautorizador = "SELECT id_autorizador, nombres from autorizadores";
$resultautorizador = $conexion->query($sqlautorizador);
$myArray = $resultautorizador->fetch_all(MYSQLI_ASSOC);

$myArray = json_encode($myArray);

$sqlcontra = "SELECT * from empresas where estado = 1";
$resultcontra = $conexion->query($sqlcontra); //usamos la conexion para dar un resultado a la variable

if ($resultcontra->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
    $combobitcontra = "";
    while ($rowcontra = $resultcontra->fetch_array(MYSQLI_ASSOC)) {
        $combobitcontra .= " 
				<option value='" . $rowcontra['ideempresa'] . "'>" . $rowcontra['dscempresa'] . "</option>"; //concatenamos el los options para luego ser insertado en el HTML
    }
} else {
    echo "";
}
?>
<script type="text/javascript">
    function hide_show(){
	var contratista = document.getElementById("contratista");
	var valorSeleccionado = contratista.options[contratista.selectedIndex].text;
    if(valorSeleccionado === "NESTLE PERU S A"){
	$("#divautoriza").show();
	$("#divtippago").hide();
 
    }else{
	$("#divautoriza").hide();  
	$("#divtippago").show();  
        }    
    }
</script>
				<div class="col-sm-9">
					<select class="form-control" name="contratista" id="contratista" onchange="hide_show();" required>
						<option value="0">---Seleccione---</option>
						<?php echo $combobitcontra; ?>
					</select>
				</div>
			</div>
			<div class="form-group" id="divautoriza">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Seleccione su Autorizador: </label>
				<div class="col-sm-9">
					<span> Ingrese el Nombre y/o Apellidos de Su Autorizador y Seleccionelo, sino se encuentra comuníquese con la Empresa para su Registro. </span>
					<input class="typeahead scrollable" id="autorizador" type="text" placeholder="Escriba aquí Nombres y Apellidos del Autorizador" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Elige tu Capacitación:  </label>
				<?php
$sql = "SELECT idecapacitacion, desccapacitacion from tipcapacitaciones where estado = 1";
$result = $conexion->query($sql); //usamos la conexion para dar un resultado a la variable

if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
    $combobit = "";
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $combobit .= " 
				<option value='" . $row['idecapacitacion'] . "'>" . $row['desccapacitacion'] . "</option>"; //concatenamos el los options para luego ser insertado en el HTML
    }
} else {
    echo "";
}

$sql2 = "SELECT * from tippago where estado = 1";
$result2 = $conexion->query($sql2); //usamos la conexion para dar un resultado a la variable

if ($result2->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
    $combobit3 = "";
    while ($row1 = $result2->fetch_array(MYSQLI_ASSOC)) {
        $combobit3 .= " 
				<option value='" . $row1['idetipopago'] . "'>" . $row1['desctipopago'] . "</option>"; //concatenamos el los options para luego ser insertado en el HTML
    }
} else {
    echo "";
}

$valor=$_GET['tipcapacitaciones'];

$sql9 = "SELECT calend.idecalendcapacitaciones, tip.desccapacitacion, tip.image, tip.costo, calend.fecha, calend.hora calend.cuposdispo
FROM calendcapacitaciones calend
INNER JOIN tipcapacitaciones tip
ON calend.idecapacitacion = tip.idecapacitacion
WHERE tip.idecapacitacion = $valor
and tip.estado = 1";

$result9 = $conexion->query($sql9); //usamos la conexion para dar un resultado a la variable

if ($result9->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
    $combobithorario = "";
    while ($row9 = $result9->fetch_array(MYSQLI_ASSOC)) {
        $combobithorario .= " 
				<option value='" .$row9['idecalendcapacitaciones']. "'>" .$row9['hora']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
    }
} else {
    echo "";
}

$conexion->close(); //cerramos la conexión
?>
				<div class="col-sm-9">
					<select class="chosen-select form-control" name="tipcapacitaciones[]" id="tipcapacitaciones" data-placeholder="Escoge tu Capacitación..." >
						<option value="0">---Seleccione---</option>
						<?php echo $combobit; ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Elige tu horario:</label>
				<div class="col-sm-9" id="content_horario">
					<select class="form-control" name="horario_r" id="horario_r">
						<option value="0">---Seleccione---</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Cupos Disponibles: </label>
				<div class="col-sm-9" id="cuposlibres">
					<input type="text" name="cuposdispo" id="cuposdispo" placeholder="" class="col-xs-10 col-sm-5" readonly />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> N&uacute;mero de Participantes: </label>
				<div class="col-sm-9" id="numparticip">
					<input type="number" name="numpart" id="numpart" onkeypress="return solonumero(event);" readonly/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Correo: </label>
				<div class="col-sm-9">
					<input type="email" name="email" id="email" placeholder="" class="col-xs-10 col-sm-5" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Número de Contacto (celular): </label>
				<div class="col-sm-9">
					<input type="text" name="numcontac" id="numcontac" placeholder="" class="col-xs-10 col-sm-5" onkeypress="return solonumero(event);" />
				</div>
			</div>
			<div class="form-group" id="divtippago">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tipo de Pago:  </label>
				<div class="col-sm-9">
					<select class="chosen-select form-control" name="tippago" id="tippago" data-placeholder="Escoja un Tipo de Depósito">
						<?php echo $combobit3; ?>
					</select>
				</div>
			</div>
		</div>
		<div  class="form-group" >
			<dl>
				<dt>
					<label>
						<span style="font-family:verdana">
							<b>Si los datos ingresados son los correctos, proceda a seleccionar Solicitar Capacitaciones</b>
						</span>
					</label>
					<br>
						<a href="#" onclick="addField()" accesskey="5">
						</a>
					</dt>
					<dd>
						<span style="font-family:verdana">
							<div id="files"></div>
						</span>
					</dd>
				</div>
				<div class="clearfix form-actions">
					<div class="col-md-offset-3 col-md-9">
						<button class="btn btn-info" type="submit" id="postback" name="postback" accesskey="6">
							<i class="ace-icon fa fa-check bigger-110"></i>
												Solicitar Capacitaciones
										
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
		<script>
			$(function(){
				$('#botoncito').on('click', function(){
				var ruc = $('#ruc').val();
				var url = 'consulta_sunat.php';
				$('.ajaxgif').removeClass('hide');
				$.ajax({
				type:'POST',
				url:url,
				data:'ruc='+ruc,
				success: function(datos_dni){
					$('.ajaxgif').addClass('hide');
					var datos = eval(datos_dni);
						var nada ='nada';
						if(datos[0]==nada){
							alert('DNI o RUC no válido o no registrado');
						}else{
							$('#razons').val(datos[0]);
							$('#numruc').val(datos[1]);
						}		
				}
				});
				return false;
				});
			});
		</script>
		<script>
			$(function(){

				$('#tipcapacitaciones').on('change', function(){
				var tipcapacitaciones = $('#tipcapacitaciones').val();
				var url = 'busquedahorarios.php';
				var text = ''
				$.ajax({
				type:'POST',
				url:url,
				data:'tipcapacitaciones='+tipcapacitaciones,
				success: function(response){
					var datos = JSON.parse(response);
					$('#cuposlibres').html(`
					<input type="text" name="cuposdispo" id="form-field-1" placeholder="" class="col-xs-10 col-sm-5" value="" readonly />
					`);
					var output = ['<option value="0">---Seleccione---</option>']
					datos.data.forEach(item => {
					output.push(`
					<option value="${item.idecalendcapacitaciones}">${item.hora}</option>`);				
					});
					console.log($('#horario_r').get(0));
					$('#horario_r').get(0).innerHTML = output.join('');
				}
				});
				return false;
				});
			});

			$(function(){
				$('#horario_r').on('change', function(){
				var horario = $('#horario_r').val();
				var url = 'busquedacupos.php';
				var text = ''
				$.ajax({
				type:'POST',
				url:url,
				data:'horario='+horario,
				success: function(response){
					var datos = JSON.parse(response);
					datos.data.forEach(item => {
					text += `${item.cuposdispo}`
					
					});
					$('#cuposlibres').html(` 
					
					<input type="text" name="cuposdispo" id="form-field-1" placeholder="" class="col-xs-10 col-sm-5" value="${text}" readonly />
					`);
					$('#numparticip').html(`
					
					<input type="number" name="numpart" id="numpart"  min="1" max="${text}" onkeypress="return solonumero(event);" pattern="^[0-${text}]+" autocomplete="off"/>
					`);
				}
				});
				return false;
				});
			});
		</script>					

					</div>

					<div class="hr hr32 hr-dotted"></div>
					<div class="hr hr32 hr-dotted"></div>

				</div>
			</div>
		</div>
	</div>

	<div class="footer">
		<?php include "footer.php"; ?>
	</div>

	<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
		<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
	</a>
	</div>
	<script src="assets/js/jquery.2.1.1.min.js"></script>
	<script type="text/javascript">
		window.jQuery || document.write("<script src='assets/js/jquery.min.js'>" + "<" + "/script>");
	</script>
	<script type="text/javascript">
		if ('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
	</script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery-ui.custom.min.js"></script>
	<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
	<script src="assets/js/jquery.easypiechart.min.js"></script>
	<script src="assets/js/jquery.sparkline.min.js"></script>
	<script src="assets/js/jquery.flot.min.js"></script>
	<script src="assets/js/jquery.flot.pie.min.js"></script>
	<script src="assets/js/jquery.flot.resize.min.js"></script>
	<script src="assets/js/chosen.jquery.min.js"></script>
	<script src="assets/js/bootstrap-datepicker.min.js"></script>
	<script src="assets/js/bootstrap-timepicker.min.js"></script>
	<script src="assets/js/ace-elements.min.js"></script>
	<script src="assets/js/ace.min.js"></script>
	<script src="assets/js/typeahead.jquery.min.js"></script>
	<script src="assets/js/jquery.validate.min.js"></script>
	<script type="text/javascript">
		document.getElementById("tipcapacitaciones").onchange = function(){
		var opt = this.options[this.selectedIndex];
		var textContent = opt.text.split(" ");
		}
	</script>		
	<script type="text/javascript">
		jQuery(function ($) {
			$('.date-picker').datepicker({
				format: 'yyyy-mm-dd',
				autoclose: true,
				todayHighlight: true,
			}).next().on(ace.click_event, function () {
				$(this).prev().focus();
			});

			$('#timepicker1').timepicker({
				timeFormat: "HH:mm:ss",
				minuteStep: 1,
				showSeconds: true,
				showMeridian: false
			}).next().on(ace.click_event, function () {
				$(this).prev().focus();
			});
			$('.easy-pie-chart.percentage').each(function () {
				var $box = $(this).closest('.infobox');
				var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
				var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
				var size = parseInt($(this).data('size')) || 50;
				$(this).easyPieChart({
					barColor: barColor,
					trackColor: trackColor,
					scaleColor: false,
					lineCap: 'butt',
					lineWidth: parseInt(size / 10),
					animate: /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
					size: size
				});
			})

			$('.sparkline').each(function () {
				var $box = $(this).closest('.infobox');
				var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
				$(this).sparkline('html',
					{
						tagValuesAttribute: 'data-values',
						type: 'bar',
						barColor: barColor,
						chartRangeMin: $(this).data('min') || 0
					});
			});

			if (!ace.vars['touch']) {
				$('.chosen-select').chosen({ allow_single_deselect: true });
				//resize the chosen on window resize

				$(window)
					.off('resize.chosen')
					.on('resize.chosen', function () {
						$('.chosen-select').each(function () {
							var $this = $(this);
							$this.next().css({ 'width': $this.parent().width() });
						})
					}).trigger('resize.chosen');
				//resize chosen on sidebar collapse/expand
				$(document).on('settings.ace.chosen', function (e, event_name, event_val) {
					if (event_name != 'sidebar_collapsed') return;
					$('.chosen-select').each(function () {
						var $this = $(this);
						$this.next().css({ 'width': $this.parent().width() });
					})
				});


				$('#chosen-multiple-style .btn').on('click', function (e) {
					var target = $(this).find('input[type=radio]');
					var which = parseInt(target.val());
					if (which == 2) $('#form-field-select-4').addClass('tag-input-style');
					else $('#form-field-select-4').removeClass('tag-input-style');
				});
			}

			//flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
			//but sometimes it brings up errors with normal resize event handlers
			$.resize.throttleWindow = false;

			var placeholder = $('#piechart-placeholder').css({ 'width': '90%', 'min-height': '150px' });
			var data = [
				{ label: "social networks", data: 38.7, color: "#68BC31" },
				{ label: "search engines", data: 24.5, color: "#2091CF" },
				{ label: "ad campaigns", data: 8.2, color: "#AF4E96" },
				{ label: "direct traffic", data: 18.6, color: "#DA5430" },
				{ label: "other", data: 10, color: "#FEE074" }
			]
			/*
			function drawPieChart(placeholder, data, position) {
				$.plot(placeholder, data, {
					series: {
						pie: {
							show: true,
							tilt: 0.8,
							highlight: {
								opacity: 0.25
							},
							stroke: {
								color: '#fff',
								width: 2
							},
							startAngle: 2
						}
					},
					legend: {
						show: true,
						position: position || "ne",
						labelBoxBorderColor: null,
						margin: [-30, 15]
					}
					,
					grid: {
						hoverable: true,
						clickable: true
					}
				})
			}
			drawPieChart(placeholder, data);
			*/
			var substringMatcher = function(data) {
					
					return function findMatches(q, cb) {
						var matches, substringRegex;
					 
						// an array that will be populated with substring matches
						matches = [];
					 
						// regex used to determine if a string contains the substring `q`
						substrRegex = new RegExp(q, 'i');
					 
						// iterate through the pool of strings and for any string that
						// contains the substring `q`, add it to the `matches` array
						$.each(data, function(i, data) {
							const {id_autorizador,nombres}=data;
							if (substrRegex.test(nombres)) {
								// the typeahead jQuery plugin expects suggestions to a
								// JavaScript object, refer to typeahead docs for more info
								matches.push({ value: nombres, id: id_autorizador });
							}
						});
						
						cb(matches);
					}
				 }
				 var listaauto = <?=$myArray?>;
				 //console.log((listaauto || []).map(item=>item.nombres));
				 $('input.typeahead').typeahead({
					hint: true,
					highlight: true,
					minLength: 1
				 }, {
					name: 'autorizador',
					displayKey: 'value',
					source: substringMatcher(listaauto)
				 })
				 .bind("typeahead:selected", function(obj, datum, name) {
				  //console.log(obj, datum, name);
				  $('#idAutorizador').val(datum.id)
				  
				 });
				 ;
			/**
			we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			so that's not needed actually.
			*/
			//placeholder.data('chart', data);
			//placeholder.data('draw', drawPieChart);


			//pie chart tooltip example
			var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
			var previousPoint = null;

			placeholder.on('plothover', function (event, pos, item) {
				if (item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var tip = item.series['label'] + " : " + item.series['percent'] + '%';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({ top: pos.pageY + 10, left: pos.pageX + 10 });
				} else {
					$tooltip.hide();
					previousPoint = null;
				}

			});

			/////////////////////////////////////
			$(document).one('ajaxloadstart.page', function (e) {
				$tooltip.remove();
			});




			var d1 = [];
			for (var i = 0; i < Math.PI * 2; i += 0.5) {
				d1.push([i, Math.sin(i)]);
			}

			var d2 = [];
			for (var i = 0; i < Math.PI * 2; i += 0.5) {
				d2.push([i, Math.cos(i)]);
			}

			var d3 = [];
			for (var i = 0; i < Math.PI * 2; i += 0.2) {
				d3.push([i, Math.tan(i)]);
			}

			/*
			var sales_charts = $('#sales-charts').css({ 'width': '100%', 'height': '220px' });
			$.plot("#sales-charts", [
				{ label: "Domains", data: d1 },
				{ label: "Hosting", data: d2 },
				{ label: "Services", data: d3 }
			], {
				hoverable: true,
				shadowSize: 0,
				series: {
					lines: { show: true },
					points: { show: true }
				},
				xaxis: {
					tickLength: 0
				},
				yaxis: {
					ticks: 10,
					min: -2,
					max: 2,
					tickDecimals: 3
				},
				grid: {
					backgroundColor: { colors: ["#fff", "#fff"] },
					borderWidth: 1,
					borderColor: '#555'
				}
			});*/


			$('#recent-box [data-rel="tooltip"]').tooltip({ placement: tooltip_placement });
			function tooltip_placement(context, source) {
				var $source = $(source);
				var $parent = $source.closest('.tab-content')
				var off1 = $parent.offset();
				var w1 = $parent.width();

				var off2 = $source.offset();
				//var w2 = $source.width();

				if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2)) return 'right';
				return 'left';
			}


			$('.dialogs,.comments').ace_scroll({
				size: 300
			});


			//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
			//so disable dragging when clicking on label
			var agent = navigator.userAgent.toLowerCase();
			if ("ontouchstart" in document && /applewebkit/.test(agent) && /android/.test(agent))
				$('#tasks').on('touchstart', function (e) {
					var li = $(e.target).closest('#tasks li');
					if (li.length == 0) return;
					var label = li.find('label.inline').get(0);
					if (label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation();
				});

			$('#tasks').sortable({
				opacity: 0.8,
				revert: true,
				forceHelperSize: true,
				placeholder: 'draggable-placeholder',
				forcePlaceholderSize: true,
				tolerance: 'pointer',
				stop: function (event, ui) {
					//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
					$(ui.item).css('z-index', 'auto');
				}
			}
			);
			$('#tasks').disableSelection();
			$('#tasks input:checkbox').removeAttr('checked').on('click', function () {
				if (this.checked) $(this).closest('li').addClass('selected');
				else $(this).closest('li').removeClass('selected');
			});

			//chosen plugin inside a modal will have a zero width because the select element is originally hidden
			//and its width cannot be determined.
			//so we set the width after modal is show
			$('#modal-form').on('shown.bs.modal', function () {
				if (!ace.vars['touch']) {
					$(this).find('.chosen-container').each(function () {
						$(this).find('a:first-child').css('width', '210px');
						$(this).find('.chosen-drop').css('width', '210px');
						$(this).find('.chosen-search input').css('width', '200px');
					});
				}
			})
			/**
			//or you can activate the chosen plugin after modal is shown
			//this way select element becomes visible with dimensions and chosen works as expected
			$('#modal-form').on('shown', function () {
				$(this).find('.modal-chosen').chosen();
			})
			*/

			//show the dropdowns on top or bottom depending on window height and menu position
			$('#task-tab .dropdown-hover').on('mouseenter', function (e) {
				var offset = $(this).offset();

				var $w = $(window)
				if (offset.top > $w.scrollTop() + $w.innerHeight() - 100)
					$(this).addClass('dropup');
				else $(this).removeClass('dropup');
			});

		})
	</script>
</body>

</html>