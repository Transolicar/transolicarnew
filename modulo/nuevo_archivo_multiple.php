<?php
session_start();

$tipo_rol = 0;

require('conectar.php');

$sql = "SELECT * FROM usuarios where correo = '".$_SESSION['transolicar']."'";

$datos = mysql_query($sql,$c);

      while($ren = mysql_fetch_array($datos)){
        $rol = $ren['rol'];
        $usuario = $ren['id'];
        if($ren['rol'] != $tipo_rol){

          echo "<script>location.href='index.php'</script>";

        }

      }


$perfil = $_GET['rol'];
$id_usuario = $_GET['id_usuario'];

if($perfil == NULL){

    if($id_usuario == NULL){

        echo '<script>

                  window.history.back();

              </script>';

    }else{




      $sqla = "SELECT * FROM usuarios where id = ".$id_usuario;

      $datosa = mysql_query($sqla,$c);

            while($rena = mysql_fetch_array($datosa)){
              $perfil = $rena['rol'];

            }

    }



}


 ?>


<html>

<?php include 'head_tag.php'; ?>

  <body>

    <?php include 'header.php'; ?>
  
     <div class="container-fluid" style="padding:0;">

<?php include 'titulo_archivo_multiple.php'; ?>


<div class="section">

<h1 class="text-danger text-center">Espere por favor, esta sección está en mantenimiento.</h1>

<?php 



echo get_multiples_archivos($perfil, $id_usuario); 

?>
</div>
  </div>
    <div class="section footer">
      <div class="container">
        <div class="row">


        </div>
      </div>
    </div>
  </body>

</html>
