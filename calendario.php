<?php
require_once "./conf.php";
header("Content-Type: text/html;charset=utf-8");
$tpl = new Plantilla();

$pagina = $_GET["pagina"];
session_start();
$tpl->assign("tipo", $_SESSION["tipo"]);
$tpl->assign("acceso", $_SESSION["acceso"]);

//controlar el tiempo de sesion
$se = new ValidacionDAO();
$vari = $se->TiempoSesion();

/* Abrimos la base de datos */
$conx = mysqli_connect($servid, $user, $passw, $bdsist);
if (!$conx) {
    die(
        "Error al abrir la base 
<br/>" . mysqli_error()
    );
}

//mysqli_select_db($bdsist,$conx) OR die("Connection Error to Database");
$sql1 = 'SET lc_time_names = "es_ES"';
$sql2 = 'SELECT 
tc.nombrecorto as nombrecorto,
cc.hora as hora,
YEAR(cc.hora) as anio,
MONTH(cc.hora)-1 as mes,
DAY(cc.hora) as dia,
HOUR(cc.hora) as horas,
MINUTE(cc.hora) as minuto, 
IFNULL(SUM(sc.numparticipantes),0) as numparticipantes
from calendcapacitaciones cc
INNER JOIN tipcapacitaciones tc on tc.idecapacitacion = cc.idecapacitacion
LEFT JOIN solicitudcapac sc on sc.idecalendcapacitaciones = cc.idecalendcapacitaciones
WHERE YEAR(cc.hora) > 2022
GROUP BY cc.idecalendcapacitaciones
ORDER BY cc.hora ASC';

