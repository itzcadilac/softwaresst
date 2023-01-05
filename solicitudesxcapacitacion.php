<?php
require_once "./conf.php";
header("Content-Type: text/html;charset=utf-8");
$tpl = new Plantilla();

$pagina = $_GET['pagina'];
session_start();
$tpl->assign('tipo', $_SESSION['tipo']);
$tpl->assign('acceso', $_SESSION['acceso']);

//controlar el tiempo de sesion
$se = new ValidacionDAO();
$vari = $se->TiempoSesion();

/* Abrimos la base de datos */
$conx = mysqli_connect($servid, $user, $passw, $bdsist);
if (!$conx) {
    die("Error al abrir la base <br/>" . mysqli_error());
}

//mysqli_select_db($bdsist,$conx) OR die("Connection Error to Database");
$sql1 = 'SET lc_time_names = "es_ES"';
$sql2 = 'SELECT tc.desccapacitacion as desccapacitacion,
cc.hora as hora,
concat(cp.apepaterno, " ", cp.apematerno, ", ", cp.nombres) as nombresape,
cc.cupos as cupos,
cc.cuposdispo as cuposdispo
FROM calendcapacitaciones cc
INNER JOIN tipcapacitaciones tc on cc.idecapacitacion = tc.idecapacitacion
LEFT JOIN capacitador cp on cc.idecapacitador = cp.idecapacitador
ORDER BY idecalendcapacitaciones DESC';

$result1 = mysqli_query($conx, $sql1) or die(mysqli_error());
$result2 = mysqli_query($conx, $sql2) or die(mysqli_error());

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


		<script src="assets/js/ace-extra.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

	</head>

	<body class="no-skin">
	<?php
include "cabecera_general.php";
?>
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
		<?php
include "menu.php";
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
								Agendar Capacitaciones
								<small>
								<!--	<i class="ace-icon fa fa-angle-double-right"></i>-->

								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">


<script type="text/javascript">

window.onload = function() {
  var myInput = document.getElementById('form-field-1');
  myInput.onpaste = function(e) {
    e.preventDefault();
    alert("esta acción está prohibida");
  }
  
  myInput.oncopy = function(e) {
    e.preventDefault();
    alert("esta acción está prohibida");
  }
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

function spacio(e){
	tecla=(document.all) ? e.keyCode : e.which;
	return tecla!=32;
}
</script>

<form class="form-horizontal" role="form" id="frm" name="formregistrar" action="agendarservices.php" method="post" enctype="multipart/form-data">
<script language="javascript">
   function solonumero(e){
var keynum = window.event ? window.event.keyCode : e.which;
if((keynum==8) || (keynum==46))
return true;

return /\d/.test(String.fromCharCode(keynum));
}

</script>

							<div class="form-group">
							<fieldset >
							<div id="resultcontra" >
							</div>
							</fieldset>
							</div>

							<div class="clearfix form-actions">
							<div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tipo de Capacitación:  </label>

<?php
$conexion = @new mysqli($servid, $user, $passw, $bdsist);

if ($conexion->connect_error) //verificamos si hubo un error al conectar, recuerden que pusimos el @ para evitarlo
{
    die('Error de conexión: ' . $conexion->connect_error); //si hay un error termina la aplicación y mostramos el error
}
mysqli_set_charset($conexion, 'utf8');
$sql = "SELECT * from tipcapacitaciones where estado = 1";
$result = $conexion->query($sql); //usamos la conexion para dar un resultado a la variable

if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
    $combobit = "<option value=''></option>";
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $combobit .= " <option value='" . $row['idecapacitacion'] . "'>" . $row['desccapacitacion'] . "</option>"; //concatenamos el los options para luego ser insertado en el HTML
    }
} else {
    echo "";
}

