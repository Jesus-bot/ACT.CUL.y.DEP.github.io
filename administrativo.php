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
    <center><h1>Iniciar sesión como administrativo</h1></center>
    
    <div>
    <form method="post" action="procesar_login_admin.php">
    <br><center><img class="pequeña" src="img/rocko.jpg" alt=""></center></br>
        <center><label for="username">Nombre de usuario:</label></center>
        <center><input type="text" id="username" name="username" pattern="[A-Z]{50}+" title="Solo letras en mayusculas son permitidos" required><br></center>
        
        <center><label for="password">Contraseña:</label></center>
        <center><input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{9,}" title="Debe contener al menos un número, una letra minúscula, una letra mayúscula y tener al menos 9 caracteres" required><br></center>
        
        <center><input type="submit" value="Iniciar sesión"></center>
    </form>
    </div> 
</div>
</body>
</html>