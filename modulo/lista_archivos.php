<?php

session_start();

if($_SESSION['transolicar'] == NULL){

echo "<script>

location.href='index.php';

</script>";


}

require('conectar.php');

$sql = "SELECT * FROM usuarios where correo = '".$_SESSION['transolicar']."'";

$datos = mysql_query($sql,$c);

      while($ren = mysql_fetch_array($datos)){
        $rol = $ren['rol'];
        $usuario = $ren['id'];


      }

$tipo = $_GET['tipo'];

 ?>


<html>

<?php include 'head_tag.php'; ?>

  <body>
    <?php include 'header.php';

    ?>

     <div class="container-fluid" style="padding:0;">
<?php include 'titulo.php'; ?>


<div class="section" style="min-height:50%; width:90%; margin-left:5%;">
<h4 class="text-center text-primary">Haga clic sobre el archivo para descargarlo.</h4>
  <br>
  <div class="col-md-3">

    <?php

    echo disponible($tipo, $usuario);

     ?>



  </div>
<script>

function buscar(){

  var ano = $('#ano').val();
  var mes = $('#mes').val();
  var usuario = <?php echo $usuario; ?>;
  var tipo = <?php echo $tipo; ?>;

      if(ano.length != 0 || mes.length != 0){

        $('#dinamico').html('Espere por favor...');

           $.get( "buscar_archivos.php", {mes: mes, ano:ano, usuario: usuario, tipo:tipo} )
               .done(function( data ) {
                   $('#dinamico').html( data);

                   });


      }else{

            alert("Seleccione un año o un mes para hacer una busqueda.");

      }

}


</script>

  <div id="dinamico" class="col-md-9">


<?php

echo listar($tipo, $usuario);

 ?>
</div>
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
