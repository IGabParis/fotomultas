
<?php

 session_start();
  include '../model/patentes.class.php';
  include '../model/infracciones.class.php';

  $id = $_SESSION['id'];
  $id_manual = $_POST['id_manual'];
  $tex_infraccion = $_POST['tipo'];
  $tipo_infraccion = $_POST['id_tipo'];
  $placa = $_POST['placa'];
  $modelo = $_POST['modelo'];
  $nombre_d = $_POST['nombre_d'];
  $correo_d = $_POST['correo_d'];
  $telefono_d = $_POST['telefono_d'];
  $categoria = '';
  $puntos_t = 0;
  $costo_t = 0;
  $cantidad_t = 0;
  $text_notificacion = '0';
  $objeto = new Infracciones;
  $patentes = new Patentes;
  $infr = $objeto->buscar($tipo_infraccion);
  $infraccion = mysqli_fetch_array($infr,MYSQLI_ASSOC);

  //echo $infraccion['tex_infraccion'].' Costo: '.$infraccion['valor_infraccion'].' Puntos: '.$infraccion['puntos_registro'].'<br>'; 

  $costo_infr = $infraccion['valor_infraccion'];
  $puntos_infr = $infraccion['puntos_registro'];

  $resp = $patentes->buscar_infractor($placa);
  $patentes->cambiar_estatus($id_manual);
        if(mysqli_num_rows($resp)>0) {
          $respuesta = mysqli_fetch_array($resp,MYSQLI_ASSOC);
            $puntos_t = $respuesta['puntos_multa'] - $puntos_infr;
            $costo_t = $respuesta['pago_multas'] + $costo_infr;
            $cantidad_t = $respuesta['cantidad_multas'] + 1;
            if ($costo_t > 1000){
              $categoria  = '1';
            } else if ($puntos_t <= 0){
              $puntos_t = 0;
              $categoria = '2';
            } else if ($cantidad_t > 5){
              $categoria = '3';
            } else if ($costo_t > 1000 && $puntos_t <= 0) {
              $categoria = '4';
            } else if ($costo_t > 1000 && $cantidad_t > 5){
              $categoria = '5';
            } else if ($puntos_t <= 0 && $cantidad_t > 5) {
              $categoria = '6';
            } else if ($costo_t > 1000 && $puntos_t <= 0 && $cantidad_t > 5) {
              $categoria = '7';
            } else {
              $categoria = '8';
            }
            $patentes->editar_infractor(array($placa,$categoria,$cantidad_t,$puntos_t, $costo_t));

            if ($categoria == '1'){
            $text_notificacion = 'Éste es un mensaje para notificar que se ha registrado una patente con la placa vehicular '.$placa.', la cual ha tenido una infracción tipo '.$tex_infraccion.' con lo cual ha superado una deuda de 1000$, teniendolo en nuestros registros como una categoría Evasor de Impuestos, conactar inmediatamente al INTT para cumplir con los requrimientos para cumplir con la multa';
            $patentes->insertar_notificacion(array($placa, $id_admin, $text_notificacion));
            echo '
            <script language="javascript">alert("Patente registrada, al presenciar un cambio de cartegoria a Evasor de impuestos, se han enviado notificaciones a la direccion capturas@intt.gob.ve.")</script>
            <script language="javascript">window.location="listado.patente.manual.php"</script>';
          } else if ($categoria == '2') {
            $text_notificacion = 'Éste es un mensaje para notificar que se ha registrado una patente con la placa vehicular '.$placa.', la cual ha tenido una infracción tipo '.$tex_infraccion.' con lo cual sus puntos de conducción ahora son 0, teniendolo en nuestros registros como una categoría Inhabilitado, conactar inmediatamente al INTT para cumplir con los requrimientos para cumplir con la multa';
            $patentes->insertar_notificacion(array($placa, $id_admin, $text_notificacion));
            echo '<script language="javascript">alert("Patente registrada, al presenciar un cambio de cartegoria aInhabilitado, se han enviado notificaciones por mensaje de texto.")</script>
            <script language="javascript">window.location="listado.patente.manual.php"</script>';
          } else if ($categoria == '3') {
            $text_notificacion = 'Éste es un mensaje para notificar que se ha registrado una patente con la placa vehicular '.$placa.', la cual ha tenido una infracción tipo '.$tex_infraccion.' con lo cual ha superado cantidad de 5 infraciones, teniendolo en nuestros registros como una categoría Inhabilitado, conactar inmediatamente al INTT para cumplir con los requrimientos para cumplir con la multa';
            $patentes->insertar_notificacion(array($placa, $id_admin, $text_notificacion));
            echo '<script language="javascript">alert("Patente registrada, al presenciar un cambio de cartegoria a Inhabilitado, se han enviado notificaciones a los correos en sistema.")</script>
            <script language="javascript">window.location="listado.patente.manual.php"</script>';
          } else if ($categoria == '4') {
            $text_notificacion = 'Éste es un mensaje para notificar que se ha registrado una patente con la placa vehicular '.$placa.', la cual ha tenido una infracción tipo '.$tex_infraccion.' con lo cual ha superado una deuda de 1000$ y puntos de conducción ahora son 0, teniendolo en nuestros registros como una categoría Evasor Frecuente - Inhabilitado, conactar inmediatamente al INTT para cumplir con los requrimientos para cumplir con la multa';
            $patentes->insertar_notificacion(array($placa, $id_admin, $text_notificacion));
            echo '<script language="javascript">alert("Patente registrada, al presenciar un cambio de cartegoria aInhabilitado, se han enviado notificaciones a la direccion capturas@intt.gob.ve. y por medio de SMS. ")</script>
            <script language="javascript">window.location="listado.patente.manual.php"</script>';
          } else if ($categoria == '5') {
            $text_notificacion = 'Éste es un mensaje para notificar que se ha registrado una patente con la placa vehicular '.$placa.', la cual ha tenido una infracción tipo '.$tex_infraccion.' con lo cual tiene una deuda superior a los 1000$ y la cantidad de infraccions es ahora de más de 5, teniendolo en nuestros registros como una categoría Evasor Frecuente - Frecuente, conactar inmediatamente al INTT para cumplir con los requrimientos para cumplir con la multa';
            $patentes->insertar_notificacion(array($placa, $id_admin, $text_notificacion));
            echo '<script language="javascript">alert("Patente registrada, al presenciar un cambio de cartegoria aInhabilitado, se han enviado notificaciones a la direccion capturas@intt.gob.ve. y otros correos registrados")</script>
            <script language="javascript">window.location="listado.patente.manual.php"</script>';
          } else if ($categoria == '6') {
            $text_notificacion = 'Éste es un mensaje para notificar que se ha registrado una patente con la placa vehicular '.$placa.', la cual ha tenido una infracción tipo '.$tex_infraccion.' con lo cual sus  puntos de conducción ahora son 0 y tiene más de 5 infracciones, teniendolo en nuestros registros como una categoría Frecuente - Inhabilitado, conactar inmediatamente al INTT para cumplir con los requrimientos para cumplir con la multa';
            $patentes->insertar_notificacion(array($placa, $id_admin, $text_notificacion));
            echo '<script language="javascript">alert("Patente registrada, al presenciar un cambio de cartegoria a Inhabilitado, se han enviado notificaciones por SMS y Email")</script>
            <script language="javascript">window.location="listado.patente.manual.php"</script>';
          } else if ($categoria == '7') {
            $text_notificacion = 'Éste es un mensaje para notificar que se ha registrado una patente con la placa vehicular '.$placa.', la cual ha tenido una infracción tipo '.$tex_infraccion.' con lo cual ha superado una deuda de 1000$, sus puntos de conducción ahora son 0 y la cantidad de infracciones supera la cantidad de 5, teniendolo en nuestros registros como una categoría Evasor - Frecuente - Inhabilitado, conactar inmediatamente al INTT para cumplir con los requrimientos para cumplir con la multa';
            $patentes->insertar_notificacion(array($placa, $id_admin, $text_notificacion));
            echo '<script language="javascript">alert("Patente registrada, al presenciar un cambio de cartegoria aInhabilitado, se han enviado notificaciones a la direccion capturas@intt.gob.ve. y a otras direcciones, además por SMS.")</script>
            <script language="javascript">window.location="listado.patente.manual.php"</script>';
          } else {
            echo '<script language="javascript">alert("Patente registrada al sistema")</script>
            <script language="javascript">window.location="listado.patente.manual.php"</script>';
          }
        } else {
          $puntos_t = 5000 - $puntos_infr;
          if ($costo_infr > 1000){
            $categoria  = '1';
          } else if ($puntos_t <= 0){
            $puntos_t = 0;
            $categoria = '2';
          } else {
            $categoria = '8';
          }
          $patentes->insertar_infractor(array($nombre_d, $placa, $modelo,$categoria, $correo_d,$telefono_d, '1', $puntos_t, $costo_infr));

          if ($categoria == '1'){
            $text_notificacion = 'Éste es un mensaje para notificar que se ha registrado una patente con la placa vehicular '.$placa.', la cual ha tenido una infracción tipo '.$tex_infraccion.' con lo cual ha superado una deuda de 1000$, teniendolo en nuestros registros como una categoría Evasor de Impuestos, conactar inmediatamente al INTT para cumplir con los requrimientos para cumplir con la multa';
            $patentes->insertar_notificacion(array($placa, $id_admin, $text_notificacion));
            echo '
            <script language="javascript">alert("Patente registrada, al presenciar un cambio de cartegoria a Evasor de impuestos, se han enviado notificaciones a la direccion capturas@intt.gob.ve.")</script>
            <script language="javascript">window.location="listado.patente.manual.php"</script>';
          } else if ($categoria == '2') {
            $text_notificacion = 'Éste es un mensaje para notificar que se ha registrado una patente con la placa vehicular '.$placa.', la cual ha tenido una infracción tipo '.$tex_infraccion.' con lo cual ha superado una deuda de 1000$, teniendolo en nuestros registros como una categoría Inhabilitado, conactar inmediatamente al INTT para cumplir con los requrimientos para cumplir con la multa';
            $patentes->insertar_notificacion(array($placa, $id_admin, $text_notificacion));
            echo '<script language="javascript">alert("Patente registrada, al presenciar un cambio de cartegoria aInhabilitado, se han enviado notificaciones por SMS.")</script>
            <script language="javascript">window.location="listado.patente.manual.php"</script>';
          } else {
            echo '<script language="javascript">alert("Patente registrada al sistema")</script>
            <script language="javascript">window.location="listado.patente.manual.php"</script>';
          }
        }
          
        


 /* if ($objeto->insertar_tipo(array($nombre,$puntos,$costo))) {
    echo '
            <script language="javascript">alert("Tipo de Infracción registrada en Base de Datos.")</script>
            <script language="javascript">window.location="listado.tipo.infracciones.php"</script>';
  }
  else {
    echo '
            <script language="javascript">alert("La infracción no pudo ser registrada.")</script>
            <script language="javascript">window.location="insertar.tipo.infraccion.php"</script>';
  } */


?>
