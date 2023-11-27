<?php
require_once('data.php');
$usuario=new Usuario();
if(isset($_POST["grabar"]) and $_POST["grabar"]=="si"){
    $usuario->edituserrol();
    exit;
}

$datausuariorol=$usuario->get_usuario_rol_byid($_GET["idusuriorol"]);

$datarolusuario=$usuario->obtener_nombre_rol_byid_usuariorol($_GET["idusuriorol"]);    

$usuriorol=$usuario->get_nombreusuario_decripcionrol_usuriorol() ;

$obtenertodosroles=$usuario->get_rol();

$obtenertodosusuarios=$usuario->get_usuario();


?>
<!doctype html>
<html lang="es">
  <head>
    <title>usuario Editar</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    

<!--    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/pricing/">-->

<!--     Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
  </head>

  <body>
 <p > 
 <a href="usuariorol.php" title="Volver Atras">volver atras</a>
 </p>
<?php
      if(isset($_GET["m"])){
          switch($_GET["m"]){
              case '1':
                  ?><h4 style="color: red"> los dAtos estan vacios</h4>
                  <?php                   
                  break;
                  case '2':
                  ?><h4 style="color: green"> los datos han sido editados correctamente</h4>
                  <?php                   
                  break;
          }
      }
?>
      <h1>editar  roles a los usuarios </h1>
   <div class="container">
      <div class="card">
        <div class="card-body">
          <form action="" name="edit" method="post" enctype="application/x-www-form-urlencoded">
            <div class="row">
              <div class="col-sm-4 col-4">
               
                <div class="form-group">
                  <label>id usuario</label>                    
                     <select class="form-control" name="usuario" id="usuario">
                    <?php foreach($datarolusuario as $rows):?>                     
                        <option value="<?php  $rows['pnombreusuario']; ?>"<?php if($rows['pnombreusuario'] == $rows['pnombreusuario']) echo 'selected="selected"'; ?>><?php echo $rows['pnombreusuario']; ?></option>
                    <?php endforeach;?>                    
                     
                    <?php foreach($obtenertodosusuarios as $rows):?>                
                        <option value="<?php echo $rows["idusuario"];?>"><?php echo $rows["nombreusuario"]; ?></option>
                    <?php endforeach;?>
                    </select>
                </div>
              </div>
              
              
       
            <div class="col-sm-4 col-4">
                <div class="form-group">
                  <label>id rol</label>
                    <select class="form-control" name="rol" id="rol" >
                    <?php foreach($datarolusuario as $rows):?>
                        <option value="<?php $rows['pdescripcionrol']; ?>"  <?php if($rows['pdescripcionrol'] == $rows['pdescripcionrol']) echo 'selected="selected"'; ?>> <?php echo $rows['pdescripcionrol']; ?></option>
                    <?php endforeach;?>
                    
                    <?php foreach($obtenertodosroles as  $rows){?>                
                        <option value="<?=$rows["idrol"];?>"><?=$rows["descripcionrol"]; ?></option>
                    <?php }?>

                    </select>        
                </div>
              </div>
              
              <div class="col-sm-4 col-4">
                <div class="form-group">
                  <label>estado</label>
                  
                  <select id="estado" name="estado" style='width: 350px;' class="form-control">  
                  <?php foreach ($datausuariorol as $rows):?>                                           
                   <option value="<?php echo $rows["estado"]; ?>" <?php if($rows["estado"] == $rows["estado"]) echo 'selected="selected"'; ?> > <?php   if($rows["estado"]=="a"){ echo "activo";}else{echo "
                   inactivo";}; ?></option>                     
                      
                   <?php endforeach;?>
                      
                    <?php foreach($datausuariorol as  $rows){?>
                       <? if ($rows["estado"]=="a")
                        {?>  
                        <option value='i'>inactivo</option> 
                        <?}?>
                        <? if ($rows["estado"]=="i"){?>
                             <option value='a'>activo</option> 
                            }?>
                       
                    <?php  }?>   
                    
                                                                                        
                 
                    </select> 
                 
                </div>
              </div>
             
            </div>
           
        
              
           <input type="hidden" name="grabar" value="si">
              <input type="hidden" name="idusuriorol" value="<?php echo $_GET["idusuriorol"];?>">
            <input type="submit" class="btn btn-primary float-right" value="Editar">
          </form>
        </div>
      </div>
    </div>


 
<!--
       <script type="text/javascript">
            $(document).ready(function(){
               $('#idusuario').select2({
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
-->
<!--
            
           este script es para obtener los roles
-->
<!--
            <script type="text/javascript">
            $(document).ready(function(){
               $('#rol').select2({
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
-->
    
  </body>
</html>