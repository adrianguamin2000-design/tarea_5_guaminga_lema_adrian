<?php
include("../config/database.php");

if(isset($_POST['add'])){

    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];
    $genre = $_POST['genre'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO books(title,author,year,genre,quantity)
            VALUES('$title','$author','$year','$genre','$quantity')";

    mysqli_query($conn,$sql);
}

$books = mysqli_query($conn,"SELECT * FROM books");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <title>Libros</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Gestión de Libros</h2>

    <form method="POST">

        <input type="text" name="title"
               placeholder="Título"
               class="form-control mb-2">

        <input type="text" name="author"
               placeholder="Autor"
               class="form-control mb-2">

        <input type="number" name="year"
               placeholder="Año"
               class="form-control mb-2">

        <input type="text" name="genre"
               placeholder="Género"
               class="form-control mb-2">

        <input type="number" name="quantity"
               placeholder="Cantidad"
               class="form-control mb-2">

        <button class="btn btn-primary"
                name="add">
            Agregar Libro
        </button>

    </form>

    <hr>

    <table class="table table-bordered">

        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Año</th>
            <th>Género</th>
            <th>Cantidad</th>
        </tr>

        <?php while($book = mysqli_fetch_assoc($books)){ ?>

        <tr>

            <td><?php echo $book['id']; ?></td>
            <td><?php echo $book['title']; ?></td>
            <td><?php echo $book['author']; ?></td>
            <td><?php echo $book['year']; ?></td>
            <td><?php echo $book['genre']; ?></td>
            <td><?php echo $book['quantity']; ?></td>

        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>