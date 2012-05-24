<?php
 include_once("cp/cRamo.php");
 //Sleep deja inactivo el script por n segundos
 //n es un parametro, en el ejemplo 1 segundo
 //creamos el objeto $objempleados de la clase cEmpleado
 $objramos=new cRamo;
 //la variable $lista consulta todos los empleados
 $consulta= $objramos->enlistarRamos();
 //muestra los datos consultados
 while($row = mysql_fetch_array($consulta)){

  echo "<p><a href=".'#'." onclick="."MostrarArchivos('".$row['cu_id_ramo']."');".">".$row['cu_id_ramo']." | ".utf8_encode($row['cu_nombre'])."</a></p>";



 }
?>
