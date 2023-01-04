<?php

$cn = mysql_connect("localhost","jhan","") or die ("No es posible conectar");
mysql_select_db("tienda",$cn);


echo "<form action='soloprueba.php' method='post'>";
echo "Buscar Nombre <br><input name='busqueda' type='text' style='width:450px'><br><input type='submit' value='Consultar'>";
echo "</form>";

if (isset($_POST['busqueda'])){

   $query = "SELECT mg_apnm,MATCH(mg_apnm) AGAINST('".$_POST['busqueda']."') as 'score' FROM datos WHERE MATCH(mg_apnm) AGAINST('".$_POST['busqueda']."') ORDER BY score DESC";
   $result = mysql_query($query,$cn);
   $numreg = mysql_num_rows($result);
   $sw=true;

   echo "<table border='1' width='100%'>";
   echo "<tr><td style='font-family:verdana' align='center'><h2>REGISTROS ENCONTRADOS : ".$numreg."</h2></td></tr>";
   while ($row = mysql_fetch_array($result)){
   if ($sw==true){
      $colo="#ffffff";
      $sw=false;
   }else{
      $colo="#98D4FF";
      $sw=true;
   }
   echo "<tr style='font-size:12px;font-family:verdana;background:".$colo."'><td>";
   echo $row['mg_apnm'];
   echo "</td></tr>";
   }
echo "</table>";
   
}
?>