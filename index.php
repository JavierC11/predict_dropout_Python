

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
                        <h2 class="pull-left" style="text-align: center;">LISTADO DE ALUMNOS</h2>
                        <a href="create.php" style="margin: 10px;" class="btn btn-success pull-right">Agregar nuevo Alumno</a> 
                        &nbsp;&nbsp;&nbsp;
                        <a href="analizar.php" style="margin: 10px;" class="btn btn-success pull-right">Analizar</a>

                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM ALUMNO";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
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
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
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
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
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