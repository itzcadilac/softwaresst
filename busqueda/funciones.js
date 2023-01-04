function nuevoAjax(){
	var xmlhttp=false;
	try{
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	}catch(e){
		try {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}catch(E){
			xmlhttp = false;
		}
	}

	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	
	return xmlhttp;
}

function buscarDato(){
	resul = document.getElementById('resultado');
	
	bus=document.frmbusqueda.dato.value;
	
	ajax=nuevoAjax();
	ajax.open("POST", "busqueda.php",true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			resul.innerHTML = ajax.responseText
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("busqueda="+bus)

}

function buscarContratista(){
		
	resul = document.getElementById('resultcontra');
	
	contrat=document.frmbusquedacontra.ruc.value;
	
	ajax=nuevoAjax();
	ajax.open("POST", "busqueda/busquedacontra.php",true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			resul.innerHTML = ajax.responseText;
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("busquedacontra="+contrat);
	alert();
}