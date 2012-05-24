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


 function validarUsuario(){
   
  usuario = document.getElementById("usuario").value;
  contrasena = document.getElementById("contrasena").value;
  ajax=objetoAjax();
  ajax.open("GET", "php/ValidarUsuario.php?usuario="+usuario+"&contrasena="+contrasena,true);
 

  ajax.onreadystatechange=function() {
  	if (ajax.readyState==4) {
    
	   if(ajax.responseText){
	   	 //setCookie("Cookie-SocialUfro",1);
       document.cookie="Cookie-SocialUfro=1";
       document.cookie="Cookie-SocialUfro-Rut="+usuario;
       nombre=objetoAjax();
       nombre.open("GET", "php/nombreUsuario.php?usuario="+usuario,true);
       document.cookie="Cookie-SocialUfro-Nombre="+nombre.responseText;
       window.location='home.php';
        
	   	 
	   }
	   else{
	   		alert("D:");
	   		divResultado = document.getElementById('resultadoValidar');
	   		divResultado.innerHTML = "error de usuario";

	   }
  }
 }
 ajax.send(null)

}

 function enviarMail(){

 
matricula = document.getElementById("id_matricula").value;
            document.getElementById("id_matricula").value='';
divResultado = document.getElementById('matricula');
    ajax=objetoAjax();
    divResultado.innerHTML = "";
    var tmpstr = "";
    var intlargo = matricula;
    if( matricula.length >= 10 && matricula != "0000000000" && matricula != "00000000000"){
      var anio = intlargo.substring(intlargo.length-2, intlargo.length);
      intlargo = intlargo.substring(0, intlargo.length-3)+"-"+intlargo.substring(intlargo.length-3, intlargo.length-2);
      if (intlargo.length > 0){           
            crut = intlargo; 
            largo = crut.length;        
          if ( largo < 2 ){
              ajax=objetoAjax();
              divResultado.innerHTML = "Matricula no Válida";
              return false;
          }
          for ( i=0; i < crut.length ; i++ ){
                  if ( crut.charAt(i) != ' ' && crut.charAt(i) != '.' && crut.charAt(i) != '-' ){
                    tmpstr = tmpstr + crut.charAt(i);
                  }
              }
          rut = tmpstr;
          crut=tmpstr;
          largo = crut.length;
          if ( largo > 2 ){
              rut = crut.substring(0, largo - 1);
          }else{
              rut = crut.charAt(0);
          }
          dv = crut.charAt(largo-1);
          if ( rut == null || dv == null ){
              return 0;
          }
          var dvr = '0';
          suma = 0;
          mul  = 2;
          for (i= rut.length-1 ; i >= 0; i--){
              suma = suma + rut.charAt(i) * mul;
              if (mul == 7){
                  mul = 2;
              }else{
                  mul++;
              }
          }
          res = suma % 11;
          if (res==1){
              dvr = 'k';
          }else{
            if (res==0){
                dvr = '0';
            }else{
                dvi = 11-res;
                dvr = dvi + "";
            }
        }
          if ( dvr != dv.toLowerCase() ){
            ajax=objetoAjax();
            divResultado.innerHTML = "Matricula no Válida";
            return false;
          }
          ajax=objetoAjax();
           ajax.open("GET", "php/EnviaMail.php?id_matricula="+matricula,true);         
            ajax.onreadystatechange=function() {
            if (ajax.readyState==4) {
             divResultado.innerHTML = ajax.responseText;
            }
           }
           ajax.send(null)
          return true;
        }
      }else{
        ajax=objetoAjax();
        divResultado.innerHTML = "Matricula no Válida";
      }
    } 