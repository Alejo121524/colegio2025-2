<?php
$host = "localhost";
$user = "root";
$pass = "1203alejo1"; 
$db   = "colegio_db";  

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
