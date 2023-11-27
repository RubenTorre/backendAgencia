<?php
require_once('data.php');
$usuario=new Usuario();
$usuario->deleterol($_GET["id"]);
?>