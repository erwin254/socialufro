<?php
 include_once("cp/cArchivo.php");
 $objramos=new cArchivo;
 $consulta= $objramos->consultarArchivoTimeline();
 $timeline='';
 while($row = mysql_fetch_array($consulta)){

 	$timeline.=$objramos->formatoArchivo($row['ar_link'],$row['ar_fecha']);
 }

 //imprime string con todos los posteos ordenados 
echo $timeline;
?>