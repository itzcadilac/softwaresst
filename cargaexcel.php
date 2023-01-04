<?php
include('importar/dbconect.php');
include('conf.php');
require_once('upload/php-excel-reader/excel_reader2.php');
require_once('upload/SpreadsheetReader.php');
session_start();
$BD = new ConexionDB();
//if (isset($_POST["import"]))
//{

$allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'cargas/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        echo "antes de for ";
        $sheetCount = count($Reader->sheets());
        echo $sheetCount;
        for($i=0;$i<$sheetCount;$i++)
        {
            
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {          
                $idesolcapac = "";
                if(isset($Row[0])) {
                    $idesolcapac = mysqli_real_escape_string($con,$Row[0]);
                    echo "idesolcapac: " .$idesolcapac. "</br>";
                }
                
                $idepersonal = "";
                if(isset($Row[1])) {
                    $idepersonal = mysqli_real_escape_string($con,$Row[1]);
                    echo "idepersonal: " .$idepersonal. "</br>";
                }
				
                $idecapacitacion = "";
                if(isset($Row[2])) {
                    $idecapacitacion = mysqli_real_escape_string($con,$Row[2]);
                    echo "idecapacitacion: " .$idecapacitacion. "</br>";
                }
				
                $estadocapac = "";
                if(isset($Row[3])) {
                    $estadocapac = mysqli_real_escape_string($con,$Row[3]);
                    echo "estadocapac: " .$estadocapac. "</br>";
                }

                $notacapac = "";
                if(isset($Row[4])) {
                    $notacapac = mysqli_real_escape_string($con,$Row[4]);
                    echo "notacapac: " .$notacapac. "</br>";
                }
                
                $feccapac = "";
                if(isset($Row[5])) {
                    $feccapac = mysqli_real_escape_string($con,date("Y-m-d H:i:s", $Row[5]));
                    //$var = $feccapac;
                    //$fechacapac = date_format("Y-m-d H:i:s", $feccapac);                  
                    echo "feccapac: " .$feccapac. "</br>";
                    //echo "var: " .$var. "</br>";
                    //echo "fechacapac: " .$fechacapac. "</br>";
                }	                
                
                if (!empty($idesolcapac) || !empty($idepersonal) || !empty($idecapacitacion) || !empty($estadocapac)) {
                    $BD->dbLink->Execute("BEGIN");
                        $query = "insert into histsolcal_personal(idesolcapac, idepersonal, idecapacitacion, estadocapac, notacapac,feccapac) 
                        values(".$idesolcapac.",".$idepersonal.",".$idecapacitacion.",".$estadocapac.",".$notacapac.",'".$feccapac."');";
                    $ret = $BD->dbLink->Execute($query);
                    echo "query: " .$query. "</br>";
                    //$resultados = mysqli_query($con, $query);
                    //$query->execute();
                    echo "notacapac: " .$resultados. "</br>";
                    if (!empty($ret)) {
                        echo "inserción correcta</br>";                        
                        $BD->dbLink->Execute("COMMIT");
                        //mysql_close();//echo 1;
                        //return 1;                        
                        $type = "success";
                        $message = "Excel importado correctamente";

                    } else {
                        echo "inserción errónea</br>";
                        $this->error=mysql_error();
                        $BD->dbLink->Execute("ROLLBACK");
                        //mysql_close();
                        //return 0;
                        $type = "error";
                        $message = "Hubo un problema al importar registros";

                    }
                }
             }
        
         }
  }
  else
  { 
        $type = "error";
        $message = "El archivo enviado es invalido. Por favor vuelva a intentarlo";
  }
//}
?>