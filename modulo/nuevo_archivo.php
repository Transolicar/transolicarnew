<?php
session_start();
$tipo_rol = 0;
require('conectar.php');
$sql = "SELECT * FROM usuarios where correo = '".$_SESSION['transolicar']."'";
$datos = mysqli_query($c,$sql);
      while($ren = mysqli_fetch_array($datos,MYSQLI_ASSOC)){
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

      $datosa = mysqli_query($c,$sqla);

            while($rena = mysqli_fetch_array($datosa,MYSQLI_ASSOC)){
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

<?php include 'titulo_archivo.php'; ?>


<div class="section">
<?php 


echo get_archivo($perfil, $id_usuario); 

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
