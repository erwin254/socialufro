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

function MostrarConsulta(){
 divResultado = document.getElementById('resultado');
 ajax=objetoAjax();
 ajax.open("GET", "php/CargarRamos.php");



 ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
   divResultado.innerHTML = ajax.responseText
  }
 }
 ajax.send(null)
} 

 function MostrarArchivos(id){

 divResultado = document.getElementById('resultadoArchivos');
 ajax=objetoAjax();
 ajax.open("GET", "php/CargarArchivos.php?"+"&"+"id="+id,true); 
 //ajax.open("GET", datos);
  

  ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
   divResultado.innerHTML = ajax.responseText
  }
 }
 ajax.send(null)
} 

 function MostrarTimeline(datos){
 divResultado = document.getElementById('Timeline');
 ajax=objetoAjax();
 ajax.open("GET", datos);
  

  ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
   divResultado.innerHTML = ajax.responseText
  }
 }
 ajax.send(null)
} 

 function almacenarArchivo(file){


  nombre = document.getElementById("nombreArchivo").value;
  document.getElementById("nombreArchivo").value='';
  link =file;
  tipo = document.getElementById("tipo").value;
  ramo = document.getElementById("ramo").value;
  anio = document.getElementById("anio").value;
  //alert(nombre+link+tipo+ramo+anio);   

 divResultado = document.getElementById('almacenar');
 ajax=objetoAjax();
 ajax.open("GET", "php/SubirArchivo.php?nombre="+nombre+"&link="+link+"&tipo="+tipo+"&ramo="+ramo+"&anio="+anio,true);
 

  ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
    if(ajax.responseText){
      respuesta="listo!";
    }
   else{
    respuesta="error :(";
   }
    divResultado.innerHTML = respuesta;
  }
 }
 ajax.send(null)
}



function borrarcookie(){

     document.cookie = "Cookie-SocialUfro=0";
     window.location='index.html';


 }

  function cargarArchivo(url){
          
 divResultado = document.getElementById('respuestaArchivo');
 if(archivo==""){
    
     divResultado.innerHTML = "campo vacio";
 }
 else{           
 
 ajax=objetoAjax();
 ajax.open("GET", url,true);
 
  ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
   divResultado.innerHTML = ajax.responseText;
  }
 }
 ajax.send(null)
}

}
