<?php 
 include_once("DBmanager.php");
 //implementamos la clase empleado
 class cRamo{

  //constructor 
  function cRamo(){
  }

  // consulta los empledos de la BD
  function registrarRamo($idRamo,$nombre){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
    $query = "insert";
    $result = @mysql_query($query);
    if (!$result)
     return false;
    else
     return $result;
   }
  }

  function consultarRamo($idRamo){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
    $query = "select * from su_ramo where cu_id_ramo=".$idRamo;
    $result = @mysql_query($query);
    if (!$result)
     return false;
    else
     return $result;
   }
  }
  function enlistarRamos(){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
    $query = "select * from su_ramo";
    $result = @mysql_query($query);
    if (!$result)
     return false;
    else
     return $result;
   }
  }

}
?>