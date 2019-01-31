
<?php


  include '../model/infracciones.class.php';
  include '../model/patentes.class.php';

  $lugar = htmlspecialchars($_POST['lugar']);
  $infraccion = htmlspecialchars($_POST['infraccion']);
  $_FILES['foto']['name'];
  $objeto = new Infracciones;
  $patentes = new Patentes;

  $carpetaDestino='../view/img/upload/';
    if(isset($_FILES['foto']) && $_FILES['foto']['name'] != '') {
 
        # recorremos todos los arhivos que se han subido
       // for($i=0;$i<count($_FILES["archivo"]["name"]);$i++){
 
            # si es un formato de imagen
            if($_FILES['foto']['type']=='image/jpeg' || $_FILES['foto']['type']=='image/gif' || $_FILES['foto']['type']=='image/png') {
 
                # si exsite la carpeta o se ha creado
                if(file_exists($carpetaDestino) || @mkdir($carpetaDestino)) {
                    $origen=$_FILES['foto']['tmp_name'];
                    $destino=$carpetaDestino.$_FILES['foto']['name'];
 
                    # movemos el archivo
                    if(@move_uploaded_file($origen, $destino)) {
                        echo ' ';
                    }else{
                        echo '<br>No se ha podido mover el archivo: '.$_FILES['foto']['name'];
                    }
                }else{
                    echo '<br>No se ha podido crear la carpeta: '.$carpetaDestino;
                }
            }else{
                echo '<br>'.$_FILES['foto']['name']." - NO es imagen jpg, png o gif";
            }
       // }
    }else{
        #echo '<br>No se ha subido ninguna imagen';
    }
  $imagen = $_FILES['foto']['name'];
  $patente=mt_rand(0,1);
  $cola = 0;
  $id_patente = '';
  $patentes->insertar_patente(array($patente,$imagen));

  if ($patente == 1){
    $ultima = $patentes->listar_ultima_patente();
    $contar = $patentes->listar_patentes_contador();
    while ($ult=mysqli_fetch_array($ultima, MYSQLI_ASSOC)) {
        $id_patente = $ult['id_patente'];
    }
    while ($cont=mysqli_fetch_array($contar, MYSQLI_ASSOC)) {
        $cola = $cont['cola']+1;
    }
    $patentes->insertar_patente_manual(array($id_patente,$cola,$infraccion,0));
  }

  if ($objeto->insertar(array($lugar,$infraccion,$imagen))) {
    echo '
            <script language="javascript">alert("Infracción registrada en Base de Datos.")</script>
            <script language="javascript">window.location="insertar.datos.infraccion.php"</script>';
  }
  else {
    echo '
            <script language="javascript">alert("La infracción no pudo ser registrada.")</script>
            <script language="javascript">window.location="insertar.datos.infraccion.php"</script>';
  }


?>
