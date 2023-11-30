<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login_alumno.php");
    exit();
}

$username = $_SESSION['username'];

if (isset($_GET['documento'])) {
    $documento_nombre = $_GET['documento'];

    $conexion = mysqli_connect('localhost', 'alumno', 'alum', 'proyecto_cyd');

    if (!$conexion) {
        die("Error de conexión a la base de datos: " . mysqli_connect_error());
    }

    // Obtén el documento desde la base de datos
    $query = "SELECT contenido_documento, tipo_documento FROM documentos WHERE nombre_documento = '$documento_nombre'";
    $resultado = mysqli_query($conexion, $query);

    if ($fila = mysqli_fetch_assoc($resultado)) {
        $documento_contenido = $fila['contenido_documento'];
        $documento_tipo = $fila['tipo_documento'];

        // Configura las cabeceras para la visualización en línea
        header("Content-Type: $documento_tipo");
        header("Content-Disposition: inline; filename=$documento_nombre");

        // Envía el contenido del documento
        echo $documento_contenido;

        // Cierra la conexión a la base de datos
        mysqli_close($conexion);
        exit();
    }
}

// Si algo salió mal, redirige al inicio
header("Location: inicio.php");
exit();
?>
