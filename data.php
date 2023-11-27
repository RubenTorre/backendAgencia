<?php
class Usuario{
    
    
    private $dbh;
    
    private $lista;
    public function __construct(){
        $this->dbh=new PDO('pgsql:host=localhost;port=5433;dbname=dbcrud',"postgres","12345");
        $this->lista=array();
    
    }
    
    
    public function get_usuario(){
   
        $sql="select * from login.usuario;";
        foreach ($this->dbh->query($sql)as $row){
            $this->lista[]=$row;
        }
        return $this->lista;
        $this->dbh=null;
    }
    
    public function delete($id){
        $sql ="delete from login.usuario where idusuario=?";
        $stmt=$this->dbh->prepare($sql);
        //$stmt->bindValue (1, $_POST["nom"], PDO::PARAM_STR);
        $stmt->bindPAram(1,$id);
        $id=$_GET["idusuario"];
        $stmt->execute();
         $this->dbh=null;
        header("Location: usuario.php?m=1");
    }
    public function edit(){
        //print_r($_POST);
        if(empty($_POST["nom"])or empty($_POST["con"])or empty($_POST["nom1"]) or empty($_POST["ape"])or empty($_POST["est"]))
        {
            header("Location: edit.php?m=1&idusuario=".$_POST["idusuario"]);
            exit;
        }
        
         $sql="update login.usuario set
                nombreusuario=?,
                contrasenia=?,
                nombres=?,
                apellidos=?,
                estado=? where idusuario=?
         ";
        $stmt=$this->dbh->prepare($sql);
        $stmt->bindValue (1, $_POST["nom"], PDO::PARAM_STR);
        $stmt->bindValue (2, $_POST["con"], PDO::PARAM_STR);
        $stmt->bindValue (3, $_POST["nom1"], PDO::PARAM_STR);
        $stmt->bindValue (4, $_POST["ape"], PDO::PARAM_STR);
        $stmt->bindValue (5, $_POST["est"], PDO::PARAM_STR);
        $stmt->bindValue (6, $_POST["idusuario"], PDO::PARAM_STR);
        $stmt->execute();
        $this->dbh=null;
        header("Location: usuario.php?m=2&idusuario".$_POST["idusuario"]);
    }
    
    public function add(){
        //print_r($_POST);
        if(empty($_POST["nom"])or empty($_POST["con"])or empty($_POST["nom1"]) or empty($_POST["ape"])or empty($_POST["est"]))
        {
            header("Location: add.php?m=1");
            exit;
        }
        $sql="insert into login.usuario values(default,?,?,?,?,?);";
        $stmt=$this->dbh->prepare($sql);
        $stmt->bindValue (1, $_POST["nom"], PDO::PARAM_STR);
        $stmt->bindValue (2, $_POST["con"], PDO::PARAM_STR);
        $stmt->bindValue (3, $_POST["nom1"], PDO::PARAM_STR);
        $stmt->bindValue (4, $_POST["ape"], PDO::PARAM_STR);
        $stmt->bindValue (5, $_POST["est"], PDO::PARAM_STR);
        $stmt->execute();
        $this->dbh=null;
         header("Location: add.php?m=2");
         //header("Location: usuario.php?m=2");
    }
    //esto sirve para el edittar 
    public function get_usuario_byid($idusuario){
        $sql ="select * from login.usuario where idusuario=?;";
        $stmt=$this->dbh->prepare($sql);
        if($stmt->execute (array($idusuario))){
            while($row =$stmt->fetch()){
                $this->lista[]=$row;
            }
            return $this->lista;
            $this->dbh=null;
        }
    }
    /// funciones de rol
    
    public function get_rol(){
   
        $sql="select * from login.rol;";
        foreach ($this->dbh->query($sql)as $row){
            $this->lista[]=$row;
        }
        return $this->lista;
        $this->dbh=null;
    }
    
    
    
 public function deleterol($id){
        $sql ="delete from login.rol where idrol=?";
        $stmt=$this->dbh->prepare($sql);
        $stmt->bindParam(1,$id);
        $id=$_GET["idrol"];
        $stmt->execute();
         $this->dbh=null;
        header("Location: tarol.php?m=1");
    }
     public function editrol(){
        //print_r($_POST);
        if(empty($_POST["descripcion"])or empty($_POST["nivel"])or empty($_POST["estado"]))
        {
            header("Location: editrol.php?m=1&idrol=".$_POST["idrol"]);
            exit;
        }
        
         $sql="update login.rol set
                descripcionRol=?,
                nivel=?,
                estado=?
                where idrol=?
         ";
        $stmt=$this->dbh->prepare($sql);
        $stmt->bindValue (1, $_POST["descripcion"], PDO::PARAM_STR);
        $stmt->bindValue (2, $_POST["nivel"], PDO::PARAM_STR);
        $stmt->bindValue (3, $_POST["estado"], PDO::PARAM_STR);
        $stmt->bindValue (4, $_POST["idrol"], PDO::PARAM_STR);
        $stmt->execute();
        $this->dbh=null;
        header("Location: tarol.php?m=2&idrol".$_POST["idrol"]);
    }
     public function addrol(){
        //print_r($_POST);
        if(empty($_POST["descripcion"])or empty($_POST["nivel"])or empty($_POST["estado"]))
        {
            header("Location: addrol.php?m=1");
            exit;
        }
        $sql="insert into login.rol values(default,?,?,?);";
        $stmt=$this->dbh->prepare($sql);
        $stmt->bindValue (1, $_POST["descripcion"], PDO::PARAM_STR);
        $stmt->bindValue (2, $_POST["nivel"], PDO::PARAM_STR);
        $stmt->bindValue (3, $_POST["estado"], PDO::PARAM_STR);
        $stmt->execute();
        $this->dbh=null;
         header("Location: tarol.php?m=2");
    }
    
