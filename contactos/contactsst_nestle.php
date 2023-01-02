<?php

// configure
$from = 'SST Asesores S.A.C. <entrenamiento@sstasesores.pe>';
$sendTo = 'SST Asesores S.A.C. <info@sstasesores.pe>'; //<ventas@novoexpert.net>; // Add Your Email
$subject = 'Solicitud Recibida';
//$fields = array('name' => 'Nombres', 'subject' => 'Asunto', 'email' => 'Correo', 'message' => 'Mensaje'); // array variable name => Text to appear in the email
//$okMessage = 'Tu Solicitud fue enviada con éxito, muy pronto estaremos en contacto con Ud.';
//$errorMessage = 'Ha ocurrido un error mientras se realizaba el envío del formulario, intente de nuevo por favor.';

// let's do the sending
$htmlcontent = "
<html xmlns='http://www.w3.org/1999/xhtml'>

<head>
  <!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
  <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
  <title>SST Asesores SAC</title>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <link rel='stylesheet' href='https://software.sstasesores.pe/assets/css/contact.css' />

</head>

<body width='100%' style='margin:0; padding:0 !important;'>
  <table role='presentation' cellspacing='0' cellpadding='0' align='center' border='0'>
    <tbody>
      <tr>
        <td width='600'>
          <table role='presentation' cellspacing='0' cellpadding='0' align='center' border='0' style='width: 100%;'>
            <tbody>
              <tr>
                <td style='background:#ffffffb0; padding: 0 0 0 10%; font-family: Arial, Helvetica, sans-serif;'>
                  <table role='presentation' cellspacing='0' cellpadding='0' align='center' border='0'
                    style='width: 100%;'>
                    <tbody>
                      <tr>
                        <!--<td style='padding: 23px 0 43px;'>
                          <img src=''
                            style='display: block; border: 0; width: 100px;'>
                        </td>-->
                      </tr>
                    </tbody>
                  </table>
                  <br>
                  <table align='left' width='280' role='presentation' cellspacing='0' cellpadding='0' border='0'>
                    <tbody>
                      <tr>
                        <td style='font-family: Arial, Helvetica, sans-serif; color: #000000;'>
                          <span style='font-size: 18px; line-height: 28px;'><strong>".$_SESSION['razons']."</strong></span>
                          <p style='margin: 10px 0 24px; font-size: 24px; line-height: 36px;'>
                            Ha enviado una nueva Solicitud para Capacitación con Código: ".$_SESSION['idesolicitud_correo']."
                          </p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <table align='right' width='224' role='presentation' cellspacing='0' cellpadding='0' border='0'>
                    <tbody>
                      <tr>
                        <td style='font-family: Arial, Helvetica, sans-serif; color: #ffffff; padding-top: 20px;'>
                          <img src='https://software.sstasesores.pe/imagenes/logo.png' width=210 height=117'
                            style='display: block; border: 0; width: 210px;'>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
          <table role='presentation' cellspacing='0' cellpadding='0' align='center' border='0' style='width: 100%;'>
            <tbody>
              <tr>
                <td style='padding: 0 10%; font-family: Arial, Helvetica, sans-serif; color: #494F66;'>
                  <p style='margin: 48px 0 24px; font-size: 24px; line-height: 36px;'>Información de la Solicitud</p>

                  <table role='presentation' cellspacing='0' cellpadding='0' align='center' border='0'
                    style='width: 100%; font-size: 16px;'>
                    <tbody>
                    <tr>
                    <td class='td-table-detalle-left'>
                      <span style='font-weight: bold;'>Empresa:</span>
                    </td>
                    <td class='td-table-detalle-rigth'>
                    ".$_SESSION['razons']."
                    </td>
                  </tr>
                    <tr>
                    <td class='td-table-detalle-left'>
                      <span style='font-weight: bold;'>Nro. Documento:</span>
                    </td>
                    <td class='td-table-detalle-rigth'>
                    ".$_SESSION['numruc']."
                    </td>
                  </tr>                      
                      <tr>
                        <td class='td-table-detalle-left'>
                          <span style='font-weight: bold;'>Capacitación Solicitada:</span>
                        </td>
                        <td class='td-table-detalle-rigth'>
                        ".$_SESSION['tipcapacitaciones']."
                        </td>
                      </tr>
                      <tr>
                        <td class='td-table-detalle-left'>
                          <span style='font-weight: bold;'>Nro. Participantes:</span>
                        </td>
                        <td class='td-table-detalle-rigth'>
                        ".$_SESSION['numpart']."
                        </td>
                      </tr>
					            <tr>
                        <td class='td-table-detalle-left'>
                          <span style='font-weight: bold;'>Fecha y Hora Seleccionada:</span>
                        </td>
                        <td class='td-table-detalle-rigth'>
                        ".$_SESSION['horario']."
                        </td>
                      </tr>
					            <tr>
                        <td class='td-table-detalle-left'>
                          <span style='font-weight: bold;'>Correo de Contacto Registrado:</span>
                        </td>
                        <td class='td-table-detalle-rigth'>
                          ".$_SESSION['email']."
                        </td>
                      </tr>
					            <tr>
                        <td class='td-table-detalle-left'>
                          <span style='font-weight: bold;'>Nro. de Contacto Registrado:</span>
                        </td>
                        <td class='td-table-detalle-rigth'>
                        ".$_SESSION['numcontac']."
                        </td>
                      </tr>
                      <tr>
                      <td class='td-table-detalle-left'>
                        <span style='font-weight: bold;'>Datos Autorizador:</span>
                      </td>
                      <td class='td-table-detalle-rigth'>
                      ".$_SESSION['nombres']."
                      </td>
                      </tr>
                      <tr>
                        <td colspan='2'>
                          <table style='background: #FFEFD8;border-radius: 8px;padding: 16px 16px;margin: 48px 0 40px;'>
                            <tbody>
                              <tr
                                style='font-size: 12px;line-height: 20px;letter-spacing: 0.2px;color: #494F66; vertical-align: top;'>
                                <!--<td width='10%'>
                                  <img src='https://d9qyalbzw6vxq.cloudfront.net/ic_warning.png'
                                    style='display: block; border: 0; width: 20px;'>
                                </td>-->
                                <td>
                                 Recuerda que, debes esperar que autoricen la solicitud para poder aprobarla.
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>

          <table role='presentation' cellspacing='0' cellpadding='0' align='center' border='0' style='width: 100%;'>
            <tbody>
              <tr>
                <td style='padding: 15px 10% 0; font-family: Arial, Helvetica, sans-serif; color: #494F66; 
            background: #F0F2FA; vertical-align: top; font-size: 10px; line-height: 18px;'>
                  Para mayor información contactarse al siguiente correo:
                  <a href='mailto:entrenamiento@sstasesores.pe'
                    style='color:#939DFF; text-decoration: none;'>entrenamiento@sstasesores.pe</a>

                  <p style='margin:20px 0 32px'>© 2020 SST ASESORES S.A.C. Todos los Derechos Reservados.</p>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>


</body>

</html>
";


try
{
    $emailText = $htmlcontent;
/*
    foreach ($_POST as $key => $value) {

        if (isset($fields[$key])) {
            $emailText .= "$fields[$key]: $value\n";
        }
    }
*/
    $headers = array('Content-Type: text/html; charset="UTF-8";',
        'From: ' . $from,
        'Reply-To: ' . $from,
        'Return-Path: ' . $from
    );
    
    mail($sendTo, $subject, $emailText, implode("\n", $headers));

    //$responseArray = array('type' => 'success', 'message' => $okMessage);
}
catch (\Exception $e)
{
    //$responseArray = array('type' => 'danger', 'message' => $errorMessage);
}
/*
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);

    header('Content-Type: application/json');

    echo $encoded;
}
else {
    echo $responseArray['message'];
}*/
