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
				<h4>Registro de Patente Manual</h4>
			</center>
			<hr>
			<?php 
			include '../model/patentes.class.php';
			$objeto = new Patentes;
			$consulta = $objeto->listar_patente_manual();
			if ($consulta){
			 ?>
			
			<table class="table table-stripped table-responsive">
				<thead>
					<th>Posición en Cola</th>
					<th>Tipo de Infracción</th>
					<th>Acción</th>
				</thead>
				<tbody>
				<?php 
				$i = 1;
				while ($atributo = mysqli_fetch_array($consulta, MYSQLI_ASSOC)){ ?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $atributo['patentosa']; ?></td>
					<td><?php echo '<a href="insertar.patente.manual.php?id='.$atributo['id_manual'].'" class="label label-info">Registrar Patente</a>' ?></td>
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