<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

require_once 'conexion.php';

$conexion = new Conexion();
$db = $conexion->db;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['nombreusuario'], $data['contrasenia'])) {
        $nombreusuario = $data['nombreusuario'];
        $contrasenia = $data['contrasenia'];

        try {
            $stmt = $db->prepare("SELECT nombre FROM login WHERE nombreusuario = ? AND contrasenia = ?");
            $stmt->execute([$nombreusuario, $contrasenia]);
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario) {
                $response = array("success" => true);
            } else {
                $response = array("success" => false, "message" => "Credenciales incorrectas");
            }
        } catch (PDOException $e) {
            $response = array("success" => false, "message" => "Error de base de datos: " . $e->getMessage());
        }
    } else {
        $response = array("success" => false, "message" => "Faltan datos de usuario o contraseña");
    }
} else {
    $response = array("success" => false, "message" => "Método de solicitud no válido");
}

echo json_encode($response);
?>
