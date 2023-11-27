<?php
     require_once('conexion.php');
class UsuarioLogica 
{

	 
	/**
	* Constructor
	* 
	* @retorna void
	 */
	 public function __construct()
	{
	
	}

	/**
	* Guarda el registro actual
	* @param array $datos
	* @return int
	*/
	
    public function loginusuario(){

      //  $arrayToken = $this->lNegocioToken->validarToken(RUTA_PUBLIC_KEY_AGROSERVICIOS);

       // if ($arrayToken['estado'] == 'exito') {
		<?php
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        // Leer un usuario específico
        $id = $_GET['id'];
        $stmt = $db->prepare("SELECT * FROM login    WHERE id = ?");
        $stmt->execute([$id]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode($usuario);
    } else {
        // Leer todos los usuarios
        $stmt = $db->query("SELECT * FROM usuarios");
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($usuarios);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Crear un nuevo usuario
    $data = json_decode(file_get_contents('php://input'), true);
    $stmt = $db->prepare("INSERT INTO usuarios (nombre, correo) VALUES (?, ?)");
    $stmt->execute([$data['nombre'], $data['correo']);
    echo "Usuario creado";
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    // Actualizar un usuario
    $data = json_decode(file_get_contents('php://input'), true);
    $stmt = $db->prepare("UPDATE usuarios SET nombre = ?, correo = ? WHERE id = ?");
    $stmt->execute([$data['nombre'], $data['correo'], $data['id']);
    echo "Usuario actualizado";
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Eliminar un usuario
    $id = $_GET['id'];
    $stmt = $db->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->execute([$id]);
    echo "Usuario eliminado";
}
?>

        // } else{
          //  echo json_encode($arrayToken);
        //}  
         }

}