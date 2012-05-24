<?php

include_once("DBmanager.php");
include_once("cTiempo.php");

class cArchivo{

	//constructor 
  function cArchivo(){
  }

  function subirArchivo($nombre,$link,$tipo,$ramo,$anio){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){

   	$mysqltime = date("Y-m-d H:i:s");
    $query = "insert into su_archivo (ar_nombre,ar_link,ar_tipo,-ar_estado,ar_fecha,cu_id_ramo,ar_anio)  
              values('".$nombre."','".$link."','".$tipo."','disponible','".$mysqltime."','".$ramo."',".$anio.")";
    $result = @mysql_query($query);
    if (!$result)
    return false;
    else
    	return $result;
      }
  }

	function consultarArchivo($ramo){
	   //creamos el objeto $con a partir de la clase DBManager
	   $con = new DBManager;
	   //usamos el metodo conectar para realizar la conexion
	   if($con->conectar()==true){
	    $query = "select * from su_archivo where cu_id_ramo='".$ramo."'";
	    $result = @mysql_query($query);
	    if (!$result){
	    	return 0;
	    }
	    return $result;
	 }
	}

	function consultarArchivoTimeline(){
	   //creamos el objeto $con a partir de la clase DBManager
	   $con = new DBManager;
	   //usamos el metodo conectar para realizar la conexion
	   if($con->conectar()==true){
	    $query = "select * from su_archivo order by ar_fecha DESC";
	    $result = @mysql_query($query);
	    if (!$result)
	     return false;
	    else
	     return $result;
	   }
	}


	function formatoArchivo($archivo,$tiempo){

		
		if(is_string($tiempo)){

		$tiempo=strtotime($tiempo);
		$archivo=htmlspecialchars(stripslashes($archivo));
		$objtiempo= new cTiempo;
		$tiempolisto=$objtiempo->calcularTiempo($tiempo);
		  return'
			  <article class="archivoTimeline">			 
			  <p><a target="_blank" href=uploads/'.$archivo.'>'. preg_replace('/((?:http|https|ftp):\/\/(?:[A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?[^\s\"\']+)/i','<a href="$1" rel="nofollow" target="blank">$1</a>',$archivo).'</a></p>
			  <div class="date">'.$tiempolisto.'
			  <a href="#" onclick="denunciar();">denunciar</a></article>';

		}
	}

function denunciarArchivo($idArchivo){

	// cambiar el atributo ar_estado disponible a corrupto.

}


}

?>