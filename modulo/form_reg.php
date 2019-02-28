<?php 
require('conectar.php');
$sql = "SELECT * FROM usuarios where correo = '".$_SESSION['transolicar']."'";

$datos = mysqli_query($c,$sql);

      while($ren = mysqli_fetch_array($datos,MYSQLI_ASSOC)){

        if($ren['rol'] != 0){

          echo "<script>location.href='index.php'</script>";

        }

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
              <center> <a href="index.php"> <img src="img/logo.png" id="logo" class="img-responsive text-center" style="max-width:250px;"></a></center>
            </div>

        </div>
      </div>
    </div>
    <div class="container-fluid" style="min-height:45%;padding:0;">

        <div class="row" style="height:50%;padding:0;">
          <div class="col-md-5 col-sm-12 col-xs-12" style="padding:0;"><img src="img/tracto.png" class="img-responsive" style="bottom:0; max-height:100%;"></div>
  <div class="col-md-1 hidden-sm hidden-xs" style="padding:0;"></div>
        <div class="col-sm-12 col-xs-12 hidden-md hidden-lg">  <h1 class="celeste text-center ">REGISTRO DE EMPLEADOS</h1></div>
          <div class="col-sm-2 col-xs-2 hidden-md hidden-lg"></div>
          <div class="col-md-5 col-sm-10 col-xs-10" >

<h1 class="celeste text-left hidden-sm hidden-xs">REGISTRO DE EMPLEADOS</h1>
<form method="post" action="empleado_nuevo.php">
  <div class="campo">
   <div class="col-md-2 text-center" onclick="focuse(3)"><label class="celeste">Nombre</label></div>
   <div class="col-md-7"><input id="txt3" type="text" name="nombre" required></div>
 </div>
  <div class="campo">
   <div class="col-md-2 text-center" onclick="focuse(1)"><label class="celeste">Correo</label></div>
   <div class="col-md-7"><input id="txt1" type="email" name="correo" required></div>
 </div>
    <div class="campo">
     <div class="col-md-2 text-center" onclick="focuse(2)"><label class="celeste">C.C/NIT</label></div>
     <div class="col-md-7"><input id="txt2" type="text" name="cedula" required></div>
   </div>

 <div class="campo">
     <div class="col-md-2 text-center" onclick="focuse(3)"><label class="celeste">ROL</label></div>
     <div class="col-md-7">
        <select  name="rol"  required>
         <option value>-Seleccione-</option>
         <option value="1">Solo Empleado</option>
         <option value="4">Empleado / Proveedor</option>
          </select>
        </div>
   </div>


    <div class="campo2" style="margin-top:20px; clear:both;">
    <div class="col-md-5 col-xs-1 col-sm-4" style="padding-top:10px;"></div>
     <div class="col-md-2 col-xs-10 col-sm-4 text-center">  <button type="submit" class="btn btn-azul">REGISTRAR</button></div>
         <div class="col-md-5 col-xs-1 col-sm-4" style="padding-top:10px;"></div>
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
