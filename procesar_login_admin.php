<?php
session_start();

// Conexión a la base de datos (debes configurar estos valores según tu entorno)
$servername = "localhost";
$username = "administrativo";
$password = "admin";
$database = "proyecto_cyd";

$conn = new mysqli($servername, $username, $password, $database);


// Obtener los datos de inicio de sesión del formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Consulta para verificar las credenciales (debes ajustarla según tu esquema de base de datos)
$sql = "SELECT * FROM Admin WHERE usuario = '$username' AND contraseña = '$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // Inicio de sesión exitoso
    $_SESSION['username'] = $username;
    header("Location: panel_administrativo.php");
} else {
    // Error en las credenciales, redirige de nuevo a la página de inicio de sesión
    header("Location: administrativo.php");
}
// Cerrar la conexión
$conn->close();
?>
