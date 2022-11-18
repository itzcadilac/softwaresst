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
$tpl->assign('area',$_SESSION['nomarea']);
$tpl->assign('usuario',$_SESSION['nombre']);
$tpl->assign('cabefecha',$_SESSION['mostrarfecha']);

$daoexp= new ExpedienteDAO();
$dtoadj = $daoexp->Verificardatosadjuntos();
$dtoban = $daoexp->Verificardatosbandeja();
$dtotim = $daoexp->Verificardatostiempo();

$tpl->assign('dtoadj',$dtoadj);
$tpl->assign('dtoban',$dtoban);

?>
<?php
$daoexp= new ExpedienteDAO();
/* Abrimos la base de datos */
  $conx = mysql_connect ($servid,$user,$passw);
  if (!$conx) die ("Error al abrir la base <br/>". mysql_error()); 
  mysql_select_db($bdsist) OR die("Connection Error to Database");    

$sql="SELECT e.idexpediente,e.seguimiento ,e.remitente, e.asuntonotupa, t.denominacion,a2.abreviatura_area as 'abrevareaenvia', a.abreviatura_area as 'abrevarearecibe', e.fecha_mov, e.idusuario_mov,de.folios as 'folenvio',e.idtupa,doc.detalledocumento,de.numerodoc,de.referenciaenvio,e.tipo,a2.descripcion_area as 'descripcionareaenvia',e.tipo FROM expediente e, areas a, tupa t, areas a2, detalleenvio de , documentos doc WHERE e.idareaenvia=a2.idarea and de.idenvio=e.idenvio and e.idareaenvia <> '".$_SESSION['idarea']."' and e.idtupa=t.idtupa and e.idarearecibe=a.idarea and doc.iddocumento=de.iddocumento and e.idarearecibe='TLA' and e.estados=50 order by e.fecha_mov DESC";
$result= mysql_query($sql) or die(mysql_error());



?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="ISO-8859-1" />
		<title>Sistema de Tramite Documentario</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

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
				include("cabecera_general.php");
			?>	
	<!--<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="principal.php" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							Sistema de Tr&aacute;mite Documentario <br>Servicio Nacional de Metereolog&iacute;a e Hidrolog&iacute;a del Per&uacute; - SENAMHI <br>				
						</small>
						<span class="badge badge-danger">AREA:</span> <label style="color:white;"><?php //echo $_SESSION['nomarea']; ?><label>
					</a>
				
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
<!--
						<li class="red">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-tasks icon-animated-bell"></i>
								<span class="badge badge-grey"><?php //echo $dtotim ?></span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-check"></i>
									Tiene(s) <?php //echo $dtotim ?> Expediente(s)<br> con mas de 01 dia sin recepcionar.
								</li>

								<li class="dropdown-footer">
									<a href="formulario_recepcionar_tiempo.php">
										Ir a revisar
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>
					
						<li class="green">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
								<span class="badge badge-success"><?php //echo $dtoban ?></span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-envelope-o"></i>
									Tiene(s) <?php //echo $dtoban ?> Expediente(s)<br> en su Bandeja por Recepcionar
								</li>
								<li class="dropdown-footer">
									<a href="principal.php">
										Ir a revisar
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>
						
						<li class="purple">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-bell icon-animated-bell"></i>
								<span class="badge badge-important"><?php //echo $dtoadj ?></span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-exclamation-triangle"></i>
									Tiene(s) <?php //echo $dtoadj ?> Adjunto(s)<br> en su Bandeja por Recepcionar
								</li>

								<li class="dropdown-footer">
									<a href="formulario_recepcionaradjuntos.php">
										Ir a revisar
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>
						
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<!--<img class="nav-user-photo" src="assets/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Bienvenido,</small>
								<?php //echo $_SESSION['usuario']; ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<!--<i class="ace-icon fa fa-cog"></i>
										<?php //echo $_SESSION['nombre']; ?>
									</a>
								</li>
