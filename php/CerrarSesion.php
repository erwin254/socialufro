<?php
$cookie = $_COOKIE["Cookie-SocialUfro"];
if ($cookie == 0) {
    header('Location:index.html');
}else{
    //setcookie("Cookie-SocialUfro","","","/socialufro/");
    //setcookie("Cookie-SocialUfro-Nombre");
    header('Location:../index.html');
}
?>