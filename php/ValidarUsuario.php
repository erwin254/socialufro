<?php
include_once("cp/cUsuario.php");

$matricula=$_GET['usuario'];
$contrasena=$_GET['contrasena'];
$objusuario=new cUsuario;
$validacion= $objusuario->validarUsuario($matricula,$contrasena);

	if($validacion) {
		//$nombre=$objusuario->buscarNombre($matricula);

		//setCookie("Cookie-SocialUfro",1);
		//setCookie("Cookie-SocialUfro-Nombre", $nombre);
		
		
		
	} else {

		$validacion=false;

	}

	echo $validacion;
?>
