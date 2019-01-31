
<?php


  include '../model/infracciones.class.php';

  $id_inf = $_POST['id_inf'];
  $puntos = $_POST['puntos'];
  $costo = $_POST['costo'];
  $objeto = new Infracciones;
  if ($objeto->cambiar_tipo(array($puntos,$costo,$id_inf))) {
    echo '
            <script language="javascript">alert("Tipo de Infracción editado.")</script>
            <script language="javascript">window.location="listado.tipo.infracciones.php"</script>';
  }
  else {
    echo '
            <script language="javascript">alert("La infracción no pudo ser editada.")</script>
            <script language="javascript">window.location="editar.tipo.infraccion.php"</script>';
  }


?>