    public function get_rol_byid($idrol){
        $sql ="select * from login.rol where idrol=?;";
        $stmt=$this->dbh->prepare($sql);
        if($stmt->execute (array($idrol))){
            while($row =$stmt->fetch()){
                $this->lista[]=$row;
            }
            return $this->lista;
            $this->dbh=null;
        }
    }
    //funciones userrol
    
   public function get_nombreusuario_decripcionrol_usuriorol(){
   
        $sql="select * from login.fs_get_nommbre_rol_estado_byusuariorol();";
        foreach ($this->dbh->query($sql)as $row){
            $this->lista[]=$row;
        }
        return $this->lista;
        $this->dbh=null;
    }
    
         
    
    public function deleteuserrol($idusuriorol){
        $sql ="delete from login.usuariorol where idusuriorol=?";
        $stmt=$this->dbh->prepare($sql);
        $stmt->bindParam(1,$idusuriorol);
       $idusuriorol=$_GET["idusuriorol"];
        $stmt->execute();
         $this->dbh=null;
        header("Location: usuariorol.php?m=1");
    }
    
   
    public function obtenerusuriorol(){   
        $sql="select * from login.usuariorol;";
        foreach ($this->dbh->query($sql)as $row){
            $this->lista[]=$row;
        }
        return $this->lista;
        $this->dbh=null;
    }
    
    public function  get_usuario_rol_byid($idusuriorol){
        $sql ="select * from login.usuariorol where idusuriorol=?;";
        $stmt=$this->dbh->prepare($sql);
        if($stmt->execute (array($idusuriorol))){
            while($row =$stmt->fetch(PDO::FETCH_ASSOC)){
                $this->lista[]=$row;
            }
            return $this->lista;
            $this->dbh=null;
        }
    }
  //esto serviria para el select2
    
    public function obtener_nombre_rol_byid_usuariorol($idusuariorol){
        
        $sql ="select * from login.fs_usuario_rol_dado_idusuariorol(?);";
        $stmt=$this->dbh->prepare($sql);
        if($stmt->execute (array($idusuariorol))){
            while($row =$stmt->fetch(PDO::FETCH_ASSOC)){
                $this->lista[]=$row;
            
            }
            return $this->lista;
            $this->dbh=null;
        }
        
        
        
        
    }
    
    
        public function addusuariorol(){
        print_r($_POST);
        if(empty($_POST["buscador"])or empty($_POST["buscador1"])or empty($_POST["buscador2"]) )
        {
            header("Location: userrol.php?m=1");
            exit;
        }
        $sql="insert into login.usuariorol values(default,?,?,?);";
        $stmt=$this->dbh->prepare($sql);
        $stmt->bindValue (1, $_POST["buscador"], PDO::PARAM_STR);
        $stmt->bindValue (2, $_POST["buscador1"], PDO::PARAM_STR);
        $stmt->bindValue (3, $_POST["buscador2"], PDO::PARAM_STR);
       print_r($_POST);
        $stmt->execute();
        $this->dbh=null;
        header("Location: usuariorol.php?m=2");

    }
    
       public function edituserrol(){
            print_r($_POST);
           
        if(empty($_POST["usuario"])or empty($_POST["rol"])or empty($_POST["estado"]) )
        {
            header("Location: edituserrol.php?m=1&idusuriorol=".$_POST["idusuriorol"]);
            exit;
        }
             
         $sql="update login.usuariorol set
                idusuario=?,
                idrol=?,
                estado=? where idusuriorol=?
         ";
        $stmt=$this->dbh->prepare($sql);
        $stmt->bindValue (1, $_POST["usuario"], PDO::PARAM_STR);
        $stmt->bindValue (2, $_POST["rol"], PDO::PARAM_STR);
        $stmt->bindValue (3, $_POST["estado"], PDO::PARAM_STR);
        $stmt->bindValue (4, $_POST["idusuriorol"], PDO::PARAM_STR);
        print_r($stmt);
        $stmt->execute();
        $this->dbh=null;
        //header("Location: edituserrol.php?m=2&idusuariorol".$_POST["idusuariorol"]);
        header("Location: usuariorol.php?m=2&idusuriorol".$_POST["idusuriorol"]);
    }

    
}





 
?>
