<?php

session_start();

// Verificar login
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <div class="card p-4">

        <h1>
            Bienvenido
            <?php echo $_SESSION['username']; ?>
        </h1>

        <hr>

        <?php

        // ADMINISTRADOR
        if($_SESSION['role_id'] == 1){

            echo "
            <h3>Administrador</h3>

            <a href='admin/users.php'
               class='btn btn-danger'>
               Gestionar Usuarios
            </a>
            ";
        }

        // BIBLIOTECARIO
        if($_SESSION['role_id'] == 2){

            echo "
            <h3>Bibliotecario</h3>

            <a href='librarian/books.php'
               class='btn btn-warning'>
               Gestionar Libros
            </a>
            ";
        }

        // LECTOR
        if($_SESSION['role_id'] == 3){

            echo "
            <h3>Lector</h3>

            <a href='reader/catalog.php'
               class='btn btn-success'>
               Ver Catálogo
            </a>
            ";
        }

        ?>

        <br><br>

        <a href="logout.php"
           class="btn btn-secondary">

            Cerrar Sesión

        </a>

    </div>

</div>

</body>
</html>