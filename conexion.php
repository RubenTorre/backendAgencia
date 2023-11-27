<?php
$host = 'localhost';
$dbname = 'ant';
$usuario = 'root';
$contrasena = '';

class Conexion {
    public $db;

    public function __construct($contentType = "application/json") {
        global $host, $dbname, $usuario, $contrasena;

        if ($contentType === "application/json") {
            header("Content-Type: application/json");
        } else if ($contentType === "text/html") {
            header("Content-Type: text/html");
        }

        try {
            $this->db = new PDO("mysql:host=$host;dbname=$dbname", $usuario, $contrasena);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }
    }
}
?>
