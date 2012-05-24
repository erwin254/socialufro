<?php

		include("phpMailer/class.phpmailer.php");
		include("phpMailer/class.smtp.php");
		$matricula = $_GET["id_matricula"];
		$aux = "Este eMail ah sido enviado desde www.socialufro.cl<br><br> Matricula: ".$matricula;
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = "ssl";
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 465;
		$mail->Username = "socialufro@gmail.com";
		$mail->Password = "qwepoi123098";
		$mail->From = "SocialUfro";
		$mail->FromName = "Web";
		$mail->Subject = "Solicitud de ingreso";
		$mail->AltBody = "";
		$mail->MsgHTML($aux);
		$mail->AddAddress("erwin254@gmail.com", "Erwin");
		$mail->IsHTML(true);								 
		if(!$mail->Send()) {
		  echo "Error: " . $mail->ErrorInfo;
		} else {
		  echo "Su mensaje ah sido enviado correctamente, responderemos a la brevedad.";
		}
?>
