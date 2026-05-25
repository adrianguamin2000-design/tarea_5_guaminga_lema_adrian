<?php

session_start();

include("../config/database.php");

// Verificar si es administrador
if(!isset($_SESSION['user_id'])){

    header("Location: ../login.php");
    exit();

}

if($_SESSION['role_id'] != 1){

    echo "Acceso denegado";
    exit();

}

// Obtener usuarios
$sql = "SELECT users.id,
               users.username,
               users.email,
               roles.name AS role
        FROM users
        INNER JOIN roles
        ON users.role_id = roles.id";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Gestionar Usuarios</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <div class="card p-4">

        <h2 class="mb-4">
            Gestión de Usuarios
        </h2>

        <table class="table table-bordered table-hover">

            <thead class="table-dark">

                <tr>

                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Email</th>
                    <th>Rol</th>

                </tr>

            </thead>

            <tbody>

            <?php while($row = mysqli_fetch_assoc($result)){ ?>

                <tr>

                    <td>
                        <?php echo $row['id']; ?>
                    </td>

                    <td>
                        <?php echo $row['username']; ?>
                    </td>

                    <td>
                        <?php echo $row['email']; ?>
                    </td>

                    <td>
                        <?php echo $row['role']; ?>
                    </td>

                </tr>

            <?php } ?>

            </tbody>

        </table>

        <a href="../dashboard.php"
           class="btn btn-primary">

           Volver al Dashboard

        </a>

    </div>

</div>

</body>
</html>