<?php
	require 'mail/vendor/autoload.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    
//FUNCION PARA ENVIAR EMAIL DE REGISTRO
	function enviarEmail($email, $nombre, $asunto, $cuerpo){
		$mail = new PHPMailer(true);
		//$mail->SMTPDebug=SMTP::DEBUG_SERVER;
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com'; //Modificar
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //Modificar

		$mail->Port = 587; //Modificar
		$mail->Username = 'tiendacactusivar@gmail.com'; //Modificar
		$mail->Password = 'Contrasena22'; //Modificar
		
		$mail->setFrom('tiendacactusivar@gmail.com', 'Tienda Cactusivar'); //Modificar
		$mail->addAddress($email, $nombre);
		
		$mail->Subject = $asunto;
		$mail->Body    = $cuerpo;
		$mail->IsHTML(true);
	//	$mail->send();
		if($mail->send())
		return true;
		else
		return false;
	}
	
//enviarEmail();