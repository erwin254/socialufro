<?php
include_once("DBmanager.php");
class cUsuario{
	
	function cUsuario(){
  	}

  	function registrarUsuario($email,$matricula,$contrasena){
  		//registra un nuevo usuario
  		
  	}
  	function recuperarUsuario($matricula){
  		// envia mail de recuperacion de contraseña ¿olvidó su contraseña?
  	}
  	function boquearUsuario($matricula){
  		//banea al usuario para que no pueda ingresar
  	}

  	function eliminarUsuario($matricula){
  		//cambia usuario completo a usuarios eliminados.
  	}

  	function verReputacionUsuario($matricula){
  		//muestra la reputacion del usuario
  	}
  	function subirReputacionUsuario($matricula){
  		//sube la repoutacion del usuario
  	}
  	function bajarReputacionUsuario($matricula){
  		// baja la reputacion del usuario
  	}
  	
	function validarUsuario($matricula,$contrasena){
		$con = new DBManager;
	   //usamos el metodo conectar para realizar la conexion
	   if($con->conectar()==true){
		   	$consultaPass='';
			$validacion=false;
		  	$result = @mysql_db_query("bd_socialufro","select * from su_alumno where al_matricula='$matricula'");
			
			while($fila = mysql_fetch_array($result, MYSQL_ASSOC)) {
				$consultaPass= $fila["al_contrasena"];

				}
			if($contrasena!=$consultaPass || $contrasena=="") {
				$validacion=false;

			} else {
				//setCookie("Cookie-SocialUfro",1);
				//setCookie("Cookie-SocialUfro-Nombre", $nombre);
				$validacion=true;

			}
			 return $validacion;
  		}

  	}

	function buscarNombre($matricula){
		$con = new DBManager;
	   //usamos el metodo conectar para realizar la conexion
	   if($con->conectar()==true){
		  	$nombre = @mysql_db_query("bd_socialufro","select al_nombre from su_alumno where al_matricula='$matricula'");
			$fila = mysql_fetch_array($nombre, MYSQL_ASSOC);
			$nombre=$fila["al_nombre"];
			return $nombre;

	 	}
	}
	function setearCookie($nombre){

			setCookie("Cookie-SocialUfro",1);
			setCookie("Cookie-SocialUfro-Nombre", $nombre);
			
			
		}

}
?>
