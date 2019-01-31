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
				<h4>FotoMultas- Agregar Usuario</h4>
			</center>
			<form class="formu" action="recibir.datos.usuario.php" method="post">
				<div class="form-group">
				<label>Nombre de Usuario</label>
				<input type="text" name="nombre" class="form-control">
				</div>
				<div class="form-group">
				<label>Clave</label>
				<input type="password" name="ps" class="form-control">
				</div>
				<div class="form-group">
				<input type="submit" name="submit" value="Enviar" class="btn btn-primary">
				</div>
			</form>
			<div class="regresar">
				<a href="principal.php">Regresar</a>
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
