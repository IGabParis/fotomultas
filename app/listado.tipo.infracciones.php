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
				<h4>Tipos de Infracción</h4>
			</center>
			<a href="insertar.tipo.infraccion.php" class="btn btn-info">Agregar Infracción</a>
			<hr>
			<?php 
			include '../model/infracciones.class.php';
			$objeto = new Infracciones;
			$consulta = $objeto->listar_infracciones();
			if ($consulta){
			 ?>
			
			<table class="table table-stripped table-responsive">
				<thead>
					<th>Infracción</th>
					<th>Puntos en Registro</th>
					<th>Costo de Multa</th>
					<th>Acción</th>
				</thead>
				<tbody>
				<?php while ($atributo = mysqli_fetch_array($consulta, MYSQLI_ASSOC)){ ?>
				<tr>
					<td><?php echo $atributo['tex_infraccion']; ?></td>
					<td><?php echo $atributo['puntos_registro']; ?></td>
					<td><?php echo $atributo['valor_infraccion']; ?></td>
					<td><?php echo '<a href="editar.tipo.infraccion.php?id='.$atributo['id_infraccion'].'" class="label label-info">Editar Infracción</a>' ?></td>
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