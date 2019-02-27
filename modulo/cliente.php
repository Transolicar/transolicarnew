<?php
session_start();
$tipo_rol = 2;

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
