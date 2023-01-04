<?php
    //require_once "./conf.php";
	$db_host="localhost";
	$db_name="sstasesores";
	$db_user="root";
	$db_pass="vida1608";
    $archivo=$_FILES['file']['name'];
    include 'simplexlsx.class.php';
    $xlsx = new SimpleXLSX( $archivo );
    try {
       $conn = new PDO( "mysql:host=$db_host;dbname=$db_name", "$db_user", "$db_pass");
       $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }
    $stmt = $conn->prepare( "INSERT INTO histsolcal_personal (idesolcapac, idepersonal, idecapacitacion, estadocapac,notacapac) VALUES (?, ?, ?, ?, ?)");
    $stmt->bindParam( 1, $idesolcapac);
    $stmt->bindParam( 2, $idepersonal);
    $stmt->bindParam( 3, $idecapacitacion);
    $stmt->bindParam( 4, $estadocapac);
    $stmt->bindParam( 5, $notacapac);
    //$stmt->bindParam( 6, $feccapac);
    foreach ($xlsx->rows() as $fields)
    {
        $idesolcapac = $fields[0];
        $idepersonal = $fields[1];
        $idecapacitacion = $fields[2];
        $estadocapac = $fields[3];
        $notacapac = $fields[4];
      //  $feccapac = $fields[5];
        $stmt->execute();
    }
