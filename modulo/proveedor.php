<?php
session_start();

$tipo_rol = 3;

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


 ?>


<html>

<?php include 'head_tag.php'; ?>

  <body>
    <?php include 'header.php'; ?>
     <div class="container-fluid" style="padding:0;">
<?php include 'titulo.php'; ?>


<div class="section">
<?php echo get_tipos($usuario); ?>
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
