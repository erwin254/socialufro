<?php
// defino la carpeta para subir
$uploaddir = 'uploads/';
// defino el nombre del archivo
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

// Lo mueve a la carpeta elegida
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
  echo "success";
} else {
  echo "error";
}
?>