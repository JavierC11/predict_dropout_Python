<?php


// MOSTRAR ERRORES 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check existence of id parameter before processing further
if(isset($_GET["ALUMNO_ID"]) && !empty(trim($_GET["ALUMNO_ID"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM ALUMNO WHERE ALUMNO_ID = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["ALUMNO_ID"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $NOMBRE = $row["NOMBRE"];
                $APELLIDO = $row["APELLIDO"];
                $CARNET = $row["CARNET"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ver alumno</title>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style type="text/css">
       
    </style>
</head>
<body>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br>

                <?php 
                            $nombreCompleto = $row["NOMBRE"] . " " . $row["APELLIDO"];
                         ?>
                        <h1 style="font-size: 20px; text-align: center  ;">ALUMNO : <strong><?php echo  $nombreCompleto ?></strong> </h1>
                        <br>
                <table class="table">
  <thead class="thead-dark">
   
  </thead>
  <tbody>
    <tr>
      <th scope="row">NOMBRE</th>
      <td><?php echo $row["NOMBRE"]; ?></td>
    </tr>

    <tr>
      <th scope="row">APELLIDO</th>
      <td><?php echo $row["APELLIDO"]; ?></td>
    </tr>

    <tr>
      <th scope="row">CARNET</th>
      <td><?php echo $row["CARNET"]; ?></td>
    </tr>

    <tr>
      <th scope="row">SEMESTRE</th>
      <td><?php echo $row["SEMESTRE"]; ?></td>
    </tr>
    <tr>
      <th scope="row">PRIMER PARCIAL</th>
      <td><?php echo $row["PRIMER_PARCIAL"]; ?></td>
    </tr>
    <tr>
      <th scope="row">SEGUNDO PARCIAL</th>
      <td><?php echo $row["SEGUNDO_PARCIAL"]; ?></td>
    </tr>
    <tr>
      <th scope="row">INASISTECIA</th>
      <td><?php echo $row["INASISTENCIA"]; ?></td>
    </tr>
    <tr>
      <th scope="row">DPI</th>
      <td><?php echo $row["DPI"]; ?></td>
    </tr>
    <tr>
      <th scope="row">EMAIL</th>
      <td><?php echo $row["EMAIL"]; ?></td>
    </tr>
    <tr>
      <th scope="row">SEXO</th>
      <td><?php echo $row["SEXO"]; ?></td>
    </tr>
    <tr>
      <th scope="row">FECHA DE NACIMIENTO</th>
      <td><?php echo $row["FECHA_NACIMIENTO"]; ?></td>
    </tr>
    <tr>
      <th scope="row">ESTADO</th>
      <td><?php echo $row["ESTADO"]; ?></td>
    </tr>
   
    
  </tbody>
</table>
            </div>
        </div>
    </div>

    
<center><a href="index.php"><button type="button" class="btn btn-success">Regresar</button></a></center>
<br>
                


</body>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>