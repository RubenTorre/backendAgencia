<?php
require_once('data.php');
$usuario=new Usuario();
if(isset($_POST["grabar"]) and $_POST["grabar"]=="si"){
    $usuario->editrol();
    exit;
}

$datarol=$usuario->get_rol_byid($_GET["idrol"]);
?>
<!doctype html>
<html lang="es">
  <head>
    <title>Editar Rol </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
  </head>

  <body>
 <p > 
 <a href="tarol.php" title="Volver Atras">volver atras</a>
 </p>
<?php
      if(isset($_GET["m"])){
          switch($_GET["m"]){
              case '1':
                  ?><h4 style="color: red"> los datos estan vacios</h4>
                  <?php                   
                  break;
                  case '2':
                  ?><h4 style="color: green"> los datos han sido editados correctamente</h4>
                  <?php                   
                  break;
          }
      }
?>
      <h1>editar rol </h1>
   <div class="container">
      <div class="card">
        <div class="card-body">
          <form action="" name="edit" method="post" enctype="application/x-www-form-urlencoded">
            <div class="row">
              <div class="col-sm-4 col-4">
                <div class="form-group">
                  <label>Descripcion Rol</label>
                  <input type="tex" name="descripcion" value="<?php echo $datarol[0]["descripcionrol"]?>" class="form-control">
                </div>
              </div>
            <div class="col-sm-4 col-4">
                <div class="form-group">
                  <label>Nivel</label>
                    <select id="nivel" name="nivel" style='width: 350px;' class="form-control">                                                  
                   <option value="<?php echo $datarol[0]["nivel"]; ?>" <?php if($datarol[0]["nivel"] == $datarol[0]["nivel"]) echo 'selected="selected"'; ?> > <?php   if($datarol[0]["nivel"]==1){ echo "Basico";}else if($datarol[0]["nivel"]==2){
                        echo "Intermedio";
                        }else if($datarol[0]["nivel"]==3){echo "
                   Avanzado";}; ?>
                   </option>                
                   <option value='1'>Basico</option>  
                   <option value='2'>Medio</option>
                   <option value='3'>Avanzado</option>
                    </select> 
                  
                  
<!--                  <input type="number" name="nivel"  value="<?php echo $datarol[0]["nivel"]?>" class="form-control">-->
                </div>
              </div>
              <div class="col-sm-4 col-4">
                <div class="form-group">
                  <label>Estado</label>
                   <select id="estado" name="estado" style='width: 350px;' class="form-control">                                                  
                   <option value="<?php echo $datarol[0]["estado"]; ?>" <?php if($datarol[0]["estado"] == $datarol[0]["estado"]) echo 'selected="selected"'; ?> > <?php   if($datarol[0]["estado"]=="a"){ echo "activo";}else{echo "
                   inactivo";}; ?>
                   </option>                
                   <option value='a'>activo</option>  
                   <option value='i'>inactivo</option>
                    </select> 
                  
                  
                </div>
              </div>
            </div>
           
          
              
           <input type="hidden" name="grabar" value="si">
              <input type="hidden" name="idrol" value="<?php echo $_GET["idrol"];?>">
            <input type="submit" class="btn btn-primary float-right" value="Editar">
              
          </form>
        </div>
      </div>
    </div>
 

   <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>-->
    
  </body>
</html>