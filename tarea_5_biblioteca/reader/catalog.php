<?php
include("../config/database.php");

$books = mysqli_query($conn,"SELECT * FROM books");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <title>Catálogo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Catálogo de Libros</h2>

    <table class="table table-striped">

        <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Género</th>
            <th>Cantidad</th>
        </tr>

        <?php while($book = mysqli_fetch_assoc($books)){ ?>

        <tr>

            <td><?php echo $book['title']; ?></td>
            <td><?php echo $book['author']; ?></td>
            <td><?php echo $book['genre']; ?></td>
            <td><?php echo $book['quantity']; ?></td>

        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>