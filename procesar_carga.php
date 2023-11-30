<?php
session_start();

// Conexión a la base de datos (debes configurar estos valores según tu entorno)
$servername = "localhost";
$username = "administrativo";
$password = "admin";
$database = "proyecto_cyd";

$conn = new mysqli($servername, $username, $password, $database);

// Verifica si el usuario está autenticado
if (!isset($_SESSION['username'])) {
    header("Location: login_administrativo.php");
    exit();
}

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera la matrícula, curso y archivo del formulario
    $matricula = $_POST['matricula'];
    $curso = $_POST['curso'];

    // Procesa la carga del archivo
    if (isset($_FILES['archivo'])) {
        $archivo_nombre = $_FILES['archivo']['name'];
        $archivo_tipo = $_FILES['archivo']['type'];
        $archivo_temp = $_FILES['archivo']['tmp_name'];
        $archivo_tamano = $_FILES['archivo']['size'];

        // Lee el contenido del archivo
        $archivo_contenido = file_get_contents($archivo_temp);

        // Inserta la información en la nueva tabla
        $sql_insert = "INSERT INTO Documentos (matricula, curso, nombre_documento, tipo_documento, contenido_documento, fecha_creacion, autor, formato_documento) 
                       VALUES (?, ?, ?, ?, ?, NOW(), ?, ?)";
        
        $stmt = $conn->prepare($sql_insert);
        
        // Vincular parámetros
        $stmt->bind_param('sssssss', $matricula, $curso, $archivo_nombre, $archivo_tipo, $archivo_contenido, $_SESSION['username'], pathinfo($archivo_nombre, PATHINFO_EXTENSION));
        
        // Ejecutar la sentencia
        if ($stmt->execute()) {
            // Registro exitoso, redirige al panel del administrativo
            header("location: panel_administrativo.php");
            exit();
        } else {
            echo "Error al subir el archivo: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "No se ha seleccionado ningún archivo.";
    }
}

// Cierra la conexión a la base de datos
$conn->close();
?>



