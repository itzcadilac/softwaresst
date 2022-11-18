<?php

class SolicitudVO{
  var $idesolicitud;
  var $idecontratista;
  var $numparticipantes;
  var $numcontacto;
  var $correo;
  var $idetipopago;
  var $estadosolic;
  var $numoperpago;
  var $fechapago;
  var $horapago;
  var $idecapacitaciones;
  var $ideempresa;
  var $ruc;
  var $razons;
  var $idAutorizador;
  var $horario_r;
  var $cuposdispo;

  function SolicitudVO(
    $idesolicitud,
    $idecontratista,
    $numparticipantes,
    $numcontacto,
    $correo,
    $idetipopago,
    $estadosolic,
    $numoperpago,
    $fechapago,
    $horapago,
    $idecapacitaciones,
    $ideempresa,
    $ruc,
    $razons,
    $idAutorizador,
    $horario_r,
    $cuposdispo
  ){
    $this->idesolicitud = $idesolicitud;
    $this->idecontratista = $idecontratista;
    $this->numparticipantes = $numparticipantes;
    $this->numcontacto = $numcontacto;
    $this->correo = $correo;
    $this->idetipopago = $idetipopago;
    $this->estadosolic = $estadosolic;
    $this->numoperpago = $numoperpago;
    $this->fechapago = $fechapago;
    $this->horapago = $horapago;
    $this->idecapacitaciones = $idecapacitaciones;
    $this->ideempresa = $ideempresa;
    $this->ruc = $ruc;
    $this->razons = $razons;
    $this->idAutorizador = $idAutorizador;
    $this->horario_r = $horario_r;
    $this->cuposdispo = $cuposdispo;
  }
}
?>