<?php
session_start();
require_once "./conf.php";

$daosol = new SolicitudDAO();

$BD = new ConexionDB();
$BD->dbLink->Execute("BEGIN");

$horario = $_POST['horario_r'];
$autorizador = $_POST['idAutorizador'];

$query="SELECT tip.desccapacitacion, cal.hora FROM tipcapacitaciones tip, calendcapacitaciones cal WHERE tip.idecapacitacion = cal.idecapacitacion AND cal.idecalendcapacitaciones='$horario'";
$recordSet = $BD->dbLink->Execute($query);
$fila=$recordSet->FetchRow();
//$idesolicitud=$fila['idesolicitud'];
$desccapacitacion=$fila['desccapacitacion'];
$horario=$fila['hora'];

if($_POST['idAutorizador'] <> null){

    $query1="SELECT aut.correo_autorizador, aut.nombres FROM autorizadores aut WHERE aut.id_autorizador='$autorizador'";
    $recordSet1 = $BD->dbLink->Execute($query1);
    $fila1=$recordSet1->FetchRow();
    //$idesolicitud=$fila['idesolicitud'];
    $correo_autorizador=$fila1['correo_autorizador'];
    $nombres=$fila1['nombres'];

}

if (!$recordSet){
    $this->error=mysql_error();
        $BD->dbLink->Execute("ROLLBACK");
        //mysql_close();
        return 0;
}
$BD->dbLink->Execute("COMMIT");
// mysql_close();//echo 1;
 //return 1;


$capacitaciones = implode(',',$_POST['tipcapacitaciones']);

$_SESSION['tipcapacitaciones'] = $desccapacitacion;
$_SESSION['numpart'] = $_POST['numpart'];
$_SESSION['horario'] = $horario;
$_SESSION['email'] = $_POST['email'];
$_SESSION['numcontac'] = $_POST['numcontac'];
$_SESSION['razons'] = $_POST['razons'];
$_SESSION['numruc'] = $_POST['numruc'];
$_SESSION['nombres'] = $_POST['nombres'];
$_SESSION['correo_destino'] = $correo_autorizador;//entrenamiento@sstasesores.pe
$_SESSION['idAutorizador'] = $_POST['idAutorizador'];

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
header ("Location: registrarcapacitacionc.php");
          
?>