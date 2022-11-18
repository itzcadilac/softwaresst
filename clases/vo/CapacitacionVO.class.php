<?php

class CapacitacionVO{
  var $idecalendcapacitaciones;
  var $idecapacitacion;
  var $fecha;
  var $hora;
  var $idecapacitador;
  var $cupos;
  

  function CapacitacionVO(
    $idecalendcapacitaciones,
    $idecapacitacion,
    $fecha,
    $hora,
    $idecapacitador,
    $cupos
  ){
    $this->idecalendcapacitaciones = $idecalendcapacitaciones;
    $this->idecapacitacion = $idecapacitacion;
    $this->fecha = $fecha;
    $this->hora = $hora;
    $this->idecapacitador = $idecapacitador;
    $this->cupos = $cupos;
  }
}
?>