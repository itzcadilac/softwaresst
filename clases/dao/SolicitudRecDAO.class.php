<?php

class SolicitudRecDAO{
 
    function RegistrarSolicitud($solVO){
        session_start();
        $BD = new ConexionDB();
        
        $query = 'INSERT INTO libro_reclamaciones (nombre, apellido, direccion, email, numcontac, empresa, numdoc, idtiposervicio, tipreclamo, descripcion) 
        VALUES ("'.$solVO->nombre.'", "'.$solVO->apellido.'", "'.$solVO->direccion.'", "'.$solVO->email.'", "'.$solVO->numcontac.'", "'.$solVO->empresa.'", "'.$solVO->numdoc.'", '.$solVO->idtiposervicio.', '.$solVO->tipreclamo.', "'.$solVO->descripcion.'")';
        $response = $BD->ejecutar($query);

        if (!$response){
            $this->error=mysql_error();
                mysqli_close();
                return 0;
        }
        
        return 1;
  }
   
}
?>