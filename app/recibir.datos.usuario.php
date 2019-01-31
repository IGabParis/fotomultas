
<?php


  include '../model/usuarios.class.php';


  $nombre = htmlspecialchars($_POST['nombre']);
  $ps = $_POST['ps'];
  $objeto = new Usuarios;
  if ($objeto->insertar(array($nombre,$ps))) {
    echo '
            <script language="javascript">alert("Usuario en Base de Datos.")</script>
            <script language="javascript">window.location="listado.usuarios.php"</script>';
  }
  else {
    echo '
            <script language="javascript">alert("El usuario no pudo ser registrado.")</script>
            <script language="javascript">window.location="insertar.usuarios.php"</script>';
  }


?>
