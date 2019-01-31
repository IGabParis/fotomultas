<?php

include_once("../conexion.php");

class Patentes{
    //constructor
 	var $conex;
 	function Patentes(){
 		$this->conex=new Conectar;	
 	}
    
    function insertar_patente($campos){
		if($this->conex->con()==true){
			return mysqli_query($this->conex->con(), "INSERT INTO patentes (tipo_patente, foto_patente) 
			VALUES ('".$campos[0]."','".$campos[1]."');");
		}
	}

	function insertar_patente_manual($campos){
		if($this->conex->con()==true){
			return mysqli_query($this->conex->con(), "INSERT INTO patentes_manuales (id_patente,posicion_cola,tipo_infraccion,estatus) 
			VALUES ('".$campos[0]."','".$campos[1]."','".$campos[2]."','".$campos[3]."');");
		}
	}

	function insertar_notificacion($campos){
		if($this->conex->con()==true){
			return mysqli_query($this->conex->con(), "INSERT INTO notificaciones (id_usuario,id_admin,text_notificacion) 
			VALUES ('".$campos[0]."','".$campos[1]."','".$campos[2]."');");
		}
	}

	function insertar_infractor($campos){
		if($this->conex->con()==true){
			return mysqli_query($this->conex->con(), "INSERT INTO datos_infractor (dueno_nombre_completo,placa,modelo,tipo_categoria, correo, telefono, cantidad_multas, puntos_multa, pago_multas) 
			VALUES (
			'".$campos[0]."',
			'".$campos[1]."',
			'".$campos[2]."',
			'".$campos[3]."',
			'".$campos[4]."',
			'".$campos[5]."',
			'".$campos[6]."',
			'".$campos[7]."',
			'".$campos[8]."'
		);");
		}
	}
    
    function listar($tipo){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT * FROM usuario WHERE tipo='".$tipo."' ORDER BY id DESC;");
		}
	}

	function listar_ultima_patente(){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT id_patente FROM patentes ORDER BY id_patente DESC LIMIT 1;");
		}
	}

	function listar_patentes_contador(){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT COUNT(id_manual) AS cola FROM patentes_manuales;");
		}
	}

	function listar_patente_manual(){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT A.*, B.tex_infraccion AS patentosa FROM patentes_manuales A
				INNER JOIN infraccion B on A.tipo_infraccion = B.id_infraccion WHERE A.estatus='0' ORDER BY A.posicion_cola ASC;");
		}
	}

	function listar_infractores(){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT A.*, B.text_categoria AS categoria FROM datos_infractor A
				INNER JOIN tipo_categoria B on A.tipo_categoria = B.id_categoria ORDER BY A.id_datos DESC;");
		}
	}
    
    function buscar_patente($id){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT A.*, B.foto_patente, C.* FROM patentes_manuales A
				INNER JOIN patentes B ON A.id_patente = B.id_patente
				INNER JOIN infraccion C ON A.tipo_infraccion = C.id_infraccion WHERE id_manual='".$id."';");
		}
	}

	function buscar_infractor($placa){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT * FROM datos_infractor WHERE placa='".$placa."';");
		}
	}

	function cambiar_estatus($id_manual){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "UPDATE patentes_manuales SET
				estatus='1'
				WHERE id_manual='".$id_manual."';");
		}
	}

	function editar_infractor($campos){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "UPDATE datos_infractor SET
				tipo_categoria = '".$campos[1]."',
				cantidad_multas = '".$campos[2]."',
				puntos_multa = '".$campos[3]."',
				pago_multas = '".$campos[4]."' 
				WHERE placa='".$campos[0]."';");
		}
	}

	function eliminar($id){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "DELETE FROM usuario WHERE id='$id';");
		}
	}
    
}

?>