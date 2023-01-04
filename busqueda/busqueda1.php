<?php
/*
$connection_string= 'DRIVER={SQL Server}; SERVER=MSSQLSVR;DATABASE=pruebas';
$user = 'sa';
$pass = '1234567';
$connection=odbc_connect($connection_string,$sa,$pass);
$result = odbc_exec($connection,'select * from prueba');
while(odbc_fetch_row($result))
{
$var1=odbc_result($result,'usuario');
echo "Var1: " .$var1. "<br>";
}*/
$servername="localhost\MSSQLSERVER";
$connectioninfo = array("Database"=>"pruebas","UID"=>"sa","PWD"=>"1234567");
$con=sqlsrv_connect($servername,$connectioninfo);

if($con)
{
echo "Conexion extablecida.<br>";

}
else
{
echo "Conexion no se pudo establecer.<br>";
die(print_r(sqlsrv_errors(),true));
}
?>