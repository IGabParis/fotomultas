<?php

class Conectar {
	function con()	{
		
        $host='localhost'; // nombre del host
        $usuario='root'; // nonmbre del usuario para acceder a la base de datos
        $clave=''; // clave para acceder a la base de datos
        $base_datos='fotomultas'; // nbombre de la base de datos
        
        //include("config.php")
        $conexion=mysqli_connect($host, $usuario, $clave, $base_datos);
        return $conexion;

	}
}

?>