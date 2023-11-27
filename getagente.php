<?php
include "conexion.php";

$result = array();

if (!isset($_POST['searchTerm'])) { 
    $sql = "SELECT * FROM agente ORDER BY nombre, apellido";
    $result = pg_query($con, $sql);
} else { 
    $search = $_POST['searchTerm']; 

    $sql = "SELECT * FROM agente WHERE nombre ILIKE $1 OR apellido ILIKE $1 ORDER BY nombre, apellido";
    $result = pg_query_params($con, $sql, array('%' . $search . '%'));
}

$data = array();

while ($row = pg_fetch_assoc($result)) {
    $idagente = $row['idagente'];
    $nombre = $row['nombre'];
    $apellido = $row['apellido'];

    $data[] = array(
        "id" => $idagente, 
        "nombre" => $nombre,
        "apellido" => $apellido
    );
}

header('Content-Type: application/json');
echo json_encode($data);
die;
?>
