<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "ant";

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}