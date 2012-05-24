<?php 
 //esta clase nos permitira conectarnos a la base de datos
 class DBmanager{
  var $conect;
  //Método constructor
  function DBManager(){
  }
  //Método que se encargará de la verificar y realizar
  //la conexión
  function conectar() {
   if(!($con=@mysql_connect("localhost","root","qwepoi123098"))){
    echo"Error al conectar a la base de datos"; 
    exit();
   }
   if (!@mysql_select_db("bd_socialufro",$con)) {
    echo "Error al seleccionar la base de datos"; 
    exit();
   }
   $this->conect=$con;
   return true; 
  }
 }
?>