<!--
								<li>
									<a href="profile.html">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="logout.php">
										<i class="ace-icon fa fa-power-off"></i>
										Salir
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				<ul class="nav nav-list">
					<li class="active">
						<a href="principal.php">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Recep. Expedientes </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="active">
						<a href="principal1.php">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Recep. Exp. Mult.</span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="active">
						<a href="formulario_recepcionados.php">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text"> Exp. Recepcionados </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="active">
						<a href="formulario_recepcionados1.php">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text"> Exp. Recep. Mult. </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="active">
						<a href="formulario_recepcionaradjuntos.php">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> Recep. Adjuntos </span>
						</a>

						<b class="arrow"></b>
					</li>
	
					<li class="">
						<a href="" class="dropdown-toggle">
							<i class="menu-icon fa fa-list-alt"></i>
							<span class="menu-text"> Consultas </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="formulario_historial_derivados.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Expedientes Derivados
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="formulario_historial_norecep.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Expedientes no Recepcionados
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="formulario_historial_recep.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Historial Recepcionados
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="formulario_recepcionados_carpetas.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Exp. Recepcionados con Atencion
								</a>

								<b class="arrow"></b>
							</li>
							
						</ul>
					</li>

					<li class="">
						<a href="" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Registro Interno </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>
												<ul class="submenu">
							<li class="">
								<a href="registrar_expediente_internos.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Registrar Internos
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="registrar_expediente_internos_multiple.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Registrar Internos Multiple
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="formulario_derivarinternos.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Derivar Documentos Internos
								</a>

								<b class="arrow"></b>
							</li>
							
							<li class="">
								<a href="registrar_sugerencias.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Registrar Sugerencias
								</a>

								<b class="arrow"></b>
							</li>

						</ul>
					</li>
					
					<li class="">
						<a href="" class="dropdown-toggle">
							<i class="menu-icon fa fa-picture-o"></i>
							<span class="menu-text"> Mant. de Carpetas </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>
						<ul class="submenu">
							<li class="">
								<a href="formulario_carpetas.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Crear Carpetas
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="formulario_mant_carpetas.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Eliminar o renombrar
								</a>

								<b class="arrow"></b>
							</li>

						</ul>
					</li>
					</ul>

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="principal.php">Inicio</a>
							</li>
							<li class="active">Principal</li>
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search" action="controlador.php?pagina=5" method="post">
								<span class="input-icon">
									<input type="text" name="busqueda" placeholder="Ingresar Expediente a Buscar ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>

					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="ace-settings-box clearfix" id="ace-settings-box">

							</div>	<!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								Recepci&oacute;n de Expedientes Multiples
								<small>
								<!--	<i class="ace-icon fa fa-angle-double-right"></i>-->
									
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
							<?php
							if(mysql_num_rows($result)>0) {
							echo "
							<form name=formderivar action=controlador.php?pagina=53 method=post>
							
							<table id=dynamic-table class=table table-striped table-bordered table-hover>";

 echo "
		<div class=clearfix>
		<div class=pull-right tableTools-container></div>
		</div>		
		<div class=table-header>
		Listado de Expedientes por Recepcionar
		<button class=btn btn-info type=submit>
		<i class=ace-icon fa fa-check bigger-110></i>
		Recepcionar
		</button>
		</div>
		<thead>
         <th class=center>
		 <label class=pos-rel>
			
			<span class=lbl></span>
			</label>
		 </th>
		 <th> EXPEDIENTE </th>
		 <th> DATOS REMITENTE </th>
         <th> PROVIENE </th>
		 
      </tr>
	  </thead>";

while($row=mysql_fetch_array($result))
{
 echo "
	<tbody>
	<tr>
         <td width=5% align='center'>  
		 <input type=checkbox name=expediente[] title=Seleccione para Recepcionar onClick='CambiaFilColor(this,this.id);' 
	   id=".$row[idexpediente]." value=".$row[idexpediente].">
		 </td>		
         <td width=10% align='center'> <a href=controlador.php?pagina=9&idexpediente=".$row[idexpediente].">".$row[idexpediente]."</a></td>
         <td width=45%><b>-Remitente:</b> ".$row[remitente]." <br><b>-Asunto: </b>".$row[asuntonotupa]." - ".$row[idtupa]." </td>
         <td width=45% class=hidden-480><b>-Proviene: ".$row[abrevareaenvia]."</b> <br><b>-Referencia: </b>".$row[referenciaenvio]." <br><b>-Doc.:</b> ".$row[detalledocumento]." - ".$row[numerodoc]." <br><b>-Fecha Mov.: </b>".$row[fecha_mov]." <br><b>-Folios:</b> ".$row[folenvio]." 
		 <br><b>-Usuario Mov.:</b> <a href=controlador.php?pagina=56&idexpediente=".$row[idusuario]."> ".$row[idusuario_mov]."</td>
      </tr>
	  </tbody>
	  ";
}
echo "</table> </form>";
}
else
{
    echo "<div class=page-header>
							<h1>
								
								<small>
								<!--	<i class=ace-icon fa fa-angle-double-right></i>-->
									No existen expedientes por mostrar
								</small>
							</h1>
						</div>";
}
mysql_close();

							?>

								</div>

								<!-- PAGE CONTENT BEGINS


								<div class="hr hr32 hr-dotted"></div>

								<div class="hr hr32 hr-dotted"></div> 

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
			<?php
				include("footer.php");
			?>
			<!--	<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Sistema de Tr&aacute;mite Documentario</span><br>
							Servicio Nacional de Metereolog&iacute;a e Hidrolog&iacute;a del Per&uacute; - SENAMHI &copy;<br>
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>
				</div>-->
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
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

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

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
