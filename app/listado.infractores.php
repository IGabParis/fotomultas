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
				<h4>Infractores</h4>
			</center>
			<hr>
			<?php 
			include '../model/patentes.class.php';
			$objeto = new Patentes;
			$consulta = $objeto->listar_infractores();
			if ($consulta){
			 ?>
			
			<table class="table table-stripped table-responsive">
				<thead>
					<th>Nombre</th>
					<th>Placa</th>
					<th>Modelo</th>
					<th>Categorías</th>
					<th>Multas</th>
					<th>Puntos</th>
					<th>Pagos</th>
				</thead>
				<tbody>
				<?php 
				$i = 1;
				while ($atributo = mysqli_fetch_array($consulta, MYSQLI_ASSOC)){ ?>
				<tr>
					<td><?php echo $atributo['dueno_nombre_completo']; ?></td>
					<td><?php echo $atributo['placa']; ?></td>
					<td><?php echo $atributo['modelo']; ?></td>
					<td><?php echo $atributo['categoria']; ?></td>
					<td><?php echo $atributo['cantidad_multas']; ?></td>
					<td><?php echo $atributo['puntos_multa']; ?></td>
					<td><?php echo $atributo['pago_multas']; ?></td>
				</tr>
				<?php 
				$i++;
			} ?>
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