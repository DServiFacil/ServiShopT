<?php
$servername = "localhost";
$username = "root";  // Reemplaza con tu nombre de usuario de MySQL
$password = "";  // Deja esto como una cadena vacía si tu usuario no tiene contraseña
$database = "Tortilleria";

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $database);

// Verificar la conexión
if (!$conn) {
    die("La conexión a la base de datos ha fallado: " . mysqli_connect_error());
}


// Aquí puedes realizar tus operaciones en la base de datos

?>
