<?php
require_once "./conf.php";
//require 'clases/util/Constantes.php';
$tpl = new Plantilla();

$pagina = $_GET['pagina'];
session_start();
$tpl->assign('tipo',$_SESSION['tipo']);
$tpl->assign('acceso',$_SESSION['acceso']);

//controlar el tiempo de sesion
$se= new ValidacionDAO();
$vari=$se->TiempoSesion();

//para mostrar los datos en la parte superior
/*$tpl->assign('area',$_SESSION['nomarea']);
$tpl->assign('usuario',$_SESSION['nombre']);
$tpl->assign('cabefecha',$_SESSION['mostrarfecha']);

$daoexp= new ExpedienteDAO();
$dtoadj = $daoexp->Verificardatosadjuntos();
$dtoban = $daoexp->Verificardatosbandeja();
$dtotim = $daoexp->Verificardatostiempo();

$tpl->assign('dtoadj',$dtoadj);
$tpl->assign('dtoban',$dtoban);
*/
?>
<?php
$daosol= new SolicitudDAO();
/* Abrimos la base de datos */
  $conx = mysqli_connect($servid,$user,$passw,$bdsist);
  if (!$conx) die ("Error al abrir la base <br/>". mysqli_error()); 
  //mysqli_select_db($bdsist,$conx) OR die("Connection Error to Database");    
  
  $id_autorizador = $_SESSION['id_autorizador'];

  $sql='SELECT cn.id_autorizador, cn.nro_personal, sl.razons as razonsocial, pr.dscparametro as estadosol, cal.hora, tip.desccapacitacion as nombcapacitacion, sl.*
  FROM solicitudcapac sl, autorizadores cn, parametro pr, calendcapacitaciones cal, tipcapacitaciones tip
  WHERE sl.id_autorizador = cn.id_autorizador
	AND sl.idecalendcapacitaciones = cal.idecalendcapacitaciones
	AND cal.idecapacitacion = tip.idecapacitacion
  AND pr.idetipparametro = "TIP_ESTADOSOL"
  AND sl.estadosolic = pr.codparametro
  AND sl.estadosolic in (5)
  and sl.id_autorizador = '.$id_autorizador.'
  ORDER BY idesolicitud ASC';
 
