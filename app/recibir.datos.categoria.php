
<?php


  include '../model/infracciones.class.php';


  $nombre = htmlspecialchars($_POST['nombre']);
  $descripcion = $_POST['descripcion'];
  $objeto = new Infracciones;
  if ($objeto->insertar_categoria(array($nombre,$descripcion))) {
    echo '
            <script language="javascript">alert("Categoría registrada en Base de Datos.")</script>
            <script language="javascript">window.location="listado.categorias.php"</script>';
  }
  else {
    echo '
            <script language="javascript">alert("La categoria no pudo ser registrada.")</script>
            <script language="javascript">window.location="insertar.categorias.php"</script>';
  }


?>
