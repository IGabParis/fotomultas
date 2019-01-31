<?php 
  session_start();
include '../model/infracciones.class.php';
$objeto = new Infracciones;
$consulta = $objeto->listar_tipo() ?>

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
				<h4>FotoMultas- Simulación de Infracción</h4>
			</center>
			<form class="form" action="recibir.datos.infraccion.php" method="post" enctype="multipart/form-data">
				<div class="form-group">
				<label>Lugar</label>
				<input type="text" name="lugar" class="form-control">
				</div>
				<div class="form-group">
				<label>Tipo de Infracción</label>
				<select name="infraccion" class="form-control">
					<option>Seleccione...</option>
					<?php while ($atributo=mysqli_fetch_array($consulta, MYSQLI_ASSOC)) { ?>
					<option value="<?php echo $atributo['id_infraccion'] ?>"><?php echo $atributo['tex_infraccion'] ?></option>
					<?php } ?>
				</select>
				</div>
				<div class="form-group">
				<label>Captura</label>
				<input type="file" name="foto" id="foto" class="form-control">
				</div>
				<div class="form-group">
				<input type="submit" name="submit" value="Enviar" class="btn btn-primary">
				</div>
			</form>
			<div class="regresar">

			</div>
		</div>
	</div>
<script type="text/javascript" src="../view/js/bootstrap.min.js"></script>
</body>
</html>
