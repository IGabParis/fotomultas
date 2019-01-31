<?php

include_once("../conexion.php");

class Usuarios{
    //constructor
 	var $conex;
 	function Usuarios(){
 		$this->conex=new Conectar;	
 	}
    
	function validar($campos){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT * FROM usuario_admin WHERE nombre_admi='".$campos[0]."' AND clave='".$campos[1]."';");
		}
	}
    
    function insertar($campos){
		if($this->conex->con()==true){
			return mysqli_query($this->conex->con(), "INSERT INTO usuario_admin (nombre_admi,clave) 
			VALUES ('".$campos[0]."','".$campos[1]."');");
		}
	}
    
    function listar(){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT * FROM usuario_admin  ORDER BY id DESC;");
		}
	}

	function listar_us($us){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT usuario FROM usuario WHERE usuario = '".$us."';");
		}
	}
    
    function buscar($id){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT * FROM usuario WHERE id='".$id."';");
		}
	}

	function eliminar($id){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "DELETE FROM usuario WHERE id='$id';");
		}
	}
    
}

?>