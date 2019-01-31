
<?php


  include '../model/infracciones.class.php';


  $nombre = htmlspecialchars($_POST['nombre']);
  $puntos = $_POST['puntos'];
  $costo = $_POST['costo'];
  $objeto = new Infracciones;
  if ($objeto->insertar_tipo(array($nombre,$puntos,$costo))) {
    echo '
            <script language="javascript">alert("Tipo de Infracción registrada en Base de Datos.")</script>
            <script language="javascript">window.location="listado.tipo.infracciones.php"</script>';
  }
  else {
    echo '
            <script language="javascript">alert("La infracción no pudo ser registrada.")</script>
            <script language="javascript">window.location="insertar.tipo.infraccion.php"</script>';
  }


?>
