<?php
session_start();
require_once "./conf.php";

$daosol = new SolicitudRecDAO();

$solVO = new SolicitudRecVO("",
                        $_POST['nombre'],
                        $_POST['apellido'],
                        $_POST['direccion'],
                        $_POST['email'],
                        $_POST['numcontac'],
                        $_POST['empresa'],
                        $_POST['numdoc'],
                        $_POST['tipservicio'],
                        $_POST['tipreclamo'],
                        $_POST['descripcion']
                        );

$daosol->RegistrarSolicitud($solVO);

/*
if($_POST['idAutorizador'] == null){
    include  './contactos/contact.php';
    include  './contactos/contactsst_otro.php';
}
else {
    include  './contactos/contactaut.php';
    include  './contactos/contact.php';
    include  './contactos/contactsst_nestle.php';
}
*/

sleep(3);

header ("Location: registroreclamacion.php");
          
?>