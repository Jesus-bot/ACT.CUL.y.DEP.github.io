<?php
session_start();
include 'conexionBD.php';
if (!isset($_SESSION['username'])) {
    header("Location: login_administrativo.php");
    exit();
}

$username = $_SESSION['username'];
?>

<?php
$conexion=mysqli_connect('localhost', 'administrativo', 'admin', 'proyecto_cyd');
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="inicio.css">
    <title>DEP. ACT. CULTURALES Y DEPORTIVAS</title>

    <!-- Estilos de DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

    <!-- jQuery y DataTables -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <!-- Otros estilos y scripts necesarios -->

    <!-- Tu script de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>
<body>
    <div>
        <header class="header">
            <center><a href="inicio.php"><img title="ACCESO" src="img/tesi.jpg" alt=""></a></center>
            <center><h1>BIENVENIDO AL DEPARTAMENTO DE ACTIVIDADES CULTURALES Y DEPORTIVAS</h1></center>
        </header>
        <div>
            <br><center><img class="pequeña" src="img/rocko.jpg" alt=""></center></br>
            <center><h1>¡Bienvenido, <?php echo $username; ?>!</h1></center>
            <center><p>Este es el panel del administrativo.</p></center>
            <center><a href="cerrar_sesion_admin.php">Cerrar sesión</a></center>
        </div>

        <br><br><center><h2>ALUMNOS</h2></center>

        <div class="container">
            <div class="users-table">
                <table id="Alumnos">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE DEL ALUMNO</th>
                            <th>APELLIDO</th>
                            <th>CORREO</th>
                            <th>NUMERO CELULAR</th>
                            <th>MATRICULA</th>
                            <th>CARRERA</th>
                            <th>USUARIO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $sql = "SELECT * FROM Alumnos";
                        $result = $conexion->query($sql);?>
                        <?php while ($row = mysqli_fetch_array($result)){ ?>
                            <tr>
                                <td><?= $row['id_alumno'] ?></td>
                                <td><?= $row['nom_alumno'] ?></td>
                                <td><?= $row['apellido'] ?></td>
                                <td><?= $row['correo_e'] ?></td>
                                <td><?= $row['num_tel'] ?></td>
                                <td><?= $row['matricula'] ?></td>
                                <td><?= $row['carrera'] ?></td>
                                <td><?= $row['usuario'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <br>
        <center><h1>Subir un archivo a la base de datos</h1></center><br>
        <form action="procesar_carga.php" method="post" enctype="multipart/form-data">
            <div class="container_1">
                <center><h5>SELECCIONE LA MATRICULA</h5></center>
            </div>
            <center>
                <select class="control" name="matricula">
                    <?php
                    $sql = "SELECT matricula FROM alumnos";
                    $result = mysqli_query($conexion, $sql);
                    while ($mostrar = mysqli_fetch_array($result)) {
                        ?>
                        <option><?php echo $mostrar['matricula'] ?></option>
                        <?php
                    }
                    ?>
                </select>
            </center>
            <center>
                <select id="curso" name="curso" required>
                    <option value="" disabled selected>Seleccione el curso</option>
                    <option value="AJEDREZ">AJEDREZ</option>
                    <option value="FUTBOL">FUTBOL</option>
                    <option value="BASQUETBOL">BASQUETBOL</option>
                    <option value="ARTES PLASTICAS">ARTES PLASTICAS</option>
                    <option value="TAEKWONDO">TAEKWONDO</option>
                    <option value="KICK BOXING">KICK BOXING</option>
                </select>
            </center>
            <div class="container_3">
                <center><input type="file" name="archivo" required></center>
                <center><input type="submit" value="Cargar Archivo"></center>
            </div>
        </form>
    </div>

    <!-- Tu script DataTables -->
    <script>
        $(document).ready(function() {
            $('#Alumnos').DataTable({
                "lengthMenu": [5, 10, 25, 50, 100], // Define las opciones de cantidad por página
                "pageLength": 10 // Define la cantidad de registros por página inicial
            });
        });
    </script>
</body>
</html>
