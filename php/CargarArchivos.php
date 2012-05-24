<?php
 include_once("cp/cArchivo.php");
 //Sleep deja inactivo el script por n segundos
 //n es un parametro, en el ejemplo 1 segundo
 //creamos el objeto $objempleados de la clase cEmpleado
 $ramo=$_GET['id'];
 $Pruebas='<h1>Pruebas</h1>';
 $Talleres='<h1>Talleres</h1>';
 $Apuntes='<h1>Apuntes</h1>';
 $Manuales='<h1>Manuales</h1>';
 $Otros='<h1>Otros</h1>';
 $total='';
 $objarchivo=new cArchivo;
 //la variable $lista consulta todos los empleados
 
 $consulta= $objarchivo->consultarArchivo($ramo);
 //muestra los datos consultados
 if($consulta==0){
 	$ramo="no se han cargado archivos!";

	}
 	else{
 	while($row = mysql_fetch_array($consulta)){
 		$tipo=strtolower($row['ar_tipo']);
	 	$link=str_replace(" ","%20",$row['ar_link']);


	 	switch ($tipo) {
	 		case 'prueba':
	 			$Pruebas.="<article class='archivo'><a href=uploads/".$link.">".$row['ar_link']." - ".$row['ar_tipo']."</a></article>";
	 			break;
	 		 case 'taller':
	 			$Talleres.="<article class='archivo'><a href=uploads/".$link.">".$row['ar_link']." - ".$row['ar_tipo']."</a></article>";
	 			break;
	 		case 'apunte':
	 			$Apuntes.="<article class='archivo'><a href=uploads/".$link.">".$row['ar_link']." - ".$row['ar_tipo']."</a></article>";
	 			break;
	 		case 'manual':
	 			$Manuales.="<article class='archivo'><a href=uploads/".$link.">".$row['ar_link']." - ".$row['ar_tipo']."</a></article>";
	 			break;
	 		default:
	 			$Otros.="<article class='archivo'><a href=uploads/".$link.">".$row['ar_link']." - ".$row['ar_tipo']."</a></article>";
	 			break;
	 		}
	 	}
	}
	
		
	

 $total.="<hgroup><input type='hidden' id='ramo' value='".$ramo."'><h1>".$ramo."</h1>".$Pruebas.$Talleres.$Apuntes.$Manuales.$Otros."</hgroup>";

 echo $total;
?>


