<?php
// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
// Introducimos HTML de prueba
$v1=$_GET['variable1'];
$html = '
<head>

<style>   
      body{
        font-family: Myriad Pro;
      }
</style>

</head>

<body>
<div style="position: fixed; left: 0px; top: 5px; right: 0px; bottom: 0px; text-align: center;z-index: -1000; ">
  <img src="certifi.jpg" style="width: 1085px;">
</div>
<div style="color: black; opacity: 1">
  <p style="margin-bottom: 10px;margin-top: 214px;font-size: 26px;text-align: center;font-weight: 700;"><strong>INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC</strong></p>
  <p style="margin-top: 0px;font-size: 33px;margin-bottom: 23px;margin-left: 310px;">RIMARI ARISTA, MIGUEL ANGEL</p>
  <p style="margin-top: 0px;font-size: 14px;margin-left: 516px;font-weight: 700;">' .$v1.  ' - NIVEL 1 </p>
  <p style="margin-top: 94px;font-size: 18px;text-align: center;">Desarrollado el 05 de Diciembre de 2019, en Lima con una duraci&oacute;n de 04 horas acad&eacute;micas.</p>
  <p style="margin-top: 33px;font-size: 15px;text-align: center;">TA - 40820192 - 0512</p>
</div>

</body>
';
 
// Instanciamos un objeto de la clase DOMPDF.
$pdf = new DOMPDF();
 
// Definimos el tamaño y orientación del papel que queremos.
$pdf->set_paper("A4", "landscape");
 
// Cargamos el contenido HTML.
$pdf->load_html(utf8_decode($html));
 
// Renderizamos el documento PDF.
$pdf->render();
 
// Enviamos el fichero PDF al navegador.
$pdf->stream('Certificado.pdf');