$conexion->close();
?>
             <div class="col-sm-9">
                <select class="chosen-select form-control" id="tipcapacitaciones" name="tipcapacitaciones" id="form-field-select-3" data-placeholder="Seleccione la capacitación" required>
                  <?php echo $combobit; ?>
                </select>
              </div>

              </div>
			  <div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Elige el horario:</label>

							<div class="col-sm-9" id="content_horario">
								<select class="form-control" name="horario_r" id="horario_r" required>	
								<option value="0">---Seleccione---</option>							
								</select>
							</div>
			   </div>
					</div>
						
					</form>

					<script>
							$(function(){

								$('#tipcapacitaciones').on('change', function(){
								var tipcapacitaciones = $('#tipcapacitaciones').val();
								var url = 'busquedahorarios.php';
								var text = ''
								//$('.ajaxgif').removeClass('hide');
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
									output.push(`<option value="${item.idecalendcapacitaciones}">${item.hora}</option>`);				
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
								var url = 'busquedasolicxcapac.php';
								var text = ''
								$.ajax({
								type:'POST',
								url:url,
								data:'horario='+horario,
								success: function(response){
									var datos = JSON.parse(response);
									
									var output = 
									['<table id=simple-table class=table table-striped table-bordered table-hover><div class=clearfix><div class=pull-right tableTools-container></div></div><div class=table-header> Capacitaciones Agendadas</div><thead>	<tr><th width=5%> IDESOLICITUD </th><th width=20%> RAZÓN SOCIAL </th>		<th width=12%> RUC </th>		<th width=5%> NRO. PARTICIPANTES </th>		<th width=30%> CAPACITACIÓN </th>		<th width=20%> HORARIO </th>	</tr></thead><tbody> ']
									datos.data.forEach(item => {
									//output.push(`<option value="${item.idecalendcapacitaciones}">${item.hora}</option>`);
									output.push(`<tr><td>${item.idesolicitud}</td><td>${item.razons}</td><td>${item.ruc}</td><td>${item.numparticipantes}</td><td>${item.desccapacitacion}</td><td>${item.hora}</td></tr>`);
									});
									output.push = ['</tbody></table>']
									console.log($('#table1').get(0));
									$('#table1').get(0).innerHTML = output.join('');
								}
								});
								return false;
								});
							});
					</script>	
								<div class="hr hr32 hr-dotted"></div>
								<div id="table1"></div>
								<div class="hr hr32 hr-dotted"></div>

							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="footer">
			<?php
include "footer.php";
?>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div>
		<script src="assets/js/jquery.2.1.1.min.js"></script>
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
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
		<script type="text/javascript">
			jQuery(function($) {
			$('.date-picker').datepicker({
				format: 'yyyy-mm-dd',
				autoclose: true,
				todayHighlight: true,
			}).next().on(ace.click_event, function(){
				$(this).prev().focus();
			});

        $('#timepicker1').timepicker({
					timeFormat: "HH:mm:ss",
					minuteStep: 1,
					showSeconds: true,
					showMeridian: false
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
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

				if(!ace.vars['touch']) {
					$('.chosen-select').chosen({allow_single_deselect:true});
					//resize the chosen on window resize

					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					}).trigger('resize.chosen');
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if(event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					});


					$('#chosen-multiple-style .btn').on('click', function(e){
						var target = $(this).find('input[type=radio]');
						var which = parseInt(target.val());
						if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
						 else $('#form-field-select-4').removeClass('tag-input-style');
					});
				}

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
			  /*
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
			 drawPieChart(placeholder, data);*/

			 /**
			 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			 so that's not needed actually.
			 */
			 placeholder.data('chart', data);
			 //placeholder.data('draw', drawPieChart);


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

				/*
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
				});*/


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

				//chosen plugin inside a modal will have a zero width because the select element is originally hidden
				//and its width cannot be determined.
				//so we set the width after modal is show
				$('#modal-form').on('shown.bs.modal', function () {
					if(!ace.vars['touch']) {
						$(this).find('.chosen-container').each(function(){
							$(this).find('a:first-child').css('width' , '210px');
							$(this).find('.chosen-drop').css('width' , '210px');
							$(this).find('.chosen-search input').css('width' , '200px');
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
