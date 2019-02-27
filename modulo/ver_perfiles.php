<?php
$tipo_rol = 0;

require('conectar.php');

$sql = "SELECT * FROM usuarios where correo = '".$_SESSION['transolicar']."'";

$datos = mysql_query($sql,$c);

      while($ren = mysql_fetch_array($datos)){
        $rol = $ren['rol'];
        $usuario = $ren['id'];
        if($ren['rol'] != $tipo_rol){

          //echo "<script>location.href='index.php'</script>";

        }

      }

$perfil = $_GET['rol'];

 ?>


<html>

<?php include 'head_tag.php'; ?>

  <body>
    <?php include 'header.php'; ?>
     <div class="container-fluid" style="padding:0;">
<?php include 'titulo_perfiles.php'; ?>


<div class="section">
<?php echo get_prefil_actions($perfil); ?>
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
