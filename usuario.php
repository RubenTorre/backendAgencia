<?php
require_once('data.php');
?>
<!doctype html>
<html lang="es">
  <head>
    <title>usuario</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script type="text/javascript">
      function eliminar(url)
    {
        if(confirm("realmente deseas eliminar este registro")){
           window.location=url;
           }
    }
</script>
    

    
  </head>

  <body>
  
      <?php
      if(isset($_GET["m"])){
          switch($_GET["m"]){
              case '1':
                  ?><h4 style="color: green"> usuario ha sido eliminado</h4>
                  <?php                   
                  break;
                  
          }
      }
?>
      <h1 align="center">Bienvenidos Al Registro de Usuarios</h1>

      <h2><a href="add.php">
                    Crear Usuario
                </a></h2>
     <table class="table" >
                    <thead class="table-success table-striped" >
                        <tr>
                            <th>Nombre Usuario</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Estado</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
           <tbody>
       
      <!-- instanci clase usuario-->
               
                <?php  
                $usuario =new Usuario();
                $obtenerusurioas=$usuario->get_usuario();
               
                foreach( $obtenerusurioas as $item){
                ?>
                   <tr>
                    <td>
                      <?php echo $item["nombreusuario"];?>
                    </td>             
                    <td>
                      <?php echo $item["nombres"];?>
                    </td>
                    <td>
                      <?php echo $item["apellidos"];?>
                    </td>
                    <td>
                    <?php
                        if ( $item["estado"]=="a") {
                            echo "activo";
                        }else{
                        echo "inactivo" ;
                        }                
                    ?>                    
                    
                    </td>             
                    <td>
                     <a href="edit.php?idusuario=<?php echo $item["idusuario"];?>">Editar</a>
                    </td>             
                    <td>
                     <a href="javascript:void(0);" title="Eliminar" onclick="eliminar('delete.php?idusuario=<?php echo $item["idusuario"];?>')">Eliminar</a>
                    </td>
                     </tr>

                <?php
                }
                ?>
               
          </tbody>
      </table>    

  </body>

</html>
