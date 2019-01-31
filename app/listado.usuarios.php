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
	<title>Foto Multas</title>
	<link rel="stylesheet" type="text/css" href="../view/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="content">
			<center class="title">
				<h3>Foto Multas</h3>
				<h4>Usuarios</h4>
			</center>
			<a href="insertar.usuario.php" class="btn btn-info">Agregar Usuario</a>
			<hr>
			<?php 
			include '../model/usuarios.class.php';
			$objeto = new Usuarios;
			$consulta = $objeto->listar();
			if ($consulta){
			 ?>
			
			<table class="table table-stripped table-responsive">
				<thead>
					<th>Nombre Usuario</th>
				</thead>
				<tbody>
				<?php while ($atributo = mysqli_fetch_array($consulta, MYSQLI_ASSOC)){ ?>
				<tr>
					<td><?php echo $atributo['nombre_admi']; ?></td>
				</tr>
				<?php } ?>
			</tbody>
			</table>
			<?php } ?>
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
        <script language="javascript">window.location="principal.php"</script>';
  }
  } else {
      echo '<script language="javascript">alert("Usted no tiene accesos a ésta página");</script>
        <script language="javascript">window.location="principal.php"</script>';
  } 
?>