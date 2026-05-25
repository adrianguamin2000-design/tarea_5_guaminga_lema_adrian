<?php

include("config/database.php");

// Encriptar contraseña
$password = password_hash("123456", PASSWORD_DEFAULT);

// Insertar bibliotecario
$sql = "INSERT INTO users(
username,
email,
password,
role_id
)

VALUES(

'bibliotecario',
'biblio@gmail.com',
'$password',
2

)";

if(mysqli_query($conn,$sql)){

    echo "Bibliotecario creado correctamente";

}else{

    echo "Error: " . mysqli_error($conn);

}

?>