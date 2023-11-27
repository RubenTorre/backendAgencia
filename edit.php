<?php
require_once('data.php');
$usuario=new Usuario();
if(isset($_POST["grabar"]) and $_POST["grabar"]=="si"){
    $usuario->edit();
    exit;
}

$datausuario=$usuario->get_usuario_byid($_GET["idusuario"]);
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
 <a href="usuario.php" title="Volver Atras">volver atras</a>
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
      <h1>editar  usuarios </h1>
   <div class="container">
      <div class="card">
        <div class="card-body">
          <form action="" name="edit" method="post" enctype="application/x-www-form-urlencoded">
            <div class="row">
              <div class="col-sm-4 col-4">
                <div class="form-group">
                  <label>Nombre Usuario</label>
                  <input type="tex" name="nom" value="<?php echo $datausuario[0]["nombreusuario"]?>" class="form-control">
                </div>
              </div>
            <div class="col-sm-4 col-4">
                <div class="form-group">
                  <label>comtraseña</label>
                  <input type="password" name="con"  value="<?php echo $datausuario[0]["contrasenia"]?>" class="form-control">
                </div>
              </div>
              <div class="col-sm-4 col-4">
                <div class="form-group">
                  <label>Nombre</label>
                  <input type="tex" name="nom1" value="<?php echo $datausuario[0]["nombres"]?>" class="form-control">
                </div>
              </div>
              <div class="col-sm-4 col-4">
                <div class="form-group">
                  <label>Apellidos</label>
                  <input type="tex" name="ape" value="<?php echo $datausuario[0]["apellidos"]?>" class="form-control">
                </div>
              </div>
                    <div class="col-sm-4 col-4">
                <div class="form-group">
                  <label>estado</label>    
                  <select id="est" name="est" style='width: 350px;' class="form-control">                                                  
                   <option value="<?php echo $datausuario[0]["estado"]; ?>" <?php if($datausuario[0]["estado"] == $datausuario[0]["estado"]) echo 'selected="selected"'; ?> > <?php   if($datausuario[0]["estado"]=="a"){ echo "activo";}else{echo "
                   inactivo";}; ?>
                   </option>                
                   <option value='a'>activo</option>  
                   <option value='i'>inactivo</option>
                    </select>                     
                </div>
              </div>
            </div>
           
          
              
           <input type="hidden" name="grabar" value="si">
              <input type="hidden" name="idusuario" value="<?php echo $_GET["idusuario"];?>">
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