($result1 = mysqli_query($conx, $sql1)) or die(mysqli_error());
($result2 = mysqli_query($conx, $sql2)) or die(mysqli_error());
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="UTF-8" />
    <title>Training Soft</title>
    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="assets/css/fullcalendar.min.css" />
		
		<!-- text fonts -->
		<link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
    	<script src="assets/js/ace-extra.min.js"></script>
  </head>
  <body class="no-skin"> 
	<?php include "cabecera_general.php"; ?> </div>
    <div class="main-container" id="main-container">
      <script type="text/javascript">
        try {
          ace.settings.check('main-container', 'fixed')
        } catch (e) {}
      </script> 
	  <?php include "menu.php"; ?> 
	<div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
              try {
                ace.settings.check('breadcrumbs', 'fixed')
              } catch (e) {}
            </script>
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="principal.php">Inicio</a>
              </li>
              <li class="active">Principal</li>
            </ul>
            <!-- /.breadcrumb -->
          </div>
          <div class="page-content">
            <div class="ace-settings-container" id="ace-settings-container">
              <div class="ace-settings-box clearfix" id="ace-settings-box"></div>
              <!-- /.ace-settings-box -->
            </div>
            <!-- /.ace-settings-container -->
            <div class="page-header">
              <h1> Calendario de Capacitaciones <small>
                  <!--	<i class="ace-icon fa fa-angle-double-right"></i>-->
                </small>
              </h1>
            </div>
            <!-- /.page-header -->
			<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="col-sm-9">
										<div class="space"></div>

										<div id="calendar"></div>
									</div>

								</div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
          </div>
        </div>
      </div>
	  </div>
      <div class="footer"> 
	<?php //include "footer.php"; ?> 
	</div>
      <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
      </a>
    </div>
    <script src="assets/js/jquery.2.1.1.min.js"></script>
    <script type="text/javascript">
      window.jQuery || document.write(" < script src = 'assets/js/jquery.min.js' > "+" < "+" / script > ");
    </script>
    <script type="text/javascript">
      if ('ontouchstart' in document.documentElement) document.write(" < script src = 'assets/js/jquery.mobile.custom.min.js' > "+" < "+" / script > ");
    </script>
    <script src="assets/js/bootstrap.min.js"></script>
	<!-- page specific plugin scripts -->
	<script src="assets/js/jquery-ui.custom.min.js"></script>
	<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/fullcalendar.min.js"></script>
	<script src="assets/js/bootbox.min.js"></script>

	<!-- ace scripts -->
	<script src="assets/js/ace-elements.min.js"></script>
	<script src="assets/js/ace.min.js"></script>
	<script src='locales/es.js'></script>
	
	<script type="text/javascript">
		jQuery(function($) {

	/* initialize the external events
	-----------------------------------------------------------------*/

	$('#external-events div.external-event').each(function() {

		// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
		// it doesn't need to have a start or end
		var eventObject = {
			title: $.trim($(this).text()) // use the element's text as the event title
		};

		// store the Event Object in the DOM element so we can get to it later
		$(this).data('eventObject', eventObject);

		// make the event draggable using jQuery UI
		$(this).draggable({
			zIndex: 999,
			revert: true,      // will cause the event to go back to its
			revertDuration: 0  //  original position after the drag
		});
		
	});




	/* initialize the calendar
	-----------------------------------------------------------------*/

	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();

	console.log(d);
	console.log(m);
	console.log(y);

	var calendar = $('#calendar').fullCalendar({
		//isRTL: true,
		 buttonHtml: {
			prev: '<i class="ace-icon fa fa-chevron-left"></i>',
			next: '<i class="ace-icon fa fa-chevron-right"></i>'
		},
	
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		events: [
		  /*
		  {
			title: 'All Day Event',
			start: new Date(y, m, 1),
			className: 'label-important'
		  },
		  {
			title: 'Long Event',
			start: moment().subtract(5, 'days').format('YYYY-MM-DD'),
			end: moment().subtract(1, 'days').format('YYYY-MM-DD'),
			className: 'label-success'
		  },
		  {
			title: 'Some Event',
			start: new Date(y, m, d-2, 16, 0),
			allDay: false,
			className: 'label-info'
		  },*/
		  <?php
       	  while($row = mysqli_fetch_array($result2)){ ?>
          {
          title: '<?php echo $row['nombrecorto']; ?>' + ' | Participantes: ' + '<?php echo $row['numparticipantes']; ?>',
          start: new Date( '<?php echo $row['anio']; ?>', '<?php echo $row['mes']; ?>', '<?php echo $row['dia']; ?>', '<?php echo $row['horas']; ?>', '<?php echo $row['minuto']; ?>' ),
		  allDay: false,
          className: 'label-info'
          },
        <?php } ?>

		]
		,
		editable: true,
		droppable: true, // this allows things to be dropped onto the calendar !!!
		drop: function(date, allDay) { // this function is called when something is dropped
		
			// retrieve the dropped element's stored Event Object
			var originalEventObject = $(this).data('eventObject');
			var $extraEventClass = $(this).attr('data-class');
			
			
			// we need to copy it, so that multiple events don't have a reference to the same object
			var copiedEventObject = $.extend({}, originalEventObject);
			
			// assign it the date that was reported
			copiedEventObject.start = date;
			copiedEventObject.allDay = allDay;
			if($extraEventClass) copiedEventObject['className'] = [$extraEventClass];
			
			// render the event on the calendar
			// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
			$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
			
			// is the "remove after drop" checkbox checked?
			if ($('#drop-remove').is(':checked')) {
				// if so, remove the element from the "Draggable Events" list
				$(this).remove();
			}
			
		}
		,
		selectable: true,
		selectHelper: true,
		select: function(start, end, allDay) {
			
			bootbox.prompt("New Event Title:", function(title) {
				if (title !== null) {
					calendar.fullCalendar('renderEvent',
						{
							title: title,
							start: start,
							end: end,
							allDay: allDay,
							className: 'label-info'
						},
						true // make the event "stick"
					);
				}
			});
			

			calendar.fullCalendar('unselect');
		}
		,
		eventClick: function(calEvent, jsEvent, view) {

			//display a modal
			var modal = 
			'<div class="modal fade">\
			  <div class="modal-dialog">\
			   <div class="modal-content">\
				 <div class="modal-body">\
				   <button type="button" class="close" data-dismiss="modal" style="margin-top:-10px;">&times;</button>\
				   <form class="no-margin">\
					  <label>Change event name &nbsp;</label>\
					  <input class="middle" autocomplete="off" type="text" value="' + calEvent.title + '" />\
					 <button type="submit" class="btn btn-sm btn-success"><i class="ace-icon fa fa-check"></i> Save</button>\
				   </form>\
				 </div>\
				 <div class="modal-footer">\
					<button type="button" class="btn btn-sm btn-danger" data-action="delete"><i class="ace-icon fa fa-trash-o"></i> Delete Event</button>\
					<button type="button" class="btn btn-sm" data-dismiss="modal"><i class="ace-icon fa fa-times"></i> Cancel</button>\
				 </div>\
			  </div>\
			 </div>\
			</div>';
		
		
			var modal = $(modal).appendTo('body');
			modal.find('form').on('submit', function(ev){
				ev.preventDefault();

				calEvent.title = $(this).find("input[type=text]").val();
				calendar.fullCalendar('updateEvent', calEvent);
				modal.modal("hide");
			});
			modal.find('button[data-action=delete]').on('click', function() {
				calendar.fullCalendar('removeEvents' , function(ev){
					return (ev._id == calEvent._id);
				})
				modal.modal("hide");
			});
			
			modal.modal('show').on('hidden', function(){
				modal.remove();
			});


			//console.log(calEvent.id);
			//console.log(jsEvent);
			//console.log(view);

			// change the border color just for fun
			//$(this).css('border-color', 'red');

		}
		
	});


})
		</script>

  </body>
</html>