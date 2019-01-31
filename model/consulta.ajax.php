<?php 

if (isset($_POST['ruta'])){

		switch($_POST['ruta']){
			case 'buscar_infractor':
				include('patentes.class.php');
				$html = '';
				$objetoDiv = new Patentes;
				$resp = $objetoDiv->buscar_infractor($_POST['id']);
				if(mysqli_num_rows($resp)>0) {
				    while ($respuesta = mysqli_fetch_array($resp,MYSQLI_ASSOC)){
				    	$html = '
				    <div class="form-group">
					<label>Modelo</label>
					<input type="text" name="modelo" class="form-control" value="'.$respuesta['modelo'].'">
					</div>
					<div class="form-group">
					<label>Nombre Dueño</label>
					<input type="text" name="nombre_d" class="form-control" value="'.$respuesta['dueno_nombre_completo'].'">
					</div>
					<div class="form-group">
					<label>Correo</label>
					<input type="text" name="correo_d" class="form-control" value="'.$respuesta['correo'].'">
					</div>
					<div class="form-group">
					<label>Teléfono</label>
					<input type="text" name="telefono_d" class="form-control" value="'.$respuesta['telefono'].'">
					</div>';
				    }
				  } else {
				  	$html = '
				  	<div class="form-group">
					<label>Modelo</label>
					<input type="text" name="modelo" class="form-control">
					</div>
					<div class="form-group">
					<label>Nombre Dueño</label>
					<input type="text" name="nombre_d" class="form-control">
					</div>
					<div class="form-group">
					<label>Correo</label>
					<input type="text" name="correo_d" class="form-control">
					</div>
					<div class="form-group">
					<label>Teléfono</label>
					<input type="text" name="telefono_d" class="form-control">
					</div>';
				  }
				  echo $html;
				
			
			break;
		}
	}

 ?>