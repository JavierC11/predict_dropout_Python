<?php

// MOSTRAR ERRORES 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$ALUMNO_ID = $CARNET = $SEMESTRE = $INASISTENCIA = $PRIMER_PARCIAL = $SEGUNDO_PARCIAL = $NOMBRE = $APELLIDO = $DPI = $EMAIL = $FECHA_NACIMIENTO =$SEXO = $ESTADO = "";
 
// Processing form data when form is submitted



if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Recogida y asignación de valores del formulario
    $ALUMNO_ID = isset($_POST['ALUMNO_ID'])? $_POST['ALUMNO_ID'] : 0;
    $NOMBRE = isset($_POST['NOMBRE']) ? $_POST['NOMBRE'] : '';
    $APELLIDO = isset($_POST['APELLIDO']) ? $_POST['APELLIDO'] : '';
    $CARNET = isset($_POST['CARNET']) ? $_POST['CARNET'] : '';
    $SEMESTRE = isset($_POST['SEMESTRE']) ? $_POST['SEMESTRE'] : 0; // Asumiendo que es un entero
    $PRIMER_PARCIAL = isset($_POST['PRIMER_PARCIAL']) ? $_POST['PRIMER_PARCIAL'] : 0;
    $SEGUNDO_PARCIAL = isset($_POST['SEGUNDO_PARCIAL']) ? $_POST['SEGUNDO_PARCIAL'] : 0;
    $INASISTENCIA = isset($_POST['INASISTENCIA']) ? $_POST['INASISTENCIA'] : 0;
    $DPI = isset($_POST['DPI']) ? $_POST['DPI'] : 0;
    $EMAIL = isset($_POST['EMAIL']) ? $_POST['EMAIL'] : '';
    $FECHA_NACIMIENTO = isset($_POST['FECHA_NACIMIENTO']) ? $_POST['FECHA_NACIMIENTO'] : '';
    $SEXO = isset($_POST['SEXO']) ? $_POST['SEXO'] : '';
    $ESTADO = isset($_POST['ESTADO']) ? $_POST['ESTADO'] : 0;

    // Verificación adicional aquí si es necesaria...

    // Consulta SQL
    $sql = "INSERT INTO ALUMNO ( ALUMNO_ID, CARNET, SEMESTRE, INASISTENCIA, PRIMER_PARCIAL, SEGUNDO_PARCIAL, NOMBRE, APELLIDO, DPI, EMAIL, FECHA_NACIMIENTO, SEXO, ESTADO) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if($stmt = mysqli_prepare($link, $sql)){
        // Vinculación de parámetros
        mysqli_stmt_bind_param($stmt, "ssiissssissss", $ALUMNO_ID, $CARNET, $SEMESTRE, $INASISTENCIA, $PRIMER_PARCIAL, $SEGUNDO_PARCIAL, $NOMBRE, $APELLIDO, $DPI, $EMAIL, $FECHA_NACIMIENTO, $SEXO, $ESTADO);

        // Ejecución de la sentencia
        if(mysqli_stmt_execute($stmt)){
            header("location: index.php");
            exit();
        } else {
            echo "Something went wrong. Please try again later.";
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($link);
}




?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agregar Alumnos</title>
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
                        <h2>Agregar Alumnos</h2>
                    </div>
                    <p>Favor llene el formulario, para agregar al Alumno.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">


                        <div class="form-group">
                            <label>NOMBRE</label>
                            <input type="text" name="NOMBRE" class="form-control" value="<?php echo $NOMBRE; ?>">
                            <span class="help-block"></span>
                        </div>

                         <div class="form-group">
                            <label>APELLIDO</label>
                            <input type="text" name="APELLIDO" class="form-control" value="<?php echo $APELLIDO; ?>">
                            <span class="help-block"></span>
                        </div>


                        <div class="form-group">
                            <label>CARNET</label>
                            <input type="text" name="CARNET" class="form-control" value="<?php echo $CARNET; ?>">
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label>SEMESTRE</label>
                            <input type="number" name="SEMESTRE" class="form-control" value="<?php echo $SEMESTRE; ?>">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label>PRIMER PARCIAL</label>
                            <input type="number" name="PRIMER_PARCIAL" class="form-control" value="<?php echo $PRIMER_PARCIAL; ?>">
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group ">
                            <label>SEGUNDO PARCIAL</label>
                            <input type="number" name="SEGUNDO_PARCIAL" class="form-control" value="<?php echo $SEGUNDO_PARCIAL; ?>">
                            <span class="help-block"></span>
                        </div>

                  

                        <div class="form-group">
                            <label>INASISTENCIA</label>
                            <input type="number" name="INASISTENCIA" class="form-control" value="<?php echo $INASISTENCIA; ?>">
                            <span class="help-block"></span>
                        </div>

                       

                        <div class="form-group">
                            <label>DPI</label>
                            <input type="number" name="DPI" class="form-control" value="<?php echo $DPI; ?>">
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label>EMAIL</label>
                            <input type="email" name="EMAIL" class="form-control" value="<?php echo $EMAIL; ?>">
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label>SEXO</label>
                            
                            <select class="form-control" name="SEXO">
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>                            
                        </div>


                        <div class="form-group ">
                            <label>FECHA DE NACIMIENTO</label>
                            <input type="date" name="FECHA_NACIMIENTO" class="form-control" value="<?php echo $FECHA_NACIMIENTO; ?>">
                            <span class="help-block"></span>
                        </div>

                        
                        <!--<div class="form-group">
                            <label>ESTADO</label>-->
                            <!--<input type="number" name="ESTADO" class="form-control" value="<?php echo $ESTADO; ?>">-->
                            <!--<select name="ESTADO" class="form-control">
                                <option value="0" <?php/* if ($ESTADO == '0') echo 'selected'; */?>>Muy probable</option>
                                <option value="1" <?php/*if ($ESTADO == '1') echo 'selected'; */?>>Normal</option>
                                <option value="2" <?php/* if ($ESTADO == '2') echo 'selected'; */?>>Posible</option>
                            </select>

                            <span class="help-block"></span>
                        </div>-->


                       



                       <!-- <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>ID ALUMNO</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>CARNET</label>
                            <input type="number" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>NOMBRE</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>APELLIDO</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>

                         <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>DPI</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>


                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>EMAIL</label>
                            <input type="address" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>


                        <div class="form-group <?php echo (!empty($salary_err)) ? 'has-error' : ''; ?>">
                            <label>FECHA DE NACIMIENTO</label>
                            <input type="date" name="salary" class="form-control" value="<?php echo $salary; ?>">
                            <span class="help-block"><?php echo $salary_err;?></span>
                        </div>-->





                        <input type="submit" class="btn btn-primary" value="Enviar">
                        <a href="index.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>