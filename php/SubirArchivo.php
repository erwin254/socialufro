<?php
include_once("cp/cArchivo.php");

$nombre=$_GET['nombre'];
$link=$_GET['link'];
$tipo=$_GET['tipo'];
$ramo=$_GET['ramo'];
$anio=$_GET['anio'];


 $objsubir=new cArchivo;
//aca envia los archivos a la clase registrar para ejecutar la funcion  registrar registrar

$archivo=$objsubir->subirArchivo($nombre,$link,$tipo,$ramo,$anio);

echo $archivo;
?>

