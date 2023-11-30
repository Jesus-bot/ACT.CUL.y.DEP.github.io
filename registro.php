<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="inicio.css">
    <title>Registro de Alumnos</title>
</head>
<body>
<div>
    <header class="header">
        <center><a href="inicio.php"><img title="ACCESO" src="img/tesi.jpg" alt=""></a></center>
        <center><h1>BIENVENIDO AL DEPARTAMENTO DE ACTIVIDADES CULTURALES Y DEPORTIVAS</h1></center>
    </header>
    <center><h1>Registro de Alumnos</h1></center>
    
    <div>
        <form method="post" action="procesar_registro.php">
        <br><center><img class="pequeña" src="img/rocko.jpg" alt=""></center></br>
            <center><label for="nombre">Nombre:</label></center>
            <center><input type="text" id="nombre" name="nombre" pattern="[A-Z]{50}+" title="Solo letras en mayusculas son permitidos" required><br></center>
            
            <center><label for="apellido">Apellido:</label></center>
            <center><input type="text" id="apellido" name="apellido" pattern="[A-Z]{50}+" title="Solo letras en mayusculas son permitidos" required><br></center>
            
            <center><label for="correo">Correo:</label !-- pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}"--></center  > 
            <center><input type="email" id="correo" name="correo" required><br></center>
            
            <center><label for="telefono">Número de celular:</label></center>
            <center><input type="tel" id="telefono" name="telefono" pattern="[0-9]{10}" title= "Debe contener un numero de celular con 10 digitos" required><br></center>
            
            <center><label for="matricula">Matrícula:</label></center>
            <center><input type="text" id="matricula" name="matricula" pattern="[0-9]{9}" title="Debe contener exactamente 9 dígitos numéricos" required><br></center>
            
            <center><label for="carrera">Carrera:</label></center>
            <center>
                <select id="carrera" name="carrera" required>
                    <option value="" disabled selected>Seleccione una carrera</option>
                    <option value="ING. SISTEMAS COMPUTACIONALES">ING. SISTEMAS COMPUTACIONALES</option>
                    <option value="ING. INFORMATICA">ING. INFORMATICA</option>
                    <option value="ARQUITECTURA">ARQUITECTURA</option>
                    <option value="ING. BIOMEDICA">ING. BIOMEDICA</option>
                    <option value="ING. ELECTRONICA">ING. ELECTRONICA</option>
                    <option value="ING. AMBIENTAL">ING. AMBIENTAL</option>
                    <option value="LIC. ADMINISTRACION">LIC. ADMINISTRACION</option>
                </select>
            </center>

            <center><label for="usuario">Nombre de usuario:</label></center>
            <center><input type="text" id="usuario" name="usuario" pattern="[A-Z]{50}+" title="Solo letras en mayusculas son permitidos" required><br></center>
            
            <center><label for="password">Contraseña:</label></center>
            <center><input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{9,}" title="Debe contener al menos un número, una letra minúscula, una letra mayúscula y tener al menos 9 caracteres" required><br></center>
            
            <center><input type="submit" value="Registrarse"></center>
        </form>
        
        <center><p>¿Ya tienes una cuenta? <a href="alumno.php">Iniciar sesión</a></p></center>
    </div> 
</div>
</body>
</html>
