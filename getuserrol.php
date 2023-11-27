<?php
include "conexion.php";
        $result = array();
        if(!isset($_POST['searchTerm'])){ 
              $sql = "select * from login.usuariorol order by nombreusuario";
              $result = pg_query($con, $sql);
        }else{ 
              $search = $_POST['searchTerm']; 

              $sql = "select * from login.usuario where nombreusuario ilike $1";
              $result = pg_query_params($con, $sql, array('%'.$search.'%'));
        }

        $data = array();

        while ($row = pg_fetch_assoc($result) ){

              $idusuario = $row['idusuario'];
              $nombreusuario = $row['nombreusuario'];

              $data[] = array(
                   "id" => $idusuario, 
                   "text" => $nombreusuario
              );

        }

        echo json_encode($data);
        die;
?>




