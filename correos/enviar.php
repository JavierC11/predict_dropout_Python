<?php 
// MOSTRAR ERRORES 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


  
  use \Libs\Mailer\Exception;
  use \Libs\Mailer\PHPMailer;
  require_once '../phpMailer/vendor/autoload.php';



     $mensaje = 
'

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Recibiste un correo</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<style>
  body {
  border-top: 8px solid #0354A6;
  line-height: 1.5;
  margin: 0 auto;
  max-width: 640px;
  padding: 0 1rem;
  text-align: center;
}

header {
  padding: 1.75rem 0 1rem;
}

h1 {
  margin: 0;
}

main {
  border-top: 1px solid #eee;
  border-bottom: 1px solid #eee;
  padding: 5rem 0;
}

h2 {
  color: #001740;
}

p {
  color: rgba(0,23,64,0.80);
  margin: 0 auto;
  max-width: 30rem;
}

main a {
  background: #0354A6;
  border: 1px solid rgba(0,23,64,0.16);
  border-radius: 4px;
  color: #fff;
  display: inline-block;
  font-size: 0.875rem;
  font-weight: bold;
  margin-top: 2.5rem;
  padding: 0.875rem 1rem;
  transition: all .25s ease;
  text-decoration: none;
}

main a:hover {
  background: #143D7E;
}

footer {
  font-size: 0.875rem;
  padding: 2.5rem 0;
}

footer a {
  color: #0354A6;
}

footer a:hover {
  color: #143D7E;
}
</style>

</head>
<body>
<!-- partial:index.partial.html -->
<header>
  <center>
      <h1>
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/15/Escudo_de_la_universidad_Mariano_G%C3%A1lvez_Guatemala.svg/768px-Escudo_de_la_universidad_Mariano_G%C3%A1lvez_Guatemala.svg.png" width="100" height="100">
  </h1>
  </center>
</header>
<main>
  <div>
    <svg width="64" height="64" xmlns="http://www.w3.org/2000/svg">
    <title>Sad face</title>
  <center>
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSURQdM7psBp5bw5-axBEk8k3ULOobmcl5QFyoIYPYemg&s" width="75" height="75">
  </center>
</svg>
  </div>
  <center>
      <h2>Estas a punto de perder el semestre</h2>
            <p>Ponte las pilas por favor, aún hay esperanza</p>
            <p><a href="https://www.youtube.com/watch?v=lspnEr30FBc" target="_blank">Video Motivacional</a></p>
  </center>
</main>
<!--<footer>
  <p>Por que tu futuro es el reflefo de tu exito como persona </p>
</footer>-->
<!-- partial -->
  
</body>
</html>

    ';

       try{


  $mail = new PHPMailer;
  $mail->CharSet = 'UTF-8';
 
  $mail->isSMTP();

  $mail->SMTPDebug = 0;


  
  /*$mail->Host = 'mail.goclases.com';*/
  $mail->Host = 'proyectoumg.com';

 
  $mail->Port = 587;

 
  $mail->SMTPAuth = true;

  
  $mail->Username = 'proyectooumg@proyectoumg.com';

  
  $mail->Password = ',s#;}jaB~Z;&'; 

  $mail->setFrom('proyectooumg@proyectoumg.com', 'Predicción');

  $mail->addAddress('clopezh13@miumg.edu.gt','Predicción');
 
  $mail->Subject = 'Hola haz recibido un correo del proyecto de predicción';

  $mail->msgHTML($mensaje, __DIR__);

  
  if (!$mail->send()) {
      //echo 'Error de envío: ' . $mail->ErrorInfo;
  } else {
 
      echo '<script>window.location.href="https://www.proyectoumg.com/correos/enviado.php/"</script>';


  }
}catch(Exception $e){
    //echo $mail->ErrorInfo;;
}


?>

