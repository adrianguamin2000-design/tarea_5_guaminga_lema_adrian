<?php

include("config/database.php");

// Encriptar contraseña
$password = password_hash("123456", PASSWORD_DEFAULT);

// Insertar lector
$sql = "INSERT INTO users(
username,
email,
password,
role_id
)

VALUES(

'lector',
'lector@gmail.com',
'$password',
3

)";

if(mysqli_query($conn,$sql)){

    echo "Lector creado correctamente";

}else{

    echo "Error: " . mysqli_error($conn);

}

?>