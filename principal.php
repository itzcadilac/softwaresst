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

?>
<?php
$daosol= new SolicitudDAO();
/* Abrimos la base de datos */
  $conx = mysqli_connect($servid,$user,$passw,$bdsist);
  if (!$conx) die ("Error al abrir la base <br/>". mysqli_error()); 
  //mysqli_select_db($bdsist,$conx) OR die("Connection Error to Database");    
  $sql1='SET lc_time_names = "es_ES"';
  $sql='SELECT DATE_FORMAT(DATE_SUB(sl.feccreacion, INTERVAL 5 HOUR), "%W %d-%b-%Y %r") as feccrea, sl.razons as razonsocial, sl.ruc as rucs, pr.dscparametro as estadosol, pr.codparametro as codestado, DATE_FORMAT(DATE_SUB(sl.fechoraautorizacion, INTERVAL 5 HOUR), "%W %d-%b-%Y %r") as fechoraautoriza, cn.nombres as nombres_aut, cn.nro_personal as nro_personal, DATE_FORMAT(cal.hora, "%W %d-%b-%Y %r") as hora,tip.desccapacitacion, sl.*
  FROM solicitudcapac sl, autorizadores cn, parametro pr, calendcapacitaciones cal, tipcapacitaciones tip 
  WHERE sl.id_autorizador = cn.id_autorizador
	AND sl.idecalendcapacitaciones = cal.idecalendcapacitaciones
	AND cal.idecapacitacion = tip.idecapacitacion
  AND pr.idetipparametro = "TIP_ESTADOSOL"
  AND sl.estadosolic = pr.codparametro
  AND sl.estadosolic in (1,2,4,5,6)
  UNION
  SELECT DATE_FORMAT(DATE_SUB(sl.feccreacion, INTERVAL 5 HOUR), "%W %d-%b-%Y %r") as feccrea,cn.razonsocial as razonsocial, cn.ruc as rucs, pr.dscparametro as estadosol, pr.codparametro as codestado, DATE_FORMAT(DATE_SUB(sl.fechoraautorizacion, INTERVAL 5 HOUR), "%W %d-%b-%Y %r") as fechoraautoriza, aut.nombres as nombres_aut, aut.nro_personal as nro_personal, DATE_FORMAT(cal.hora, "%W %d-%b-%Y %r") as hora, tip.desccapacitacion, sl.*
  FROM solicitudcapac sl, contratista cn, parametro pr, autorizadores aut, calendcapacitaciones cal, tipcapacitaciones tip
  WHERE sl.idecontratista = cn.idecontratista
	AND sl.id_autorizador = aut.id_autorizador
	AND sl.idecalendcapacitaciones = cal.idecalendcapacitaciones
	AND cal.idecapacitacion = tip.idecapacitacion
  AND pr.idetipparametro = "TIP_ESTADOSOL"
  AND sl.estadosolic = pr.codparametro
  AND sl.estadosolic in (1,2,4,5,6)
  ORDER BY idesolicitud DESC;';
 
$result1= mysqli_query($conx,$sql1) or die(mysqli_error());
$result= mysqli_query($conx,$sql) or die(mysqli_error());

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="UTF-8" />
		<title>Sistema de Capacitaciones</title>
		<link rel="icon" type="image/png" href="./imagenes/logo.png">
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

		</div>
		<?php
				include("menu.php");
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
								<a href="principal.php">Inicio</a>
							</li>
							<li class="active">Principal</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="ace-settings-box clearfix" id="ace-settings-box">

							</div>	<!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								Listado de Solicitudes
								<small>
									
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
										<?php
										if(mysqli_num_rows($result)>0) {
										echo "
										<form name=formderivar action=controlador.php?pagina=2 method=post>
										<table id='simple-table' class='table table-striped table-bordered table-hover'>";
										echo "
												<div class=clearfix>
												<div class=pull-right tableTools-container></div>
												</div>		
												<div class=table-header>
												<button class=btn btn-info type=submit>
												<i class=ace-icon fa fa-check bigger-110></i>
												Aprobar Solicitudes
												</button>
												</div>
												<thead>
												<tr>
												<th width='2%' class=center>
												<label class=pos-rel>
													
													<span class=lbl></span>
													</label>
												</th>
												<th width='2%'> ID </th>
												<th width='40%'> SOLICITUD </th>
												<th width='40%'> DETALLE </th>			 
												<th width='16%'> </th>
												</tr>
												</thead>";

										while($row=mysqli_fetch_array($result))
										{
										echo "
											<tbody>
											<tr>
												<td align='center'>";
												if($row[codestado]==5) {}
												else if ($row[codestado]==6) {
												echo "<input type=checkbox name=expediente[] title=Seleccione para Aprobar onClick='CambiaFilColor(this,this.id);'
													id=".$row[idesolicitud]." value=".$row[idesolicitud].">";
												}
												echo "</td>
												
												<td align='center'> 
												<a href=controlador.php?pagina=9&idexpediente=".$row[idesolicitud].">".$row[idesolicitud]."</a>
												</td>
												
												<td align='left'>
												<b>-RUC:</b> ".$row[rucs]." <br>
												<b>-Contratista:</b> ".$row[razonsocial]." <br>
												<b>-Participantes: </b>".$row[numparticipantes]." <br>
												<b>-Celular: </b>".$row[numcontacto]." <br>
												<b>-Correo:</b> ".$row[correo]." <br>	 
												<b>-Fecha y Hora de Registro Solicitud: </b>".$row[feccrea]." <br>
												</td>
												
												<td align='left'>
												<b>-Estado: </b>".$row[estadosol]." <br>
												<b>-Tipo Capacitación: </b>".$row[desccapacitacion]." <br>
												<b>-Fecha y Hora Seleccionada: </b>".$row[hora]." <br>
												<b>-Datos Autorizador: </b>".$row[nombres_aut]." <br>
												<b>-Código Personal: </b>".$row[nro_personal]." <br>
												<b>-Fecha y Hora Autorización: </b>".$row[fechoraautoriza]." 
												</td>
												<td>";
												if($row[codestado]==5) {}
												else if ($row[codestado]==6) {
												echo "<input type=button value='Rechazar Solicitud' onclick=cancelar('controlador.php?pagina=8&idesolicitud=".$row[idesolicitud]."');>";}"
												
												</td>
											</tr>
											</tbody>
											";
										}
										echo "</table> </form><br>";
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
										mysqli_close($conx);
										?>
								</div>
							</div><!-- /.col -->
						</div><!-- /.row -->
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
