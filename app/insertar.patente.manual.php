<?php 
  session_start();
  if (isset($_SESSION["usuario"])){
  if($_SESSION['rol'] == '1') {

  $id = $_SESSION['id'];
  echo $id;
  $id_manual = $_REQUEST['id'];
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
				<h4>FotoMultas- Registro de Patente Mnual</h4>
			</center>
			<?php 
			include '../model/patentes.class.php';
			$objeto = new Patentes;
			$consulta = $objeto->buscar_patente($id_manual);
			 ?>
			<form class="form" action="recibir.datos.patente.manual.php" method="post">
				<?php
				 while ($atributo = mysqli_fetch_array($consulta, MYSQLI_ASSOC)){ 
				?>
				<div class="form-group">
				<label>Captura</label>
				<center>
					<img src="../view/img/upload/<?php echo $atributo['foto_patente'] ?>"  style="width: 50%;max-width: 500px;">
				</center>
				</div>
				<div class="form-group">
				<label>Tipo Infracción</label>
				<input type="text" name="tipo" class="form-control" value="<?php echo $atributo['tex_infraccion']; ?>" readonly>
				<input type="hidden" name="id_tipo" class="form-control" value="<?php echo $atributo['tipo_infraccion']; ?>" readonly>
				<input type="hidden" name="id_manual" class="form-control" value="<?php echo $id_manual; ?>" readonly>
				</div>
				<div class="form-group">
				<label>Placa</label>
				<input type="text" name="placa" class="form-control" id="placa_control" onchange="buscarDatos()">
				</div>
				<div class="completar" id="info_infractor">
					
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
<script type="text/javascript" src="../view/js/jquery.js"></script>
<script type="text/javascript">
	function buscarDatos(){
        var id = document.getElementById('placa_control').value;
        console.log(id);
        $.post("../model/consulta.ajax.php", { ruta:'buscar_infractor', id: id }, function(data){
              console.log(data);
              $("#info_infractor").html(data);
        });   
    }

</script>
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
