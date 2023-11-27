<?php
require_once('data.php');
$usuario=new Usuario();
$usuario->deleteuserrol($_GET["idusuriorol"]);
?>