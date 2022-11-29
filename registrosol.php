<?php
session_start();
require_once "./conf.php";
require_once "./busquedacupos2.php";

$daosol = new SolicitudDAO();

$BD = new ConexionDB();

$horario = $_POST['horario_r'];
$autorizador = $_POST['idAutorizador'];
$cuposdispo = $_POST['cuposdispo'];
$numeropart = $_POST['numpart'];

$cantdispo = 0;
//var horario = intval($horario);
//console.log(horario);
?>
<script>
$(function(){

var horarios = $_POST['horario_r'];
var url = 'busquedacupos2.php';
var text = ''
//$('.ajaxgif').removeClass('hide');
$.ajax({
type:'POST',
url:url,
data:'horarios='+horarios,
success: function(response){
    //$('.ajaxgif').addClass('hide');
    var datos = JSON.parse(response);
    datos.data.forEach(item => {
    $cantdispo += `${item.cuposdispo}`
    
    });
}
});

});
<script>

<?php

if($cantdispo < $numeropart){

    header ("Location: registrosolicitud.php");

}

else {
/*
print "variable horario: ";
print $horario;
print "variable autorizador: ";
print $autorizador;
*/


$query1="SELECT tip.desccapacitacion, cal.hora FROM tipcapacitaciones tip, calendcapacitaciones cal WHERE tip.idecapacitacion = cal.idecapacitacion AND cal.idecalendcapacitaciones='$horario'";

if ($recordSet = $BD->ejecutar($query1)){
    while ($fila = $recordSet->fetch_assoc()) {
        $desccapacitacion=$fila['desccapacitacion'];
        $horario=$fila['hora'];
    }

    $recordSet->close();
}

if($_POST['idAutorizador'] <> null){

    $query2="SELECT aut.correo_autorizador, aut.nombres FROM autorizadores aut WHERE aut.id_autorizador='$autorizador'";
    if ($recordSet1 = $BD->ejecutar($query2)){
        while ($fila1 = $recordSet1->fetch_assoc()) {
            $correo_autorizador=$fila1['correo_autorizador'];
            $nombres=$fila1['nombres'];
        }
    
        $recordSet1->close();
    }

}

$capacitaciones = implode(',',$_POST['tipcapacitaciones']);

//print "Capacitaciones: ";
//print $capacitaciones;

$_SESSION['tipcapacitaciones'] = $desccapacitacion;
$_SESSION['numpart'] = $_POST['numpart'];
$_SESSION['horario'] = $horario;
$_SESSION['email'] = $_POST['email'];
$_SESSION['numcontac'] = $_POST['numcontac'];
$_SESSION['razons'] = $_POST['razons'];
$_SESSION['numruc'] = $_POST['numruc'];
$_SESSION['nombres'] = $_POST['nombres'];
$_SESSION['correo_destino'] = $correo_autorizador;
$_SESSION['idAutorizador'] = $_POST['idAutorizador'];
$_SESSION['nombre_aut'] = $nombres;

$solVO = new SolicitudVO("",
                        $_POST['idecontratista'],
                        $_POST['numpart'],
                        $_POST['numcontac'],
                        $_POST['email'],
                        $_POST['tippago'],
                        "",
                        "",
                        "",
                        "",
                        $capacitaciones,
                        $_POST['contratista'],
                        $_POST['numruc'],
                        $_POST['razons'],
                        $_POST['idAutorizador'],
                        $_POST['horario_r'],
                        $_POST['cuposdispo']
                        );

$daosol->RegistrarSolicitud($solVO, $_POST['tipcapacitaciones']);

if($_POST['idAutorizador'] == null){
    include  './contactos/contact.php';
    include  './contactos/contactsst_otro.php';
}
else {
    include  './contactos/contactaut.php';
    include  './contactos/contact.php';
    include  './contactos/contactsst_nestle.php';
}
header ("Location: registrosolicitud.php");

}

?>