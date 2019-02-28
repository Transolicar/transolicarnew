<?php

session_start();

if($_SESSION['transolicar'] == NULL){

echo "<script>

location.href='index.php';

</script>";


}

require('conectar.php');

$sql = "SELECT * FROM usuarios where id = ".$_GET['id'];

$datos = mysqli_query($c,$sql);

      while($ren = mysqli_fetch_array($datos,MYSQLI_ASSOC)){
        $rol = $ren['rol'];
        $usuario = $ren['id'];
        $perfil = $ren['nombre'];

      }

$tipo = $_GET['tipo'];

 ?>


<html>

<?php include 'head_tag.php'; ?>

  <body>
    <?php include 'header.php';

    ?>

     <div class="container-fluid" style="padding:0;">
<?php include 'titulo_individual.php'; ?>


<div class="section" style="min-height:50%; width:90%; margin-left:5%;">
<h4 class="text-center text-primary">Haga clic sobre el icono de descarga o vista.</h4>
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
  var tipo = $('#tipo').val();

      if(ano.length != 0 || mes.length != 0 || tipo.length != 0){

        $('#dinamico').html('Espere por favor...');

           $.get( "buscar_archivos.php", {mes: mes, ano:ano, usuario: usuario, tipo:tipo} )
               .done(function( data ) {
                   $('#dinamico').html( data);

                   });


      }else{

            alert("Seleccione tipo, año o un mes para hacer una busqueda.");

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
