//ajax xD ajsdkajshdkajsd para subir el archivo 


 function enviarMail(){

 
matricula = document.getElementById("id_matricula").value;
            document.getElementById("id_matricula").value='';


divResultado = document.getElementById('matricula');
 if(matricula==""){
    
     ajax=objetoAjax();
     divResultado.innerHTML = "campo vacio";
 }
 else{           
 
 ajax=objetoAjax();
 ajax.open("GET", "php/EnviaMail.php?id_matricula="+matricula,true);
 
  ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
   divResultado.innerHTML = ajax.responseText;
  }
 }
 ajax.send(null)
}

}  