<?php
// Conexión a la base de datos (debes configurar estos valores según tu entorno)
$servername = "localhost";
$username = "alumno";
$password = "alum";
$database = "proyecto_cyd";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$matricula = $_POST['matricula'];
$carrera = $_POST['carrera'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];

// Encriptar la contraseña antes de almacenarla en la base de datos con asteriscos
$hashed_password = base64_encode($password);


// Consulta para insertar los datos en la base de datos utilizando una sentencia preparada
$sql = "INSERT INTO alumnos (nom_alumno, apellido, correo_e, num_tel, matricula, carrera, usuario, contraseña) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

// Verificar si la preparación de la sentencia fue exitosa
if ($stmt) {
    // Vincular parámetros
    $stmt->bind_param("ssssssss", $nombre, $apellido, $correo, $telefono, $matricula, $carrera, $usuario, $hashed_password);

    // Ejecutar la sentencia
    if ($stmt->execute()) {
        // Registro exitoso, redirige a la página de inicio de sesión
        header("Location: alumno.php");
    } else {
        echo "Error al registrar: " . $stmt->error;
    }

    // Cerrar la sentencia preparada
    $stmt->close();
} else {
    echo "Error en la preparación de la consulta: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
