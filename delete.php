<?php
// MOSTRAR ERRORES 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Incluir archivo de configuración
require_once "config.php";

// Chequear si el ID del alumno está presente
if(isset($_GET["ALUMNO_ID"]) && !empty(trim($_GET["ALUMNO_ID"]))){
    // Preparar la consulta de eliminación
    $sql = "DELETE FROM ALUMNO WHERE ALUMNO_ID = ?";

    if($stmt = mysqli_prepare($link, $sql)){
        // Vincular variables a la declaración preparada como parámetros
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Establecer parámetros
        $param_id = trim($_GET["ALUMNO_ID"]);

        // Intentar ejecutar la declaración preparada
        if(mysqli_stmt_execute($stmt)){
            // Registro eliminado con éxito. Redirigir a la página principal
            header("location: index.php");
            exit();
        } else{
            echo "Oops! Algo salió mal. Por favor, inténtalo de nuevo más tarde.";
        }
    }
     
    // Cerrar declaración
    mysqli_stmt_close($stmt);
    
    // Cerrar conexión
    mysqli_close($link);
} else{
    // ID de alumno no válido: redirigir a la página de error
    if(empty(trim($_GET["ALUMNO_ID"]))){
        echo "ID de alumno no válido.";
    } else {
        header("location: error.php");
        exit();
    }
}
?>
