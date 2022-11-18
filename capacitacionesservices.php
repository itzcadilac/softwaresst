<?php
session_start();
require_once "./conf.php";

$daosol = new CapacitacionDAO();

$solVO = new CapacitacionVO(
    $_POST['tipcapacitacion'],
    "",
    "",
    "",
    $_POST['trainer'],
    "");

$daosol->RegistrarCapacitacion($solVO);

header ("Location: registrarcapacitaciones.php");
           
         
?>