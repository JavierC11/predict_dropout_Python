<?PHP


	use \Libs\Mailer\PHPMailer;
	require_once 'vendor/autoload.php';
	$mensaje = '<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Olvidaste tu contraseña</title>
	</head>
	<body>
		<table style="max-width: 600px; padding: 10px; margin:auto; border-collapse: collapse;box-shadow: 0 0 1em rgba(0, 0, 0, 0.1);">
			<tr>
				<td style="background-color: #3bc1bd; text-align: left; padding: 0">
					<a href="http://gozeri.com/">
						<img width="20%" style="display:block; margin: 1.5% 3%;float: left;" src="tmp/gzeri.png">
					</a>
				</td>
			</tr>
			<tr>
				<td style="position: relative;background-color: #FFF;display: table;"  align="center">
					<img style="padding: 0;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/28/Ic_visibility_off_48px.svg/2000px-Ic_visibility_off_48px.svg.png" width="30%" height="28%">
				</td>
			</tr>
			<tr>
				<td style="background-color: #FFF" align="center">
					<div style="color: #3bc1bd; margin: 4% 10% 2%; text-align:center;font-family: sans-serif">
						<h2 style="color: #3bc1bd; margin: 0 0 7px;text-align: center;">Olvidaste tu contraseña?</h2>
						<p style="margin: 2px; font-size: 15px">
							Hola Marcelo Delgado, Hemos recibido una solicitud de recuperacion de contraseña.Por favor Dirijete al link que te hemos dejado y escribe por favor el siguiente codigo de validacion
						</p>
						<br/>
						<br/>
						<div style="width: 100%; text-align: center;font-family: sans-serif;font-size: 30px;">
							<strong>578M7D</strong>
						</div>
						<br/>
						<br/>
						<div style="text-align: center;font-size: 12px">
							<p style="margin: 0 auto;">https://gozeri.com/Recuperacion</p>
						</div>
						<br/>
						<br/>
						<p style="margin: 2px; font-size: 13px;">
							Si necesita ayuda, contáctenos en: soporte@gozeri.com
						</p>
					</div>
				</td>
			</tr>
			<tr>
				<td style="background-color: #FFF; text-align: center; padding: 0;position: relative;">
					<p style="color:#3bc1bd;font-size:13px;text-align:center;position:absolute;left:170px;top:35px;">
						2017 © Gozeri Todos los Derechos Reservados
					</p>
				</td>
			</tr>
		</table>
	</body>
</html>';
	$mail = new PHPMailer;
	$mail->CharSet = 'UTF-8';
	# Llama PHPMailer para usar SMTP
	$mail->isSMTP();

	# Habilita SMTP debugging
	#  0 = off (for production use)
	#  1 = client messages
	#  2 = client and server messages
	$mail->SMTPDebug = 2;


	# Establece el nombre del host del Servicio de mail
	$mail->Host = 'mail.goclases.com';

	# Establece el numero de puerto SMTP  - puede ser 25, 465 o 587
	$mail->Port = 587;

	# si se usa autenticacion SMTP 
	$mail->SMTPAuth = true;

	# Usuario para la autenticacion SMTP
	$mail->Username = 'soporte@goclases.com';

	# Password para la autenticacion SMTP
	$mail->Password = 'GSoporte2019.';

	# Establece desde donde se envia el Mail
	$mail->setFrom('soporte@goclases.com', 'goclases');

	# Establece el correo alternativo de replica de correo
	#$mail->addReplyTo('replyto@example.com', 'First Last');

	# Establecer a quién se enviará el mensaje
	$mail->addAddress('zepedaedward000@gmail.com', 'Edwardcin Zepeda');

	# Establecer el asunto 
	$mail->Subject = 'Recuperacion de contraseña';

	# Leer un cuerpo de mensaje HTML desde un archivo externo, convertir imágenes referenciadas a incrustadas,
	
	# Trayendo directamente una pagina especifica.
	$mail->msgHTML(file_get_contents('contenido.php'), __DIR__);

	# Generando una Variable!
	//$mail->msgHTML($mensaje);

	# convertir HTML en un cuerpo alternativo básico de texto plano
	# Reemplace el cuerpo del texto sin formato con uno creado manualmente
	//$mail->AltBody = 'This is a plain-text message body';

	# Adjunte un archivo de imagen
	$mail->addAttachment('tmp/asignacion.pdf');

	# Envio del mensaje, Checkear errores
	if (!$mail->send()) {
    	echo 'Error de correo: ' . $mail->ErrorInfo;
	} else {
    	echo 'Mensaje Enviado!';
	}
*/
?>