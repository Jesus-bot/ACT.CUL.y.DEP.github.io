<?php
$servername = "localhost";
$username = "administrativo";
$password = "admin";
$database = "proyecto_cyd";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("ERROR. NO SE HA PODIDO CONECTAR A LA BASE DE DATOS" . $conn->connect_error);
}
?>