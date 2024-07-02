<?php
// MOSTRAR ERRORES 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include config file
require_once "config.php";

// Processing form data when form is submitted
//print_r($_POST);
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["ALUMNO_ID"])){
    // Recogida y asignación de valores del formulario
    $id =  trim($_GET["ALUMNO_ID"]);
    $ALUMNO_ID = $_POST['ALUMNO_ID'] ?? 0;
    $NOMBRE = $_POST['NOMBRE'] ?? '';
    $APELLIDO = $_POST['APELLIDO'] ?? '';
    $CARNET = $_POST['CARNET'] ?? '';
    $SEMESTRE = $_POST['SEMESTRE'] ?? 0; 
    $PRIMER_PARCIAL = $_POST['PRIMER_PARCIAL'] ?? 0;
    $SEGUNDO_PARCIAL = $_POST['SEGUNDO_PARCIAL'] ?? 0;
    $INASISTENCIA = $_POST['INASISTENCIA'] ?? 0;
    $DPI = $_POST['DPI'] ?? 0;
    $EMAIL = $_POST['EMAIL'] ?? '';
    $FECHA_NACIMIENTO = $_POST['FECHA_NACIMIENTO'] ?? '';
    $SEXO = $_POST['SEXO'] ?? '';
    $ESTADO = $_POST['ESTADO'] ?? 0;

    // SQL query to update the record
    $sql = "UPDATE ALUMNO SET CARNET=?, SEMESTRE=?, INASISTENCIA=?, PRIMER_PARCIAL=?, SEGUNDO_PARCIAL=?, NOMBRE=?, APELLIDO=?, DPI=?, EMAIL=?, FECHA_NACIMIENTO=?, SEXO=?, ESTADO=? WHERE ALUMNO_ID=?";
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "ssiiissssssss", $CARNET, $SEMESTRE, $INASISTENCIA, $PRIMER_PARCIAL, $SEGUNDO_PARCIAL, $NOMBRE, $APELLIDO, $DPI, $EMAIL, $FECHA_NACIMIENTO, $SEXO, $ESTADO, $ALUMNO_ID);
        if(mysqli_stmt_execute($stmt)){
            header("location: index.php");
            exit();
        } else {
            echo "Something went wrong. Please try again later.";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
} else {
    // Check existence of id parameter before processing further
    if(isset($_GET["ALUMNO_ID"]) && !empty(trim($_GET["ALUMNO_ID"]))){
        // Get URL parameter
        $id =  trim($_GET["ALUMNO_ID"]);

        // Prepare a select statement
        $sql = "SELECT * FROM ALUMNO WHERE ALUMNO_ID = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $id);
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $NOMBRE = $row["NOMBRE"];
                    $APELLIDO = $row["APELLIDO"];
                    $CARNET = $row["CARNET"];
                    $SEMESTRE = $row["SEMESTRE"];
                    $PRIMER_PARCIAL = $row["PRIMER_PARCIAL"];
                    $SEGUNDO_PARCIAL = $row["SEGUNDO_PARCIAL"];
                    $INASISTENCIA = $row["INASISTENCIA"];
                    $EMAIL = $row["EMAIL"];
                    $DPI = $row["DPI"];
                    $SEXO = $row["SEXO"];
                    $FECHA_NACIMIENTO = $row["FECHA_NACIMIENTO"];
                    $ESTADO = $row["ESTADO"];

                } else{
                    header("location: error.php");
                    exit();
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($link);
    }  else{
        header("location: error.php");
        exit();
    }
}
?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Registro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Actualizar Registro</h2>
                    </div>
                    <p>Edite los valores de entrada y envíe para actualizar el registro.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        

                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="NOMBRE" class="form-control" value="<?php echo $NOMBRE; ?>">
                            
                        </div>

                        <div class="form-group">
                            <label>APELLIDO</label>
                            <input type="text" name="APELLIDO" class="form-control" value="<?=$APELLIDO?>"></input>
                            
                        </div>

                        <div class="form-group">
                            <label>CARNET</label>
                            <input type="number" name="CARNET" class="form-control" value="<?php echo $CARNET; ?>">
                            
                        </div>

                         <div class="form-group">
                            <label>SEMESTRE</label>
                            <input type="number" min="1" max="10" name="SEMESTRE" class="form-control" value="<?= $SEMESTRE?>"></input>
                        </div>

                        <div class="form-group">
                            <label>PRIMER PARCIAL</label>
                            <input type="number" min="1" max="15" name="PRIMER_PARCIAL" class="form-control" value="<?=$PRIMER_PARCIAL?>"></input>
                        </div>
                        <div class="form-group">
                            <label>SEGUNDO PARCIAL</label>
                            <input type="number" min="1" max="15" name="SEGUNDO_PARCIAL" class="form-control" value="<?=$SEGUNDO_PARCIAL?>"></input>
                        </div>
                        <div class="form-group">
                            <label>INASISTENCIA</label>
                            <input type="number" name="INASISTENCIA" class="form-control" value="<?=$INASISTENCIA?>"></input>
                        </div>
                        <div class="form-group">
                            <label>DPI</label>
                            <input type="number" name="DPI" class="form-control" value="<?=$DPI?>"></input>
                        </div>

                        <div class="form-group">
                            <label>EMAIL</label>
                            <input type="email" name="EMAIL" class="form-control" value="<?=$EMAIL?>"></input>
                        </div>

                        <div class="form-group">
                            <label>SEXO</label>
                            
                            <select class="form-control" name="SEXO">
                                <?php

                                    if($SEXO=='M'){
                                        echo '<option value="M" selected>Masculino</option>
                                        <option value="F">Femenino</option>';
                                    }else{
                                        echo '<option value="masculino" selected>Masculino</option>
                                        <option value="F">Femenino</option>';
                                    }

                                ?>
                                
                            </select>                            
                        </div>

                        <div class="form-group">
                            <label>FECHA DE NACIMIENTO</label>
                            <input type="date" name="FECHA_NACIMIENTO" class="form-control" value="<?=date('Y-m-d', strtotime($FECHA_NACIMIENTO))?>"></input>
                        </div>

                        <!--<div class="form-group">
                            <label>ESTADO</label>-->
                            <!--<input type="number" min="1" max="3" name="ESTADO" class="form-control" value="<?=$ESTADO?>"></input>-->
                            <!--<select name="ESTADO" class="form-control">
                                <option value="0" <?php/* if ($ESTADO == '0') echo 'selected'; */?>>Muy probable</option>
                                <option value="1" <?php /*if ($ESTADO == '1') echo 'selected'; */?>>Normal</option>
                                <option value="2" <?php /*if ($ESTADO == '2') echo 'selected'; */?>>Posible</option>
                            </select>
                            <span class="help-block"></span>
                        </div>-->



                        <input type="hidden" name="ALUMNO_ID" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Enviar">
                        <a href="index.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>