<?php

include_once("../conexion.php");

class Infracciones{
    //constructor
 	var $conex;
 	function Infracciones(){
 		$this->conex=new Conectar;	
 	}
    
    function insertar($campos){
		if($this->conex->con()==true){
			return mysqli_query($this->conex->con(), "INSERT INTO captura_multa (zona,tipo_infraccion,foto_captura) 
			VALUES ('".$campos[0]."','".$campos[1]."','".$campos[2]."');");
		}
	}

	function insertar_tipo($campos){
		if($this->conex->con()==true){
			return mysqli_query($this->conex->con(), "INSERT INTO infraccion (	tex_infraccion,puntos_registro,valor_infraccion) 
			VALUES ('".$campos[0]."','".$campos[1]."','".$campos[2]."');");
		}
	}

	function insertar_categoria($campos){
		if($this->conex->con()==true){
			return mysqli_query($this->conex->con(), "INSERT INTO tipo_categoria (	text_categoria,condicion_categoria) 
			VALUES ('".$campos[0]."','".$campos[1]."');");
		}
	}
    
    function listar_infractores(){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT * FROM usuario WHERE tipo='".$tipo."' ORDER BY id DESC;");
		}
	}
	function listar_infracciones(){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT * FROM infraccion ORDER BY id_infraccion DESC;");
		}
	}

	function listar_categoria(){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT * FROM tipo_categoria ORDER BY id_categoria DESC;");
		}
	}

	function listar_tipo(){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT * FROM infraccion ORDER BY id_infraccion ;");
		}
	}
    
    function buscar($id){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT * FROM infraccion WHERE id_infraccion='".$id."';");
		}
	}

	function cambiar_tipo($campos){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "UPDATE infraccion SET
				puntos_registro='".$campos[0]."',
				valor_infraccion='".$campos[1]."'
				WHERE id_infraccion='".$campos[2]."';");
		}
	}

	function eliminar($id){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "DELETE FROM usuario WHERE id='$id';");
		}
	}
    
}

?>