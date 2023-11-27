<?php
require_once('data.php');
$usuario=new Usuario();
if(isset($_POST["grabar"]) and $_POST["grabar"]=="si"){
    $usuario->addrol    ();
    exit;
}
?>
<!doctype html>
<html lang="es">
  <head>
    <title>usuario Agregar</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
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
                  ?><h4 style="color: green"> lDatos ingresados correctamente</h4>
                  <?php                   
                  break;
          }
      }
?>
      <h1 align="center">Crear Rol </h1>
      <br>
   <div class="container">
      <div class="card">
        <div class="card-body">
          <form action="" name="add" method="post">
            <div class="row">
              <div class="col-sm-4 col-4">
                <div class="form-group">
                  <label>Descripcion Rol</label>
                  <input type="tex" name="descripcion"  class="form-control">
                </div>
              </div>
            <div class="col-sm-4 col-4">
                <div class="form-group">
                  <label>Nivel</label>
                    <select id="nivel" name="nivel" style='width: 350px;' class="form-control">                                       
                       <option value='0'>Escja una opcion</option>  
                       <option value='1'>Basico</option>  
                       <option value='2'>Medio</option>
                       <option value='3'>Avanzado</option>
                    </select> 
                  
<!--                  <input type="number" name="nivel"  class="form-control">-->
                </div>
              </div>
              <div class="col-sm-4 col-4">
                <div class="form-group">
                  <label>Estado</label>
                    <select id="estado" name="estado" style='width: 350px;' class="form-control">    
                      <option value='0'>Escoja una opcion</option>
                       <option value='a'>activo</option>  
                       <option value='i'>inactivo</option>
                    </select> 
                  
<!--                  <input type="tex" name="estado" class="form-control">-->
                </div>
              </div>
            </div>
         <input type="hidden" name="grabar" value="si">
            <input type="submit" class="btn btn-primary float-right" value="Registrar">
            <a href="tarol.php"  class="btn btn-primary float-left" title="Volver Atras">volver atras</a>
          </form>
        </div>
      </div>
    </div>
 
  </body>
</html>
