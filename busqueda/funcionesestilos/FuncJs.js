// JavaScript Document


/***************** 2 Funciones para las principales***************************/
/***************** Cambia de color a los menus cuando pasa el mouse **********/
/*    function Dentro(obj){
        document.getElementById(obj).style.background="#CFE8F1";
        //document.getElementById(obj).style.Color="#ffffff";
        }
        
    function Fuera(obj){
        document.getElementById(obj).style.backgroundColor="#CFE8F1";
        //document.getElementById(obj).style.Color="#ffffff";
        }*/
    
    function Dentrob(obj,fila){
        document.getElementById(obj).style.background="#CFE8F1";
        document.getElementById(obj).style.color="#FF0000";

        var elementos = document.getElementsByName("tr2"+fila);
        for (i = 0; i< elementos.length; i++) {
            if(navigator.appName.indexOf("Microsoft") > -1){
                   var visible = 'block'
            } else {
                  var visible = 'table-row';
           }
   elementos[i].style.display = visible;
           }
        }
        

    function Fuerab(obj,fila){
        document.getElementById(obj).style.backgroundColor="#FFFFFF";
        document.getElementById(obj).style.color="#000000";

        var elementos = document.getElementsByName("tr2"+fila);
        for (k = 0; k< elementos.length; k++) {
                  elementos[k].style.display = "none";
         }
        }
/*****************************************************************************/
/*****************************************************************************/


/*****************************************************************************/
/*****************************************************************************/

function CambiaFilColor(objtchk,nuo){
    if (objtchk.checked == true)
    {
        document.getElementById('tr'+nuo).style.backgroundColor='#ffffd9';
        document.getElementById('tr'+nuo).style.color='#3162A6';
    }
    
    if (objtchk.checked == false)
    {
        document.getElementById('tr'+nuo).style.backgroundColor='#FFFFFF';
        document.getElementById('tr'+nuo).style.color='#000000';
    }
}
/*****************************************************************************/



function ventanaSecundaria (URL){ 
window.open(URL,"ventana1","width=850, height=450, scrollbars=yes, menubar=yes, location=no, resizable=no") 
} 

function PagImpr (URL){ 
window.open(URL,"ventana1","width=850, height=550, scrollbars=yes, menubar=yes, location=no, resizable=no") 
} 

function VtnConf (URL){ 
window.open(URL,"ventanaConf","width=350, height=150, scrollbars=no, menubar=no, location=no, resizable=no") 
} 


/*********************************************************************************/
/*********************************************************************************/
/*********************************************************************************/

function MostrarFilas(Fila) {
   var elementos = document.getElementsByName(Fila);
        for (i = 0; i< elementos.length; i++) {
            if(navigator.appName.indexOf("Microsoft") > -1){
                   var visible = 'block'
            } else {
                  var visible = 'table-row';
           }
   elementos[i].style.display = visible;
           }
   }

   function OcultarFilas(Fila) {
       var elementos = document.getElementsByName(Fila);
       for (k = 0; k< elementos.length; k++) {
                  elementos[k].style.display = "none";
       }
   }


/*********************************************************************************/
/*********************************************************************************/
/*********************************************************************************/
function valida_derivar(){
    //valido el nombre
    if (document.formenvia.numdoc.value.length==0){
       alert("Tiene que escribir el numero de documento");
       document.formenvia.numdoc.focus();
       return false;
    }

    if (document.formenvia.notas.value.length==0){
       alert("Tiene que escribir una nota");
       document.formenvia.notas.focus();
       return false;
    }
    return true;

} 

//**********************************************************************
//**********************************************************************
//********************************************************************
function popUptodos(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=650,height=500');");
}

//**********************************************************************
//**********************************************************************
//**********************************************************************

function esDigito(sChr){
  var sCod = sChr.charCodeAt(0);
  return ((sCod > 47) && (sCod < 58));
}

