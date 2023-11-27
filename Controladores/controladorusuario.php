<?php

require_once('usuariologica.php');


 
class UsuarioControlador 
{

		private $usuariologicanegocio = null;

	/**
	* Constructor
	*/
	function __construct(){	
		$this->usuariologicanegocio = new  UsuarioLogica ();
		set_exception_handler(array($this, 'manejadorExcepciones'));
	}	

	/**
	 * Metodo login
	 */
	public function loginusuario(){
		
			$usuario =  (Array)json_decode(file_get_contents('php://input'));
			
			$this->usuariologicanegocio->
			loginusuario($usuario);
		
	}


}