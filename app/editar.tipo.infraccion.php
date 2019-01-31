<?php 
  session_start();
  if (isset($_SESSION["usuario"])){
  if($_SESSION['rol'] == '1') {

  $id = $_SESSION['id'];
  $id_inf = $_REQUEST['id'];
  ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>FotoMultas</title>
	<link rel="stylesheet" type="text/css" href="../view/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="content">
			<center class="title">
				<h4>FotoMultas- Editar Tipo de Infracción</h4>
			</center>
			<?php 
			include '../model/infracciones.class.php';
			$objeto = new Infracciones;
			$consulta = $objeto->buscar($id_inf);
			 ?>
			<form class="form" action="recibir.edicion.tipo.infraccion.php" method="post">

				<?php
				 while ($atributo = mysqli_fetch_array($consulta, MYSQLI_ASSOC)){ 
				?>
				<div class="form-group">
				<label>Nombre de Infracción</label>
				<input type="text" name="nombre" class="form-control" value="<?php echo $atributo['tex_infraccion']; ?>" readonly>
				<input type="hidden" name="id_inf" class="form-control" value="<?php echo $id_inf; ?>" readonly>
				</div>
				<div class="form-group">
				<label>Costo de la Infración (Puntos)</label>
				<input type="number" name="puntos" class="form-control" value="<?php echo $atributo['puntos_registro']; ?>">
				</div>
				<div class="form-group">
				<label>Costo de la Infracción ($)</label>
				<input type="text" name="costo" class="form-control" value="<?php echo $atributo['valor_infraccion']; ?>">
				</div>
				<div class="form-group">
				<input type="submit" name="submit" value="Enviar" class="btn btn-primary">
				</div>
				<?php } ?>
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
