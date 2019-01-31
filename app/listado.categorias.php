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
				<h4>Categorias</h4>
			</center>
			<a href="insertar.categoria.php" class="btn btn-info">Agregar Categoría</a>
			<hr>
			<?php 
			include '../model/infracciones.class.php';
			$objeto = new Infracciones;
			$consulta = $objeto->listar_categoria();
			if ($consulta){
			 ?>
			
			<table class="table table-stripped table-responsive">
				<thead>
					<th>Categoría</th>
					<th>Descripción</th>
				</thead>
				<tbody>
				<?php while ($atributo = mysqli_fetch_array($consulta, MYSQLI_ASSOC)){ ?>
				<tr>
					<td><?php echo $atributo['text_categoria']; ?></td>
					<td><?php echo $atributo['condicion_categoria']; ?></td>
				</tr>
				<?php } ?>
			</tbody>
			</table>
			<?php } ?>
		</div>
		<div class="regresar">
				<a href="principal.php">Regresar</a>
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