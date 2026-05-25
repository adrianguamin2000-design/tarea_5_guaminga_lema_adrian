<?php
session_start();

// Conexión a la base de datos
include("config/database.php");

// Verificar si se envió el formulario
if(isset($_POST['login'])){

    // Guardar datos del formulario
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Buscar usuario por email
    $sql = "SELECT * FROM users WHERE email = '$email'";

    $result = mysqli_query($conn, $sql);

    // Verificar si existe el usuario
    if(mysqli_num_rows($result) > 0){

        // Convertir resultado en array
        $user = mysqli_fetch_assoc($result);

        // Verificar contraseña
        if(password_verify($password, $user['password'])){

            // Guardar datos en sesión
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role_id'] = $user['role_id'];

            // Redireccionar al dashboard
            header("Location: dashboard.php");
            exit();

        }else{
            $error = "Contraseña incorrecta";
        }

    }else{
        $error = "Usuario no encontrado";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login Biblioteca</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        body{
            background: #f4f6f9;
        }

        .login-box{
            width: 400px;
            margin: 80px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.2);
        }

    </style>

</head>

<body>

<div class="login-box">

    <h2 class="text-center mb-4">
        Sistema Biblioteca
    </h2>

    <!-- Mostrar errores -->
    <?php if(isset($error)){ ?>

        <div class="alert alert-danger">
            <?php echo $error; ?>
        </div>

    <?php } ?>

    <!-- FORMULARIO -->
    <form method="POST">

        <!-- EMAIL -->
        <div class="mb-3">

            <label class="form-label">
                Correo Electrónico
            </label>

            <input type="email"
                   name="email"
                   class="form-control"
                   placeholder="Ingrese su correo"
                   required>

        </div>

        <!-- PASSWORD -->
        <div class="mb-3">

            <label class="form-label">
                Contraseña
            </label>

            <input type="password"
                   name="password"
                   class="form-control"
                   placeholder="Ingrese su contraseña"
                   required>

        </div>

        <!-- BOTÓN -->
        <div class="d-grid">

            <button type="submit"
                    name="login"
                    class="btn btn-primary">

                Iniciar Sesión

            </button>

        </div>

    </form>

    <hr>

    <div class="text-center">

        <a href="register.php">
            Crear Cuenta
        </a>

    </div>

</div>

</body>
</html>