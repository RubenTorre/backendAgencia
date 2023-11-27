<?php
// Establece los encabezados CORS para permitir solicitudes desde cualquier origen
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

include "conexion.php";

class Servicio {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function listarAgentes() {
        $sql = "SELECT idagente, nombre, apellido, numeroidentifiacion FROM agentes";
        $stmt = $this->conexion->db->prepare($sql);
        $stmt->execute();
        $agentes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($agentes);
    }
}

$servicio = new Servicio();
$servicio->listarAgentes();
?>
