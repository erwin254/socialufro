<?php
include_once("cp/cUsuario.php");

$matricula=$_GET['usuario'];

$objusuario=new cUsuario;
if($matricula==""){

	$nombre="usuario no existe";
}
else{
	$nombre=$objusuario->buscarNombre($matricula,$parametro2);
}

echo $nombre;
?>
