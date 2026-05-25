<?php
include("config/database.php");

if(isset($_POST['register'])){

    $username = $_POST['username'];
    $email = $_POST['email'];

    // Encriptar contraseña
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Por defecto será lector
    $role_id = 3;

    $sql = "INSERT INTO users(username,email,password,role_id)
            VALUES('$username','$email','$password','$role_id')";

    if(mysqli_query($conn,$sql)){
        echo "Usuario registrado correctamente";
    }else{
        echo "Error";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Registro de Usuario</h2>

    <form method="POST">

        <input type="text"
               name="username"
               class="form-control mb-3"
               placeholder="Usuario"
               required>

        <input type="email"
               name="email"
               class="form-control mb-3"
               placeholder="Correo"
               required>

        <input type="password"
               name="password"
               class="form-control mb-3"
               placeholder="Contraseña"
               required>

        <button type="submit"
                name="register"
                class="btn btn-success">
            Registrarse
        </button>

    </form>

</div>

</body>
</html>