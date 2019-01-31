<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Foto Multas</title>
<link rel="stylesheet" type="text/css" href="./view/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<center class="title">
			<h3>Foto Multas Administración</h3>
		</center>
		<div class="content">
			<form class="form" action="./app/autenticar.php" method="post">
				<div class="form-gorup col-md-6">
				<label>Usuario</label>
				<input type="text" name="usuario" required class="form-control">
				</div>
				<div class="form-group col-md-6">
				<label>Clave</label>
				<input type="password" name="clave" required class="form-control">
				</div>
				<div class="form-group col-md-6">
				<input type="submit" name="submit" value="Ingresar" class="btn btn-primary">
				</div>
			</form>
		</div>

		<div class="registar col-md-12">
			<a href="./app/insertar.datos.infraccion.php" class="btn btn-info">Simular Captura de imagen</a>
		</div>
	</div>
<script type="text/javascript" src="./view/js/bootstrap.min.js"></script>	
</body>
</html>