$result= mysqli_query($conx,$sql) or die(mysqli_error());

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="UTF-8" />
		<title>Sistema de Capacitaciones</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="icon" type="image/png" href="./imagenes/logo.png">
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />

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
		<script src="assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
			<?php
				include("cabecera_generala.php");
			?>

		</div>
		<?php
				include("menua.php");
		?>
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="principala.php">Inicio</a>
							</li>
							<li class="active">Cambiar Contraseña</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="ace-settings-box clearfix" id="ace-settings-box">

							</div>	<!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								Cambiar Contraseña
								<small>
									
								</small>
							</h1>
						</div><!-- /.page-header -->
						<form class="form-horizontal" role="form" id="frm" name="formcambiopass" action="cambiarpass.php" method="post" onsubmit="return validar(this);">
						<input type="hidden" id="nro_personal"  name="nro_personal" value="<?php echo $_SESSION['nro_personal']; ?>"/>
					<!--
						<div class="row">
							<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ingrese Contraseña Actual: </label>

										<div class="col-sm-9">
											<input type="password" name="passact" id="form-field-1" placeholder="" class="col-xs-10 col-sm-5" />
										</div>
							</div>
					</div>
					-->
					<div class="row">		
							<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ingrese Nueva Contraseña: </label>

										<div class="col-sm-9">
											<input type="password" name="newpass" id="form-field-1" placeholder="" class="col-xs-10 col-sm-5" />
										</div>
							</div>
					</div>
					
					<div class="row">
							<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Confirme su Contraseña Nueva: </label>

										<div class="col-sm-9">
											<input type="password" name="repass" id="form-field-1" placeholder="" class="col-xs-10 col-sm-5" />
										</div>
							</div>
					<div>
						
					<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
										<button class="btn btn-info" type="submit" id="postback" name="postback" accesskey="6">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Cambiar Contraseña
										</button>

											&nbsp; &nbsp; &nbsp;
										<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Limpiar Datos
											</button>
										</div>
									</div>
					
					</form>	
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
			<?php
				include("footer.php");
			?>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.0.3.js"></script>
		<script language="javascript">
			function validar(){
   				if (confirm('¿Estás seguro de Cambiar su Contraseña?')){
				/*
				pasa=parseInt(document.formcambiopass.passact.value);
				if($_SESSION['clave']!=pasa){
					alert("La Nueva Contraseña Ingresada no coincide con la Contraseña Actual");
    			  	document.formcambiopass.passact.focus();
					return false;		
				}

    			if (document.formcambiopass.passact.value==""){
    			  alert("No ha ingresado su contraseña Actual");
    			  document.formcambiopass.passact.focus();
    			  return false;
    			}
				*/
    			if (document.formcambiopass.newpass.value==""){
    			  alert("No ha ingresado su Nueva Contraseña");
    			  document.formcambiopass.newpass.focus();
    			  return false;
    			}

    			if (document.formcambiopass.repass.value==""){
    			  alert("No ha ingresado la Confirmación de la Nueva Contraseña");
    			  document.formcambiopass.repass.focus();
    			  return false;
    			}

				
    			pasn=document.formcambiopass.newpass.value;
				reps=document.formcambiopass.repass.value;
				
    			if(pasn!=reps){
					alert("La Nueva Contraseña no coincide con la Contraseña de Confirmación");
    			  document.formcambiopass.newpass.focus();
					return false;
   				}

   			else{
				document.formcambiopass.submit();
   				}
   			}
		}
		</script>
			
		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script language="javascript">
			function cancelar(direccion){
			  if (confirm('¿Está seguro de rechazar la solicitud?')){
			   window.location=direccion;
			   }
			   }
		</script>
		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/jquery.easypiechart.min.js"></script>
		<script src="assets/js/jquery.sparkline.min.js"></script>
		<script src="assets/js/jquery.flot.min.js"></script>
		<script src="assets/js/jquery.flot.pie.min.js"></script>
		<script src="assets/js/jquery.flot.resize.min.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				$('.easy-pie-chart.percentage').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
					var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
					var size = parseInt($(this).data('size')) || 50;
					$(this).easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: parseInt(size/10),
						animate: /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
						size: size
					});
				})
			
				$('.sparkline').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
					$(this).sparkline('html',
									 {
										tagValuesAttribute:'data-values',
										type: 'bar',
										barColor: barColor ,
										chartRangeMin:$(this).data('min') || 0
									 });
				});
			
			
			  //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
			  //but sometimes it brings up errors with normal resize event handlers
			  $.resize.throttleWindow = false;
			
			  var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
			  var data = [
				{ label: "social networks",  data: 38.7, color: "#68BC31"},
				{ label: "search engines",  data: 24.5, color: "#2091CF"},
				{ label: "ad campaigns",  data: 8.2, color: "#AF4E96"},
				{ label: "direct traffic",  data: 18.6, color: "#DA5430"},
				{ label: "other",  data: 10, color: "#FEE074"}
			  ]
			  function drawPieChart(placeholder, data, position) {
			 	  $.plot(placeholder, data, {
					series: {
						pie: {
							show: true,
							tilt:0.8,
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
						margin:[-30,15]
					}
					,
					grid: {
						hoverable: true,
						clickable: true
					}
				 })
			 }
			 drawPieChart(placeholder, data);
			
			 /**
			 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			 so that's not needed actually.
			 */
			 placeholder.data('chart', data);
			 placeholder.data('draw', drawPieChart);
			
			
			  //pie chart tooltip example
			  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
			  var previousPoint = null;
			
			  placeholder.on('plothover', function (event, pos, item) {
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var tip = item.series['label'] + " : " + item.series['percent']+'%';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}
				
			 });
			
				/////////////////////////////////////
				$(document).one('ajaxloadstart.page', function(e) {
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
				
			
				var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
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
						backgroundColor: { colors: [ "#fff", "#fff" ] },
						borderWidth: 1,
						borderColor:'#555'
					}
				});
			
			
				$('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('.tab-content')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			
			
				$('.dialogs,.comments').ace_scroll({
					size: 300
			    });
				
				
				//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
				//so disable dragging when clicking on label
				var agent = navigator.userAgent.toLowerCase();
				if("ontouchstart" in document && /applewebkit/.test(agent) && /android/.test(agent))
				  $('#tasks').on('touchstart', function(e){
					var li = $(e.target).closest('#tasks li');
					if(li.length == 0)return;
					var label = li.find('label.inline').get(0);
					if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
				});
			
				$('#tasks').sortable({
					opacity:0.8,
					revert:true,
					forceHelperSize:true,
					placeholder: 'draggable-placeholder',
					forcePlaceholderSize:true,
					tolerance:'pointer',
					stop: function( event, ui ) {
						//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
						$(ui.item).css('z-index', 'auto');
					}
					}
				);
				$('#tasks').disableSelection();
				$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
					if(this.checked) $(this).closest('li').addClass('selected');
					else $(this).closest('li').removeClass('selected');
				});
			
			
				//show the dropdowns on top or bottom depending on window height and menu position
				$('#task-tab .dropdown-hover').on('mouseenter', function(e) {
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
