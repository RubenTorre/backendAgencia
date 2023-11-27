<?php
require_once('data.php');
$usuario=new Usuario();
if(isset($_POST["grabar"]) and $_POST["grabar"]=="si"){
    $usuario->addusuariorol();
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <tittle></tittle>
        
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Script -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    </head>
    <body>
        
        <p > 

 </p>
<?php
      if(isset($_GET["m"])){
          switch($_GET["m"]){
              case '1':
                  ?><h4 style="color: red"> los dAtos estan vacios</h4>
                  <?php                   
                  break;
                  case '2':
                  ?><h4 style="color: green"> roles ingresados correctamente</h4>
                  <?php                   
                  break;
          }
      }
?>
      <h1 align="center">Crear nuevos roles a los usuario </h1>
      <br>
   <div class="container">
      <div class="card">
        <div class="card-body">
          <form action="" name="add" method="post">
            <div class="row">    
                                                 
              <div class="col-sm-4 col-4">
                <div class="form-group">
                       <label>usuario</label> 
                    <select id="buscador" name="buscador" style='width: 350px;'>                                              
                        <option value='0'>-Escoja el usuario-</option>  
                        
                    </select>
                  </div>
                  </div>
                
             <div class="col-sm-4 col-4">
             <div class="form-group">
                 <label>Rol</label> 
                  <select id="buscador1" name="buscador1" style='width: 350px;'>                                               
                    <option value='0'>-Escoja el rol-</option>  
                     
                    
                 </select>
              </div>
              </div>
             <div class="col-sm-4 col-4">
                <div class="form-group">
                  <label>estado</label>
                  <select id="buscador1" name="buscador2" style='width: 350px;'>                                             
                    <option value='0' >-escoja una opcion-</option>  
                    <option value='a'>activo</option>  
                    <option value='i'>inactivo</option>  
                    </select>                    
                </div>
              </div>     
              
                          
          </div>
              
           <input type="hidden" name="grabar" value="si">
            <input type="submit" class="btn btn-primary float-right" value="Registrar">
            <a href="usuariorol.php"  class="btn btn-primary float-left" title="Volver Atras">volver atras</a>
          </form>
        </div>
      </div>
    </div>
<!--      este script es para obtener los usuarios -->
        <script type="text/javascript">
            $(document).ready(function(){
               $('#buscador').select2({
                  ajax: {
                      url: 'getuser.php',
                      type: 'post',
                      dataType: 'json',
                      delay: 250,
                      data: function(params){
                          return{
                              searchTearm: params.terminal
                          };
                      },
                      processResults: function(response){
                          return{
                            results: response  
                          };
                      },
                      cache: true
                  } 
               }); 
            });
        </script>
           
<!--           este script es para obtener los roles-->
            <script type="text/javascript">
            $(document).ready(function(){
               $('#buscador1').select2({
                  ajax: {
                      url: 'getrol.php',
                      type: 'post',
                      dataType: 'json',
                      delay: 250,
                      data: function(params){
                          return{
                              searchTearm: params.terminal
                          };
                      },
                      processResults: function(response){
                          return{
                            results: response  
                          };
                      },
                      cache: true
                  } 
               }); 
            });
        </script>
            
    </body>
</html>