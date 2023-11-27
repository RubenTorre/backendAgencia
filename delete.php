<?php
require_once('data.php');
$usuario=new Usuario();
$usuario->delete($_GET["id"]);
?>