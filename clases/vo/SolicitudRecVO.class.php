<?php

class SolicitudRecVO{
  var $idreclamacion;
  var $nombre;
  var $apellido;
  var $direccion;
  var $email;
  var $numcontac;
  var $empresa;
  var $numdoc;
  var $idtiposervicio;
  var $tipreclamo;
  var $descripcion;

  function SolicitudRecVO(
     $idreclamacion,
     $nombre,
     $apellido,
     $direccion,
     $email,
     $numcontac,
     $empresa,
     $numdoc,
     $idtiposervicio,
     $tipreclamo,
     $descripcion
  ){
    $this->idreclamacion = $idreclamacion;
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->direccion = $direccion;
    $this->email = $email;
    $this->numcontac = $numcontac;
    $this->empresa = $empresa;
    $this->numdoc = $numdoc;
    $this->idtiposervicio = $idtiposervicio;
    $this->tipreclamo = $tipreclamo;
    $this->descripcion = $descripcion;

  }
}
?>