<?php
session_start();

// Verifica si el usuario ha iniciado sesión antes de acceder a esta página
if (!isset($_SESSION['username'])) {
    header("Location: login_alumno.php"); // Redirige a la página de inicio de sesión si no ha iniciado sesión
    exit();
}

$username = $_SESSION['username']; // Obtiene el nombre de usuario almacenado en la sesión

// Conexión a la base de datos
$conexion = mysqli_connect('localhost', 'alumno', 'alum', 'proyecto_cyd');

// Verifica la conexión
if (!$conexion) {
    die("Error de conexión a la base de datos: " . mysqli_connect_error());
}

// Consulta para obtener las constancias del alumno logeado
$query = "SELECT matricula, curso, nombre_documento FROM documentos WHERE matricula = (SELECT matricula FROM alumnos WHERE usuario = '$username')";
$resultado = mysqli_query($conexion, $query);

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="inicio.css">
    <title>DEP. ACT. CULTURALES Y DEPORTIVAS</title>
</head>

<body>
    <div>
        <header class="header">
            <center><a href="inicio.php"><img title="ACCESO" src="img/tesi.jpg" alt=""></a></center>
            <center><h1>BIENVENIDO AL DEPARTAMENTO DE ACTIVIDADES CULTURALES Y DEPORTIVAS</h1></center>
        </header>
        <div>
            <br><center><img class="pequeña" src="img/rocko.jpg" alt=""></center></br>
            <center><h1>Bienvenido, <?php echo $username; ?>!</h1></center>
            <center><p>Este es el panel del alumno.</p></center>
            <center><a href="cerrar_sesion_alumno.php">Cerrar sesión</a></center>

            <!-- Mostrar tabla con constancias -->
            <center>
                <table border="1">
                    <tr>
                        <th>Matrícula</th>
                        <th>Curso</th>
                        <th>ARCHIVO</th>
                        <th>DESCARGAR</th>
                    </tr>
                    <?php
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>";
                        echo "<td><center>" . $fila['matricula'] . "</center></td>";
                        echo "<td><center>" . $fila['curso'] . "</center></td>";
                        echo "<td><center>" . $fila['nombre_documento'] . "</center></td>";
                        echo "<td><center><a href='descargar_documento.php?documento=" . $fila['nombre_documento'] . "'>Descargar</a></center></td>"; 
                        echo "</tr>";
                    }
                    ?>
                </table>
            </center>
        </div>
    </div>
</body>

</html>

<?php
// Cierra la conexión a la base de datos
mysqli_close($conexion);
?>

