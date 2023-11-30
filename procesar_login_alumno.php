<?php
session_start();

// Conexión a la base de datos (debes configurar estos valores según tu entorno)
$servername = "localhost";
$username = "alumno";
$password = "alum";
$database = "proyecto_cyd";

$conn = new mysqli($servername, $username, $password, $database);

// Obtener los datos de inicio de sesión del formulario
$username = $_POST['username'];
$passwordEntered = $_POST['password'];

// Consulta para obtener la contraseña almacenada en la base de datos
$sql = "SELECT * FROM Alumnos WHERE usuario = '$username'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // Obtener la fila de la base de datos
    $row = $result->fetch_assoc();

    // Verificar si la contraseña ingresada coincide con la almacenada (después de decodificar con base64)
    if (base64_decode($row['contraseña']) === $passwordEntered) {
        // Inicio de sesión exitoso
        $_SESSION['username'] = $username;
        header("Location: panel_alumno.php");
    } else {
        // Error en las credenciales, redirige de nuevo a la página de inicio de sesión
        header("Location: alumno.php");
    }
} else {
    // Error en las credenciales, redirige de nuevo a la página de inicio de sesión
    header("Location: alumno.php");
}

// Cerrar la conexión
$conn->close();
?>





