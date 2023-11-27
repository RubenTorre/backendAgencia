<?php
require_once('data.php');

?>
<!doctype html>
<html lang="es">
  <head>
    <title>usuario rol</title>
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
      <h1 align="center">Bienvenidos Al Registro de usuario roles</h1>

      <h2><a href="userrol.php">
                    Crear Roles a los Usuarios
                </a></h2>
     <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>Usario</th>
                                        <th>Rol</th>
                                        <th>Estado</th>                                       
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
           <tbody>
       
     
      
        <?php  
        $usuario =new Usuario();
               
        $usuriorol=$usuario->get_nombreusuario_decripcionrol_usuriorol() ;
     
        foreach($usuriorol as $item){
       
        ?>
        <tr>
            <td>
              <?php echo $item["pnombreusuario"];?>
            </td>             
            <td>
              <?php echo $item["pdescripcionrol"];?>
            </td>
            <td>
            <?php
              if ( $item["pestado"]=="a") {
                  echo "activo";
                }else{
                 echo "inactivo" ;
              }                
            ?>
            </td>             
            <td>
             <a href="edituserrol.php?idusuriorol=<?php echo $item["pidusuriorol"]?>">Editar</a>
            </td>             
            <td>
             <a href="javascript:void(0);" title="Eliminar" onclick="eliminar('deleteuserrol.php?idusuriorol=<?php echo $item["pidusuriorol"];?>')">Eliminar</a>
            </td>
            </tr>

        <?php
        }
        ?>
    
      </tbody>
      </table>
      
    

  
  </body>
</html>
