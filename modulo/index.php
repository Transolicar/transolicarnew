<?
session_start();
if(isset($_SESSION['transolicar'])){
echo "<script>location.href='inicio.php'</script>";
}
?>


<html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <title>Transolicar | Módulo</title>


  </head>

  <body>
    <div class="section" style="height:40%; padding:0;">
      <div class="container">
        <div class="row">

            <div class="col-md-4 text-center">
              <center>  <img src="img/logo.png" id="logo" class="img-responsive text-center" style="max-width:250px;"></center>
            </div>

        </div>
      </div>
    </div>
    <div class="container-fluid" style="min-height:45%;padding:0;">

        <div class="row" style="height:50%;padding:0;">
          <div class="col-md-5 col-sm-12 col-xs-12" style="padding:0;"><img src="img/tracto.png" class="img-responsive" style="bottom:0; max-height:100%;"></div>
  <div class="col-md-1 hidden-sm hidden-xs" style="padding:0;"></div>
        <div class="col-sm-12 col-xs-12 hidden-md hidden-lg">  <h1 class="celeste text-center ">BIENVENIDO</h1></div>
          <div class="col-sm-2 col-xs-2 hidden-md hidden-lg"></div>
          <div class="col-md-5 col-sm-10 col-xs-10" >

<h1 class="celeste text-left hidden-sm hidden-xs">BIENVENIDO</h1>
<form method="post" action="sesion.php">
  <div class="campo">
   <div class="col-md-2 text-center" onclick="focuse(1)"><label class="celeste">Correo</label></div>
   <div class="col-md-7"><input id="txt1" type="email" name="correo" required></div>
 </div>
    <div class="campo">
     <div class="col-md-2 text-center" onclick="focuse(2)"><label class="celeste">C.C/NIT</label></div>
     <div class="col-md-7"><input id="txt2" type="text" name="cedula" required></div>
   </div>
    <div class="campo2">
    <div class="col-md-10 col-xs-8 col-sm-8" style="padding-top10px;"><a href="registro.php" style="text-decoration:none;" class="azul">¿Aún no se ha registrado?</a></div>
     <div class="col-md-2 col-xs-4 col-sm-4 text-right">  <button type="submit" class="btn btn-azul">ENTRAR</button></div>
    </div>
</form>

          </div>
        </div>

    </div>
    <div class="section footer">
      <div class="container">
        <div class="row"></div>
      </div>
    </div>
  </body>

</html>
