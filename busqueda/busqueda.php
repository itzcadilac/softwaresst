<?php
require('conexion.php');

$busqueda=$_POST['busqueda'];

if ($busqueda<>''){
	
	$trozos=explode(" ",$busqueda);
	$numero=count($trozos);

	if ($numero==1) {
		
		$cadbusca="select pi.documento, pi.ape_paterno,pi.ape_materno,pi.nombres, pi.cargo,pi.empresa, pi.foto,pi.ruc
		from personal_induccion pi, tipcapacitaciones tc
		where pi.idecapacitacion = tc.idecapacitacion
		and pi.documento = '$busqueda' GROUP BY pi.documento;";
		
		$foto="select pi.fecha,pi.nota, tc.desccapacitacion, tc.image
		from personal_induccion pi, tipcapacitaciones tc
		where pi.idecapacitacion = tc.idecapacitacion
		and pi.documento = '$busqueda';";

		/*$cadbusca="SELECT co.razonsocial, co.ruc, pe.nombres, pe.apepaterno,pe.apematerno, pr.dscparametro, 
				   pe.numdocumento
				   FROM personalc pe, contratista_personal hp, contratista co, parametro pr
				   WHERE co.idecontratista = hp.idecontratista
				   AND hp.idepersonal = pe.idepersonal
				   AND pe.tipdocumento = pr.codparametro
				   AND pr.idetipparametro = 'TIP_DOCUMENTO'
				   AND pe.numdocumento = '$busqueda';";
		
		$foto="SELECT pe.foto
		FROM personalc pe, contratista_personal hp, contratista co, parametro pr
		WHERE co.idecontratista = hp.idecontratista
		AND hp.idepersonal = pe.idepersonal
		AND pe.tipdocumento = pr.codparametro
		AND pr.idetipparametro = 'TIP_DOCUMENTO'
		AND pe.numdocumento = '$busqueda';";				   */
		/*
		$buska = "SELECT h.idexpediente, h.fecha_mov, a.descripcion_area as 'envia', b.descripcion_area as 'recibe', IF(h.recepcionado = 2,'Recepcionado',IF(h.recepcionado=1,'Enviado','No Recepcionado')) AS 'estado' FROM historial h LEFT OUTER JOIN areas a ON h.idareaenvia=a.idarea LEFT OUTER JOIN areas b ON h.idarearecibe=b.idarea LEFT OUTER JOIN expediente e ON h.idexpediente = e.idexpediente LEFT OUTER JOIN estados t ON e.estados=t.idestado WHERE h.idexpediente LIKE '$busqueda' ORDER BY fecha_mov;";
		
		$sql1="SELECT da.folios, da.referenciadocumentos,da.usuariorecibe,da.numcargo,da.numdoc, da.estadoadj, da.recepcionadoadj,da.fechaadj,da.fecharecep,d.detalledocumento FROM documentos d, documentosadjuntos da WHERE da.iddocumentos=d.iddocumento and da.idexpediente='$busqueda' and da.estadoadj=2 and recepcionadoadj=1";
		*/
		/*
		$sql2="SELECT hp.idecapacitacion, tp.desccapacitacion, hp.notacapac, pr.dscparametro AS estadocapa, hp.feccapac, tp.image
			   FROM personalc pe, histsolcal_personal hp, contratista co, parametro pr, tipcapacitaciones tp
			   WHERE co.idecontratista = hp.idesolcapac
			   AND hp.idepersonal = pe.idepersonal
			   AND tp.idecapacitacion = hp.idecapacitacion
			   AND pr.codparametro = hp.estadocapac
			   AND pr.idetipparametro = 'TIP_ESTADOCAPA'
			   AND pe.numdocumento ='$busqueda'";*/
	}
	function limitarPalabras($cadena, $longitud, $elipsis = "..."){
		$palabras = explode(' ', $cadena);
		if (count($palabras) > $longitud)
			return implode(' ', array_slice($palabras, 0, $longitud)) . $elipsis;
		else
			return $cadena;
	}
?>
<!--
<div><center><b>Datos del Personal</b></center></div></br>
<div>
<?php/*
	$result=mysql_query($cadbusca, $con);
	$i=1;
	while ($row = mysql_fetch_array($result)){
		echo "<b>RUC: </b>".$row['ruc']."<br>
		<b>Empresa: </b>".$row['razonsocial']."<br>
		<b>Nombres:</b> ".$row['nombres']." <br>
		<b>Apellido Paterno: </b>".$row['apepaterno']."<br>
		<b>Apellido Materno:</b> ".$row['apematerno']."<br>
		<b>Tipo de Documento:</b> ".$row['dscparametro']."<br>
		<b>Núm. Documento:</b> ".$row['numdocumento']."<br>
		";
		$i++;
	}
	
?>
</div>
    <br />
	<table style="width:100%;" border="2px" class="tablahisto"> 
	<tbody>
		<caption>CAPACITACIONES</caption>
		<tr>			
            <th class="curso" align="center" style="text-align: center;">CURSO</th>
      		<th class="estado" align="center" style="text-align: center;">ESTADO</th>
            <th class="feccapac" align="center" style="text-align: center;">FECHA DE CAPACITACIOÓN</th>            
        </tr>

<?php
	$result=mysql_query($sql2, $con);
	$i=1;
	while ($row = mysql_fetch_array($result)){
		echo "
			<tr>
				<td class=\"curso\">".$row['desccapacitacion']."</td>
				<td class=\"estado\">".$row['estadocapa']."</td>
				<td class=\"feccapac\">".$row['feccapac']."</td>			    
			</tr>";
		$i++;
	}

?> 
 
      </tbody>
      
    </table> 

<?php
}
	else{
		echo "Ingrese un Documento Válido.";
	}*/
?>	
     <span class="copy">Novo Expert S.R.L.</span>	  
-->

					<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
<?php
	$result2=mysqli_query($con,$cadbusca);
	$k=1;
	while ($row2 = mysqli_fetch_array($result2)){
?>
								<div class="hr dotted"></div>
								<div>
									<div id="user-profile-1" class="user-profile row">
										<div class="col-xs-12 col-sm-3 center">
											<div>
												<span class="profile-picture">
													<img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src= "<?php echo $row2['foto'] ?>" />
												</span>

												<div class="space-4"></div>

<!--											<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
												</div>
												-->
												<div class="inline position-relative">
												</div>
											</div>
											<div class="space-6"></div>
											<div class="profile-contact-info">
												<div class="space-6"></div>
												<div class="profile-social-links align-center">
												</div>
											</div>
											<div class="hr hr12 dotted"></div>
											<div class="clearfix">
											</div>
										</div>

										<div class="col-xs-12 col-sm-9">
											<div class="center">
								<ul class='ace-thumbnails clearfix'>
<?php $k++; }?>

<?php
	$result1=mysqli_query($con,$foto);
	$j=1;
	while ($row1 = mysqli_fetch_array($result1)){
	
     echo "	 
		
		 <li style='border: 0px;'>
			  <div class='inline position-fixed'>
			     <div> 
		 	 	   <img width='150' height='150' alt='150x150' src=" .$row1['image']." border='0'/>
			     </div>
			     <div class='tags'>
					<span class='label-holder'>
						 <span class='label label-info'>" .$row1['desccapacitacion']. "</span>
					</span>
					<span class='label-holder'>
						 <span class='label label-danger'>Nota: " .$row1['nota']. "</span>
					</span>
					<span class='label-holder'>
						 <span class='label label-success'>Fecha: " .$row1['fecha']. "</span>
					</span>
				 </div>
			 
			  </div>
			  <div>
			  	<a href='Infcertifica.php?variable1=".$row1['desccapacitacion']."&variable2=".$row1['DNI']."&variable3=".$row1['empresa']."&variable2=".$row1['DNI']."' class='btn btn-app btn-success btn-xs'>
			  		<i class='ace-icon fa fa-download bigger-120'></i>
			  	</a> 
			  </div>
		 </li>


		 
	 ";
	$j++; } ?>
</ul>
<!--

			<div class='inline position-relative'>
			 <div class='width-80 label label-info label-xlg arrowed-in arrowed-in-right'></div>
			 </div>
												<span class="btn btn-app btn-sm btn-yellow no-hover">
													<span class="line-height-1 bigger-170"> 32 </span>

													<br />
													<span class="line-height-2 smaller-90"> T. Altura </span>
												</span>

												<span class="btn btn-app btn-sm btn-danger no-hover">
													<span class="line-height-1 bigger-170"> 4 </span>

													<br />
													<span class="line-height-1 smaller-90"> T. Caliente </span>
												</span>

												<span class="btn btn-app btn-sm btn-grey no-hover">
													<span class="line-height-1 bigger-170"> 23 </span>

													<br />
													<span class="line-height-1 smaller-80"> E. Peligrosas </span>
												</span>

												<span class="btn btn-app btn-sm btn-success no-hover">
													<span class="line-height-1 bigger-170"> 7 </span>

													<br />
													<span class="line-height-1 smaller-90"> Izaje </span>
												</span>

												<span class="btn btn-app btn-sm btn-primary no-hover">
													<span class="line-height-1 bigger-170"> 55 </span>

													<br />
													<span class="line-height-1 smaller-70"> E. Confinados </span>
												</span>
	-->
											
											</div>


<?php
	$result=mysqli_query($con, $cadbusca);
	$i=1;
	while ($row = mysqli_fetch_array($result)){
?>

											<div class="space-12"></div>

											<div class="profile-user-info profile-user-info-striped">
												<div class="profile-info-row">
													<div class="profile-info-name"> Nombres </div>

													<div class="profile-info-value">
														<span class="editable" id="name"><?php echo $row['nombres'] ?></span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> Ap. Paterno </div>

													<div class="profile-info-value">
														<span class="editable" id="appaterno"><?php echo $row['ape_paterno'] ?></span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> Ap. Materno </div>

													<div class="profile-info-value">
														<span class="editable" id="apmaterno"><?php echo $row['ape_materno'] ?></span>
													</div>
												</div>																								
												<!--<div class="profile-info-row">
													<div class="profile-info-name"> T. Documento </div>

													<div class="profile-info-value">
														<span class="editable" id="tipdoc"></span>
													</div>
												</div>-->
												<div class="profile-info-row">
													<div class="profile-info-name"> Documento </div>

													<div class="profile-info-value">
														<span class="editable" id="numdoc"><?php echo $row['documento'] ?></span>
													</div>
												</div>												
												<div class="profile-info-row">
													<div class="profile-info-name"> Empresa </div>

													<div class="profile-info-value">
														<span class="editable" id="empresa"><?php echo $row['empresa'] ?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> RUC </div>

													<div class="profile-info-value">
														<span class="editable" id="ruc"><?php echo $row['ruc'] ?></span>
													</div>
												</div>
											</div>
<?php $i++; }?>
											<div class="space-20"></div>

											<div class="widget-box transparent">
												</div>

												<div class="widget-body">
													
												</div>
											</div>

											<div class="hr hr2 hr-double"></div>

											<div class="space-6"></div>

											<div class="center">
											</div>
										</div>
									</div>
								</div>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
<?php
}
	else{
		echo "Ingrese un Documento Válido.";
	}
?>