function valSep(oTxt){
  var bOk = false;
  bOk = bOk || ((oTxt.value.charAt(2) == "-") && (oTxt.value.charAt(5) == "-"));
  bOk = bOk || ((oTxt.value.charAt(2) == "/") && (oTxt.value.charAt(5) == "/"));
  return bOk;
}

function finMes(oTxt){
  var nMes = parseInt(oTxt.value.substr(3, 2), 10);
  var nRes = 0;
  switch (nMes){
   case 1: nRes = 31; break;
   case 2: nRes = 29; break;
   case 3: nRes = 31; break;
   case 4: nRes = 30; break;
   case 5: nRes = 31; break;
   case 6: nRes = 30; break;
   case 7: nRes = 31; break;
   case 8: nRes = 31; break;
   case 9: nRes = 30; break;
   case 10: nRes = 31; break;
   case 11: nRes = 30; break;
   case 12: nRes = 31; break;
}
  return nRes;
}

function valDia(oTxt){
  var bOk = false;
  var nDia = parseInt(oTxt.value.substr(0, 2), 10);
  bOk = bOk || ((nDia >= 1) && (nDia <= finMes(oTxt)));
  return bOk;
}

function valMes(oTxt){
  var bOk = false;
  var nMes = parseInt(oTxt.value.substr(3, 2), 10);
  bOk = bOk || ((nMes >= 1) && (nMes <= 12));
  return bOk;
}

function valAno(oTxt){
  var bOk = true;
  var nAno = oTxt.value.substr(6);
  bOk = bOk && ((nAno.length == 2) || (nAno.length == 4));
  if (bOk){
   for (var i = 0; i < nAno.length; i++){
    bOk = bOk && esDigito(nAno.charAt(i));
   }
}
  return bOk;
}

function valFecha(oTxt){

  var bOk = true;
  if (oTxt.value != ""){

   bOk = bOk && (valAno(oTxt));
   bOk = bOk && (valMes(oTxt));
   bOk = bOk && (valDia(oTxt));
   bOk = bOk && (valSep(oTxt));
   //return bOK;
}
if (!bOk){
   return false;
   }else{
   return true;
   }
}


//******************************************************************************
//******************************************************************************
//******************************************************************************
//********************** USANDO UN POCO DE AJAX ********************************

function objetoAjax(){
    var xmlhttp=false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
           xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }

    if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

function enviarDatosEmpleado(){
    //donde se mostrará lo resultados
    divResultado = document.getElementById('resultado');
    divFormulario = document.getElementById('formulario');
    //valores de los inputs
    id=document.frmempleado.idempleado.value;
    nom=document.frmempleado.nombres.value;
    dep=document.frmempleado.departamento.value;
    suel=document.frmempleado.sueldo.value;
    
    //instanciamos el objetoAjax
    ajax=objetoAjax();
    //usando del medoto POST
    //archivo que realizará la operacion
    //actualizacion.php
    ajax.open("POST", "actualizacion.php",true);
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
            //mostrar los nuevos registros en esta capa
            divResultado.innerHTML = ajax.responseText
            //mostrar un mensaje de actualizacion correcta
            divFormulario.innerHTML = "<p style=\"border:1px solid red; width:400px;\">La actualizaci&oacute;n se realiz&oacute; correctamente</p>";
        }
    }
    //muy importante este encabezado ya que hacemos uso de un formulario
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    //enviando los valores
    ajax.send("idempleado="+id+"&nombres="+nom+"&departamento="+dep+"&sueldo="+suel)
}

function pedirDatos(idempleado){
    //donde se mostrará el formulario con los datos
    divFormulario = document.getElementById('formulario');
    
    //instanciamos el objetoAjax
    ajax=objetoAjax();
    //uso del medotod GET
    ajax.open("POST", "consulta_por_id.php");
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
            //mostrar resultados en esta capa
            divFormulario.innerHTML = ajax.responseText
            //mostrar el formulario
            divFormulario.style.display="block";
        }
    }
    //como hacemos uso del metodo GET
    //colocamos null
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    //enviando los valores
    ajax.send("idemp="+idempleado)
}