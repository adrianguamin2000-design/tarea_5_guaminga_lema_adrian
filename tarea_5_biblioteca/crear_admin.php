<?php

include("config/database.php");

// Encriptar contraseña
$password = password_hash("123456", PASSWORD_DEFAULT);

$sql = "INSERT INTO users(username,email,password,role_id)
VALUES(
'admin',
'admin@gmail.com',
'$password',
1
)";

if(mysqli_query($conn,$sql)){
    echo "Administrador creado correctamente";
}else{
    echo "Error: " . mysqli_error($conn);
}

?>