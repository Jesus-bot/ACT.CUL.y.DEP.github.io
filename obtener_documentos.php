<?php
$conexion = mysqli_connect('localhost', 'alumno', 'alum', 'proyecto_cyd');

// Verificar la conexión
if (!$conexion) {
    die("La conexión a la base de datos falló: " . mysqli_connect_error());
}

$query = "SELECT matricula, curso, nombrearchivo, contenidoarchivo FROM constancias"; // Reemplaza "tu_tabla" con el nombre real de tu tabla en la base de datos
$resultado = mysqli_query($conexion, $query);

$data = array();
while ($row = mysqli_fetch_assoc($resultado)) {
    $data[] = $row;
}

echo json_encode(array("data" => $data));
?>
