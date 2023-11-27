<?php


session_start(); // Inicia la sesión

// Verifica si hay una sesión activa
if (isset($_SESSION['nombreusuario'])) {
    // Elimina todas las variables de sesión
    session_unset();

    // Destruye la sesión
    session_destroy();
}

// Redirige al usuario a la página de inicio o a donde desees después de cerrar la sesión
header("Location: index.php"); // Cambia "index.php" al URL de la página a la que deseas redirigir
exit();
?>
<?php
// Incluye tu lógica de manejo de sesiones si es necesario

// Verifica si hay una sesión activa
if (isset($_SESSION['nombreusuario'])) {
    // Elimina todas las variables de sesión
    session_unset();

    // Destruye la sesión
    session_destroy();

    // Devuelve una respuesta JSON para indicar que la sesión se ha cerrado con éxito
    $response = array("success" => true, "message" => "Sesión cerrada correctamente");
} else {
    // Devuelve una respuesta JSON si no hay sesión activa
    $response = array("success" => false, "message" => "No se encontró una sesión activa");
}

// Configura las cabeceras para permitir el acceso a esta API
header("Access-Control-Allow-Origin: *"); // O ajusta el origen según tus necesidades
header("Content-Type: application/json");

// Devuelve la respuesta como JSON
echo json_encode($response);
?>
