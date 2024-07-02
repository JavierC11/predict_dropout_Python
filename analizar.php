<?php 

// MOSTRAR ERRORES 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


  
  use \Libs\Mailer\Exception;
  use \Libs\Mailer\PHPMailer;
  require_once 'phpMailer/vendor/autoload.php';

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Proyecto UMG - PREDICCIÓN</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 1220px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <center><h2 class="pull-left" style="text-align: center;">CORREOS ENVIADOS</h2> </center>
                        <a href="index.php" class="btn btn-success pull-right">Regresar</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM ALUMNO";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                           /* echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>ID</th>";
                                        echo "<th>NOMBRE</th>";
                                        echo "<th>APELLIDO</th>";
                                        echo "<th>CARNET</th>";
                                        
                                        
                                         echo "<th>SEMESTRE</th>";
                                         echo "<th>P1</th>";
                                         echo "<th>P2</th>";
                                         echo "<th>INASISTENCIA</th>";
                                        echo "<th>DPI</th>";
                                        echo "<th>EMAIL</th>";
                                        echo "<th>SEXO</th>";
                                        echo "<th>FECHA DE NACIMIENTO</th>";
                                        echo "<th>ESTADO</th>";

                                        
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";*/
                                while($row = mysqli_fetch_array($result)){

                                    if ($row['ESTADO']==0) {
                                       



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

  $mail->addAddress($row['EMAIL'],'Predicción');
 
  $mail->Subject = 'Hola ' .$row['NOMBRE']. ' haz recibido un correo del proyecto de predicción';

  $mail->msgHTML($mensaje, __DIR__);

  
  if (!$mail->send()) {
      //echo 'Error de envío: ' . $mail->ErrorInfo;
  } else {
 
      /*echo '<script>window.location.href="https://www.proyectoumg.com/correos/enviado.php/"</script>';*/
      echo "CORREO ENVIADO A ..". $row['EMAIL'] . '<BR>';


  }
}catch(Exception $e){
    //echo $mail->ErrorInfo;;
}





                                    }
                                    /*echo "<tr>";
                                        echo "<td>" . $row['ALUMNO_ID'] . "</td>";
                                        echo "<td>" . $row['NOMBRE'] . "</td>";
                                        echo "<td>" . $row['APELLIDO'] . "</td>";
                                        echo "<td>" . $row['CARNET'] . "</td>";
                                        
                                        
                                        echo "<td>" . $row['SEMESTRE'] . "</td>";
                                        echo "<td>" . $row['PRIMER_PARCIAL'] . "</td>";
                                        echo "<td>" . $row['SEGUNDO_PARCIAL'] . "</td>";
                                         echo "<td>" . $row['INASISTENCIA'] . "</td>";
                                        echo "<td>" . $row['DPI'] . "</td>";
                                        echo "<td>" . $row['EMAIL'] . "</td>";
                                        echo "<td>" . $row['SEXO'] . "</td>";
                                        echo "<td>" . $row['FECHA_NACIMIENTO'] . "</td>";
                                        echo "<td>" . $row['ESTADO'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='read.php?ALUMNO_ID=". $row['ALUMNO_ID'] ."' title='Ver' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='update.php?ALUMNO_ID=". $row['ALUMNO_ID'] ."' title='Actualizar' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?ALUMNO_ID=". $row['ALUMNO_ID'] ."' title='Borrar' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";




                                        echo "</td>";
                                    echo "</tr>";*/
                                }
                                /*echo "</tbody>";                            
                            echo "</table>";
                            // Free result set*/
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>