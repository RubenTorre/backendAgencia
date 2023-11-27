<?php
include "conexion.php";
        $result = array();
        if(!isset($_POST['searchTerm'])){ 
              $sql = "select * from login.rol order by descripcionrol";
              $result = pg_query($con, $sql);
        }else{ 
              $search = $_POST['searchTerm']; 

              $sql = "select * from login.rol where descripcionrol ilike $1";
              $result = pg_query_params($con, $sql, array('%'.$search.'%'));
        }

        $data = array();

        while ($row = pg_fetch_assoc($result) ){

              $idrol = $row['idrol'];
              $descripcionrol = $row['descripcionrol'];

              $data[] = array(
                   "id" => $idrol, 
                   "text" => $descripcionrol
              );

        }

        echo json_encode($data);
        die;
?>
