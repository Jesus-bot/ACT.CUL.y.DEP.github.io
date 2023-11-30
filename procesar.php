<?php
if (isset($_POST['rol'])) {
    $rol = $_POST['rol'];
    if ($rol == 'Administrativo') {
        // Redirige a la página de administrativo
        header("Location: administrativo.php");
        exit;
    } elseif ($rol == 'Alumno') {
        // Redirige a la página de alumno
        header("Location: alumno.php");
        exit;
    }
}
?>