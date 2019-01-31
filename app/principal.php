<?php 
  session_start();
  if (isset($_SESSION["usuario"])){
  if($_SESSION['rol'] == '1') {

  $id = $_SESSION['id'];
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>FotoMultas</title>
	<link rel="stylesheet" type="text/css" href="../view/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="content">
			<center class="title">
				<h3>FotoMultas- Principal</h3>
			</center>
			<div class="main">
				<ul style="list-style: none; display: block; padding: 10px;">
					<li><a href="listado.infractores.php">Infractores</a></li>
					<li><a href="listado.patente.manual.php">Reconocimiento Manual de Patentes</a></li>
					<li><a href="listado.tipo.infracciones.php">Tipos de Infracciones</a></li>
					<li><a href="listado.categorias.php">Tipos de Categorias</a></li>
					<li><a href="listado.usuarios.php">Usuarios</a></li>
				</ul>
			</div>
			<div class="registar col-md-12">
				<a href="insertar.datos.infraccion.php" class="btn btn-warning">Simular Captura de imagen</a>
			</div>
			<br>
			<hr>
			<div class="cerrar col-md-12">
				<a href="cerrar.sesion.php" class="btn btn-info">Cerrar Sesión</a>
			</div>
		</div>
	</div>
<script type="text/javascript" src="../view/js/bootstrap.min.js"></script>
</body>
</html>
<?php 
  } else {
      echo '<script language="javascript">alert("Usted no tiene accesos a ésta página, usted no est administrador");</script>
        <script language="javascript">window.location="../index.php"</script>';
  }
  } else {
      echo '<script language="javascript">alert("Usted no tiene accesos a ésta página");</script>
        <script language="javascript">window.location="../index.php"</script>';
  } 
?>

